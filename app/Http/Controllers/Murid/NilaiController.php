<?php

namespace App\Http\Controllers\Murid;

use App\Http\Controllers\Controller;
use App\Models\Nilai;

class NilaiController extends Controller
{
    public function index()
    {
        // 🔥 Ambil semua data nilai + relasi
        $nilai = Nilai::with(['mataPelajaran', 'guru', 'murid'])
            ->latest()
            ->get();

        return view('dashboard.murid.nilai.index', compact('nilai'));
    }
}