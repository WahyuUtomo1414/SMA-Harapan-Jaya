@extends('layouts.dashboard')

@section('title', 'Dashboard Guru')
@section('page_title', 'Dashboard')

@section('content')
<div class="space-y-8 animate-fade-in">

    {{-- HEADER WITH MODERN GRADIENT --}}
    <div class="relative overflow-hidden bg-linear-to-br from-emerald-600 via-emerald-700 to-slate-900 rounded-4xl p-10 shadow-xl shadow-emerald-900/20">
        <div class="relative z-10 flex flex-col md:flex-row md:items-center justify-between gap-6">
            <div>
                <h1 class="text-4xl font-black text-white tracking-tight">
                    Halo, Selamat Datang! 👋
                </h1>
                <p class="text-emerald-100 text-lg mt-3 font-medium max-w-md opacity-90">
                    Pantau aktivitas mengajar dan perkembangan akademik siswa Anda dalam satu dasbor terpadu.
                </p>
            </div>
            <div class="hidden lg:block bg-white/10 backdrop-blur-md border border-white/20 p-5 rounded-3xl text-white shadow-2xl transition-all hover:bg-white/15">
                <div class="flex flex-col items-start gap-0.5">
                    <div class="flex items-center gap-2 mb-1">
                        <span class="relative flex h-2 w-2">
                            <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-emerald-400 opacity-75"></span>
                            <span class="relative inline-flex rounded-full h-2 w-2 bg-emerald-500"></span>
                        </span>
                        <p class="text-[9px] uppercase tracking-[0.3em] font-black text-emerald-300 opacity-90">
                            Sistem Aktif
                        </p>
                    </div>
            
                    <p class="text-2xl font-black tracking-tight leading-none">
                        {{ \Carbon\Carbon::now()->locale('id')->translatedFormat('d') }}
                        <span class="text-emerald-200">{{ \Carbon\Carbon::now()->locale('id')->translatedFormat('F') }}</span>
                        {{ \Carbon\Carbon::now()->locale('id')->translatedFormat('Y') }}
                    </p>
            
                    <p class="text-[11px] font-bold mt-1.5 opacity-60 tracking-[0.15em] uppercase flex items-center gap-2">
                        <span class="w-4 h-px bg-white/30"></span>
                        {{-- Tambahkan ->locale('id') di sini agar jadi "Kamis" --}}
                        Hari {{ \Carbon\Carbon::now()->locale('id')->translatedFormat('l') }}
                    </p>
                </div>
            </div>
        </div>
        
        {{-- Dekorasi Abstract --}}
        <div class="absolute -right-10 -bottom-10 w-80 h-80 bg-emerald-400/20 rounded-full blur-3xl"></div>
        <div class="absolute -left-10 -top-10 w-64 h-64 bg-white/5 rounded-full blur-2xl"></div>
    </div>

    {{-- ALERT DATA TIDAK DITEMUKAN --}}
    @if(!$guru)
        <div class="flex items-center gap-5 bg-white border border-rose-100 p-8 rounded-4xl shadow-sm">
            <div class="w-14 h-14 bg-rose-50 text-rose-500 rounded-2xl flex items-center justify-center shrink-0 text-3xl shadow-inner">
                ⚠️
            </div>
            <div>
                <p class="font-black text-slate-800 uppercase tracking-tight">Akses Terbatas</p>
                <p class="text-sm text-slate-500 font-medium">Data profil guru tidak ditemukan dalam sistem. Harap segera hubungi Administrator IT.</p>
            </div>
        </div>
    @else

    {{-- TOP STATS - EMERALD STYLE --}}
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
        
        {{-- CARD JADWAL --}}
        <div class="group bg-white rounded-4xl p-2 shadow-sm border border-slate-100 hover:border-emerald-200 transition-all duration-300">
            <div class="p-8">
                <div class="flex items-center justify-between mb-6">
                    <div class="p-4 rounded-2xl bg-slate-50 text-slate-700 group-hover:bg-emerald-600 group-hover:text-white transition-all duration-500 shadow-sm">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-7 h-7" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                        </svg>
                    </div>
                    <span class="text-[9px] font-black text-slate-400 uppercase tracking-[0.2em] bg-slate-50 px-3 py-1 rounded-full">Weekly</span>
                </div>
                <p class="text-slate-400 text-[10px] font-black uppercase tracking-[0.2em]">Sesi Mengajar</p>
                <h2 class="text-5xl font-black text-slate-800 tracking-tighter mt-1 group-hover:text-emerald-700 transition-colors">{{ $totalJadwal }}</h2>
            </div>
        </div>

        {{-- CARD ABSENSI --}}
        <div class="group bg-white rounded-4xl p-2 shadow-sm border border-slate-100 hover:border-emerald-200 transition-all duration-300">
            <div class="p-8">
                <div class="flex items-center justify-between mb-6">
                    <div class="p-4 rounded-2xl bg-slate-50 text-slate-700 group-hover:bg-emerald-600 group-hover:text-white transition-all duration-500 shadow-sm">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-7 h-7" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4" />
                        </svg>
                    </div>
                    <span class="text-[9px] font-black text-emerald-500 uppercase tracking-[0.2em] bg-emerald-50 px-3 py-1 rounded-full border border-emerald-100">Live</span>
                </div>
                <p class="text-slate-400 text-[10px] font-black uppercase tracking-[0.2em]">Catatan Presensi</p>
                <h2 class="text-5xl font-black text-slate-800 tracking-tighter mt-1 group-hover:text-emerald-700 transition-colors">{{ $totalAbsensi }}</h2>
            </div>
        </div>

        {{-- CARD NILAI --}}
        <div class="group bg-white rounded-4xl p-2 shadow-sm border border-slate-100 hover:border-emerald-200 transition-all duration-300 sm:col-span-2 lg:col-span-1">
            <div class="p-8">
                <div class="flex items-center justify-between mb-6">
                    <div class="p-4 rounded-2xl bg-slate-50 text-slate-700 group-hover:bg-emerald-600 group-hover:text-white transition-all duration-500 shadow-sm">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-7 h-7" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                        </svg>
                    </div>
                    <span class="text-[9px] font-black text-slate-400 uppercase tracking-[0.2em] bg-slate-50 px-3 py-1 rounded-full">Academic</span>
                </div>
                <p class="text-slate-400 text-[10px] font-black uppercase tracking-[0.2em]">Entri Nilai</p>
                <h2 class="text-5xl font-black text-slate-800 tracking-tighter mt-1 group-hover:text-emerald-700 transition-colors">{{ $totalNilai }}</h2>
            </div>
        </div>

    </div>

    {{-- ACADEMIC SUMMARY --}}
    <div class="bg-white p-3 rounded-[3rem] border border-slate-100 shadow-sm">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-3">
            
            <div class="p-10 rounded-4xl bg-slate-50 flex flex-col items-center text-center group hover:bg-emerald-50 transition-colors duration-500">
                <span class="text-[10px] font-black text-slate-400 group-hover:text-emerald-500 uppercase tracking-[0.3em] mb-3">Indeks Rata-rata</span>
                <p class="text-5xl font-black text-slate-800 group-hover:text-emerald-700 transition-colors">{{ number_format($rataNilai, 1) }}</p>
                <div class="w-full h-2 bg-slate-200 rounded-full mt-6 overflow-hidden">
                    <div class="h-full bg-emerald-500 rounded-full shadow-[0_0_10px_rgba(16,185,129,0.5)]" style="width: {{ $rataNilai }}%"></div>
                </div>
            </div>

            <div class="p-10 rounded-4xl bg-white flex flex-col items-center text-center border border-slate-50 shadow-inner">
                <span class="text-[10px] font-black text-emerald-500 uppercase tracking-[0.3em] mb-3">Skor Tertinggi</span>
                <p class="text-5xl font-black text-emerald-600">{{ $maxNilai }}</p>
                <div class="mt-5 px-5 py-1.5 bg-emerald-500 text-white rounded-full text-[9px] font-black uppercase tracking-widest shadow-lg shadow-emerald-500/30">Capaian Terbaik</div>
            </div>

            <div class="p-10 rounded-4xl bg-slate-50 flex flex-col items-center text-center group hover:bg-rose-50 transition-colors duration-500">
                <span class="text-[10px] font-black text-slate-400 group-hover:text-rose-500 uppercase tracking-[0.3em] mb-3">Skor Terendah</span>
                <p class="text-5xl font-black text-slate-800 group-hover:text-rose-700 transition-colors">{{ $minNilai }}</p>
                <div class="mt-5 px-5 py-1.5 bg-rose-100 text-rose-600 rounded-full text-[9px] font-black uppercase tracking-widest border border-rose-200">Perlu Review</div>
            </div>

        </div>
    </div>

    {{-- JADWAL TABLE SECTION --}}
    <div class="bg-white rounded-4xl shadow-sm border border-slate-100 overflow-hidden">
        
        <div class="px-10 py-8 border-b border-slate-50 flex items-center justify-between bg-slate-50/30">
            <div>
                <h2 class="text-2xl font-black text-slate-800 flex items-center gap-4">
                    <span class="w-2 h-8 bg-emerald-600 rounded-full shadow-lg shadow-emerald-600/20"></span>
                    Agenda Mengajar
                </h2>
                <p class="text-[10px] text-slate-400 mt-1 uppercase font-black tracking-[0.2em]">Semester Ganjil 2023/2024</p>
            </div>
            <div class="flex items-center gap-2">
                <span class="w-3 h-3 bg-emerald-500 rounded-full animate-pulse"></span>
                <span class="text-[10px] font-black text-slate-400 uppercase tracking-widest">Live Updates</span>
            </div>
        </div>

        <div class="overflow-x-auto">
            <table class="w-full">
                <thead>
                    <tr class="text-left text-[10px] font-black text-slate-400 uppercase tracking-[0.2em] border-b border-slate-50">
                        <th class="px-10 py-6">Hari</th>
                        <th class="px-10 py-6">Ruang & Kelas</th>
                        <th class="px-10 py-6">Mata Pelajaran</th>
                        <th class="px-10 py-6 text-right">Durasi Waktu</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-50">
                    @forelse($jadwal as $j)
                    <tr class="group hover:bg-emerald-50/40 transition-all duration-300">
                        <td class="px-10 py-7">
                            <span class="px-4 py-2 bg-slate-100 text-slate-700 rounded-2xl font-black text-[10px] uppercase group-hover:bg-emerald-700 group-hover:text-white transition-all shadow-sm">
                                {{ $j->hari }}
                            </span>
                        </td>
                        <td class="px-10 py-7">
                            <div class="flex items-center gap-4">
                                <div class="w-12 h-12 rounded-2xl bg-slate-900 flex items-center justify-center text-white text-xs font-black shadow-xl group-hover:bg-emerald-600 transition-colors shadow-slate-900/10">
                                    {{ substr($j->kelas->kode ?? '?', 0, 3) }}
                                </div>
                                <span class="font-black text-slate-700 text-base tracking-tight group-hover:text-emerald-900 transition-colors">{{ $j->kelas->kode ?? '-' }}</span>
                            </div>
                        </td>
                        <td class="px-10 py-7">
                            <div class="flex flex-col">
                                <span class="text-slate-800 font-black text-sm uppercase tracking-tight">{{ $j->mataPelajaran->nama ?? '-' }}</span>
                                <span class="text-[10px] text-slate-400 font-bold uppercase tracking-widest mt-0.5">Teori & Praktikum</span>
                            </div>
                        </td>
                        <td class="px-10 py-7 text-right">
                            <div class="inline-flex items-center gap-3 px-5 py-2.5 bg-emerald-50 text-emerald-700 rounded-2xl font-black text-xs tracking-tight border border-emerald-100 shadow-sm">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 opacity-70" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="3">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                                {{ $j->mulai }} — {{ $j->selesai }}
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="4" class="px-10 py-24 text-center">
                            <div class="flex flex-col items-center">
                                <div class="w-20 h-20 bg-slate-50 rounded-full flex items-center justify-center mb-4 border border-slate-100 shadow-inner">
                                    <span class="text-4xl grayscale">📅</span>
                                </div>
                                <p class="text-slate-400 font-black text-xs uppercase tracking-[0.3em]">Belum ada jadwal mengajar yang terdaftar</p>
                            </div>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        
        <div class="px-10 py-6 bg-slate-50/80 border-t border-slate-100 text-[9px] text-slate-400 font-black uppercase tracking-[0.4em] text-center">
            Sistem Informasi Akademik v2.0 • SMA Harapan Jaya
        </div>

    </div>

    @endif

</div>

<style>
    .animate-fade-in {
        animation: fadeIn 0.8s cubic-bezier(0.4, 0, 0.2, 1);
    }
    @keyframes fadeIn {
        from { opacity: 0; transform: translateY(30px); }
        to { opacity: 1; transform: translateY(0); }
    }
</style>
@endsection