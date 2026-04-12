<?php

namespace App\Http\Controllers\Guru;

use App\Http\Controllers\Controller;
use App\Models\Murid;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;

class AbsensiController extends Controller
{
    public function index(Request $request)
    {
        $perPage = $request->input('limit', 10);
        $search = $request->input('search');

        // Query asli dari database
        $query = Murid::query()->where('status', true);

        if ($search) {
            $query->where(function($q) use ($search) {
                $q->where('nama', 'LIKE', "%{$search}%")
                  ->orWhere('nisn', 'LIKE', "%{$search}%");
            });
        }

        $siswas = $query->paginate($perPage)->withQueryString();

        /**
         * LOGIC DUMMY DATA:
         * Jika database murid masih kosong, kita buatkan data buatan 
         * supaya kamu bisa lihat hasil codingan UI-nya.
         */
        if ($siswas->isEmpty()) {
            $dummyItems = collect([
                (object) ['id' => 1, 'nama' => 'Hendi Satrio (Dummy)', 'nisn' => '0012345678'],
                (object) ['id' => 2, 'nama' => 'Budi Setiawan (Dummy)', 'nisn' => '0012345679'],
                (object) ['id' => 3, 'nama' => 'Siti Aminah (Dummy)', 'nisn' => '0012345680'],
                (object) ['id' => 4, 'nama' => 'Randi Pangalila (Dummy)', 'nisn' => '0012345681'],
                (object) ['id' => 5, 'nama' => 'Dewi Sartika (Dummy)', 'nisn' => '0012345682'],
            ]);

            // Bungkus ke dalam paginator manual agar tidak error di view
            $siswas = new LengthAwarePaginator(
                $dummyItems, 
                $dummyItems->count(), 
                $perPage, 
                1, 
                ['path' => $request->url(), 'query' => $request->query()]
            );
        }

        $info = [
            'kelas' => 'X IPA 1',
            'mapel' => 'Matematika',
            'total' => $siswas->total()
        ];

        return view('guru.absensi.index', compact('siswas', 'info'));
    }

    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'absensi' => 'required|array',
            'tanggal' => 'required|date',
        ]);

        /**
         * Nanti di sini kamu tinggal panggil Model Absensi::create
         * Untuk sekarang, kita return success saja dulu.
         */
        
        return redirect()->back()->with('success', 'Absensi berhasil diproses!');
    }
}