<?php

namespace App\Http\Controllers\Murid;

use App\Http\Controllers\Controller;
use App\Models\JadwalPelajaran;
use Illuminate\Support\Facades\Auth;

class JadwalController extends Controller
{
    public function index()
    {
        $murid = Auth::user()->murid()->with('kelas')->first();

        if (!$murid || !$murid->kelas_id) {
            return view('dashboard.murid.jadwal.index', [
                'murid' => $murid,
                'jadwalPerHari' => collect(),
            ]);
        }

        $jadwal = JadwalPelajaran::query()
            ->with(['kelas', 'mataPelajaran', 'guru'])
            ->where('kelas_id', $murid->kelas_id)
            ->orderBy('hari')
            ->orderBy('mulai')
            ->get();

        $urutanHari = [
            'senin' => 1,
            'selasa' => 2,
            'rabu' => 3,
            'kamis' => 4,
            'jumat' => 5,
            'sabtu' => 6,
            'minggu' => 7,
        ];

        $jadwalPerHari = $jadwal
            ->groupBy(fn (JadwalPelajaran $item) => $item->hari ?: 'Tanpa Hari')
            ->sortBy(fn ($items, $hari) => $urutanHari[strtolower((string) $hari)] ?? 99);

        return view('dashboard.murid.jadwal.index', compact('murid', 'jadwalPerHari'));
    }
}
