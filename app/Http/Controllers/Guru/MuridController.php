<?php

namespace App\Http\Controllers\Guru;

use App\Http\Controllers\Controller;
use App\Models\Murid;
use App\Models\Kelas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MuridController extends Controller
{
    public function index(Request $request)
    {
        $guruId = Auth::user()->guru_id;
        $perPage = $request->input('limit', 10);
        $search = $request->input('search');
        $kelasId = $request->input('kelas_id');

        $kelasList = Kelas::query()
            ->whereHas('jadwalPelajaran', fn ($query) => $query->where('guru_id', $guruId))
            ->where('status', true)
            ->orderBy('kode')
            ->get();
        $allowedKelasIds = $kelasList->pluck('id');

        $query = Murid::with('kelas')
            ->whereIn('kelas_id', $allowedKelasIds);

        if ($kelasId && $allowedKelasIds->contains((int) $kelasId)) {
            $query->where('kelas_id', $kelasId);
        }

        if ($search) {
            $query->where(function ($q) use ($search) {
                $q->where('nama', 'LIKE', "%{$search}%")
                  ->orWhere('nisn', 'LIKE', "%{$search}%");
            });
        }

        $murids = $query->latest()->paginate($perPage)->withQueryString();

        return view('dashboard.guru.murid.index', compact('murids', 'kelasList'));
    }
}
