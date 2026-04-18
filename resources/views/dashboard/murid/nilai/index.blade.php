@extends('layouts.dashboard')

@section('title', 'Laporan Nilai')
@section('page_title', 'Laporan Nilai')

@section('content')
@php
    // 🔥 Hitung rata-rata
    $rataRata = $nilai->avg('total_nilai') ?? 0;

    // 🔥 Hitung tuntas & remedial
    $tuntas = $nilai->where('total_nilai', '>=', 75)->count();
    $remedial = $nilai->where('total_nilai', '<', 75)->count();

    // 🔥 Predikat
    if ($rataRata >= 90) {
        $predikat = 'Sangat Baik';
    } elseif ($rataRata >= 75) {
        $predikat = 'Baik';
    } else {
        $predikat = 'Perlu Perbaikan';
    }
@endphp

<div class="animate-fade-in space-y-4 md:space-y-6 px-4 md:px-0 pb-10">

    {{-- HEADER --}}
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-4 md:gap-6">

        {{-- IPK --}}
        <div class="bg-emerald-600 rounded-3xl md:rounded-4xl p-6 md:p-8 text-white shadow-xl relative overflow-hidden">
            <p class="text-[10px] font-black uppercase opacity-80">Rata-Rata Nilai</p>

            <div class="flex items-baseline gap-2 mt-2">
                <h3 class="text-5xl font-black italic">
                    {{ number_format($rataRata, 1) }}
                </h3>
                <span class="text-sm opacity-70">/ 100</span>
            </div>

            <div class="mt-6">
                <span class="px-3 py-1 bg-white/20 rounded-full text-[10px] font-bold">
                    Total {{ $nilai->count() }} Mapel
                </span>
            </div>
        </div>

        {{-- CAPAIAN --}}
        <div class="bg-white rounded-3xl p-6 border shadow-sm lg:col-span-2">

            <h4 class="text-xl font-black text-slate-800 uppercase">
                Capaian Akademik
            </h4>

            <div class="grid grid-cols-3 gap-4 mt-6">

                <div class="p-4 bg-slate-50 rounded-xl">
                    <p class="text-[10px] text-slate-400">Tuntas</p>
                    <p class="text-lg font-bold text-slate-700">
                        {{ $tuntas }}
                    </p>
                </div>

                <div class="p-4 bg-slate-50 rounded-xl">
                    <p class="text-[10px] text-slate-400">Remedial</p>
                    <p class="text-lg font-bold text-rose-500">
                        {{ $remedial }}
                    </p>
                </div>

                <div class="p-4 bg-indigo-50 rounded-xl">
                    <p class="text-[10px] text-indigo-400">Predikat</p>
                    <p class="text-lg font-bold text-indigo-600">
                        {{ $predikat }}
                    </p>
                </div>

            </div>
        </div>
    </div>

    {{-- TABLE --}}
    <div class="bg-white rounded-3xl shadow-sm border overflow-hidden">

        <div class="p-6 border-b flex justify-between items-center">
            <h3 class="font-bold text-slate-800">
                Rincian Nilai
            </h3>
        </div>

        <div class="overflow-x-auto">
            <table class="w-full min-w-175">

                <thead class="bg-slate-50 text-xs text-slate-400 uppercase">
                    <tr>
                        <th class="px-6 py-4 text-left">Mapel</th>
                        <th class="px-4 text-center">Tugas</th>
                        <th class="px-4 text-center">UTS</th>
                        <th class="px-4 text-center">UAS</th>
                        <th class="px-4 text-center">Total</th>
                        <th class="px-4 text-center">Status</th>
                    </tr>
                </thead>

                <tbody class="divide-y">

                    @forelse($nilai as $n)

                    @php
                        // 🔥 Hitung total kalau kosong
                        $total = $n->total_nilai ??
                            ($n->tugas * 0.4) +
                            ($n->uts * 0.3) +
                            ($n->uas * 0.3);

                        $status = $total >= 75 ? 'Tuntas' : 'Remedial';
                    @endphp

                    <tr class="hover:bg-slate-50">

                        <td class="px-6 py-4 font-semibold">
                            {{ $n->mataPelajaran->nama ?? '-' }}
                        </td>

                        <td class="px-4 text-center">{{ $n->tugas }}</td>
                        <td class="px-4 text-center">{{ $n->uts }}</td>
                        <td class="px-4 text-center">{{ $n->uas }}</td>

                        <td class="px-4 text-center font-bold">
                            {{ number_format($total, 0) }}
                        </td>

                        <td class="px-4 text-center">
                            <span class="px-3 py-1 rounded-full text-xs font-bold
                                {{ $status == 'Tuntas' ? 'bg-emerald-100 text-emerald-600' : 'bg-rose-100 text-rose-600' }}">
                                {{ $status }}
                            </span>
                        </td>

                    </tr>

                    @empty
                    <tr>
                        <td colspan="6" class="text-center py-6 text-gray-400">
                            Tidak ada data nilai
                        </td>
                    </tr>
                    @endforelse

                </tbody>
            </table>
        </div>
    </div>

</div>
@endsection