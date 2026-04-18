<?php

namespace App\Http\Controllers\Guru;

use App\Http\Controllers\Controller;
use App\Models\Absensi;
use App\Models\AbsensiDetail;
use App\Models\Murid;
use App\Models\Kelas;
use App\Models\MataPelajaran;
use App\Models\JadwalPelajaran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class AbsensiController extends Controller
{
    private function taughtClassIds(int $guruId)
    {
        return Kelas::query()
            ->whereHas('jadwalPelajaran', fn ($query) => $query->where('guru_id', $guruId))
            ->pluck('id');
    }

    private function taughtSubjectIds(int $guruId, ?int $kelasId = null)
    {
        return MataPelajaran::query()
            ->whereHas('jadwalPelajaran', function ($query) use ($guruId, $kelasId) {
                $query->where('guru_id', $guruId);

                if ($kelasId) {
                    $query->where('kelas_id', $kelasId);
                }
            })
            ->pluck('id');
    }

    // =========================
    // INDEX
    // =========================
    public function index(Request $request)
    {
        $guruId = Auth::user()->guru_id;
        $kelasList = Kelas::query()
            ->whereIn('id', $this->taughtClassIds($guruId))
            ->orderBy('kode')
            ->get();

        $kelasId = $request->kelas_id;
        $mapelId = $request->mapel_id;
        $tanggal = $request->tanggal;
        $allowedKelasIds = $kelasList->pluck('id');

        if ($kelasId && ! $allowedKelasIds->contains((int) $kelasId)) {
            abort(403);
        }

        $mapelList = MataPelajaran::query()
            ->whereIn('id', $this->taughtSubjectIds($guruId, $kelasId ? (int) $kelasId : null))
            ->orderBy('nama')
            ->get();

        $query = Absensi::with([
            'jadwalPelajaran.kelas',
            'jadwalPelajaran.mataPelajaran',
            'absensiDetail.murid'
        ])
            ->where('guru_id', $guruId);

        // FILTER KELAS
        if ($kelasId) {
            $query->whereHas('jadwalPelajaran', function ($q) use ($kelasId) {
                $q->where('kelas_id', $kelasId);
            });
        }

        // FILTER MAPEL
        if ($mapelId) {
            $query->whereHas('jadwalPelajaran', function ($q) use ($mapelId) {
                $q->where('mata_pelajaran_id', $mapelId);
            });
        }

        // 🔥 FILTER TANGGAL (FIX UTAMA)
        if ($tanggal) {
            $query->whereDate('tanggal', $tanggal);
        }

        $absensi = $query->latest()->get();

        return view('dashboard.guru.absensi.index', compact(
            'kelasList',
            'mapelList',
            'kelasId',
            'mapelId',
            'tanggal',
            'absensi'
        ));
    }

    // =========================
    // CREATE
    // =========================
    public function create(Request $request)
    {
        $guruId = Auth::user()->guru_id;
        $kelasList = Kelas::query()
            ->whereIn('id', $this->taughtClassIds($guruId))
            ->orderBy('kode')
            ->get();

        $kelasId = $request->kelas_id;
        $mapelId = $request->mapel_id;
        $allowedKelasIds = $kelasList->pluck('id');

        if ($kelasId && ! $allowedKelasIds->contains((int) $kelasId)) {
            abort(403);
        }

        $mapelList = MataPelajaran::query()
            ->whereIn('id', $this->taughtSubjectIds($guruId, $kelasId ? (int) $kelasId : null))
            ->orderBy('nama')
            ->get();
        $jadwalList = JadwalPelajaran::with(['kelas', 'mataPelajaran'])
            ->where('guru_id', $guruId)
            ->get();

        $siswas = collect();

        if ($kelasId && (! $mapelId || $this->taughtSubjectIds($guruId, (int) $kelasId)->contains((int) $mapelId))) {
            $siswas = Murid::where('kelas_id', $kelasId)
                ->where('status', true)
                ->orderBy('id')
                ->get();
        }

        return view('dashboard.guru.absensi.create', compact(
            'kelasList',
            'mapelList',
            'jadwalList',
            'kelasId',
            'mapelId',
            'siswas'
        ));
    }

    // =========================
    // STORE
    // =========================
    public function store(Request $request)
    {
        $request->validate([
            'kelas_id' => 'required|exists:kelas,id',
            'mapel_id' => 'required|exists:mata_pelajaran,id',
            'tanggal' => 'required|date',
            'absensi' => 'required|array',
            'absensi.*' => 'required|in:hadir,izin,sakit,alpha',
            'keterangan' => 'nullable|array',
        ]);

        DB::beginTransaction();

        try {

            $guruId = Auth::user()->guru_id;
            $jadwal = JadwalPelajaran::where('kelas_id', $request->kelas_id)
                ->where('mata_pelajaran_id', $request->mapel_id)
                ->where('guru_id', $guruId)
                ->first();

            if (! $jadwal) {
                throw new \RuntimeException('Jadwal tidak ditemukan untuk guru yang sedang login.');
            }

            $absensi = Absensi::create([
                'jadwal_pelajaran_id' => $jadwal->id,
                'guru_id' => $guruId,
                'tanggal' => $request->tanggal,
                'status' => 1,
            ]);

            foreach ($request->absensi as $muridId => $status) {
                Murid::query()
                    ->where('id', $muridId)
                    ->where('kelas_id', $request->kelas_id)
                    ->firstOrFail();

                AbsensiDetail::create([
                    'absensi_id' => $absensi->id,
                    'murid_id' => $muridId,
                    'status_absen' => $status,
                    'keterangan' => $request->input("keterangan.{$muridId}"),
                    'status' => true,
                ]);
            }

            DB::commit();

            return redirect()
                ->back()
                ->withInput()
                ->with('success', 'Absensi berhasil disimpan');

        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('error', $e->getMessage());
        }
    }

    // =========================
    // EDIT
    // =========================
    public function edit($id)
    {
        $absensi = Absensi::with(
            'absensiDetail.murid',
            'jadwalPelajaran.kelas',
            'jadwalPelajaran.mataPelajaran'
        )
            ->where('guru_id', Auth::user()->guru_id)
            ->findOrFail($id);

        return view('dashboard.guru.absensi.edit', compact('absensi'));
    }

    // =========================
    // UPDATE
    // =========================
    public function update(Request $request, $id)
    {
        $request->validate([
            'absensi' => 'required|array',
            'absensi.*' => 'required|in:hadir,izin,sakit,alpha',
            'keterangan' => 'nullable|array',
        ]);

        DB::beginTransaction();

        try {

            $absensi = Absensi::with('jadwalPelajaran')
                ->where('guru_id', Auth::user()->guru_id)
                ->findOrFail($id);

            foreach ($request->absensi as $muridId => $status) {
                Murid::query()
                    ->where('id', $muridId)
                    ->where('kelas_id', $absensi->jadwalPelajaran->kelas_id)
                    ->firstOrFail();

                AbsensiDetail::updateOrCreate(
                    [
                        'absensi_id' => $absensi->id,
                        'murid_id' => $muridId,
                    ],
                    [
                        'status_absen' => $status,
                        'keterangan' => $request->input("keterangan.{$muridId}"),
                        'status' => true,
                    ]
                );
            }

            DB::commit();

            return redirect()
                ->back()
                ->with('success', 'Absensi berhasil diperbarui!');

        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('error', $e->getMessage());
        }
    }
}
