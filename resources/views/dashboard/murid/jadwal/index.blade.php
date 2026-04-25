@extends('layouts.dashboard')

@section('title', 'Jadwal Pelajaran')
@section('page_title', 'Jadwal Pelajaran')

@section('content')

    <div class="space-y-6 md:space-y-8 animate-fade-in pb-10 px-1 md:px-0">

        <div
            class="relative overflow-hidden bg-linear-to-br from-cyan-600 via-sky-600 to-blue-700 rounded-4xl p-6 md:p-8 shadow-2xl shadow-sky-200/40">
            <div class="relative z-10 flex flex-col md:flex-row md:items-center justify-between gap-6">
                <div>
                    <h1 class="text-2xl md:text-4xl font-black text-white tracking-tight leading-tight">
                        Jadwal Pelajaran
                    </h1>
                    <p class="text-sky-50 text-sm md:text-base mt-2 opacity-90">
                        Kelas {{ $murid?->kelas?->nama ?? ($murid?->kelas?->kode ?? '-') }}
                    </p>
                </div>

                <div class="bg-white/10 backdrop-blur-md border border-white/20 rounded-2xl p-4 text-white min-w-[220px]">
                    <p class="text-[10px] opacity-70 uppercase tracking-widest font-bold mb-1">Total Jadwal</p>
                    <p class="text-3xl font-black">{{ $jadwalPerHari->flatten(1)->count() }}</p>
                </div>
            </div>

            <div class="absolute -right-10 -top-10 w-40 h-40 md:w-64 md:h-64 bg-white/10 rounded-full blur-3xl"></div>
        </div>

        @if (!$murid || !$murid->kelas_id)
            <div
                class="bg-rose-50 border-2 border-rose-100 text-rose-700 p-8 rounded-4xl flex flex-col items-center text-center">
                <span class="text-5xl mb-4">⚠️</span>
                <h3 class="text-xl font-bold">Data Kelas Belum Tersedia</h3>
                <p class="opacity-80">Akun belum terhubung dengan data murid atau kelas. Hubungi admin sekolah.</p>
            </div>
        @elseif($jadwalPerHari->isEmpty())
            <div class="bg-white border border-slate-100 rounded-4xl p-10 text-center shadow-sm">
                <div class="w-18 h-18 mx-auto mb-4 rounded-3xl bg-slate-100 flex items-center justify-center text-4xl">🗓️
                </div>
                <h3 class="text-xl font-bold text-slate-800">Jadwal Belum Tersedia</h3>
                <p class="text-slate-400 mt-2">Belum ada jadwal pelajaran untuk kelas
                    {{ $murid?->kelas?->nama ?? ($murid?->kelas?->kode ?? '-') }}.</p>
            </div>
        @else
            <div class="grid grid-cols-1 xl:grid-cols-2 gap-6">
                @foreach ($jadwalPerHari as $hari => $items)
                    <section class="bg-white rounded-4xl border border-slate-100 shadow-sm overflow-hidden">
                        <div
                            class="px-6 md:px-8 py-5 bg-slate-50/70 border-b border-slate-100 flex items-center justify-between gap-4">
                            <div>
                                <p class="text-[10px] uppercase tracking-[0.2em] text-sky-600 font-black">Hari Belajar</p>
                                <h2 class="text-xl md:text-2xl font-black text-slate-800 mt-1">{{ $hari }}</h2>
                            </div>
                            <div
                                class="px-4 py-2 rounded-2xl bg-sky-100 text-sky-700 text-xs font-black uppercase tracking-wider">
                                {{ $items->count() }} Mata Pelajaran
                            </div>
                        </div>

                        <div class="p-4 md:p-5 space-y-4">
                            @foreach ($items as $item)
                                <article
                                    class="relative overflow-hidden rounded-3xl border border-slate-100 bg-linear-to-r from-white to-slate-50 p-5 hover:border-sky-200 hover:shadow-md transition-all">
                                    <div class="flex flex-col md:flex-row md:items-start justify-between gap-4">
                                        <div class="space-y-3 min-w-0">
                                            <div
                                                class="inline-flex items-center gap-2 px-3 py-1.5 rounded-full bg-sky-100 text-sky-700 text-[11px] font-black tracking-wider uppercase">
                                                <span>⏰</span>
                                                <span>{{ $item->mulai ?? '-' }} - {{ $item->selesai ?? '-' }}</span>
                                            </div>

                                            <div>
                                                <h3 class="text-lg font-black text-slate-800 leading-tight">
                                                    {{ $item->mataPelajaran->nama ?? '-' }}
                                                </h3>
                                                <p class="text-sm text-slate-500 mt-1">
                                                    Guru: <span
                                                        class="font-semibold text-slate-700">{{ $item->guru->nama ?? '-' }}</span>
                                                </p>
                                            </div>
                                        </div>

                                        <div
                                            class="shrink-0 px-4 py-2 rounded-2xl bg-emerald-50 text-emerald-700 text-xs font-black uppercase tracking-wider">
                                            {{ $item->kelas->nama ?? ($item->kelas->kode ?? '-') }}
                                        </div>
                                    </div>

                                    <div class="mt-4 pt-4 border-t border-slate-100">
                                        <p class="text-[11px] uppercase tracking-[0.18em] text-slate-400 font-bold mb-1">
                                            Catatan</p>
                                        <p class="text-sm text-slate-600 leading-relaxed">
                                            {{ $item->deskripsi ?: 'Belum ada deskripsi tambahan untuk jadwal ini.' }}
                                        </p>
                                    </div>
                                </article>
                            @endforeach
                        </div>
                    </section>
                @endforeach
            </div>
        @endif

    </div>

    <style>
        @keyframes fade-in {
            from {
                opacity: 0;
                transform: translateY(10px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .animate-fade-in {
            animation: fade-in 0.6s ease-out forwards;
        }
    </style>

@endsection
