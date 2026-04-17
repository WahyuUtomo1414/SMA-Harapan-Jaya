<?php

namespace App\Http\Controllers\Guru;

use App\Http\Controllers\Controller;
use App\Models\Murid;
use App\Models\Kelas;
use Illuminate\Http\Request;

class MuridController extends Controller
{
    public function index(Request $request)
    {
        $perPage = $request->input('limit', 10);
        $search = $request->input('search');
        $kelasId = $request->input('kelas_id');

        // 🔥 QUERY MURID + RELASI KELAS
        $query = Murid::with('kelas');

        // 🔍 FILTER KELAS (INI YANG SEBELUMNYA SALAH)
        if ($kelasId) {
            $query->where('kelas_id', $kelasId);
        }

        // 🔍 SEARCH
        if ($search) {
            $query->where(function ($q) use ($search) {
                $q->where('nama', 'LIKE', "%{$search}%")
                  ->orWhere('nisn', 'LIKE', "%{$search}%");
            });
        }

        $murids = $query->latest()->paginate($perPage)->withQueryString();

        // 🔥 AMBIL DATA KELAS DARI DATABASE
        $kelasList = Kelas::where('status', 1)->get();

        return view('guru.murid.index', compact('murids', 'kelasList'));
    }
}