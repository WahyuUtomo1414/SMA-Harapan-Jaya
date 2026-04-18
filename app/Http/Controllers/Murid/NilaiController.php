<?php

namespace App\Http\Controllers\Murid;

use App\Http\Controllers\Controller;
use App\Models\Nilai;
use Illuminate\Support\Facades\Auth;

class NilaiController extends Controller
{
    public function index()
    {
        $muridId = Auth::user()->murid_id;

        $nilai = Nilai::with(['mataPelajaran', 'guru', 'murid'])
            ->where('murid_id', $muridId)
            ->orderBy('mata_pelajaran_id')
            ->get();

        return view('dashboard.murid.nilai.index', compact('nilai'));
    }
}
