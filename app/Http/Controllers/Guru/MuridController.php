<?php

namespace App\Http\Controllers\Guru;

use App\Http\Controllers\Controller;
use App\Models\Murid;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;

class MuridController extends Controller
{
    public function index(Request $request)
    {
        $perPage = $request->input('limit', 10);
        $search = $request->input('search');

        // Ambil data asli
        $query = Murid::query();

        if ($search) {
            $query->where(function($q) use ($search) {
                $q->where('nama', 'LIKE', "%{$search}%")
                  ->orWhere('nisn', 'LIKE', "%{$search}%");
            });
        }

        $murids = $query->latest()->paginate($perPage)->withQueryString();

        // Dummy Data jika database masih kosong
        if ($murids->isEmpty() && !$search) {
            $dummyData = collect([
                (object) ['id' => 1, 'nama' => 'Ahmad Rizki', 'nisn' => '002341', 'gender' => 'L', 'status' => 1],
                (object) ['id' => 2, 'nama' => 'Anisa Putri', 'nisn' => '002342', 'gender' => 'P', 'status' => 1],
                (object) ['id' => 3, 'nama' => 'Budi Santoso', 'nisn' => '002343', 'gender' => 'L', 'status' => 1],
                (object) ['id' => 4, 'nama' => 'Citra Lestari', 'nisn' => '002344', 'gender' => 'P', 'status' => 0],
                (object) ['id' => 5, 'nama' => 'Dimas Pratama', 'nisn' => '002345', 'gender' => 'L', 'status' => 1],
            ]);

            $murids = new LengthAwarePaginator(
                $dummyData, $dummyData->count(), $perPage, 1, 
                ['path' => $request->url(), 'query' => $request->query()]
            );
        }

        return view('guru.murid.index', compact('murids'));
    }
}