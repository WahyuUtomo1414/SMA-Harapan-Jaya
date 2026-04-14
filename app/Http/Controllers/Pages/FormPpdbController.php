<?php

namespace App\Http\Controllers\Pages;

use App\Http\Controllers\Controller;
use App\Models\FormPpdb;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FormPpdbController extends Controller
{
    public function create()
    {
        return view('pages.ppdb-form');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            // Identitas
            'nik'            => 'required|string|max:16|unique:form_ppdb,nik',
            'nisn'           => 'nullable|string|max:10',
            'nama_lengkap'   => 'required|string|max:255',
            'tempat_lahir'   => 'required|string|max:128',
            'tanggal_lahir'  => 'required|date',
            'no_hp'          => 'required|string|max:20',
            'asal_sekolah'   => 'required|string|max:255',
            'jenis_kelamin'  => 'required|in:Laki - Laki,Perempuan',
            'alamat'         => 'required|string|max:512',
            'email'          => 'nullable|email|max:128',
            'jurusan'        => 'required|in:IPA,IPS',
            'agama'          => 'required|string|max:64',
            'anak_ke'        => 'required|integer|min:1|max:15',
            'dari'           => 'required|integer|min:1|max:15',
            'tinggi_badan'   => 'nullable|integer|min:1',
            'berat_badan'    => 'nullable|integer|min:1',
            // Ortu
            'nama_ayah'      => 'nullable|string|max:255',
            'nama_ibu'       => 'nullable|string|max:255',
            'pekerjaan_ayah' => 'nullable|string|max:128',
            'pekerjaan_ibu'  => 'nullable|string|max:128',
            'no_hp_ortu'     => 'nullable|string|max:20',
            'alamat_ortu'    => 'nullable|string|max:512',
            // Dokumen
            'kartu_keluarga' => 'required|file|mimes:pdf,jpg,jpeg,png|max:2048',
            'akte_kelahiran' => 'required|file|mimes:pdf,jpg,jpeg,png|max:2048',
            'ijazah'         => 'required|file|mimes:pdf,jpg,jpeg,png|max:2048',
            'pas_foto'       => 'required|image|mimes:jpg,jpeg,png|max:2048',
        ], [
            'nik.unique'           => 'NIK sudah terdaftar.',
            'nik.required'         => 'NIK wajib diisi.',
            'nama_lengkap.required'=> 'Nama lengkap wajib diisi.',
            'tanggal_lahir.required' => 'Tanggal lahir wajib diisi.',
            'jurusan.required'     => 'Pilih jurusan terlebih dahulu.',
            'kartu_keluarga.required' => 'Kartu Keluarga wajib diunggah.',
            'ijazah.required'      => 'Ijazah / SKL wajib diunggah.',
            'pas_foto.required'    => 'Pas foto wajib diunggah.',
        ]);

        // Upload dokumen
        $validated['kartu_keluarga'] = $request->file('kartu_keluarga')
            ->store('form-ppdb/kartu-keluarga', 'public');
        $validated['akte_kelahiran'] = $request->file('akte_kelahiran')
            ->store('form-ppdb/akte-kelahiran', 'public');
        $validated['ijazah'] = $request->file('ijazah')
            ->store('form-ppdb/ijazah', 'public');
        $validated['pas_foto'] = $request->file('pas_foto')
            ->store('form-ppdb/pas-foto', 'public');

        $validated['status_penerimaan'] = FormPpdb::STATUS_PENDING;
        $validated['status'] = true;

        FormPpdb::create($validated);

        return redirect()->route('ppdb')
            ->with('success', 'Pendaftaran berhasil! Kami akan menghubungi Anda setelah data diverifikasi.');
    }
}
