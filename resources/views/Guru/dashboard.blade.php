@extends('layouts.dashboard')

@section('title', 'Dashboard Guru')

@section('content')
<div class="space-y-8 animate-fade-in">

    {{-- HEADER WITH ILLUSTRATION STYLE --}}
    {{-- FIX: Menggunakan bg-linear-to-br dan rounded-4xl --}}
    <div class="relative overflow-hidden bg-linear-to-br from-indigo-600 via-blue-600 to-blue-700 rounded-4xl p-8 shadow-xl shadow-blue-200/50">
        <div class="relative z-10 flex flex-col md:flex-row md:items-center justify-between gap-4">
            <div>
                <h1 class="text-3xl font-extrabold text-white tracking-tight">
                    Halo, Selamat Datang! 👋
                </h1>
                <p class="text-blue-100 text-lg mt-2 font-light max-w-md">
                    Pantau aktivitas mengajar dan perkembangan akademik siswa Anda di sini.
                </p>
            </div>
            <div class="hidden lg:block bg-white/10 backdrop-blur-md border border-white/20 p-4 rounded-2xl text-white">
                <p class="text-[10px] uppercase tracking-widest opacity-70 font-bold mb-1">Hari Ini</p>
                <p class="text-xl font-bold">{{ \Carbon\Carbon::now()->isoFormat('dddd, D MMMM Y') }}</p>
            </div>
        </div>
        
        {{-- Dekorasi Abstract --}}
        <div class="absolute -right-10 -bottom-10 w-64 h-64 bg-white/10 rounded-full blur-3xl"></div>
        <div class="absolute -left-10 -top-10 w-48 h-48 bg-indigo-400/20 rounded-full blur-2xl"></div>
    </div>

    {{-- ALERT DATA TIDAK DITEMUKAN --}}
    @if(!$guru)
        {{-- FIX: Menggunakan rounded-4xl dan shrink-0 --}}
        <div class="flex items-center gap-4 bg-white border border-red-100 p-6 rounded-4xl shadow-sm">
            <div class="w-12 h-12 bg-red-50 text-red-500 rounded-full flex items-center justify-center shrink-0 text-2xl">
                ⚠️
            </div>
            <div>
                <p class="font-bold text-slate-800">Akses Terbatas</p>
                <p class="text-sm text-slate-500">Data profil guru tidak ditemukan dalam database. Silakan hubungi admin.</p>
            </div>
        </div>
    @else

    {{-- TOP STATS --}}
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
        
        {{-- CARD JADWAL --}}
        <div class="group bg-white rounded-4xl p-2 shadow-sm border border-slate-100 hover:shadow-md transition-all">
            <div class="p-6">
                <div class="flex items-center justify-between mb-4">
                    <div class="p-3 rounded-2xl bg-blue-50 text-blue-600 group-hover:bg-blue-600 group-hover:text-white transition-all duration-300">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                        </svg>
                    </div>
                    <span class="text-[10px] font-black text-slate-400 uppercase tracking-widest">Per Minggu</span>
                </div>
                <p class="text-slate-400 text-xs font-bold uppercase tracking-tighter">Total Jadwal</p>
                <h2 class="text-4xl font-black text-slate-800 tracking-tight mt-1">{{ $totalJadwal }}</h2>
            </div>
        </div>

        {{-- CARD ABSENSI --}}
        <div class="group bg-white rounded-4xl p-2 shadow-sm border border-slate-100 hover:shadow-md transition-all">
            <div class="p-6">
                <div class="flex items-center justify-between mb-4">
                    <div class="p-3 rounded-2xl bg-emerald-50 text-emerald-600 group-hover:bg-emerald-600 group-hover:text-white transition-all duration-300">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4" />
                        </svg>
                    </div>
                    <span class="text-[10px] font-black text-slate-400 uppercase tracking-widest">Terproses</span>
                </div>
                <p class="text-slate-400 text-xs font-bold uppercase tracking-tighter">Total Absensi</p>
                <h2 class="text-4xl font-black text-slate-800 tracking-tight mt-1">{{ $totalAbsensi }}</h2>
            </div>
        </div>

        {{-- CARD NILAI --}}
        <div class="group bg-white rounded-4xl p-2 shadow-sm border border-slate-100 hover:shadow-md transition-all sm:col-span-2 lg:col-span-1">
            <div class="p-6">
                <div class="flex items-center justify-between mb-4">
                    <div class="p-3 rounded-2xl bg-purple-50 text-purple-600 group-hover:bg-purple-600 group-hover:text-white transition-all duration-300">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                        </svg>
                    </div>
                    <span class="text-[10px] font-black text-slate-400 uppercase tracking-widest">Input Data</span>
                </div>
                <p class="text-slate-400 text-xs font-bold uppercase tracking-tighter">Total Nilai</p>
                <h2 class="text-4xl font-black text-slate-800 tracking-tight mt-1">{{ $totalNilai }}</h2>
            </div>
        </div>

    </div>

    {{-- ACADEMIC SUMMARY --}}
    <div class="bg-white p-2 rounded-[2.5rem] border border-slate-100 shadow-sm">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-2">
            
            <div class="p-8 rounded-4xl bg-linear-to-br from-blue-50/50 to-indigo-50/50 flex flex-col items-center text-center">
                <span class="text-[10px] font-black text-blue-400 uppercase tracking-[0.2em] mb-2">Rata-rata</span>
                <p class="text-4xl font-black text-blue-700">{{ number_format($rataNilai, 1) }}</p>
                <div class="w-full h-1.5 bg-blue-200/30 rounded-full mt-5 overflow-hidden">
                    <div class="h-full bg-blue-500 rounded-full" style="width: {{ $rataNilai }}%"></div>
                </div>
            </div>

            <div class="p-8 rounded-4xl bg-white flex flex-col items-center text-center border border-slate-50">
                <span class="text-[10px] font-black text-emerald-400 uppercase tracking-[0.2em] mb-2">Tertinggi</span>
                <p class="text-4xl font-black text-emerald-700">{{ $maxNilai }}</p>
                <div class="mt-4 px-3 py-1 bg-emerald-100 text-emerald-700 rounded-full text-[9px] font-black uppercase tracking-widest">Prestasi Terbaik</div>
            </div>

            <div class="p-8 rounded-4xl bg-linear-to-br from-rose-50/50 to-orange-50/50 flex flex-col items-center text-center">
                <span class="text-[10px] font-black text-rose-400 uppercase tracking-[0.2em] mb-2">Terendah</span>
                <p class="text-4xl font-black text-rose-700">{{ $minNilai }}</p>
                <div class="mt-4 px-3 py-1 bg-rose-100 text-rose-700 rounded-full text-[9px] font-black uppercase tracking-widest">Butuh Evaluasi</div>
            </div>

        </div>
    </div>

    {{-- JADWAL TABLE SECTION --}}
    <div class="bg-white rounded-[2.5rem] shadow-sm border border-slate-100 overflow-hidden">
        
        <div class="px-8 py-7 border-b border-slate-50 flex items-center justify-between bg-slate-50/30">
            <div>
                <h2 class="text-xl font-black text-slate-800 flex items-center gap-3">
                    <span class="w-1.5 h-6 bg-indigo-500 rounded-full"></span>
                    Jadwal Mengajar
                </h2>
                <p class="text-[10px] text-slate-400 mt-1 uppercase font-bold tracking-[0.15em]">Tahun Ajaran 2023/2024</p>
            </div>
        </div>

        <div class="overflow-x-auto">
            <table class="w-full">
                <thead>
                    <tr class="text-left text-[10px] font-black text-slate-400 uppercase tracking-[0.2em] border-b border-slate-50">
                        <th class="px-8 py-5">Hari</th>
                        <th class="px-8 py-5">Kelas</th>
                        <th class="px-8 py-5">Mata Pelajaran</th>
                        <th class="px-8 py-5 text-right">Waktu</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-50">
                    @forelse($jadwal as $j)
                    <tr class="group hover:bg-slate-50/80 transition-all duration-200">
                        <td class="px-8 py-6">
                            <span class="px-3 py-1.5 bg-slate-100 text-slate-600 rounded-xl font-black text-[10px] uppercase group-hover:bg-indigo-600 group-hover:text-white transition-all">
                                {{ $j->hari }}
                            </span>
                        </td>
                        <td class="px-8 py-6">
                            <div class="flex items-center gap-3">
                                <div class="w-9 h-9 rounded-xl bg-slate-800 flex items-center justify-center text-white text-[10px] font-black shadow-sm group-hover:bg-indigo-500 transition-colors">
                                    {{ substr($j->kelas->kode ?? '?', 0, 2) }}
                                </div>
                                <span class="font-bold text-slate-700 text-sm tracking-tight">{{ $j->kelas->kode ?? '-' }}</span>
                            </div>
                        </td>
                        <td class="px-8 py-6">
                            <span class="text-slate-600 font-bold text-sm">{{ $j->mataPelajaran->nama ?? '-' }}</span>
                        </td>
                        <td class="px-8 py-6 text-right">
                            <div class="inline-flex items-center gap-2 px-4 py-2 bg-indigo-50 text-indigo-700 rounded-2xl font-black text-[10px] tracking-wide">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-3.5 w-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                                {{ $j->mulai }} - {{ $j->selesai }}
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="4" class="px-8 py-20 text-center">
                            <div class="flex flex-col items-center">
                                <span class="text-4xl mb-4">📭</span>
                                <p class="text-slate-400 font-bold text-sm uppercase tracking-widest">Belum ada jadwal hari ini</p>
                            </div>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        
        <div class="px-8 py-5 bg-slate-50/50 text-[9px] text-slate-400 font-black uppercase tracking-[0.3em] text-center">
            Informasi Jadwal Terupdate Otomatis
        </div>

    </div>

    @endif

</div>

<style>
    .animate-fade-in {
        animation: fadeIn 0.6s cubic-bezier(0.4, 0, 0.2, 1);
    }
    @keyframes fadeIn {
        from { opacity: 0; transform: translateY(20px); }
        to { opacity: 1; transform: translateY(0); }
    }
</style>
@endsection