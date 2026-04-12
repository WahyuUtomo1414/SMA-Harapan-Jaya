<?php

namespace App\Http\Controllers\Pages;

use App\Http\Controllers\Controller;
use App\Models\Ppdb;

class PpdbController extends Controller
{
    public function index()
    {
        $ppdb = Ppdb::where('status', true)->first();
        
        if (!$ppdb) {
            $ppdb = Ppdb::first();
        }

        return view('pages.ppdb', compact('ppdb'));
    }
}
