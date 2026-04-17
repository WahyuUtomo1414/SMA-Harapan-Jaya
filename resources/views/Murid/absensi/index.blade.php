@extends('layouts.dashboard')

@section('title', 'Rekap Presensi Mapel')

@section('content')
<div class="animate-fade-in space-y-6 px-2 md:px-0">

    {{-- HEADER --}}
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">

        {{-- CARD RATA-RATA --}}
        <div class="bg-emerald-600 rounded-4xl p-8 text-white shadow-xl relative overflow-hidden">

            <p class="text-[10px] font-black uppercase tracking-[0.2em] opacity-70">
                Rata-Rata Kehadiran
            </p>

            <div class="flex items-baseline gap-2 mt-2">
                <h3 class="text-6xl font-black italic">
                    {{ round($dataAbsenMapel->avg('persen') ?? 0) }}
                </h3>
                <span class="text-sm font-bold opacity-70">%</span>
            </div>

            <p class="mt-6 text-[9px] font-black uppercase tracking-widest text-emerald-100 italic">
                Rekap Otomatis dari Database
            </p>
        </div>

        {{-- INFO BOX --}}
        <div class="bg-white rounded-4xl p-8 border shadow-sm md:col-span-2">

            <h4 class="text-xl font-black text-slate-800 uppercase tracking-tighter italic">
                Informasi Presensi
            </h4>

            <div class="grid grid-cols-3 gap-4 mt-6">

                <div class="p-4 rounded-3xl bg-slate-50 text-center">
                    <p class="text-[8px] font-black text-slate-400 uppercase">Sakit</p>
                    <p class="text-lg font-black text-amber-500">
                        {{ $dataAbsenMapel->sum('sakit') ?? 0 }}
                    </p>
                </div>

                <div class="p-4 rounded-3xl bg-slate-50 text-center">
                    <p class="text-[8px] font-black text-slate-400 uppercase">Izin</p>
                    <p class="text-lg font-black text-indigo-500">
                        {{ $dataAbsenMapel->sum('izin') ?? 0 }}
                    </p>
                </div>

                <div class="p-4 rounded-3xl bg-rose-50 text-center">
                    <p class="text-[8px] font-black text-rose-400 uppercase">Alpa</p>
                    <p class="text-lg font-black text-rose-600">
                        {{ $dataAbsenMapel->sum('non') ?? 0 }}
                    </p>
                </div>

            </div>
        </div>
    </div>

    {{-- TABLE --}}
    <div class="bg-white rounded-4xl shadow-sm border overflow-hidden">

        <div class="p-8 border-b">
            <h3 class="font-black text-slate-800 uppercase text-sm tracking-[0.15em]">
                Laporan Kehadiran Per Mapel
            </h3>
        </div>

        <div class="overflow-x-auto">

            <table class="w-full min-w-200">

                <thead>
                    <tr class="bg-slate-50 text-[10px] font-black text-slate-400 uppercase">
                        <th class="px-8 py-6 text-left">Mata Pelajaran</th>
                        <th class="px-6 py-6 text-center">Total</th>
                        <th class="px-6 py-6 text-center">Hadir</th>
                        <th class="px-6 py-6 text-center">Tidak Hadir</th>
                        <th class="px-8 py-6 text-center">Persentase</th>
                    </tr>
                </thead>

                <tbody class="divide-y">

                    @forelse($dataAbsenMapel as $m)

                    <tr class="hover:bg-slate-50/30 transition">

                        <td class="px-8 py-6 font-black text-slate-700 uppercase">
                            {{ $m['nama'] }}
                        </td>

                        <td class="text-center font-bold">{{ $m['total'] }}</td>
                        <td class="text-center font-bold text-emerald-600">{{ $m['hadir'] }}</td>
                        <td class="text-center font-bold text-rose-500">{{ $m['non'] }}</td>

                        <td class="text-center">
                            <span class="px-3 py-1 rounded-xl font-black text-xs
                                {{ $m['persen'] == 100 ? 'bg-emerald-50 text-emerald-600' : 'bg-amber-50 text-amber-600' }}">
                                {{ $m['persen'] }}%
                            </span>
                        </td>

                    </tr>

                    @empty
                    <tr>
                        <td colspan="5" class="text-center py-10 text-gray-400 font-bold">
                            Tidak ada data absensi
                        </td>
                    </tr>
                    @endforelse

                </tbody>

            </table>
        </div>
    </div>

</div>
@endsection