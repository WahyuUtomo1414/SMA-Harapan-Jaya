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

        return view('pages.tentang-kami', compact('sekolah', 'organisasi'));
    }
}
