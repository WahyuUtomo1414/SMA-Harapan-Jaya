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

        // 🔥 ambil tahun dari request (default tahun sekarang)
        $selectedYear = request('tahun', now()->year);

        $spp = $murid
            ? Spp::with('kelas')
                ->where('murid_id', $murid->id)
                ->where('tahun', $selectedYear) // ✅ SAMAKAN FILTER
                ->orderBy('bulan') // biar urut Jan - Des
                ->get()
            : collect();

        return view('dashboard.murid.pembayaran.index', compact(
            'murid',
            'spp',
            'selectedYear'
        ));
    }
}