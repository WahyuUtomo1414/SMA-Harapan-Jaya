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
    // ==========================================
    // 1. INDEX
    // ==========================================
    public function index(Request $request)
    {
        $perPage = $request->input('limit', 10);
        $kelasId = $request->input('kelas_id');
        $mapelId = $request->input('mapel_id') ?? 1;
        $search  = $request->input('search');

        $kelasList = Kelas::orderBy('kode')->get();
        $mapelList = MataPelajaran::orderBy('nama')->get();

        $query = Murid::with([
                'nilai' => function ($q) use ($mapelId) {
                    $q->where('mata_pelajaran_id', $mapelId);
                },
                'kelas'
            ])
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
        $kelasId = $request->input('kelas_id');
        $mapelId = $request->input('mapel_id') ?? 1;
        $search  = $request->input('search');

        $kelasList = Kelas::orderBy('kode')->get();

        $query = Murid::with([
                'nilai' => function ($q) use ($mapelId) {
                    $q->where('mata_pelajaran_id', $mapelId);
                },
                'kelas'
            ])
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
            'semester' => 'Genap',
            'total' => $siswas->total()
        ];

        return view('dashboard.guru.nilai.create', compact('siswas', 'info', 'kelasList'));
    }

    // ==========================================
    // 3. STORE (FIX GURU NULL)
    // ==========================================
    public function store(Request $request)
    {
        $request->validate([
            'nilai' => 'required|array'
        ]);

        $mapelId = $request->input('mapel_id') ?? 1;

        // 🔥 FIX: jangan sampai null
        $guruId = Auth::id() ?? 1;

        foreach ($request->nilai as $muridId => $skor) {

            $tugas = $skor['tugas'] ?? 0;
            $uts   = $skor['uts'] ?? 0;
            $uas   = $skor['uas'] ?? 0;

            $total = ($tugas * 0.3) + ($uts * 0.3) + ($uas * 0.4);

            Nilai::updateOrCreate(
                [
                    'murid_id' => $muridId,
                    'mata_pelajaran_id' => $mapelId
                ],
                [
                    'tugas' => $tugas,
                    'uts' => $uts,
                    'uas' => $uas,
                    'total_nilai' => $total,
                    'guru_id' => $guruId, // 🔥 FIX
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
        $mapelId = 1;

        $siswa = Murid::with([
            'nilai' => function ($q) use ($mapelId) {
                $q->where('mata_pelajaran_id', $mapelId);
            },
            'kelas'
        ])->findOrFail($id);

        $info = [
            'kelas' => $siswa->kelas?->kode ?? '-',
            'mapel' => MataPelajaran::find($mapelId)?->nama ?? 'Mapel',
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

        $mapelId = 1;

        // 🔥 FIX: jangan null
        $guruId = Auth::id() ?? 1;

        $total = ($request->tugas * 0.3) + ($request->uts * 0.3) + ($request->uas * 0.4);

        Nilai::updateOrCreate(
            [
                'murid_id' => $id,
                'mata_pelajaran_id' => $mapelId
            ],
            [
                'tugas' => $request->tugas,
                'uts' => $request->uts,
                'uas' => $request->uas,
                'total_nilai' => $total,
                'guru_id' => $guruId, // 🔥 FIX
                'status' => true
            ]
        );

        return redirect()->route('guru.nilai.index')
            ->with('success', 'Nilai berhasil diperbarui!');
    }
}