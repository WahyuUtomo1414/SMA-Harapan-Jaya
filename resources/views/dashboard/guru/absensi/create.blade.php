@extends('layouts.dashboard')

@section('title', 'Presensi Siswa')
@section('page_title', 'Presensi Siswa')

@section('content')
<div class="max-w-7xl mx-auto animate-fade-in">

    {{-- NOTIFIKASI --}}
    @if(session('success'))
        <div class="mb-6 bg-emerald-50 border-l-4 border-emerald-500 text-emerald-700 p-4 rounded-2xl shadow-sm flex items-center gap-3">
            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path></svg>
            <span class="font-bold text-sm">{{ session('success') }}</span>
        </div>
    @endif

    @if(session('error'))
        <div class="mb-6 bg-red-50 border-l-4 border-red-500 text-red-700 p-4 rounded-2xl shadow-sm flex items-center gap-3">
            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"></path></svg>
            <span class="font-bold text-sm">{{ session('error') }}</span>
        </div>
    @endif

    {{-- HEADER & FILTER --}}
    <div class="bg-white p-6 rounded-3xl shadow-sm border border-slate-100 mb-8 flex flex-col lg:flex-row justify-between items-center gap-6">

        {{-- INFO --}}
        <div class="flex items-center gap-5 w-full lg:w-auto">
            <a href="{{ route('guru.absensi.index') }}"
               class="group flex items-center justify-center w-11 h-11 rounded-2xl bg-slate-50 text-slate-500 hover:bg-emerald-700 hover:text-white transition-all shadow-sm border border-slate-200">
                <svg class="w-5 h-5 transition-transform group-hover:-translate-x-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M15 19l-7-7 7-7"/>
                </svg>
            </a>

            <div>
                <h1 class="text-2xl font-black text-slate-800 tracking-tight">Presensi <span class="text-emerald-700">Siswa</span></h1>
                <p class="text-sm font-bold text-emerald-600/60 uppercase tracking-widest">{{ \Carbon\Carbon::now()->translatedFormat('l, d F Y') }}</p>
            </div>
        </div>

        {{-- FILTER FORM --}}
        <form method="GET" class="flex gap-3 flex-wrap w-full lg:w-auto justify-end">
            <select name="kelas_id" required
                class="px-4 py-2.5 rounded-xl border-slate-200 bg-slate-50 text-slate-700 font-semibold text-sm focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 min-w-35">
                <option value="">Pilih Kelas</option>
                @foreach($kelasList as $k)
                    <option value="{{ $k->id }}" {{ $kelasId == $k->id ? 'selected' : '' }}>
                        {{ $k->kode ?? $k->nama ?? 'Kelas '.$k->id }}
                    </option>
                @endforeach
            </select>

            <select name="mapel_id" required
                class="px-4 py-2.5 rounded-xl border-slate-200 bg-slate-50 text-slate-700 font-semibold text-sm focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 min-w-40">
                <option value="">Pilih Mapel</option>
                @foreach($mapelList as $m)
                    <option value="{{ $m->id }}" {{ $mapelId == $m->id ? 'selected' : '' }}>
                        {{ $m->nama_pelajaran ?? $m->nama ?? 'Mapel '.$m->id }}
                    </option>
                @endforeach
            </select>

            <button class="bg-emerald-700 text-white px-8 py-2.5 rounded-xl font-bold hover:bg-emerald-800 transition shadow-lg shadow-emerald-700/20 active:scale-95">
                Tampilkan
            </button>
        </form>
    </div>

    {{-- TABEL INPUT --}}
    @if($kelasId && $mapelId)
    <div class="bg-white rounded-4xl shadow-sm border border-slate-100 overflow-hidden">

        <form method="POST" action="{{ route('guru.absensi.store') }}">
            @csrf
            <input type="hidden" name="kelas_id" value="{{ $kelasId }}">
            <input type="hidden" name="mapel_id" value="{{ $mapelId }}">
            <input type="hidden" name="tanggal" value="{{ date('Y-m-d') }}">

            <div class="overflow-x-auto">
                <table class="w-full text-left border-collapse">
                    <thead>
                        <tr class="bg-slate-50 border-b border-slate-100">
                            <th class="p-5 text-[11px] font-bold text-slate-400 uppercase tracking-widest text-center w-16">No</th>
                            <th class="p-5 text-[11px] font-bold text-slate-400 uppercase tracking-widest">Nama Murid</th>
                            <th class="p-5 text-[11px] font-bold text-slate-400 uppercase tracking-widest text-center">Status Kehadiran</th>
                            <th class="p-5 text-[11px] font-bold text-slate-400 uppercase tracking-widest">Keterangan</th>
                        </tr>
                    </thead>

                    <tbody class="divide-y divide-slate-50">
                        @foreach($siswas as $i => $siswa)
                        <tr class="group hover:bg-emerald-50/30 transition-colors">
                            <td class="p-5 text-center font-bold text-slate-300 group-hover:text-emerald-500 transition-colors">
                                {{ $i+1 }}
                            </td>

                            <td class="p-5">
                                <div class="font-bold text-slate-800 group-hover:text-emerald-900">{{ $siswa->nama }}</div>
                                <div class="text-[10px] font-bold text-slate-400 tracking-widest">NISN: {{ $siswa->nisn }}</div>
                            </td>

                            {{-- STATUS SELECTOR DENGAN TOMBOL --}}
                            <td class="p-5">
                                <div class="flex justify-center gap-2">
                                    @foreach([
                                        'hadir' => 'peer-checked:bg-emerald-600 peer-checked:border-emerald-600',
                                        'izin'  => 'peer-checked:bg-blue-600 peer-checked:border-blue-600',
                                        'sakit' => 'peer-checked:bg-amber-500 peer-checked:border-amber-500',
                                        'alpha' => 'peer-checked:bg-rose-600 peer-checked:border-rose-600'
                                    ] as $status => $colorClass)
                                    
                                    <label class="relative cursor-pointer">
                                        <input type="radio" 
                                               name="absensi[{{ $siswa->id }}]" 
                                               value="{{ $status }}" 
                                               class="peer hidden"
                                               {{ $status == 'hadir' ? 'checked' : '' }}>
                                        
                                        <div class="px-4 py-2 rounded-xl text-[10px] font-black uppercase tracking-widest border border-slate-200 text-slate-400 bg-white transition-all
                                                    {{ $colorClass }} peer-checked:text-white peer-checked:shadow-md active:scale-90 select-none">
                                            {{ $status }}
                                        </div>
                                    </label>
                                    @endforeach
                                </div>
                            </td>

                            <td class="p-5">
                                <input type="text" 
                                       name="keterangan[{{ $siswa->id }}]" 
                                       class="w-full bg-slate-50 border-slate-200 rounded-xl px-4 py-2 text-sm focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 transition-all placeholder:text-slate-300" 
                                       placeholder="Tulis alasan...">
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            {{-- FORM FOOTER --}}
            <div class="p-6 bg-slate-50 border-t border-slate-100 flex flex-col md:flex-row justify-between items-center gap-4">
                <div class="flex items-center gap-2 text-slate-500 text-xs font-semibold italic">
                    <svg class="w-4 h-4 text-emerald-500" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"></path></svg>
                    Pastikan semua data kehadiran sudah sesuai sebelum menyimpan.
                </div>
                <button type="submit" class="w-full md:w-auto bg-emerald-700 hover:bg-emerald-800 text-white px-12 py-3.5 rounded-2xl font-black text-sm uppercase tracking-widest transition shadow-xl shadow-emerald-700/20 active:scale-95">
                    Simpan Data Presensi
                </button>
            </div>

        </form>

    </div>
    @else
    {{-- EMPTY STATE --}}
    <div class="bg-white rounded-4xl p-20 text-center border-2 border-dashed border-slate-100">
        <div class="w-24 h-24 bg-emerald-50 text-emerald-200 rounded-full flex items-center justify-center mx-auto mb-6">
            <svg class="w-12 h-12" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01"/></svg>
        </div>
        <h3 class="text-xl font-bold text-slate-800">Siap untuk Mengabsen?</h3>
        <p class="text-slate-400 mt-2 max-w-sm mx-auto font-medium">Silakan pilih <span class="text-emerald-600 font-bold">Kelas</span> dan <span class="text-emerald-600 font-bold">Mata Pelajaran</span> terlebih dahulu untuk menampilkan daftar siswa.</p>
    </div>
    @endif

</div>

<style>
.animate-fade-in {
    animation: fadeIn 0.4s cubic-bezier(0.4, 0, 0.2, 1);
}
@keyframes fadeIn {
    from {opacity:0; transform:translateY(15px);}
    to {opacity:1; transform:translateY(0);}
}
</style>

@endsection