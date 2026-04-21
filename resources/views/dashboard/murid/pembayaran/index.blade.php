@extends('layouts.dashboard')

@section('title', 'Status Pembayaran SPP')
@section('page_title', 'Status Pembayaran')

@section('content')
@php
    $spp = $spp ?? collect();
    $selectedYear = $selectedYear ?? request('tahun', now()->year);

    // Grouping data agar tidak duplikat per bulan
    $sppByMonth = $spp
        ->sortByDesc('updated_at')
        ->groupBy('bulan')
        ->map(fn ($items) => $items->first());

    $isPaidStatus = fn ($status) => strtoupper($status ?? '') === 'LUNAS';

    // Hitung jumlah yang lunas
    $paidCount = $sppByMonth
        ->filter(fn ($item) => $isPaidStatus($item->status_bayar))
        ->count();

    // Mencari data terbaru berdasarkan tahun & bulan
    $latestSpp = $spp
        ->sortByDesc(fn ($item) => sprintf('%04d%02d', $item->tahun, $item->bulan))
        ->first();

    $monthNames = [
        1 => 'Januari', 2 => 'Februari', 3 => 'Maret', 4 => 'April',
        5 => 'Mei', 6 => 'Juni', 7 => 'Juli', 8 => 'Agustus',
        9 => 'September', 10 => 'Oktober', 11 => 'November', 12 => 'Desember',
    ];
@endphp

<div class="animate-fade-in space-y-6 px-2 md:px-0 pb-12">
    
    {{-- HEADER --}}
    <div class="flex flex-col md:flex-row md:items-center justify-between gap-4">
        <div>
            <h2 class="text-2xl font-black text-slate-800 uppercase tracking-tight">Status Iuran SPP</h2>
            <p class="text-[10px] text-slate-400 font-bold uppercase tracking-widest">SIAKAD-HJ • Laporan Bulanan</p>
        </div>
        
        {{-- FILTER TAHUN --}}
        <form method="GET" class="relative">
            <select 
                name="tahun"
                onchange="this.form.submit()"
                class="appearance-none bg-white border-2 border-slate-200 py-2.5 pl-4 pr-10 rounded-2xl font-bold text-xs uppercase focus:border-emerald-500 focus:ring-0 transition-all cursor-pointer shadow-sm"
            >
                @for ($i = now()->year; $i >= now()->year - 3; $i--)
                    <option value="{{ $i }}" {{ $selectedYear == $i ? 'selected' : '' }}>Tahun {{ $i }}</option>
                @endfor
            </select>
            <div class="absolute inset-y-0 right-3 flex items-center pointer-events-none text-slate-400">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                </svg>
            </div>
        </form>
    </div>

    {{-- SUMMARY CARD --}}
    <div class="relative overflow-hidden bg-emerald-600 text-white p-8 rounded-[2rem] shadow-xl shadow-emerald-100">
        {{-- Dekorasi Background --}}
        <div class="absolute -right-10 -top-10 w-40 h-40 bg-white/10 rounded-full blur-3xl"></div>
        
        <div class="relative z-10">
            <p class="text-xs font-bold uppercase opacity-80 tracking-widest">Progres Kelunasan {{ $selectedYear }}</p>
            <div class="flex items-baseline gap-2 mt-1">
                <h3 class="text-5xl font-black">{{ $paidCount }}</h3>
                <span class="text-xl opacity-60">/ 12 Bulan</span>
            </div>

            <div class="mt-6">
                <div class="flex justify-between text-[10px] font-bold uppercase mb-2 tracking-tighter">
                    <span>Progress</span>
                    <span>{{ round(($paidCount / 12) * 100) }}%</span>
                </div>
                <div class="h-3 bg-black/10 rounded-full p-0.5">
                    <div class="h-full bg-white rounded-full shadow-sm transition-all duration-1000"
                        style="width: {{ ($paidCount / 12) * 100 }}%">
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- LATEST ACTIVITY --}}
    <div class="bg-slate-50 border border-slate-200 p-4 rounded-2xl flex items-center gap-4">
        <div class="w-10 h-10 bg-white rounded-xl shadow-sm flex items-center justify-center text-emerald-600">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>
        </div>
        <div>
            <p class="text-[10px] font-bold text-slate-400 uppercase tracking-tight">Update Terakhir</p>
            @if($latestSpp)
                <p class="text-sm font-bold text-slate-700">
                    {{ $monthNames[$latestSpp->bulan] }} {{ $latestSpp->tahun }} 
                    <span class="mx-1 text-slate-300">•</span>
                    <span class="{{ $isPaidStatus($latestSpp->status_bayar) ? 'text-emerald-600' : 'text-rose-500' }}">
                        {{ $isPaidStatus($latestSpp->status_bayar) ? 'LUNAS' : 'PENDING' }}
                    </span>
                </p>
            @else
                <p class="text-sm font-bold text-slate-400 italic">Belum ada riwayat pembayaran</p>
            @endif
        </div>
    </div>

    {{-- TABLE --}}
    <div class="bg-white rounded-3xl shadow-sm border border-slate-100 overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-left">
                <thead class="bg-slate-50 border-b border-slate-100">
                    <tr>
                        <th class="px-6 py-4 text-[10px] font-black text-slate-400 uppercase tracking-widest text-center w-16">No</th>
                        <th class="px-6 py-4 text-[10px] font-black text-slate-400 uppercase tracking-widest">Periode Tagihan</th>
                        <th class="px-6 py-4 text-[10px] font-black text-slate-400 uppercase tracking-widest text-center">Tgl Bayar</th>
                        <th class="px-6 py-4 text-[10px] font-black text-slate-400 uppercase tracking-widest text-right">Status</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-50">
                    @foreach($monthNames as $monthNumber => $monthName)
                    @php
                        $monthSpp = $sppByMonth->get($monthNumber);
                        $isPaid = $monthSpp && $isPaidStatus($monthSpp->status_bayar);
                    @endphp
                    <tr class="hover:bg-slate-50/50 transition-colors">
                        <td class="px-6 py-4 text-center font-bold text-slate-400">{{ sprintf('%02d', $monthNumber) }}</td>
                        <td class="px-6 py-4">
                            <p class="font-bold text-slate-700">{{ $monthName }}</p>
                            <p class="text-[10px] text-slate-400 font-medium">{{ $selectedYear }}</p>
                        </td>
                        <td class="px-6 py-4 text-center">
                            @if($isPaid)
                                <span class="text-xs font-medium text-slate-600 bg-slate-100 px-3 py-1 rounded-lg">
                                    {{ $monthSpp->updated_at->format('d M Y') }}
                                </span>
                            @else
                                <span class="text-slate-300 text-xs">-</span>
                            @endif
                        </td>
                        <td class="px-6 py-4 text-right">
                            @if($isPaid)
                                <span class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-full bg-emerald-100 text-emerald-700 text-[10px] font-black uppercase tracking-wider">
                                    <span class="w-1.5 h-1.5 bg-emerald-500 rounded-full animate-pulse"></span>
                                    Lunas
                                </span>
                            @else
                                <span class="inline-flex items-center px-3 py-1.5 rounded-full bg-slate-100 text-slate-400 text-[10px] font-black uppercase tracking-wider">
                                    Belum Bayar
                                </span>
                            @endif
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

</div>
@endsection