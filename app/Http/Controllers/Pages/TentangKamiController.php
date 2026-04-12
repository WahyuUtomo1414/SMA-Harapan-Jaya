<?php

namespace App\Http\Controllers\Pages;

use App\Http\Controllers\Controller;
use App\Models\Sekolah;

class TentangKamiController extends Controller
{
    public function index()
    {
        $sekolah = Sekolah::where('status', true)->first();
        
        if (!$sekolah) {
            $sekolah = Sekolah::first();
        }

        return view('pages.tentang-kami', compact('sekolah'));
    }
}
