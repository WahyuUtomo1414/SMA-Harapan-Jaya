@extends('layouts.dashboard')

@section('title', 'Status Pembayaran SPP')

@section('content')
<div class="animate-fade-in space-y-6 px-2 md:px-0 pb-12">
    
    {{-- Header & Filter --}}
    <div class="flex flex-col md:flex-row md:items-center justify-between gap-4">
        <div>
            <h2 class="text-2xl font-black text-slate-800 tracking-tighter italic uppercase">Status Iuran SPP</h2>
            <p class="text-[10px] font-bold text-slate-400 uppercase tracking-[0.2em]">SIAKAD-HJ • Laporan Bulanan Siswa</p>
        </div>
        
        {{-- Filter Tahun --}}
        <div class="relative group">
            <select class="appearance-none bg-white border-2 border-slate-100 text-slate-700 py-3 px-8 pr-12 rounded-2xl font-black text-[11px] uppercase tracking-widest focus:outline-none focus:border-emerald-500 transition-all cursor-pointer shadow-sm">
                <option value="2026" selected>Tahun Kalender 2026</option>
                <option value="2025">Tahun Kalender 2025</option>
            </select>
            <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-4 text-emerald-600">
                <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M19 9l-7 7-7-7"></path>
                </svg>
            </div>
        </div>
    </div>

    {{-- Summary Card --}}
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        <div class="bg-emerald-600 rounded-4xl p-8 text-white shadow-xl shadow-emerald-100 relative overflow-hidden group">
            <div class="absolute -right-5 -top-5 opacity-10 group-hover:scale-110 transition-transform duration-700">
                <svg class="w-40 h-40" fill="currentColor" viewBox="0 0 24 24">
                    <path d="M19 3H5c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2zm-9 14l-5-5 1.41-1.41L10 14.17l7.59-7.59L19 8l-9 9z"></path>
                </svg>
            </div>
            <p class="text-[10px] font-black uppercase tracking-[0.2em] opacity-80">Rekapitulasi Tahun 2026</p>
            <div class="flex items-baseline gap-2 mt-2">
                <h3 class="text-6xl font-black italic">4<span class="text-2xl opacity-40 not-italic mx-1">/</span>12</h3>
                <span class="text-xs font-bold opacity-80 uppercase tracking-widest">Bulan Terbayar</span>
            </div>
            <div class="mt-8 h-2.5 w-full bg-black/10 rounded-full overflow-hidden">
                <div class="h-full bg-white rounded-full transition-all duration-1000 shadow-[0_0_15px_rgba(255,255,255,0.6)]" style="width: 33.3%"></div>
            </div>
        </div>

        <div class="bg-white rounded-4xl p-8 border border-slate-100 shadow-sm md:col-span-2 flex flex-col justify-between">
            <div class="flex justify-between items-start">
                <div>
                    <h4 class="text-xl font-black uppercase tracking-tighter italic text-emerald-600">Status Kehadiran Iuran</h4>
                    <p class="text-[10px] font-black text-slate-400 mt-1 uppercase tracking-[0.2em]">Data Berdasarkan Input Admin TU</p>
                </div>
                <div class="bg-emerald-50 px-4 py-2 rounded-2xl border border-emerald-100">
                    <span class="text-[10px] font-black text-emerald-600 uppercase tracking-widest italic">Tepat Waktu</span>
                </div>
            </div>
            <div class="mt-6 p-5 rounded-3xl bg-slate-50 border border-slate-100 flex items-center justify-between">
                <div>
                    <p class="text-[8px] font-black text-slate-400 uppercase tracking-widest">Update Terakhir</p>
                    <p class="text-sm font-black text-slate-700 italic uppercase">SPP April 2026 - <span class="text-emerald-600 italic">Diterima</span></p>
                </div>
                <svg class="w-8 h-8 text-emerald-500 opacity-20" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-2 15l-5-5 1.41-1.41L10 14.17l7.59-7.59L19 8l-9 9z"></path></svg>
            </div>
        </div>
    </div>

    {{-- Main Table: Urut Januari - Desember --}}
    <div class="bg-white rounded-4xl shadow-sm border border-slate-100 overflow-hidden">
        <div class="p-8 border-b border-slate-50">
            <div class="flex items-center gap-3">
                <div class="w-2.5 h-10 bg-emerald-600 rounded-full shadow-lg shadow-emerald-100"></div>
                <h3 class="font-black text-slate-800 uppercase text-sm tracking-[0.15em]">Checklist Iuran Kalender (Jan - Des)</h3>
            </div>
        </div>
        
        <div class="overflow-x-auto">
            <table class="w-full min-w-200">
                <thead>
                    <tr class="bg-slate-50/50 text-[10px] font-black text-slate-400 uppercase tracking-widest border-b border-slate-100">
                        <th class="px-8 py-6 text-left w-24">Bulan</th>
                        <th class="px-6 py-6 text-left italic">Nama Bulan</th>
                        <th class="px-6 py-6 text-center italic">Waktu Bayar</th>
                        <th class="px-8 py-6 text-right">Status Pelunasan</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-50">
                    @php
                        $months = [
                            ['01', 'Januari', '07/01/2026', true],
                            ['02', 'Februari', '05/02/2026', true],
                            ['03', 'Maret', '12/03/2026', true],
                            ['04', 'April', '10/04/2026', true],
                            ['05', 'Mei', '-', false],
                            ['06', 'Juni', '-', false],
                            ['07', 'Juli', '-', false],
                            ['08', 'Agustus', '-', false],
                            ['09', 'September', '-', false],
                            ['10', 'Oktober', '-', false],
                            ['11', 'November', '-', false],
                            ['12', 'Desember', '-', false],
                        ];
                    @endphp

                    @foreach($months as $m)
                    <tr class="hover:bg-emerald-50/20 transition-all group">
                        <td class="px-8 py-6">
                            <span class="text-xl font-black italic {{ $m[3] ? 'text-emerald-200' : 'text-slate-200' }}">
                                {{ $m[0] }}
                            </span>
                        </td>
                        <td class="px-6 py-6 font-black text-slate-700 uppercase text-sm group-hover:text-emerald-600 transition-colors">
                            {{ $m[1] }} 2026
                        </td>
                        <td class="px-6 py-6 text-center font-medium text-slate-400 text-xs italic">
                            {{ $m[2] }}
                        </td>
                        <td class="px-8 py-6 text-right">
                            @if($m[3])
                                <div class="inline-flex items-center gap-2 px-6 py-2 rounded-2xl bg-emerald-600 text-white font-black text-[9px] uppercase tracking-widest italic shadow-lg shadow-emerald-100">
                                    <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="4" d="M5 13l4 4L19 7"></path></svg>
                                    Lunas
                                </div>
                            @else
                                <div class="inline-flex items-center gap-2 px-6 py-2 rounded-2xl bg-slate-50 text-slate-400 border border-slate-100 font-black text-[9px] uppercase tracking-widest italic group-hover:border-rose-200 group-hover:text-rose-400 transition-all">
                                    <div class="w-1.5 h-1.5 rounded-full bg-slate-300 group-hover:bg-rose-400"></div>
                                    Belum Bayar
                                </div>
                            @endif
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    {{-- Alert --}}
    <div class="bg-emerald-50 rounded-3xl p-6 border border-emerald-100 flex items-start gap-4">
        <span class="text-xl">💡</span>
        <p class="text-[11px] text-emerald-800 font-bold leading-relaxed uppercase tracking-tight">
            Pembayaran iuran bulanan wajib diselesaikan sebelum tanggal 10 setiap bulannya untuk menghindari denda administrasi atau hambatan akses SIAKAD.
        </p>
    </div>
</div>
@endsection