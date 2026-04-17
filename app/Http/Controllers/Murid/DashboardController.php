<?php

namespace App\Http\Controllers\Murid;

use App\Http\Controllers\Controller;
use App\Models\Murid;
use App\Models\AbsensiDetail;

class DashboardController extends Controller
{
    public function index()
    {
        // 1. Ambil data murid pertama (atau berdasarkan Auth jika sudah ada login)
        $murid = Murid::with(['kelas', 'nilai.mataPelajaran'])->first();

        // 2. Logic Dummy jika database kosong
        if (!$murid) {
            $murid = (object) [
                'nama' => 'Siswa Demo (Dummy)',
                'kelas' => (object) ['kode' => 'X-IPA-1'],
                'nilai' => collect(),
            ];
        }

        $nilai = $murid->nilai ?? collect();

        // 3. Hitung Rata-rata
        $rataRata = $nilai->count() > 0 ? $nilai->avg('total_nilai') : 0;

        // 4. Ambil data absensi
        $absensi = AbsensiDetail::with([
            'absensi.jadwalPelajaran.mataPelajaran'
        ])->latest()->take(5)->get();

        $hadir = $absensi->where('status', 'hadir')->count();
        $alpha = $absensi->where('status', 'alpha')->count();

        // PASTIKAN: File blade ada di resources/views/murid/dashboard.blade.php
        return view('murid.dashboard', compact(
            'murid',
            'nilai',
            'rataRata',
            'absensi',
            'hadir',
            'alpha'
        ));
    }
}
