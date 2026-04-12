<?php

namespace App\Http\Controllers\Guru;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
// use App\Models\Jadwal; // Pastikan Model Jadwal sudah ada

class JadwalController extends Controller
{
    public function index()
    {
        // 1. Ambil ID guru yang sedang login
        $guruId = Auth::id();

        // 2. Ambil data jadwal (Contoh jika sudah ada database)
        // $jadwal = Jadwal::where('guru_id', $guruId)
        //     ->orderBy('jam_mulai', 'asc')
        //     ->get()
        //     ->groupBy('hari'); 

        // 3. Karena kita fokus di UI dulu, kita kirim array kosong 
        // agar tidak error saat loop di Blade
        $jadwalPerHari = []; 

        return view('guru.jadwal.index', compact('jadwalPerHari'));
    }
}