<?php

namespace App\Http\Controllers\Murid;

use App\Http\Controllers\Controller;
use App\Models\AbsensiDetail;
use Illuminate\Support\Facades\Auth;

class AbsensiController extends Controller
{
    public function index()
    {
        $murid = Auth::user()->murid;

        if (!$murid) {
            return view('dashboard.murid.absensi.index', [
                'dataAbsenMapel' => collect(),
                'murid' => null,
            ]);
        }

        $absensiDetail = AbsensiDetail::with([
            'absensi.jadwalPelajaran.mataPelajaran',
            'absensi.jadwalPelajaran.kelas',
            'absensi.guru',
        ])
            ->where('murid_id', $murid->id)
            ->get();

        $dataAbsenMapel = $absensiDetail->groupBy(
            fn (AbsensiDetail $detail): string => (string) ($detail->absensi?->jadwalPelajaran?->mata_pelajaran_id ?? 'unknown')
        )->map(function ($items) {
            $first = $items->first();
            $total = $items->count();
            $hadir = $items->where('status_absen', 'hadir')->count();
            $izin = $items->where('status_absen', 'izin')->count();
            $sakit = $items->where('status_absen', 'sakit')->count();
            $alpha = $items->where('status_absen', 'alpha')->count();
            $non = $izin + $sakit + $alpha;

            return [
                'nama' => $first?->absensi?->jadwalPelajaran?->mataPelajaran?->nama ?? '-',
                'total' => $total,
                'hadir' => $hadir,
                'non' => $non,
                'sakit' => $sakit,
                'izin' => $izin,
                'alpha' => $alpha,
                'persen' => $total ? round(($hadir / $total) * 100) : 0,
            ];
        })->values();

        return view('dashboard.murid.absensi.index', compact('dataAbsenMapel', 'murid'));
    }
}
