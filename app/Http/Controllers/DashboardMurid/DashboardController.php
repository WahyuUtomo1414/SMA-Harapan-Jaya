<?php

namespace App\Http\Controllers\DashboardMurid;

use App\Http\Controllers\Controller;
use App\Models\Murid;
use App\Models\AbsensiDetail;

class DashboardController extends Controller
{
    public function index()
    {
        // ambil murid + relasi
        $murid = Murid::with(['kelas', 'nilai.mataPelajaran'])->first();

        // 🔥 kalau tidak ada data murid → bikin dummy biar UI tetap tampil
        if (!$murid) {
            $murid = (object) [
                'nama' => 'Siswa Demo',
                'kelas' => (object) ['kode' => 'X-IPA-1'],
                'nilai' => collect(),
            ];
        }

        $nilai = $murid->nilai ?? collect();

        // rata-rata nilai
        $rataRata = $nilai->count() > 0 ? $nilai->avg('total_nilai') : 0;

        // 🔥 ambil absensi detail (READ ONLY)
        $absensi = AbsensiDetail::with([
            'absensi.jadwalPelajaran.mataPelajaran'
        ])->get();

        // 🔥 hitung hadir & alpha
        $hadir = $absensi->where('status', 'hadir')->count();
        $alpha = $absensi->where('status', 'alpha')->count();

        return view('dashboardmurid.index', compact(
            'murid',
            'nilai',
            'rataRata',
            'absensi',
            'hadir',
            'alpha'
        ));
    }
}