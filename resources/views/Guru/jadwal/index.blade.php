@extends('layouts.dashboard')

@section('title', 'Jadwal Mengajar')

@section('content')
<div class="animate-fade-in space-y-8 px-2 md:px-0">
    {{-- Header --}}
    <div class="bg-white rounded-4xl p-8 shadow-sm border border-slate-100 flex flex-col md:flex-row justify-between items-center gap-4">
        <div class="flex items-center gap-5">
            <div class="w-14 h-14 bg-emerald-50 rounded-2xl flex items-center justify-center text-2xl shadow-sm">
                📅
            </div>
            <div>
                <h2 class="text-2xl font-black text-slate-800 uppercase tracking-tight">Jadwal Mengajar</h2>
                <p class="text-[10px] font-black text-slate-400 uppercase tracking-[0.2em] mt-1">
                    Tahun Ajaran 2025/2026 • Semester Ganjil
                </p>
            </div>
        </div>
        <div class="px-6 py-3 bg-emerald-500 rounded-2xl text-white text-[10px] font-black uppercase tracking-widest shadow-lg shadow-emerald-200">
            Pendidik Aktif
        </div>
    </div>

    {{-- Grid Jadwal per Hari --}}
    <div class="grid grid-cols-1 lg:grid-cols-2 xl:grid-cols-3 gap-8">
        
        {{-- Contoh Blok Hari (Lakukan @foreach di sini nanti) --}}
        @php
            $hariList = ['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat'];
        @endphp

        @foreach($hariList as $hari)
        <div class="bg-white rounded-4xl shadow-sm border border-slate-100 overflow-hidden flex flex-col">
            {{-- Nama Hari --}}
            <div class="bg-slate-800 p-5">
                <h3 class="text-white font-black uppercase tracking-[0.2em] text-sm flex items-center justify-between">
                    {{ $hari }}
                    <span class="text-[9px] bg-white/10 px-2 py-1 rounded-lg">3 Sesi</span>
                </h3>
            </div>

            {{-- List Mata Pelajaran --}}
            <div class="p-6 space-y-4 flex-1">
                {{-- Sesi 1 --}}
                <div class="group p-4 rounded-3xl border-2 border-slate-50 hover:border-emerald-500/20 hover:bg-emerald-50/30 transition-all cursor-default">
                    <div class="flex justify-between items-start mb-2">
                        <span class="text-[10px] font-black text-emerald-600 uppercase tracking-widest">07:30 - 09:00</span>
                        <span class="text-[10px] font-black text-slate-400">SESI 1</span>
                    </div>
                    <h4 class="font-black text-slate-700 uppercase text-sm leading-tight mb-1">Pemrograman Web (Laravel)</h4>
                    <div class="flex items-center gap-2">
                        <span class="w-1.5 h-1.5 rounded-full bg-slate-300"></span>
                        <p class="text-[10px] font-bold text-slate-500 uppercase tracking-tighter">Kelas XI RPL 1</p>
                    </div>
                </div>

                {{-- Sesi 2 --}}
                <div class="group p-4 rounded-3xl border-2 border-slate-50 hover:border-emerald-500/20 hover:bg-emerald-50/30 transition-all">
                    <div class="flex justify-between items-start mb-2">
                        <span class="text-[10px] font-black text-emerald-600 uppercase tracking-widest">09:15 - 11:00</span>
                        <span class="text-[10px] font-black text-slate-400">SESI 2</span>
                    </div>
                    <h4 class="font-black text-slate-700 uppercase text-sm leading-tight mb-1">Basis Data (MySQL)</h4>
                    <div class="flex items-center gap-2">
                        <span class="w-1.5 h-1.5 rounded-full bg-slate-300"></span>
                        <p class="text-[10px] font-bold text-slate-500 uppercase tracking-tighter">Kelas X RPL 2</p>
                    </div>
                </div>

                {{-- Jika Tidak Ada Jadwal --}}
                @if($hari == 'Jumat')
                <div class="py-10 text-center flex flex-col items-center opacity-30">
                    <span class="text-3xl mb-2">☕</span>
                    <p class="text-[9px] font-black uppercase tracking-widest text-slate-500">Tidak ada jam mengajar</p>
                </div>
                @endif
            </div>
        </div>
        @endforeach

    </div>

    {{-- Note Penting --}}
    <div class="bg-amber-50 rounded-3xl p-6 border border-amber-100">
        <div class="flex gap-4">
            <span class="text-xl">💡</span>
            <div>
                <h5 class="text-[11px] font-black text-amber-800 uppercase tracking-widest">Informasi Perubahan</h5>
                <p class="text-xs text-amber-700/80 mt-1 font-medium">Jika terdapat ketidaksesuaian jadwal atau bentrok dengan kegiatan lain, harap segera hubungi bagian Kurikulum.</p>
            </div>
        </div>
    </div>
</div>
@endsection