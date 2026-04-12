<?php

namespace App\Http\Controllers\Murid;

use App\Http\Controllers\Controller;
// use Illuminate\Http\Request;
// use Illuminate\Support\Facades\Auth;

class NilaiController extends Controller
{
    public function index()
    {
        // Nantinya kita tarik data dari DB:
        // $nilai = NilaiSiswa::where('user_id', Auth::id())->get();
        
        return view('murid.nilai.index');
    }
}