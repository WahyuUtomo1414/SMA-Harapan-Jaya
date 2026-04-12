<?php

namespace App\Http\Controllers\Guru;

use App\Http\Controllers\Controller;
use App\Models\Murid;
// use App\Models\Nilai; // Dikomentar dulu karena belum dipakai di kode aktif
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;

class NilaiController extends Controller
{
    public function index(Request $request)
    {
        $perPage = $request->input('limit', 10);
        $search = $request->input('search');

        // Mencoba ambil data asli Murid
        $query = Murid::with(['nilai' => function($q) {
            $q->where('mata_pelajaran_id', 1); 
        }])->where('status', true);

        if ($search) {
            $query->where(function($q) use ($search) {
                $q->where('nama', 'LIKE', "%{$search}%")
                  ->orWhere('nisn', 'LIKE', "%{$search}%");
            });
        }

        $siswas = $query->paginate($perPage)->withQueryString();

        // LOGIKA DUMMY (Aktif selama DB Murid kosong)
        if ($siswas->isEmpty() && !$search) {
            $dummyData = collect([
                (object) ['id' => 1, 'nama' => 'Ahmad Rizki (Dummy)', 'nisn' => '002341', 'tugas' => 85, 'uts' => 90, 'uas' => 88],
                (object) ['id' => 2, 'nama' => 'Anisa Putri (Dummy)', 'nisn' => '002342', 'tugas' => 80, 'uts' => 85, 'uas' => 90],
                (object) ['id' => 3, 'nama' => 'Budi Santoso (Dummy)', 'nisn' => '002343', 'tugas' => 75, 'uts' => 80, 'uas' => 85],
                (object) ['id' => 4, 'nama' => 'Citra Lestari (Dummy)', 'nisn' => '002344', 'tugas' => 90, 'uts' => 95, 'uas' => 92],
                (object) ['id' => 5, 'nama' => 'Dimas Pratama (Dummy)', 'nisn' => '002345', 'tugas' => 70, 'uts' => 75, 'uas' => 80],
            ]);

            $siswas = new LengthAwarePaginator(
                $dummyData, $dummyData->count(), $perPage, 1, 
                ['path' => $request->url(), 'query' => $request->query()]
            );
        }

        $info = [
            'kelas' => 'X IPA 1',
            'mapel' => 'Matematika',
            'semester' => 'Genap',
            'total' => $siswas->total()
        ];

        return view('guru.nilai.index', compact('siswas', 'info'));
    }

    public function store(Request $request)
    {
        $request->validate(['nilai' => 'required|array']);

        /**
         * NOTE: Logika simpan dimatikan sementara agar tidak Integrity Constraint Error.
         * Jika tabel mata_pelajaran & guru sudah siap, silakan buka komentar di bawah.
         */
        /*
        foreach ($request->nilai as $muridId => $skor) {
            $tugas = $skor['tugas'] ?? 0;
            $uts = $skor['uts'] ?? 0;
            $uas = $skor['uas'] ?? 0;
            $total = ($tugas * 0.3) + ($uts * 0.3) + ($uas * 0.4);

            \App\Models\Nilai::updateOrCreate(
                ['murid_id' => $muridId, 'mata_pelajaran_id' => 1],
                [
                    'tugas' => $tugas, 'uts' => $uts, 'uas' => $uas,
                    'total_nilai' => $total, 'guru_id' => 1, 'status' => true
                ]
            );
        }
        */

        return redirect()->back()->with('success', 'Berhasil! Nilai dihitung secara real-time (Mode Demo).');
    }
}