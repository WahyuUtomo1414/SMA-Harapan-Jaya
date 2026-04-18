<?php

namespace App\Http\Controllers\Murid;

use App\Http\Controllers\Controller;
// use Illuminate\Http\Request;

class PembayaranController extends Controller
{
    public function index()
    {
        return view('dashboard.murid.pembayaran.index');
    }
}