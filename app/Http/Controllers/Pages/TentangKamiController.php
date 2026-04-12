<?php

namespace App\Http\Controllers\Pages;

use App\Http\Controllers\Controller;
use App\Models\Sekolah;
use App\Models\StrukturOrganisasi;

class TentangKamiController extends Controller
{
    public function index()
    {
        $sekolah = Sekolah::where('status', true)->first();
        
        if (!$sekolah) {
            $sekolah = Sekolah::first();
        }

        $organisasi = StrukturOrganisasi::where('status', true)
            ->orderBy('urutan')
            ->get();

        $topLeader = $organisasi->where('urutan', 1)->first();
        $subordinates = $organisasi->whereIn('urutan', [2, 3, 4])->sortBy('urutan')->take(3);
        $remainingStaff = $organisasi->whereNotIn('id', array_filter([$topLeader?->id, ...$subordinates->pluck('id')->toArray()]))->sortBy('urutan');

        return view('pages.tentang-kami', compact('sekolah', 'topLeader', 'subordinates', 'remainingStaff'));
    }
}
