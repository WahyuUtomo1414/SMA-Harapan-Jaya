<?php

namespace App\Http\Controllers\Murid;

use App\Http\Controllers\Controller;
use App\Models\Murid;
use App\Models\AbsensiDetail;
use App\Models\Absensi;
use App\Models\MataPelajaran;

class AbsensiController extends Controller
{
    public function index()
    {
        // 🔥 TANPA LOGIN (ambil murid pertama)
        $murid = Murid::first();

        if (!$murid) {
            return view('dashboard.murid.absensi.index', [
                'dataAbsenMapel' => collect(),
                'murid' => null
            ]);
        }

        // 🔥 ambil detail absensi murid
        $absensiDetail = AbsensiDetail::where('murid_id', $murid->id)->get();

        // 🔥 ambil absensi utama
        $absensiIds = $absensiDetail->pluck('absensi_id')->unique();

        $absensiUtama = Absensi::whereIn('id', $absensiIds)->get()->keyBy('id');

        // 🔥 group per absensi
        $dataAbsenMapel = $absensiDetail->groupBy('absensi_id')->map(function ($items, $absensi_id) use ($absensiUtama) {

            $absensi = $absensiUtama[$absensi_id] ?? null;

            // 🔥 FIX AMAN NULL
            $mapel = $absensi ? MataPelajaran::find($absensi->mata_pelajaran_id) : null;
            $namaMapel = $mapel->nama ?? '-';

            $total = $items->count();
            $hadir = $items->where('status', 1)->count();
            $non = $total - $hadir;

            return [
                'nama' => $namaMapel,
                'total' => $total,
                'hadir' => $hadir,
                'non' => $non,
                'persen' => $total ? round(($hadir / $total) * 100) : 0,
            ];
        })->values();

        return view('dashboard.murid.absensi.index', compact('dataAbsenMapel', 'murid'));
    }
}