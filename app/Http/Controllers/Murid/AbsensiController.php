<?php

namespace App\Http\Controllers\Murid;

use App\Http\Controllers\Controller;
// use Illuminate\Http\Request;

class AbsensiController extends Controller
{
    public function index()
    {
        // Mengarah ke file view yang baru kita buat tadi
        return view('murid.absensi.index');
    }
}