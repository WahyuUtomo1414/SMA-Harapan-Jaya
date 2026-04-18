<?php

namespace App\Http\Controllers\Murid;

use App\Http\Controllers\Controller;
use App\Models\AbsensiDetail;
use App\Models\Spp;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $murid = $user->murid()
            ->with(['kelas', 'nilai.mataPelajaran', 'nilai.guru'])
            ->first();

        if (!$murid) {
            return view('dashboard.murid.dashboard', [
                'murid' => null,
                'nilai' => collect(),
                'rataRata' => 0,
                'absensi' => collect(),
                'hadir' => 0,
                'alpha' => 0,
                'spp' => collect(),
            ]);
        }

        $nilai = $murid->nilai ?? collect();
        $rataRata = $nilai->count() > 0 ? $nilai->avg('total_nilai') : 0;

        $allAbsensi = AbsensiDetail::with([
            'absensi.jadwalPelajaran.mataPelajaran',
            'absensi.jadwalPelajaran.kelas',
            'absensi.guru',
        ])
            ->where('murid_id', $murid->id)
            ->get();

        $absensi = $allAbsensi
            ->sortByDesc(fn (AbsensiDetail $detail) => $detail->absensi?->tanggal ?? $detail->created_at)
            ->take(5)
            ->values();

        $hadir = $allAbsensi->where('status_absen', 'hadir')->count();
        $alpha = $allAbsensi->where('status_absen', 'alpha')->count();

        $spp = Spp::query()
            ->with('kelas')
            ->where('murid_id', $murid->id)
            ->orderByDesc('tahun')
            ->orderByDesc('bulan')
            ->get();

        return view('dashboard.murid.dashboard', compact(
            'murid',
            'nilai',
            'rataRata',
            'absensi',
            'hadir',
            'alpha',
            'spp'
        ));
    }
}
