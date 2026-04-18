<?php

namespace App\Http\Controllers\Guru;

use App\Http\Controllers\Controller;
use App\Models\Murid;
use App\Models\Kelas;
use App\Models\Nilai;
use App\Models\MataPelajaran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NilaiController extends Controller
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

    // ==========================================
    // 1. INDEX
    // ==========================================
    public function index(Request $request)
    {
        $guruId = Auth::user()->guru_id;
        $perPage = $request->input('limit', 10);
        $kelasId = $request->input('kelas_id');
        $search  = $request->input('search');

        $kelasList = Kelas::query()
            ->whereIn('id', $this->taughtClassIds($guruId))
            ->orderBy('kode')
            ->get();
        $allowedKelasIds = $kelasList->pluck('id');

        if ($kelasId && ! $allowedKelasIds->contains((int) $kelasId)) {
            abort(403);
        }

        $mapelList = MataPelajaran::query()
            ->whereIn('id', $this->taughtSubjectIds($guruId, $kelasId ? (int) $kelasId : null))
            ->orderBy('nama')
            ->get();
        $mapelId = (int) ($request->input('mapel_id') ?: $mapelList->first()?->id);

        $query = Murid::with([
                'nilai' => function ($q) use ($mapelId, $guruId) {
                    $q->where('mata_pelajaran_id', $mapelId)
                        ->where('guru_id', $guruId);
                },
                'kelas'
            ])
            ->whereIn('kelas_id', $allowedKelasIds)
            ->where('status', true);

        if ($kelasId) {
            $query->where('kelas_id', $kelasId);
        }

        if ($search) {
            $query->where(function ($q) use ($search) {
                $q->where('nama', 'LIKE', "%{$search}%")
                  ->orWhere('nisn', 'LIKE', "%{$search}%");
            });
        }

        $siswas = $query->paginate($perPage)->withQueryString();

        $info = [
            'kelas' => $kelasId ? (Kelas::find($kelasId)?->kode ?? '-') : 'SEMUA KELAS',
            'mapel' => MataPelajaran::find($mapelId)?->nama ?? 'Mapel',
            'mapel_id' => $mapelId,
            'semester' => 'Genap',
            'total' => $siswas->total()
        ];

        return view('dashboard.guru.nilai.index', compact('siswas', 'info', 'kelasList', 'mapelList'));
    }

    // ==========================================
    // 2. CREATE
    // ==========================================
    public function create(Request $request)
    {
        $guruId = Auth::user()->guru_id;
        $kelasId = $request->input('kelas_id');
        $search  = $request->input('search');

        $kelasList = Kelas::query()
            ->whereIn('id', $this->taughtClassIds($guruId))
            ->orderBy('kode')
            ->get();
        $allowedKelasIds = $kelasList->pluck('id');

        if ($kelasId && ! $allowedKelasIds->contains((int) $kelasId)) {
            abort(403);
        }

        $mapelList = MataPelajaran::query()
            ->whereIn('id', $this->taughtSubjectIds($guruId, $kelasId ? (int) $kelasId : null))
            ->orderBy('nama')
            ->get();
        $mapelId = (int) ($request->input('mapel_id') ?: $mapelList->first()?->id);

        $query = Murid::with([
                'nilai' => function ($q) use ($mapelId, $guruId) {
                    $q->where('mata_pelajaran_id', $mapelId)
                        ->where('guru_id', $guruId);
                },
                'kelas'
            ])
            ->whereIn('kelas_id', $allowedKelasIds)
            ->where('status', true);

        if ($kelasId) {
            $query->where('kelas_id', $kelasId);
        }

        if ($search) {
            $query->where(function ($q) use ($search) {
                $q->where('nama', 'LIKE', "%{$search}%")
                  ->orWhere('nisn', 'LIKE', "%{$search}%");
            });
        }

        $siswas = $query->paginate(100)->withQueryString();

        $info = [
            'kelas' => $kelasId ? (Kelas::find($kelasId)?->kode ?? '-') : 'SEMUA KELAS',
            'mapel' => MataPelajaran::find($mapelId)?->nama ?? 'Mapel',
            'mapel_id' => $mapelId,
            'semester' => 'Genap',
            'total' => $siswas->total()
        ];

        return view('dashboard.guru.nilai.create', compact('siswas', 'info', 'kelasList', 'mapelList'));
    }

    // ==========================================
    // 3. STORE (FIX GURU NULL)
    // ==========================================
    public function store(Request $request)
    {
        $request->validate([
            'nilai' => 'required|array'
        ]);

        $guruId = Auth::user()->guru_id;
        $mapelId = (int) $request->input('mapel_id');

        foreach ($request->nilai as $muridId => $skor) {
            $murid = Murid::query()
                ->where('id', $muridId)
                ->whereIn('kelas_id', $this->taughtClassIds($guruId))
                ->firstOrFail();

            abort_unless($this->taughtSubjectIds($guruId, $murid->kelas_id)->contains($mapelId), 403);

            $tugas = $skor['tugas'] ?? 0;
            $uts   = $skor['uts'] ?? 0;
            $uas   = $skor['uas'] ?? 0;

            $total = ($tugas * 0.3) + ($uts * 0.3) + ($uas * 0.4);

            Nilai::updateOrCreate(
                [
                    'murid_id' => $muridId,
                    'mata_pelajaran_id' => $mapelId,
                    'guru_id' => $guruId,
                ],
                [
                    'tugas' => $tugas,
                    'uts' => $uts,
                    'uas' => $uas,
                    'total_nilai' => $total,
                    'status' => true
                ]
            );
        }

        return redirect()->route('guru.nilai.index')
            ->with('success', 'Semua nilai berhasil disimpan!');
    }

    // ==========================================
    // 4. EDIT
    // ==========================================
    public function edit($id)
    {
        $guruId = Auth::user()->guru_id;
        $mapelId = (int) request('mapel_id', $this->taughtSubjectIds($guruId)->first());

        $siswa = Murid::with([
            'nilai' => function ($q) use ($mapelId, $guruId) {
                $q->where('mata_pelajaran_id', $mapelId)
                    ->where('guru_id', $guruId);
            },
            'kelas'
        ])
            ->whereIn('kelas_id', $this->taughtClassIds($guruId))
            ->findOrFail($id);

        $info = [
            'kelas' => $siswa->kelas?->kode ?? '-',
            'mapel' => MataPelajaran::find($mapelId)?->nama ?? 'Mapel',
            'mapel_id' => $mapelId,
            'semester' => 'Genap',
        ];

        return view('dashboard.guru.nilai.edit', compact('siswa', 'info'));
    }

    // ==========================================
    // 5. UPDATE (FIX GURU NULL)
    // ==========================================
    public function update(Request $request, $id)
    {
        $request->validate([
            'tugas' => 'required|numeric|min:0|max:100',
            'uts'   => 'required|numeric|min:0|max:100',
            'uas'   => 'required|numeric|min:0|max:100',
        ]);

        $guruId = Auth::user()->guru_id;
        $mapelId = (int) $request->input('mapel_id', $this->taughtSubjectIds($guruId)->first());
        $murid = Murid::query()
            ->whereIn('kelas_id', $this->taughtClassIds($guruId))
            ->findOrFail($id);

        abort_unless($this->taughtSubjectIds($guruId, $murid->kelas_id)->contains($mapelId), 403);

        $total = ($request->tugas * 0.3) + ($request->uts * 0.3) + ($request->uas * 0.4);

        Nilai::updateOrCreate(
            [
                'murid_id' => $id,
                'mata_pelajaran_id' => $mapelId,
                'guru_id' => $guruId,
            ],
            [
                'tugas' => $request->tugas,
                'uts' => $request->uts,
                'uas' => $request->uas,
                'total_nilai' => $total,
                'status' => true
            ]
        );

        return redirect()->route('guru.nilai.index')
            ->with('success', 'Nilai berhasil diperbarui!');
    }
}
