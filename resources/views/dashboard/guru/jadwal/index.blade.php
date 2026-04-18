@extends('layouts.dashboard')

@section('title', 'Jadwal Mengajar')
@section('page_title', 'Jadwal Mengajar')

@section('content')
<div class="animate-fade-in space-y-8 px-2 md:px-0">

    {{-- HEADER --}}
    <div class="bg-white rounded-4xl p-8 shadow-sm border border-slate-100 flex flex-col md:flex-row justify-between items-center gap-4 transition-all hover:shadow-md">
        <div class="flex items-center gap-5">
            <div class="w-14 h-14 bg-emerald-50 text-emerald-600 rounded-2xl flex items-center justify-center text-2xl shadow-sm border border-emerald-100">
                <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                </svg>
            </div>
            <div>
                <h2 class="text-2xl font-black text-slate-800 uppercase tracking-tight">
                    Jadwal <span class="text-emerald-600">Mengajar</span>
                </h2>
                <p class="text-[10px] font-black text-slate-400 uppercase tracking-[0.2em] mt-1 flex items-center gap-2">
                    <span class="w-2 h-2 rounded-full bg-emerald-500"></span>
                    Tahun Ajaran 2025/2026 • Semester Ganjil
                </p>
            </div>
        </div>

        <div class="group relative px-6 py-3 bg-slate-900 rounded-2xl overflow-hidden shadow-lg shadow-slate-200 transition-all hover:scale-105">
            <div class="absolute inset-0 bg-emerald-500 translate-y-full group-hover:translate-y-0 transition-transform duration-300"></div>
            <span class="relative z-10 text-white text-[10px] font-black uppercase tracking-widest">
                Pendidik Aktif
            </span>
        </div>
    </div>

    {{-- LIST HARI --}}
    @php
        $hariList = ['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat'];
        $hariIni = \Carbon\Carbon::now()->locale('id')->translatedFormat('l');
    @endphp

    <div class="grid grid-cols-1 lg:grid-cols-2 xl:grid-cols-3 gap-8">

        @foreach($hariList as $hari)
            @php
                $dataHari = $jadwal[$hari] ?? collect();
                $isToday = (strtolower($hari) == strtolower($hariIni));
            @endphp

            <div class="bg-white rounded-4xl shadow-sm border {{ $isToday ? 'border-emerald-500 ring-4 ring-emerald-50' : 'border-slate-100' }} overflow-hidden flex flex-col transition-all duration-500 group">

                {{-- HEADER HARI --}}
                <div class="{{ $isToday ? 'bg-emerald-600' : 'bg-slate-800' }} p-6 flex justify-between items-center group-hover:bg-emerald-700 transition-colors">
                    <div class="flex flex-col">
                        <h3 class="text-white font-black uppercase tracking-[0.2em] text-sm flex items-center gap-2">
                            @if($isToday)
                                <span class="w-2 h-2 bg-white rounded-full animate-ping"></span>
                            @endif
                            {{ $hari }}
                        </h3>
                        @if($isToday)
                            <span class="text-[9px] text-emerald-200 font-bold uppercase tracking-widest mt-1">Hari Ini</span>
                        @endif
                    </div>

                    <span class="text-[10px] bg-white/10 px-3 py-1.5 rounded-xl text-white font-black border border-white/10 backdrop-blur-sm">
                        {{ $dataHari->count() }} SESI
                    </span>
                </div>

                {{-- BODY --}}
                <div class="p-6 space-y-4 flex-1 bg-linear-to-b from-white to-slate-50/50">

                    @forelse($dataHari->sortBy('mulai') as $item)

                        <div class="p-5 rounded-3xl border-2 border-slate-50 bg-white hover:border-emerald-500/30 hover:shadow-lg hover:shadow-emerald-900/5 transition-all group/item">

                            {{-- JAM --}}
                            <div class="flex justify-between items-start mb-3">
                                <span class="px-3 py-1 bg-emerald-50 text-emerald-700 rounded-lg text-[10px] font-black uppercase tracking-tighter border border-emerald-100/50">
                                    {{ $item->mulai }} - {{ $item->selesai }}
                                </span>
                                <div class="w-8 h-8 rounded-xl bg-slate-50 flex items-center justify-center text-slate-300 group-hover/item:text-emerald-500 transition-colors">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                                </div>
                            </div>

                            {{-- MAPEL --}}
                            <h4 class="font-black text-slate-800 uppercase text-sm leading-tight mb-2 group-hover/item:text-emerald-700 transition-colors">
                                {{ $item->mataPelajaran->nama ?? '-' }}
                            </h4>

                            {{-- KELAS --}}
                            <div class="flex items-center justify-between">
                                <div class="flex items-center gap-2">
                                    <div class="w-1.5 h-1.5 rounded-full bg-emerald-400 group-hover/item:scale-150 transition-transform"></div>
                                    <p class="text-[11px] font-black text-slate-500 uppercase tracking-tight">
                                        Kelas {{ $item->kelas->nama ?? '-' }}
                                    </p>
                                </div>
                                <span class="text-[9px] font-bold text-slate-300 uppercase italic">ID: {{ $item->kelas->kode ?? '??' }}</span>
                            </div>

                        </div>

                    @empty
                        <div class="py-16 text-center flex flex-col items-center group-hover:scale-105 transition-transform">
                            <div class="w-16 h-16 bg-slate-50 rounded-full flex items-center justify-center mb-4 border border-slate-100">
                                <span class="text-3xl opacity-40 grayscale">☕</span>
                            </div>
                            <p class="text-[10px] font-black uppercase tracking-[0.2em] text-slate-400">
                                Tidak ada jadwal
                            </p>
                        </div>
                    @endforelse

                </div>
            </div>

        @endforeach

    </div>

    {{-- NOTE --}}
    <div class="bg-linear-to-r from-emerald-600 to-emerald-800 rounded-4xl p-1 shadow-xl shadow-emerald-900/10">
        <div class="bg-white/5 backdrop-blur-sm rounded-[2.2rem] p-7 flex flex-col md:flex-row gap-5 items-center">
            <div class="w-14 h-14 bg-white/20 rounded-2xl flex items-center justify-center text-2xl shadow-inner border border-white/30">
                <span class="animate-bounce">💡</span>
            </div>
            <div class="text-center md:text-left">
                <h5 class="text-xs font-black text-white uppercase tracking-[0.3em]">
                    Informasi Perubahan Jadwal
                </h5>
                <p class="text-sm text-emerald-100 mt-1 font-medium opacity-80">
                    Jika terdapat ketidaksesuaian jadwal atau bentrok sesi, silakan segera hubungi bagian <span class="font-black text-white underline decoration-emerald-400 underline-offset-4">Kurikulum</span>.
                </p>
            </div>
        </div>
    </div>

</div>

<style>
    .animate-fade-in {
        animation: fadeIn 0.7s cubic-bezier(0.4, 0, 0.2, 1);
    }
    @keyframes fadeIn {
        from { opacity: 0; transform: translateY(20px); }
        to { opacity: 1; transform: translateY(0); }
    }
</style>
@endsection