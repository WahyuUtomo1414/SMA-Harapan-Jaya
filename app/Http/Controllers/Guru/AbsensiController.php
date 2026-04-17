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
    // =========================
    // INDEX
    // =========================
    public function index(Request $request)
    {
        $kelasList = Kelas::orderBy('id')->get();
        $mapelList = MataPelajaran::orderBy('id')->get();

        $kelasId = $request->kelas_id;
        $mapelId = $request->mapel_id;
        $tanggal = $request->tanggal;

        $query = Absensi::with([
            'jadwalPelajaran.kelas',
            'jadwalPelajaran.mataPelajaran',
            'absensiDetail.murid'
        ]);

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

        return view('guru.absensi.index', compact(
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
        $kelasList = Kelas::orderBy('id')->get();
        $mapelList = MataPelajaran::orderBy('id')->get();
        $jadwalList = JadwalPelajaran::with(['kelas', 'mataPelajaran'])->get();

        $kelasId = $request->kelas_id;
        $mapelId = $request->mapel_id;

        $siswas = collect();

        if ($kelasId) {
            $siswas = Murid::where('kelas_id', $kelasId)
                ->where('status', true)
                ->orderBy('id')
                ->get();
        }

        return view('guru.absensi.create', compact(
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
        ]);

        DB::beginTransaction();

        try {

            $jadwal = JadwalPelajaran::where('kelas_id', $request->kelas_id)
                ->where('mata_pelajaran_id', $request->mapel_id)
                ->first();

            if (!$jadwal) {
                return back()->with('error', 'Jadwal tidak ditemukan');
            }

            $absensi = Absensi::create([
                'jadwal_pelajaran_id' => $jadwal->id,
                'guru_id' => Auth::id(),
                'tanggal' => $request->tanggal,
                'status' => 1,
            ]);

            foreach ($request->absensi as $muridId => $status) {
                AbsensiDetail::create([
                    'absensi_id' => $absensi->id,
                    'murid_id' => $muridId,
                    'status_absen' => $status,
                    'keterangan' => $request->keterangan[$muridId] ?? null,
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
        )->findOrFail($id);

        return view('guru.absensi.edit', compact('absensi'));
    }

    // =========================
    // UPDATE
    // =========================
    public function update(Request $request, $id)
    {
        $request->validate([
            'absensi' => 'required|array',
        ]);

        DB::beginTransaction();

        try {

            $absensi = Absensi::findOrFail($id);

            foreach ($request->absensi as $muridId => $status) {
                AbsensiDetail::updateOrCreate(
                    [
                        'absensi_id' => $absensi->id,
                        'murid_id' => $muridId
                    ],
                    [
                        'status_absen' => $status,
                        'keterangan' => $request->keterangan[$muridId] ?? null,
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