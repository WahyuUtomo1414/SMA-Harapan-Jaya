@extends('layouts.dashboard')

@section('title', 'Laporan Nilai')
@section('page_title', 'Laporan Nilai')

@section('content')
@php
    $rataRata = $nilai->avg('total_nilai') ?? 0;
    $tuntas = $nilai->where('total_nilai', '>=', 75)->count();
    $remedial = $nilai->where('total_nilai', '<', 75)->count();

    if ($rataRata >= 90) {
        $predikat = 'Sangat Baik';
    } elseif ($rataRata >= 75) {
        $predikat = 'Baik';
    } else {
        $predikat = 'Perlu Perbaikan';
    }
@endphp

<div class="animate-fade-in space-y-6 px-2 md:px-0 pb-20">

    {{-- STATS SECTION --}}
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">
        
        {{-- RATA-RATA (HIGHLIGHT CARD) --}}
        <div class="md:col-span-2 lg:col-span-2 bg-emerald-600 rounded-[2.5rem] p-8 text-white shadow-xl shadow-emerald-100 relative overflow-hidden group">
            <div class="absolute -right-6 -top-6 w-32 h-32 bg-white/10 rounded-full blur-2xl group-hover:scale-150 transition-transform duration-700"></div>
            
            <div class="relative z-10">
                <p class="text-[10px] font-black uppercase tracking-widest opacity-80">Rata-Rata Akademik</p>
                <div class="flex items-center gap-4 mt-2">
                    <h3 class="text-6xl font-black tracking-tighter italic">
                        {{ number_format($rataRata, 1) }}
                    </h3>
                    {{-- FIX: Menggunakan w-0.5 sesuai saran linter --}}
                    <div class="h-12 w-0.5 bg-white/20 rotate-12"></div>
                    <div>
                        <p class="text-xs font-bold leading-tight">PREDIKAT</p>
                        <p class="text-lg font-black uppercase tracking-tight">{{ $predikat }}</p>
                    </div>
                </div>
                <div class="mt-8 flex gap-2">
                    <span class="px-4 py-2 bg-black/10 backdrop-blur-md rounded-2xl text-[10px] font-extrabold uppercase tracking-tighter">
                        Total {{ $nilai->count() }} Mata Pelajaran
                    </span>
                </div>
            </div>
        </div>

        {{-- MINI STATS --}}
        {{-- FIX: Menggunakan rounded-4xl sesuai saran linter --}}
        <div class="bg-white rounded-4xl p-6 border border-slate-100 shadow-sm flex flex-col justify-between">
            <p class="text-[10px] font-black text-slate-400 uppercase tracking-widest">Tuntas</p>
            <div>
                <h4 class="text-4xl font-black text-slate-800">{{ $tuntas }}</h4>
                <p class="text-[10px] font-bold text-emerald-500 uppercase">Sudah Melampaui KKM</p>
            </div>
        </div>

        {{-- FIX: Menggunakan rounded-4xl sesuai saran linter --}}
        <div class="bg-white rounded-4xl p-6 border border-slate-100 shadow-sm flex flex-col justify-between">
            <p class="text-[10px] font-black text-slate-400 uppercase tracking-widest">Perbaikkan Nilai</p>
            <div>
                <h4 class="text-4xl font-black text-rose-500">{{ $remedial }}</h4>
                <p class="text-[10px] font-bold text-rose-300 uppercase">Di Bawah Standar KKM</p>
            </div>
        </div>
    </div>

    {{-- TABLE SECTION --}}
    <div class="bg-white rounded-[2.5rem] shadow-sm border border-slate-100 overflow-hidden">
        <div class="p-6 md:p-8 flex items-center justify-between">
            <div>
                <h3 class="text-xl font-black text-slate-800 uppercase tracking-tight">Rincian Nilai</h3>
                <p class="text-[10px] text-slate-400 font-bold uppercase tracking-widest">Laporan Semester Aktif</p>
            </div>
            <div class="p-3 bg-slate-50 rounded-2xl text-slate-400">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 17v-2m3 2v-4m3 4v-6m2 10H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                </svg>
            </div>
        </div>

        <div class="overflow-x-auto">
            <table class="w-full text-left">
                <thead>
                    <tr class="bg-slate-50/50">
                        <th class="px-8 py-5 text-[10px] font-black text-slate-400 uppercase tracking-widest">Mata Pelajaran</th>
                        <th class="px-4 py-5 text-center text-[10px] font-black text-slate-400 uppercase tracking-widest hidden md:table-cell">Tugas</th>
                        <th class="px-4 py-5 text-center text-[10px] font-black text-slate-400 uppercase tracking-widest hidden md:table-cell">UTS</th>
                        <th class="px-4 py-5 text-center text-[10px] font-black text-slate-400 uppercase tracking-widest hidden md:table-cell">UAS</th>
                        <th class="px-4 py-5 text-center text-[10px] font-black text-slate-400 uppercase tracking-widest">Skor Akhir</th>
                        <th class="px-8 py-5 text-right text-[10px] font-black text-slate-400 uppercase tracking-widest">Status</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-50">
                    @forelse($nilai as $n)
                    @php
                        $total = $n->total_nilai ?? (($n->tugas * 0.4) + ($n->uts * 0.3) + ($n->uas * 0.3));
                        $isTuntas = $total >= 75;
                    @endphp
                    <tr class="hover:bg-slate-50/80 transition-colors group">
                        <td class="px-8 py-6">
                            <p class="font-black text-slate-700 group-hover:text-emerald-600 transition-colors uppercase tracking-tight">
                                {{ $n->mataPelajaran->nama ?? 'Mapel Terhapus' }}
                            </p>
                            <p class="text-[10px] text-slate-400 font-bold md:hidden mt-1 uppercase">
                                T: {{ $n->tugas }} • UTS: {{ $n->uts }} • UAS: {{ $n->uas }}
                            </p>
                        </td>
                        <td class="px-4 py-6 text-center font-bold text-slate-600 hidden md:table-cell">{{ $n->tugas }}</td>
                        <td class="px-4 py-6 text-center font-bold text-slate-600 hidden md:table-cell">{{ $n->uts }}</td>
                        <td class="px-4 py-6 text-center font-bold text-slate-600 hidden md:table-cell">{{ $n->uas }}</td>
                        <td class="px-4 py-6 text-center">
                            <span class="text-lg font-black tracking-tighter {{ $isTuntas ? 'text-slate-800' : 'text-rose-500' }}">
                                {{ number_format($total, 0) }}
                            </span>
                        </td>
                        <td class="px-8 py-6 text-right">
                            @if($isTuntas)
                                <span class="inline-flex items-center gap-1.5 px-4 py-1.5 rounded-full bg-emerald-100 text-emerald-700 text-[10px] font-black uppercase tracking-wider">
                                    <span class="w-1.5 h-1.5 bg-emerald-500 rounded-full animate-pulse"></span>
                                    Tuntas
                                </span>
                            @else
                                <span class="inline-flex items-center gap-1.5 px-4 py-1.5 rounded-full bg-rose-100 text-rose-700 text-[10px] font-black uppercase tracking-wider">
                                    <span class="w-1.5 h-1.5 bg-rose-500 rounded-full"></span>
                                    Perbaikkan Nilai
                                </span>
                            @endif
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6" class="px-8 py-20 text-center">
                            <p class="text-slate-400 font-bold uppercase text-xs tracking-widest italic">Belum ada data nilai</p>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
