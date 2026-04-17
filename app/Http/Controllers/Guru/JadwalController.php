<?php

namespace App\Http\Controllers\Guru;

use App\Http\Controllers\Controller;
use App\Models\JadwalPelajaran;

class JadwalController extends Controller
{
    public function index()
    {
        // 🔥 Ambil SEMUA jadwal dulu (tanpa login)
        $jadwal = JadwalPelajaran::with(['mataPelajaran', 'kelas'])
            ->where('status', 1)
            ->get()
            ->groupBy(function ($item) {
                return ucfirst(strtolower(trim($item->hari)));
            });

        // 🔥 Dummy guru (biar UI tetap bisa pakai variable guru)
        $guru = (object)[
            'nama' => 'Guru Demo'
        ];

        return view('guru.jadwal.index', compact('jadwal', 'guru'));
    }
}