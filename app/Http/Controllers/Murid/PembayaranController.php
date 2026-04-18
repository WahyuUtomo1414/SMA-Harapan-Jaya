<?php

namespace App\Http\Controllers\Murid;

use App\Http\Controllers\Controller;
use App\Models\Spp;
use Illuminate\Support\Facades\Auth;

class PembayaranController extends Controller
{
    public function index()
    {
        $murid = Auth::user()->murid;
        $spp = $murid
            ? Spp::query()
                ->with(['kelas'])
                ->where('murid_id', $murid->id)
                ->orderByDesc('tahun')
                ->orderByDesc('bulan')
                ->get()
            : collect();

        return view('dashboard.murid.pembayaran.index', compact('murid', 'spp'));
    }
}
