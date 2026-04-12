<?php

namespace App\Http\Controllers\Guru;

use App\Http\Controllers\Controller;
use App\Models\Guru;

class DashboardController extends Controller
{
    public function index()
    {
        $guru = Guru::with([
            'jadwalPelajaran.kelas',
            'jadwalPelajaran.mataPelajaran',
            'absensi',
            'nilai.mataPelajaran'
        ])->first();

        if (!$guru) {
            return view('guru.dashboard', [
                'guru' => null,
                'jadwal' => collect(),
                'totalJadwal' => 0,
                'totalKelas' => 0,
                'totalAbsensi' => 0,
                'totalNilai' => 0,
                'rataNilai' => 0,
                'maxNilai' => 0,
                'minNilai' => 0,
            ]);
        }

        $jadwal = $guru->jadwalPelajaran ?? collect();
        $absensi = $guru->absensi ?? collect();
        $nilai = $guru->nilai ?? collect();

        $totalJadwal = $jadwal->count();
        $totalKelas = $jadwal->pluck('kelas_id')->unique()->count();
        $totalAbsensi = $absensi->count();
        $totalNilai = $nilai->count();

        $rataNilai = $totalNilai > 0 ? $nilai->avg('total_nilai') : 0;
        $maxNilai = $totalNilai > 0 ? $nilai->max('total_nilai') : 0;
        $minNilai = $totalNilai > 0 ? $nilai->min('total_nilai') : 0;

        return view('guru.dashboard', compact(
            'guru',
            'jadwal',
            'totalJadwal',
            'totalKelas',
            'totalAbsensi',
            'totalNilai',
            'rataNilai',
            'maxNilai',
            'minNilai'
        ));
    }
}