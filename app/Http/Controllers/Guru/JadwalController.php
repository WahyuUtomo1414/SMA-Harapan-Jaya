<?php

namespace App\Http\Controllers\Guru;

use App\Http\Controllers\Controller;
use App\Models\JadwalPelajaran;
use Illuminate\Support\Facades\Auth;

class JadwalController extends Controller
{
    public function index()
    {
        $guru = Auth::user()->guru;

        $jadwal = JadwalPelajaran::with(['mataPelajaran', 'kelas'])
            ->where('guru_id', Auth::user()->guru_id)
            ->where('status', 1)
            ->orderBy('hari')
            ->orderBy('mulai')
            ->get()
            ->groupBy(function ($item) {
                return ucfirst(strtolower(trim($item->hari)));
            });

        return view('dashboard.guru.jadwal.index', compact('jadwal', 'guru'));
    }
}
