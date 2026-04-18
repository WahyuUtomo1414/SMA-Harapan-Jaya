@extends('layouts.dashboard')

@section('title', 'Dashboard Murid')
@section('page_title', 'Dashboard')

@section('content')

<div class="space-y-8 animate-fade-in">

    {{-- HEADER DENGAN GAYA KARTU MODERN --}}
    {{-- FIX: Menggunakan bg-linear-to-br dan rounded-4xl --}}
    <div class="relative overflow-hidden bg-linear-to-br from-emerald-600 via-green-600 to-teal-700 rounded-4xl p-8 shadow-xl shadow-green-200/50">
        <div class="relative z-10 flex flex-col md:flex-row md:items-center justify-between gap-6">
            <div class="flex items-center gap-5">
                <div class="w-16 h-16 bg-white/20 backdrop-blur-md rounded-2xl flex items-center justify-center border border-white/30 shadow-inner">
                    <span class="text-3xl">🧑</span>
                </div>
                <div>
                    <h1 class="text-2xl md:text-3xl font-black text-white tracking-tight">
                        Halo, {{ explode(' ', trim($murid->nama ?? 'Siswa'))[0] }}!
                    </h1>
                    <p class="text-green-50 text-sm md:text-base mt-1 font-light opacity-90">
                        Siap untuk belajar hal baru hari ini?
                    </p>
                </div>
            </div>
            <div class="bg-black/10 backdrop-blur-md px-5 py-3 rounded-2xl border border-white/10 hidden sm:block text-white">
                <p class="text-[10px] uppercase tracking-[0.2em] opacity-70">Status Siswa</p>
                <p class="text-sm font-bold flex items-center gap-2">
                    <span class="w-2 h-2 bg-green-400 rounded-full animate-pulse"></span> Aktif Akademik
                </p>
            </div>
        </div>
        
        {{-- Dekorasi Abstract --}}
        <div class="absolute -right-6 -bottom-6 w-40 h-40 bg-white/10 rounded-full blur-3xl"></div>
    </div>

    @if(!$murid)
        <div class="flex items-center gap-3 bg-red-50 border-l-4 border-red-500 text-red-700 p-5 rounded-2xl shadow-sm">
            <span class="text-2xl">⚠️</span>
            <p class="font-medium">Data murid belum tersedia di sistem.</p>
        </div>
    @else

    {{-- STATS GRID --}}
    <div class="grid grid-cols-2 md:grid-cols-4 gap-4 md:gap-6">
        
        {{-- Total Nilai --}}
        <div class="bg-white p-5 rounded-3xl border border-slate-100 shadow-sm hover:shadow-md transition-all">
            <div class="w-10 h-10 bg-blue-50 text-blue-600 rounded-xl flex items-center justify-center mb-3 text-xl">📘</div>
            <p class="text-slate-500 text-xs font-bold uppercase tracking-wider">Materi Nilai</p>
            <h2 class="text-2xl font-black text-slate-800 mt-1">{{ $nilai->count() }}</h2>
        </div>

        {{-- Rata-rata --}}
        <div class="bg-white p-5 rounded-3xl border border-slate-100 shadow-sm hover:shadow-md transition-all">
            <div class="w-10 h-10 bg-emerald-50 text-emerald-600 rounded-xl flex items-center justify-center mb-3 text-xl">🏆</div>
            <p class="text-slate-500 text-xs font-bold uppercase tracking-wider">Rata-rata</p>
            <h2 class="text-2xl font-black text-emerald-600 mt-1">{{ number_format($rataRata ?? 0, 1) }}</h2>
        </div>

        {{-- Hadir --}}
        <div class="bg-white p-5 rounded-3xl border border-slate-100 shadow-sm hover:shadow-md transition-all">
            <div class="w-10 h-10 bg-amber-50 text-amber-600 rounded-xl flex items-center justify-center mb-3 text-xl">✅</div>
            <p class="text-slate-500 text-xs font-bold uppercase tracking-wider">Hadir</p>
            <h2 class="text-2xl font-black text-slate-800 mt-1">{{ $hadir ?? 0 }}</h2>
        </div>

        {{-- Alpha --}}
        <div class="bg-white p-5 rounded-3xl border border-slate-100 shadow-sm hover:shadow-md transition-all">
            <div class="w-10 h-10 bg-rose-50 text-rose-600 rounded-xl flex items-center justify-center mb-3 text-xl">❌</div>
            <p class="text-slate-500 text-xs font-bold uppercase tracking-wider">Alpha</p>
            <h2 class="text-2xl font-black text-slate-800 mt-1">{{ $alpha ?? 0 }}</h2>
        </div>

    </div>

    <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
        
        {{-- NILAI TABLE --}}
        {{-- FIX: Menggunakan rounded-4xl --}}
        <div class="bg-white rounded-4xl shadow-sm border border-slate-100 overflow-hidden flex flex-col">
            <div class="p-6 border-b border-slate-50 flex items-center justify-between bg-slate-50/50">
                <h2 class="font-bold text-slate-800 flex items-center gap-2">
                    <span class="p-1.5 bg-indigo-100 text-indigo-600 rounded-lg text-sm">📝</span>
                    Capaian Nilai
                </h2>
                <span class="text-[10px] font-bold text-slate-400 uppercase tracking-widest">Semester Ini</span>
            </div>
            <div class="overflow-x-auto flex-1">
                <table class="w-full text-sm">
                    <thead>
                        <tr class="text-left text-[10px] font-bold text-slate-400 uppercase tracking-widest border-b border-slate-50">
                            <th class="px-6 py-4">Mata Pelajaran</th>
                            <th class="px-4 py-4 text-center">UTS/UAS</th>
                            <th class="px-6 py-4 text-right">Total</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-50">
                        @forelse($nilai as $n)
                        <tr class="group hover:bg-slate-50/80 transition-colors">
                            <td class="px-6 py-4 font-bold text-slate-700">
                                {{ $n->mataPelajaran->nama ?? '-' }}
                            </td>
                            <td class="px-4 py-4 text-center text-slate-500">
                                <span class="bg-slate-100 px-2 py-1 rounded text-[10px]">{{ $n->uts }}</span>
                                <span class="mx-1">/</span>
                                <span class="bg-slate-100 px-2 py-1 rounded text-[10px]">{{ $n->uas }}</span>
                            </td>
                            <td class="px-6 py-4 text-right">
                                <span class="inline-block px-3 py-1 rounded-full bg-blue-50 text-blue-600 font-black text-xs">
                                    {{ $n->total_nilai }}
                                </span>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="3" class="px-6 py-10 text-center text-slate-400 italic">Belum ada data nilai.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        {{-- ABSENSI TABLE --}}
        {{-- FIX: Menggunakan rounded-4xl --}}
        <div class="bg-white rounded-4xl shadow-sm border border-slate-100 overflow-hidden flex flex-col">
            <div class="p-6 border-b border-slate-50 flex items-center justify-between bg-slate-50/50">
                <h2 class="font-bold text-slate-800 flex items-center gap-2">
                    <span class="p-1.5 bg-emerald-100 text-emerald-600 rounded-lg text-sm">📅</span>
                    Presensi Terakhir
                </h2>
                <a href="{{ route('murid.absensi') }}" class="text-[10px] font-bold text-emerald-600 hover:underline uppercase tracking-widest">Lihat Semua</a>
            </div>
            <div class="overflow-x-auto flex-1">
                <table class="w-full text-sm">
                    <thead>
                        <tr class="text-left text-[10px] font-bold text-slate-400 uppercase tracking-widest border-b border-slate-50">
                            <th class="px-6 py-4">Tanggal & Mapel</th>
                            <th class="px-6 py-4 text-right">Status</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-50">
                        @forelse($absensi as $a)
                        <tr class="hover:bg-slate-50/80 transition-colors">
                            <td class="px-6 py-4">
                                <p class="text-xs text-slate-400 font-medium">{{ \Carbon\Carbon::parse($a->absensi->tanggal ?? now())->isoFormat('D MMM Y') }}</p>
                                <p class="font-bold text-slate-700 leading-tight mt-0.5">{{ $a->absensi->jadwalPelajaran->mataPelajaran->nama ?? '-' }}</p>
                            </td>
                            <td class="px-6 py-4 text-right">
                                @php
                                    $statusAbsen = $a->status_absen ?? '-';
                                    $statusClass = match ($statusAbsen) {
                                        'hadir' => 'bg-emerald-100 text-emerald-700',
                                        'izin' => 'bg-blue-100 text-blue-700',
                                        'sakit' => 'bg-amber-100 text-amber-700',
                                        'alpha' => 'bg-rose-100 text-rose-600',
                                        default => 'bg-slate-100 text-slate-500',
                                    };
                                @endphp
                                <span class="px-3 py-1 rounded-full text-[10px] font-black uppercase tracking-tighter {{ $statusClass }}">
                                    {{ $statusAbsen }}
                                </span>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="2" class="px-6 py-10 text-center text-slate-400 italic">Belum ada data absensi.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

    </div>

    {{-- PEMBAYARAN AREA --}}
    {{-- FIX: Menggunakan rounded-4xl --}}
    <div class="bg-indigo-900 rounded-4xl p-8 text-white relative overflow-hidden shadow-xl shadow-indigo-100">
        <div class="relative z-10 flex flex-col md:flex-row items-center justify-between gap-6">
            <div class="text-center md:text-left">
                <h3 class="text-xl font-bold italic">Administrasi SPP</h3>
                <p class="text-indigo-200 text-sm mt-1">Pantau status pembayaran bulanan Anda dengan mudah.</p>
            </div>
            <div class="px-6 py-3 bg-white/10 backdrop-blur-xl border border-white/20 rounded-2xl flex flex-col items-center">
                <span class="text-[10px] uppercase tracking-widest opacity-60">Status Pembayaran</span>
                <span class="text-sm font-black mt-1">🚧 Maintenance</span>
            </div>
        </div>
        {{-- Dekorasi --}}
        <div class="absolute top-0 right-0 w-32 h-32 bg-indigo-500/20 rounded-full -mr-10 -mt-10 blur-2xl"></div>
    </div>

    @endif

</div>

<style>
    .animate-fade-in {
        animation: fadeIn 0.6s ease-out;
    }
    @keyframes fadeIn {
        from { opacity: 0; transform: translateY(15px); }
        to { opacity: 1; transform: translateY(0); }
    }
</style>

@endsection
