@extends('layouts.dashboard')

@section('title', 'Database Siswa')
@section('page_title', 'Database Siswa')

@section('content')
<div class="animate-fade-in space-y-6 px-4 md:px-0 pb-10">

    {{-- HEADER --}}
    <div class="bg-white rounded-3xl md:rounded-4xl p-6 md:p-8 shadow-sm border border-slate-100 flex flex-col md:flex-row justify-between items-start md:items-center gap-6">
        <div class="flex items-center gap-4 md:gap-5">
            <div class="w-12 h-12 md:w-14 md:h-14 bg-emerald-50 text-emerald-600 rounded-2xl flex items-center justify-center text-xl md:text-2xl shadow-sm border border-emerald-100 shrink-0">
                <svg class="w-6 h-6 md:w-7 md:h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                </svg>
            </div>
            <div>
                <h2 class="text-xl md:text-2xl font-black uppercase text-slate-800 tracking-tight">
                    Database <span class="text-emerald-700">Siswa</span>
                </h2>
                <p class="text-[9px] md:text-[10px] font-black text-slate-400 uppercase tracking-[0.2em] mt-1 flex items-center gap-2">
                    <span class="w-1.5 h-1.5 rounded-full bg-emerald-500 animate-pulse"></span>
                    Total {{ $murids->total() }} Siswa Terdaftar
                </p>
            </div>
        </div>
        
        <div class="w-full md:w-auto px-4 py-2 bg-slate-50 border border-slate-100 rounded-xl hidden md:block">
             <span class="text-[10px] font-black text-slate-400 uppercase tracking-widest">Update: {{ now()->translatedFormat('d M Y') }}</span>
        </div>
    </div>

    {{-- FILTER BOX --}}
    <div class="bg-white rounded-3xl md:rounded-4xl p-5 md:p-6 shadow-sm border border-slate-100">
        <form method="GET" class="flex flex-col md:grid md:grid-cols-12 gap-5">
            {{-- KELAS --}}
            <div class="md:col-span-3 relative group">
                <label class="absolute -top-2 left-4 bg-white px-2 text-[9px] font-black text-emerald-600 uppercase tracking-widest z-10 transition-colors group-focus-within:text-emerald-500">
                    Cari Kelas
                </label>
                <select name="kelas_id" onchange="this.form.submit()"
                        class="w-full bg-slate-50 border-2 border-slate-50 focus:border-emerald-500 focus:bg-white rounded-2xl py-3.5 md:py-4 px-6 text-sm font-bold text-slate-700 transition-all appearance-none cursor-pointer">
                    <option value="">Semua Kelas</option>
                    @foreach($kelasList as $k)
                        <option value="{{ $k->id }}" {{ request('kelas_id') == $k->id ? 'selected' : '' }}>
                            {{ $k->kode }}
                        </option>
                    @endforeach
                </select>
            </div>

            {{-- SEARCH --}}
            <div class="md:col-span-6 relative group">
                <label class="absolute -top-2 left-4 bg-white px-2 text-[9px] font-black text-slate-400 uppercase tracking-widest z-10 transition-colors group-focus-within:text-emerald-500">
                    Pencarian
                </label>
                <div class="relative">
                    <input type="text" name="search" value="{{ request('search') }}" placeholder="Cari Nama atau NISN..."
                           class="w-full bg-slate-50 border-2 border-slate-50 focus:border-emerald-500 focus:bg-white rounded-2xl py-3.5 md:py-4 px-6 pl-12 text-sm font-bold text-slate-700 transition-all">
                    <svg class="w-5 h-5 absolute left-4 top-1/2 -translate-y-1/2 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                    </svg>
                </div>
            </div>

            {{-- BUTTON --}}
            <div class="md:col-span-3">
                <button type="submit"
                        class="w-full h-full bg-slate-900 hover:bg-emerald-700 text-white rounded-2xl font-black text-[11px] uppercase tracking-[0.2em] transition-all shadow-xl shadow-slate-200 py-4 md:py-0 active:scale-95">
                    Cari Data
                </button>
            </div>
        </form>
    </div>

    {{-- DATA DISPLAY --}}
    <div class="bg-white rounded-3xl md:rounded-4xl shadow-sm border border-slate-100 overflow-hidden">
        {{-- Table for Desktop --}}
        <div class="hidden md:block overflow-x-auto">
            <table class="w-full">
                <thead>
                    <tr class="bg-slate-50/50 text-[10px] font-black text-slate-400 uppercase tracking-[0.2em] border-b border-slate-100">
                        <th class="px-8 py-6 text-left">No</th>
                        <th class="px-8 py-6 text-left">Informasi Siswa</th>
                        <th class="px-8 py-6 text-center">Kelas</th>
                        <th class="px-8 py-6 text-center">Status</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-50">
                    @forelse($murids as $index => $murid)
                    <tr class="hover:bg-emerald-50/30 transition-all group">
                        <td class="px-8 py-5 text-slate-300 font-black group-hover:text-emerald-500 transition-colors text-sm">
                            {{ str_pad($murids->firstItem() + $index, 2, '0', STR_PAD_LEFT) }}
                        </td>
                        <td class="px-8 py-5">
                            <div class="flex items-center gap-4">
                                <div class="w-10 h-10 rounded-xl bg-slate-100 group-hover:bg-emerald-600 group-hover:text-white transition-all flex items-center justify-center font-black text-slate-500 text-xs shadow-inner">
                                    {{ substr($murid->nama, 0, 1) }}
                                </div>
                                <div>
                                    <div class="font-black text-slate-700 uppercase text-sm tracking-tight group-hover:text-emerald-900">
                                        {{ $murid->nama }}
                                    </div>
                                    <div class="text-[9px] text-slate-400 font-bold tracking-widest mt-0.5">
                                        NISN: {{ $murid->nisn }}
                                    </div>
                                </div>
                            </div>
                        </td>
                        <td class="px-8 py-5 text-center">
                            <span class="px-3 py-1 bg-white border border-slate-100 text-slate-600 rounded-lg text-[10px] font-black group-hover:border-emerald-200 group-hover:text-emerald-700 transition-all">
                                {{ optional($murid->kelas)->kode ?? '-' }}
                            </span>
                        </td>
                        <td class="px-8 py-5 text-center">
                            @if($murid->status)
                                <span class="inline-flex items-center gap-1.5 py-1.5 px-3 rounded-full bg-emerald-50 text-emerald-600 text-[9px] font-black uppercase tracking-tighter border border-emerald-100">
                                    <span class="w-1.5 h-1.5 rounded-full bg-emerald-500 animate-pulse"></span>
                                    Aktif
                                </span>
                            @else
                                <span class="inline-flex items-center gap-1.5 py-1.5 px-3 rounded-full bg-rose-50 text-rose-600 text-[9px] font-black uppercase tracking-tighter border border-rose-100">
                                    <span class="w-1.5 h-1.5 rounded-full bg-rose-500"></span>
                                    Non-Aktif
                                </span>
                            @endif
                        </td>
                    </tr>
                    @empty
                        {{-- Sama seperti kodingan sebelumnya --}}
                    @endforelse
                </tbody>
            </table>
        </div>

        {{-- Grid for Mobile (Stacked UI) --}}
        <div class="md:hidden divide-y divide-slate-100">
            @forelse($murids as $index => $murid)
                <div class="p-5 flex flex-col gap-4 active:bg-slate-50 transition-colors">
                    <div class="flex justify-between items-start">
                        <div class="flex gap-4">
                            <div class="w-12 h-12 rounded-2xl bg-emerald-50 text-emerald-600 flex items-center justify-center font-black text-sm border border-emerald-100 shadow-sm">
                                {{ substr($murid->nama, 0, 1) }}
                            </div>
                            <div>
                                <h4 class="font-black text-slate-800 uppercase text-sm leading-tight">{{ $murid->nama }}</h4>
                                <p class="text-[10px] text-slate-400 font-bold mt-1 tracking-widest uppercase">NISN: {{ $murid->nisn }}</p>
                            </div>
                        </div>
                        <span class="text-xs font-black text-slate-200 italic">#{{ $murids->firstItem() + $index }}</span>
                    </div>
                    
                    <div class="flex items-center justify-between pt-2">
                        <div class="flex flex-col gap-1">
                            <span class="text-[8px] font-black text-slate-400 uppercase tracking-widest text-left">Kelas</span>
                            <span class="px-3 py-1 bg-slate-100 text-slate-700 rounded-lg text-[10px] font-black w-fit">
                                {{ optional($murid->kelas)->kode ?? '-' }}
                            </span>
                        </div>
                        <div class="flex flex-col gap-1 items-end">
                            <span class="text-[8px] font-black text-slate-400 uppercase tracking-widest">Status Siswa</span>
                            @if($murid->status)
                                <span class="px-3 py-1 bg-emerald-50 text-emerald-600 rounded-lg text-[10px] font-black border border-emerald-100">AKTIF</span>
                            @else
                                <span class="px-3 py-1 bg-rose-50 text-rose-600 rounded-lg text-[10px] font-black border border-rose-100">NON-AKTIF</span>
                            @endif
                        </div>
                    </div>
                </div>
            @empty
                <div class="py-20 text-center">
                    <p class="text-slate-400 font-black uppercase text-xs tracking-widest">Data Tidak Ditemukan</p>
                </div>
            @endforelse
        </div>

        {{-- PAGINATION --}}
        <div class="px-6 md:px-8 py-6 bg-slate-50/50 border-t border-slate-100 flex flex-col md:flex-row justify-between items-center gap-6">
            <div class="text-[10px] font-black text-slate-400 uppercase tracking-[0.2em] text-center md:text-left leading-relaxed">
                Menampilkan <span class="text-emerald-600">{{ $murids->count() }}</span> dari <span class="text-slate-600">{{ $murids->total() }}</span> Siswa
            </div>

            <div class="emerald-pagination w-full md:w-auto overflow-x-auto flex justify-center pb-2 md:pb-0">
                {{ $murids->withQueryString()->links() }}
            </div>
        </div>
    </div>
</div>

<style>
/* CSS Reset for Pagination agar tidak berantakan */
.emerald-pagination nav svg { @apply w-5 h-5; }
.emerald-pagination nav p { @apply hidden; }
.emerald-pagination nav div:first-child { @apply hidden md:flex; }
</style>
@endsection
