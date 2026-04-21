@extends('layouts.app')

@section('title', 'Formulir Pendaftaran PPDB | SMA Harapan Jaya')

@section('content')

{{-- ─── Header ────────────────────────────────────────────────────── --}}
<section class="relative border-b border-gray-200 bg-white">
    <div class="absolute top-0 left-0 w-full h-[6px] bg-primary"></div>
    <div class="max-w-4xl mx-auto px-6 py-16 text-center">
        <span class="inline-block border border-gray-300 text-gray-500 px-4 py-1.5 text-[10px] font-subhead font-bold tracking-[0.25em] uppercase mb-6">
            PPDB TA 2025/2026
        </span>
        <h1 class="text-on-surface text-4xl md:text-5xl font-headline font-normal leading-tight mb-4 tracking-tight">
            Formulir <span class="italic text-primary">Pendaftaran</span> Online
        </h1>
        <p class="text-gray-500 font-body text-base leading-relaxed max-w-xl mx-auto">
            Lengkapi formulir di bawah ini dengan data yang benar dan valid. Pastikan dokumen yang diunggah terbaca dengan jelas.
        </p>
    </div>
</section>

{{-- ─── Flash Success ──────────────────────────────────────────────── --}}
@if(session('success'))
<div class="max-w-4xl mx-auto px-6 mt-6">
    <div class="bg-green-50 border border-green-200 text-green-800 px-6 py-4 flex items-start gap-3">
        <svg class="w-5 h-5 mt-0.5 shrink-0 text-green-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
        </svg>
        <p class="font-body text-sm">{{ session('success') }}</p>
    </div>
</div>
@endif

{{-- ─── Form ───────────────────────────────────────────────────────── --}}
<section class="max-w-4xl mx-auto px-6 py-14">

    <form method="POST" action="{{ route('ppdb.form.store') }}" enctype="multipart/form-data" class="space-y-10">
        @csrf

        {{-- ── A. Identitas Calon Peserta Didik ────────────────────── --}}
        <div class="border border-gray-200 bg-white">
            <div class="bg-primary px-8 py-4">
                <h2 class="text-white font-headline text-lg font-medium tracking-tight">A. Identitas Calon Peserta Didik</h2>
            </div>
            <div class="p-8 grid grid-cols-1 md:grid-cols-2 gap-6">

                {{-- NIK --}}
                <div>
                    <label for="nik" class="block text-xs font-subhead font-bold uppercase tracking-widest text-gray-600 mb-2">NIK <span class="text-red-500">*</span></label>
                    <input id="nik" name="nik" type="text" maxlength="16"
                        value="{{ old('nik') }}"
                        placeholder="16 digit NIK KTP"
                        class="w-full border @error('nik') border-red-400 bg-red-50 @else border-gray-300 @enderror px-4 py-3 text-sm font-body text-on-surface placeholder-gray-400 focus:outline-none focus:border-primary transition">
                    @error('nik') <p class="mt-1 text-xs text-red-500">{{ $message }}</p> @enderror
                </div>

                {{-- NISN --}}
                <div>
                    <label for="nisn" class="block text-xs font-subhead font-bold uppercase tracking-widest text-gray-600 mb-2">NISN</label>
                    <input id="nisn" name="nisn" type="text" maxlength="10"
                        value="{{ old('nisn') }}"
                        placeholder="10 digit NISN (opsional)"
                        class="w-full border border-gray-300 px-4 py-3 text-sm font-body text-on-surface placeholder-gray-400 focus:outline-none focus:border-primary transition">
                </div>

                {{-- Nama Lengkap --}}
                <div class="md:col-span-2">
                    <label for="nama_lengkap" class="block text-xs font-subhead font-bold uppercase tracking-widest text-gray-600 mb-2">Nama Lengkap <span class="text-red-500">*</span></label>
                    <input id="nama_lengkap" name="nama_lengkap" type="text"
                        value="{{ old('nama_lengkap') }}"
                        placeholder="Nama lengkap sesuai akta kelahiran"
                        class="w-full border @error('nama_lengkap') border-red-400 bg-red-50 @else border-gray-300 @enderror px-4 py-3 text-sm font-body text-on-surface placeholder-gray-400 focus:outline-none focus:border-primary transition">
                    @error('nama_lengkap') <p class="mt-1 text-xs text-red-500">{{ $message }}</p> @enderror
                </div>

                {{-- Tempat Lahir --}}
                <div>
                    <label for="tempat_lahir" class="block text-xs font-subhead font-bold uppercase tracking-widest text-gray-600 mb-2">Tempat Lahir <span class="text-red-500">*</span></label>
                    <input id="tempat_lahir" name="tempat_lahir" type="text"
                        value="{{ old('tempat_lahir') }}"
                        placeholder="Kota tempat lahir"
                        class="w-full border @error('tempat_lahir') border-red-400 bg-red-50 @else border-gray-300 @enderror px-4 py-3 text-sm font-body text-on-surface placeholder-gray-400 focus:outline-none focus:border-primary transition">
                    @error('tempat_lahir') <p class="mt-1 text-xs text-red-500">{{ $message }}</p> @enderror
                </div>

                {{-- Tanggal Lahir --}}
                <div>
                    <label for="tanggal_lahir" class="block text-xs font-subhead font-bold uppercase tracking-widest text-gray-600 mb-2">Tanggal Lahir <span class="text-red-500">*</span></label>
                    <input id="tanggal_lahir" name="tanggal_lahir" type="date"
                        value="{{ old('tanggal_lahir') }}"
                        class="w-full border @error('tanggal_lahir') border-red-400 bg-red-50 @else border-gray-300 @enderror px-4 py-3 text-sm font-body text-on-surface focus:outline-none focus:border-primary transition">
                    @error('tanggal_lahir') <p class="mt-1 text-xs text-red-500">{{ $message }}</p> @enderror
                </div>

                {{-- No HP --}}
                <div>
                    <label for="no_hp" class="block text-xs font-subhead font-bold uppercase tracking-widest text-gray-600 mb-2">No. HP / WhatsApp <span class="text-red-500">*</span></label>
                    <input id="no_hp" name="no_hp" type="tel"
                        value="{{ old('no_hp') }}"
                        placeholder="08xxxxxxxxxx"
                        class="w-full border @error('no_hp') border-red-400 bg-red-50 @else border-gray-300 @enderror px-4 py-3 text-sm font-body text-on-surface placeholder-gray-400 focus:outline-none focus:border-primary transition">
                    @error('no_hp') <p class="mt-1 text-xs text-red-500">{{ $message }}</p> @enderror
                </div>

                {{-- Asal Sekolah --}}
                <div>
                    <label for="asal_sekolah" class="block text-xs font-subhead font-bold uppercase tracking-widest text-gray-600 mb-2">Asal Sekolah <span class="text-red-500">*</span></label>
                    <input id="asal_sekolah" name="asal_sekolah" type="text"
                        value="{{ old('asal_sekolah') }}"
                        placeholder="Nama SMP / MTs asal"
                        class="w-full border @error('asal_sekolah') border-red-400 bg-red-50 @else border-gray-300 @enderror px-4 py-3 text-sm font-body text-on-surface placeholder-gray-400 focus:outline-none focus:border-primary transition">
                    @error('asal_sekolah') <p class="mt-1 text-xs text-red-500">{{ $message }}</p> @enderror
                </div>

                {{-- Jenis Kelamin --}}
                <div>
                    <label class="block text-xs font-subhead font-bold uppercase tracking-widest text-gray-600 mb-2">Jenis Kelamin <span class="text-red-500">*</span></label>
                    <div class="flex gap-6 mt-1">
                        @foreach(['Laki - Laki', 'Perempuan'] as $jk)
                        <label class="flex items-center gap-2 cursor-pointer">
                            <input type="radio" name="jenis_kelamin" value="{{ $jk }}"
                                {{ old('jenis_kelamin') === $jk ? 'checked' : '' }}
                                class="w-4 h-4 accent-primary">
                            <span class="font-body text-sm text-on-surface">{{ $jk }}</span>
                        </label>
                        @endforeach
                    </div>
                    @error('jenis_kelamin') <p class="mt-1 text-xs text-red-500">{{ $message }}</p> @enderror
                </div>

                {{-- Email --}}
                <div>
                    <label for="email" class="block text-xs font-subhead font-bold uppercase tracking-widest text-gray-600 mb-2">Email <span class="text-red-500">*</span></label>
                    <input id="email" name="email" type="email"
                        value="{{ old('email') }}"
                        placeholder="email@contoh.com"
                        class="w-full border @error('email') border-red-400 bg-red-50 @else border-gray-300 @enderror px-4 py-3 text-sm font-body text-on-surface placeholder-gray-400 focus:outline-none focus:border-primary transition">
                    @error('email') <p class="mt-1 text-xs text-red-500">{{ $message }}</p> @enderror
                </div>

                {{-- Alamat --}}
                <div class="md:col-span-2">
                    <label for="alamat" class="block text-xs font-subhead font-bold uppercase tracking-widest text-gray-600 mb-2">Alamat Lengkap <span class="text-red-500">*</span></label>
                    <textarea id="alamat" name="alamat" rows="3"
                        placeholder="Alamat lengkap sesuai KTP/KK"
                        class="w-full border @error('alamat') border-red-400 bg-red-50 @else border-gray-300 @enderror px-4 py-3 text-sm font-body text-on-surface placeholder-gray-400 focus:outline-none focus:border-primary transition resize-none">{{ old('alamat') }}</textarea>
                    @error('alamat') <p class="mt-1 text-xs text-red-500">{{ $message }}</p> @enderror
                </div>

                {{-- Jurusan --}}
                <div>
                    <label for="jurusan" class="block text-xs font-subhead font-bold uppercase tracking-widest text-gray-600 mb-2">Pilih Jurusan <span class="text-red-500">*</span></label>
                    <select id="jurusan" name="jurusan"
                        class="w-full border @error('jurusan') border-red-400 bg-red-50 @else border-gray-300 @enderror px-4 py-3 text-sm font-body text-on-surface focus:outline-none focus:border-primary transition bg-white appearance-none">
                        <option value="" disabled {{ !old('jurusan') ? 'selected' : '' }}>Pilih jurusan</option>
                        <option value="IPA" {{ old('jurusan') === 'IPA' ? 'selected' : '' }}>IPA — Ilmu Pengetahuan Alam</option>
                        <option value="IPS" {{ old('jurusan') === 'IPS' ? 'selected' : '' }}>IPS — Ilmu Pengetahuan Sosial</option>
                    </select>
                    @error('jurusan') <p class="mt-1 text-xs text-red-500">{{ $message }}</p> @enderror
                </div>

                {{-- Agama --}}
                <div>
                    <label for="agama" class="block text-xs font-subhead font-bold uppercase tracking-widest text-gray-600 mb-2">Agama <span class="text-red-500">*</span></label>
                    <select id="agama" name="agama"
                        class="w-full border @error('agama') border-red-400 bg-red-50 @else border-gray-300 @enderror px-4 py-3 text-sm font-body text-on-surface focus:outline-none focus:border-primary transition bg-white appearance-none">
                        <option value="" disabled {{ !old('agama') ? 'selected' : '' }}>Pilih agama</option>
                        @foreach(['Islam','Kristen','Katolik','Hindu','Buddha','Konghucu'] as $agama)
                            <option value="{{ $agama }}" {{ old('agama') === $agama ? 'selected' : '' }}>{{ $agama }}</option>
                        @endforeach
                    </select>
                    @error('agama') <p class="mt-1 text-xs text-red-500">{{ $message }}</p> @enderror
                </div>

                {{-- Anak Ke --}}
                <div>
                    <label for="anak_ke" class="block text-xs font-subhead font-bold uppercase tracking-widest text-gray-600 mb-2">Anak Ke <span class="text-red-500">*</span></label>
                    <select id="anak_ke" name="anak_ke"
                        class="w-full border border-gray-300 px-4 py-3 text-sm font-body text-on-surface focus:outline-none focus:border-primary transition bg-white appearance-none">
                        <option value="" disabled {{ !old('anak_ke') ? 'selected' : '' }}>Pilih</option>
                        @for($i = 1; $i <= 15; $i++)
                            <option value="{{ $i }}" {{ old('anak_ke') == $i ? 'selected' : '' }}>{{ $i }}</option>
                        @endfor
                    </select>
                </div>

                {{-- Dari --}}
                <div>
                    <label for="dari" class="block text-xs font-subhead font-bold uppercase tracking-widest text-gray-600 mb-2">Dari (Bersaudara) <span class="text-red-500">*</span></label>
                    <select id="dari" name="dari"
                        class="w-full border border-gray-300 px-4 py-3 text-sm font-body text-on-surface focus:outline-none focus:border-primary transition bg-white appearance-none">
                        <option value="" disabled {{ !old('dari') ? 'selected' : '' }}>Pilih</option>
                        @for($i = 1; $i <= 15; $i++)
                            <option value="{{ $i }}" {{ old('dari') == $i ? 'selected' : '' }}>{{ $i }}</option>
                        @endfor
                    </select>
                </div>

                {{-- Tinggi Badan --}}
                <div>
                    <label for="tinggi_badan" class="block text-xs font-subhead font-bold uppercase tracking-widest text-gray-600 mb-2">Tinggi Badan (cm)</label>
                    <input id="tinggi_badan" name="tinggi_badan" type="number" min="1"
                        value="{{ old('tinggi_badan') }}"
                        placeholder="Contoh: 165"
                        class="w-full border border-gray-300 px-4 py-3 text-sm font-body text-on-surface placeholder-gray-400 focus:outline-none focus:border-primary transition">
                </div>

                {{-- Berat Badan --}}
                <div>
                    <label for="berat_badan" class="block text-xs font-subhead font-bold uppercase tracking-widest text-gray-600 mb-2">Berat Badan (kg)</label>
                    <input id="berat_badan" name="berat_badan" type="number" min="1"
                        value="{{ old('berat_badan') }}"
                        placeholder="Contoh: 55"
                        class="w-full border border-gray-300 px-4 py-3 text-sm font-body text-on-surface placeholder-gray-400 focus:outline-none focus:border-primary transition">
                </div>

            </div>
        </div>

        {{-- ── B. Data Orang Tua / Wali ─────────────────────────────── --}}
        <div class="border border-gray-200 bg-white">
            <div class="bg-[#111] px-8 py-4">
                <h2 class="text-white font-headline text-lg font-medium tracking-tight">B. Data Orang Tua / Wali</h2>
            </div>
            <div class="p-8 grid grid-cols-1 md:grid-cols-2 gap-6">

                <div>
                    <label for="nama_ayah" class="block text-xs font-subhead font-bold uppercase tracking-widest text-gray-600 mb-2">Nama Ayah</label>
                    <input id="nama_ayah" name="nama_ayah" type="text"
                        value="{{ old('nama_ayah') }}"
                        placeholder="Nama lengkap ayah kandung"
                        class="w-full border border-gray-300 px-4 py-3 text-sm font-body text-on-surface placeholder-gray-400 focus:outline-none focus:border-primary transition">
                </div>

                <div>
                    <label for="nama_ibu" class="block text-xs font-subhead font-bold uppercase tracking-widest text-gray-600 mb-2">Nama Ibu</label>
                    <input id="nama_ibu" name="nama_ibu" type="text"
                        value="{{ old('nama_ibu') }}"
                        placeholder="Nama lengkap ibu kandung"
                        class="w-full border border-gray-300 px-4 py-3 text-sm font-body text-on-surface placeholder-gray-400 focus:outline-none focus:border-primary transition">
                </div>

                <div>
                    <label for="pekerjaan_ayah" class="block text-xs font-subhead font-bold uppercase tracking-widest text-gray-600 mb-2">Pekerjaan Ayah</label>
                    <input id="pekerjaan_ayah" name="pekerjaan_ayah" type="text"
                        value="{{ old('pekerjaan_ayah') }}"
                        placeholder="Contoh: Wiraswasta"
                        class="w-full border border-gray-300 px-4 py-3 text-sm font-body text-on-surface placeholder-gray-400 focus:outline-none focus:border-primary transition">
                </div>

                <div>
                    <label for="pekerjaan_ibu" class="block text-xs font-subhead font-bold uppercase tracking-widest text-gray-600 mb-2">Pekerjaan Ibu</label>
                    <input id="pekerjaan_ibu" name="pekerjaan_ibu" type="text"
                        value="{{ old('pekerjaan_ibu') }}"
                        placeholder="Contoh: Ibu Rumah Tangga"
                        class="w-full border border-gray-300 px-4 py-3 text-sm font-body text-on-surface placeholder-gray-400 focus:outline-none focus:border-primary transition">
                </div>

                <div>
                    <label for="no_hp_ortu" class="block text-xs font-subhead font-bold uppercase tracking-widest text-gray-600 mb-2">No. HP Orang Tua / Wali</label>
                    <input id="no_hp_ortu" name="no_hp_ortu" type="tel"
                        value="{{ old('no_hp_ortu') }}"
                        placeholder="08xxxxxxxxxx"
                        class="w-full border border-gray-300 px-4 py-3 text-sm font-body text-on-surface placeholder-gray-400 focus:outline-none focus:border-primary transition">
                </div>

                <div class="md:col-span-2">
                    <label for="alamat_ortu" class="block text-xs font-subhead font-bold uppercase tracking-widest text-gray-600 mb-2">Alamat Orang Tua / Wali</label>
                    <textarea id="alamat_ortu" name="alamat_ortu" rows="3"
                        placeholder="Alamat lengkap orang tua / wali"
                        class="w-full border border-gray-300 px-4 py-3 text-sm font-body text-on-surface placeholder-gray-400 focus:outline-none focus:border-primary transition resize-none">{{ old('alamat_ortu') }}</textarea>
                </div>

            </div>
        </div>

        {{-- ── C. Upload Dokumen ────────────────────────────────────── --}}
        <div class="border border-gray-200 bg-white">
            <div class="bg-secondary px-8 py-4">
                <h2 class="text-white font-headline text-lg font-medium tracking-tight">C. Upload Dokumen</h2>
            </div>
            <div class="px-8 pt-3 pb-2">
                <p class="text-xs text-gray-500 font-body">Format yang diterima: PDF, JPG, PNG. Ukuran maksimal <strong>2 MB</strong> per file.</p>
            </div>
            <div class="p-8 pt-4 grid grid-cols-1 md:grid-cols-2 gap-6">

                @php
                $dokumen = [
                    ['id' => 'kartu_keluarga',   'label' => 'Kartu Keluarga',                   'required' => true,  'accept' => '.pdf,.jpg,.jpeg,.png', 'image_only' => false],
                    ['id' => 'akte_kelahiran',   'label' => 'Akte Kelahiran',                   'required' => true,  'accept' => '.pdf,.jpg,.jpeg,.png', 'image_only' => false],
                    ['id' => 'ijazah',           'label' => 'Ijazah / Surat Keterangan Lulus',  'required' => true,  'accept' => '.pdf,.jpg,.jpeg,.png', 'image_only' => false],
                    ['id' => 'pas_foto',         'label' => 'Pas Foto 3×4',                     'required' => true,  'accept' => '.jpg,.jpeg,.png',      'image_only' => true],
                ];
                @endphp

                @foreach($dokumen as $dok)
                <div>
                    <label for="{{ $dok['id'] }}" class="block text-xs font-subhead font-bold uppercase tracking-widest text-gray-600 mb-2">
                        {{ $dok['label'] }} @if($dok['required']) <span class="text-red-500">*</span> @endif
                    </label>
                    <label for="{{ $dok['id'] }}"
                        class="flex items-center gap-4 border-2 border-dashed @error($dok['id']) border-red-400 bg-red-50 @else border-gray-300 hover:border-primary @enderror px-5 py-4 cursor-pointer transition group">
                        <span class="shrink-0 w-10 h-10 flex items-center justify-center border border-gray-300 group-hover:border-primary bg-gray-50 transition">
                            <svg class="w-5 h-5 text-gray-400 group-hover:text-primary transition" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0L8 8m4-4v12" />
                            </svg>
                        </span>
                        <div class="flex-1 min-w-0">
                            <p id="{{ $dok['id'] }}_name" class="text-sm font-body text-gray-500 truncate">Tidak ada file dipilih</p>
                            <p class="text-[11px] text-gray-400 mt-0.5">{{ $dok['image_only'] ? 'JPG, PNG' : 'PDF, JPG, PNG' }} · maks 2 MB</p>
                        </div>
                        <input id="{{ $dok['id'] }}" name="{{ $dok['id'] }}" type="file"
                            accept="{{ $dok['accept'] }}" class="sr-only"
                            onchange="document.getElementById('{{ $dok['id'] }}_name').textContent = this.files[0]?.name ?? 'Tidak ada file dipilih'">
                    </label>
                    @error($dok['id']) <p class="mt-1 text-xs text-red-500">{{ $message }}</p> @enderror
                </div>
                @endforeach

            </div>
        </div>

        {{-- ── Submit ───────────────────────────────────────────────── --}}
        <div class="flex flex-col sm:flex-row items-center justify-between gap-4 pt-2">
            <a href="{{ route('ppdb') }}"
                class="text-gray-500 font-subhead uppercase tracking-widest text-[11px] font-bold hover:text-on-surface transition border-b border-gray-300 hover:border-on-surface pb-1">
                ← Kembali ke PPDB
            </a>
            <button type="submit"
                class="inline-flex items-center justify-center bg-primary text-white px-12 py-4 font-subhead uppercase tracking-[0.2em] text-xs transition hover:bg-[#006b35] w-full sm:w-auto">
                Lanjut Pembayaran
            </button>
        </div>

    </form>
</section>

@endsection
