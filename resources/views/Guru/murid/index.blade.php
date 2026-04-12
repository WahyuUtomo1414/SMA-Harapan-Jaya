@extends('layouts.dashboard')

@section('title', 'Database Siswa')

@section('content')
<div class="animate-fade-in space-y-6 px-2 md:px-0">
    {{-- Header: Versi Read-Only (Tanpa tombol Tambah) --}}
    <div class="bg-white rounded-4xl p-8 shadow-sm border border-slate-100 flex flex-col md:flex-row justify-between items-start md:items-center gap-4">
        <div class="flex items-center gap-5">
            <div class="w-14 h-14 bg-indigo-50 rounded-2xl flex items-center justify-center text-2xl shadow-sm">
                📚
            </div>
            <div>
                <h2 class="text-2xl font-black text-slate-800 uppercase tracking-tight">Database Siswa</h2>
                <p class="text-[10px] font-black text-slate-400 uppercase tracking-[0.2em] mt-1">
                    Mode View-Only • SMK Harapan Jaya • {{ $murids->total() }} Siswa Terdaftar
                </p>
            </div>
        </div>
        {{-- Tombol Tambah Dihapus Sesuai Instruksi --}}
    </div>

    {{-- Filter & Search: Diperbagus UI-nya --}}
    <div class="bg-white rounded-4xl p-6 shadow-sm border border-slate-100">
        <form action="{{ route('guru.data-siswa') }}" method="GET" class="grid grid-cols-1 md:grid-cols-12 gap-4">
            {{-- Filter Kelas --}}
            <div class="md:col-span-3 relative">
                <label class="absolute -top-2 left-5 bg-white px-2 text-[9px] font-black text-slate-400 uppercase tracking-widest">Pilih Kelas</label>
                <select name="kelas" onchange="this.form.submit()" 
                    class="w-full bg-slate-50 border-2 border-slate-50 focus:border-indigo-500 focus:bg-white rounded-2xl py-4 px-6 text-sm font-bold text-slate-700 outline-none transition-all appearance-none cursor-pointer">
                    <option value="">Semua Kelas</option>
                    <option value="X-RPL-1" {{ request('kelas') == 'X-RPL-1' ? 'selected' : '' }}>X RPL 1</option>
                    <option value="XI-RPL-1" {{ request('kelas') == 'XI-RPL-1' ? 'selected' : '' }}>XI RPL 1</option>
                    <option value="XII-RPL-1" {{ request('kelas') == 'XII-RPL-1' ? 'selected' : '' }}>XII RPL 1</option>
                </select>
            </div>

            {{-- Search Input --}}
            <div class="md:col-span-7 relative">
                <label class="absolute -top-2 left-5 bg-white px-2 text-[9px] font-black text-slate-400 uppercase tracking-widest">Pencarian Cepat</label>
                <input type="text" name="search" value="{{ request('search') }}" placeholder="Ketik Nama" 
                    class="w-full bg-slate-50 border-2 border-slate-50 focus:border-indigo-500 focus:bg-white rounded-2xl py-4 px-6 text-sm font-bold text-slate-700 outline-none transition-all">
            </div>

            {{-- Submit Button --}}
            <div class="md:col-span-2">
                <button type="submit" class="w-full h-full bg-slate-800 hover:bg-black text-white rounded-2xl font-black text-[11px] uppercase tracking-[0.2em] transition-all flex items-center justify-center gap-2">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>
                    Cari
                </button>
            </div>
        </form>
    </div>

    {{-- Table Data Siswa --}}
    <div class="bg-white rounded-4xl shadow-sm border border-slate-100 overflow-hidden">
        <div class="overflow-x-auto scrollbar-hide">
            <table class="w-full min-w-200">
                <thead>
                    <tr class="bg-slate-50/50 border-b border-slate-100 text-[11px] font-black text-slate-400 uppercase tracking-[0.2em]">
                        <th class="px-8 py-6 text-left w-20">No</th>
                        <th class="px-8 py-6 text-left">Informasi Siswa</th>
                        <th class="px-8 py-6 text-center">Kelas</th>
                        <th class="px-8 py-6 text-center">Status</th>
                        <th class="px-8 py-6 text-right">Akses Riwayat</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-50">
                    @forelse($murids as $index => $murid)
                    <tr class="group hover:bg-slate-50/20 transition-all">
                        <td class="px-8 py-5 text-sm font-black text-slate-300">
                            {{ str_pad($murids->firstItem() + $index, 2, '0', STR_PAD_LEFT) }}
                        </td>
                        <td class="px-8 py-5">
                            <div class="flex items-center gap-3">
                                <div class="w-10 h-10 rounded-full bg-slate-100 flex items-center justify-center font-black text-slate-400 text-xs uppercase shadow-inner border border-white">
                                    {{ substr($murid->nama, 0, 1) }}
                                </div>
                                <div class="flex flex-col">
                                    <span class="font-black text-slate-700 uppercase text-sm leading-tight">{{ $murid->nama }}</span>
                                    <span class="text-[9px] font-bold text-slate-400 uppercase tracking-widest mt-0.5">{{ $murid->gender }}</span>
                                </div>
                            </div>
                        </td>
                        <td class="px-8 py-5 text-center">
                            <span class="px-4 py-1.5 bg-indigo-50 text-indigo-600 rounded-full text-[10px] font-black uppercase tracking-wider">
                                {{ $murid->kelas ?? 'TBA' }}
                            </span>
                        </td>
                        <td class="px-8 py-5 text-center">
                            <div class="flex items-center justify-center gap-2">
                                <div class="w-1.5 h-1.5 rounded-full {{ $murid->status ? 'bg-emerald-500' : 'bg-rose-500' }}"></div>
                                <span class="text-[10px] font-black uppercase text-slate-600">
                                    {{ $murid->status ? 'Aktif' : 'Non-Aktif' }}
                                </span>
                            </div>
                        </td>
                        <td class="px-8 py-5">
                            <div class="flex justify-end items-center gap-3">
                                {{-- Link Riwayat Nilai --}}
                                <a href="#" class="flex items-center gap-2 px-4 py-2 bg-slate-50 hover:bg-indigo-600 text-slate-500 hover:text-white rounded-xl transition-all border border-slate-100 shadow-sm">
                                    <span class="text-[10px] font-black uppercase tracking-widest">Nilai</span>
                                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"/></svg>
                                </a>
                                {{-- Link Riwayat Absensi --}}
                                <a href="#" class="flex items-center gap-2 px-4 py-2 bg-slate-50 hover:bg-emerald-600 text-slate-500 hover:text-white rounded-xl transition-all border border-slate-100 shadow-sm">
                                    <span class="text-[10px] font-black uppercase tracking-widest">Absen</span>
                                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2-2v14a2 2 0 002 2z"/></svg>
                                </a>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6" class="px-8 py-20 text-center">
                            <div class="flex flex-col items-center opacity-20">
                                <span class="text-6xl mb-4">🔍</span>
                                <p class="font-black uppercase tracking-widest text-xs">Siswa tidak ditemukan</p>
                            </div>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        <div class="px-8 py-6 bg-slate-50/30 border-t border-slate-100 flex items-center justify-between">
            <p class="text-[10px] font-bold text-slate-400 uppercase tracking-widest">Halaman {{ $murids->currentPage() }} dari {{ $murids->lastPage() }}</p>
            <div>
                {{ $murids->appends(request()->query())->links() }}
            </div>
        </div>
    </div>
</div>
@endsection