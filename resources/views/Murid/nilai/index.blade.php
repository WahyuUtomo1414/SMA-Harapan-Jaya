@extends('layouts.dashboard')

@section('title', 'Laporan Nilai')

@section('content')
<div class="animate-fade-in space-y-6 px-2 md:px-0">
    {{-- Header & Ringkasan Utama --}}
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        <div class="bg-indigo-600 rounded-4xl p-8 text-white shadow-xl shadow-indigo-100 relative overflow-hidden group">
            {{-- Glow Effect - Clean Version --}}
            <div class="absolute -right-5 -top-5 opacity-10 group-hover:scale-110 transition-transform duration-700">
                <svg class="w-40 h-40" fill="currentColor" viewBox="0 0 24 24">
                    <path d="M12 14l9-5-9-5-9 5 9 5z"></path>
                    <path d="M12 14l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14z"></path>
                </svg>
            </div>
            
            <p class="text-[10px] font-black uppercase tracking-[0.2em] opacity-70">IPK / Rata-Rata Akhir</p>
            <div class="flex items-baseline gap-2 mt-2">
                <h3 class="text-6xl font-black italic">88.5</h3>
                <span class="text-sm font-bold opacity-70">/ 100</span>
            </div>
            <div class="mt-6 flex items-center gap-2">
                <span class="px-3 py-1 bg-white/20 rounded-full text-[9px] font-black uppercase tracking-tighter italic">Peringkat #5 di Kelas</span>
            </div>
        </div>

        <div class="bg-white rounded-4xl p-8 border border-slate-100 shadow-sm md:col-span-2 flex flex-col justify-between">
            <div class="flex justify-between items-start">
                <div>
                    <h4 class="text-2xl font-black text-slate-800 uppercase tracking-tighter italic">Capaian Akademik</h4>
                    <p class="text-[10px] font-black text-slate-400 mt-1 uppercase tracking-[0.2em]">Tahun Ajaran 2025/2026 • Semester Ganjil</p>
                </div>
                {{-- <button class="bg-slate-900 text-white px-5 py-3 rounded-2xl font-black text-[10px] uppercase tracking-widest hover:bg-indigo-600 transition-colors flex items-center gap-2">
                    <span>CETAK RAPOR</span>
                    <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M17 17h2a2 2 0 002-2v-4a2 2 0 00-2-2H5a2 2 0 00-2 2v4a2 2 0 002 2h2m2 4h6a2 2 0 002-2v-4a2 2 0 00-2-2H9a2 2 0 00-2 2v4a2 2 0 002 2zm8-12V5a2 2 0 00-2-2H9a2 2 0 00-2 2v4h10z"></path>
                    </svg>
                </button> --}}
            </div>
            <div class="grid grid-cols-3 gap-4 mt-6">
                <div class="p-4 rounded-3xl bg-slate-50 border border-slate-100">
                    <p class="text-[8px] font-black text-slate-400 uppercase tracking-widest">Tuntas</p>
                    <p class="text-lg font-black text-slate-700">12 <span class="text-[10px] text-slate-400">Mapel</span></p>
                </div>
                <div class="p-4 rounded-3xl bg-slate-50 border border-slate-100">
                    <p class="text-[8px] font-black text-slate-400 uppercase tracking-widest">Remedial</p>
                    <p class="text-lg font-black text-rose-500">0 <span class="text-[10px] text-slate-400">Mapel</span></p>
                </div>
                <div class="p-4 rounded-3xl bg-indigo-50 border border-indigo-100">
                    <p class="text-[8px] font-black text-indigo-400 uppercase tracking-widest">Predikat</p>
                    <p class="text-lg font-black text-indigo-600 italic text-center uppercase">Sangat Baik</p>
                </div>
            </div>
        </div>
    </div>

    {{-- Tabel Nilai Detail --}}
    <div class="bg-white rounded-4xl shadow-sm border border-slate-100 overflow-hidden">
        <div class="p-8 border-b border-slate-50 flex justify-between items-center">
            <h3 class="font-black text-slate-800 uppercase text-sm tracking-[0.15em]">Rincian Nilai Per Mata Pelajaran</h3>
            <div class="flex gap-2 text-right">
                <span class="text-[10px] font-bold text-slate-400 uppercase tracking-widest italic leading-none">Data Terverifikasi</span>
                <span class="w-2 h-2 bg-emerald-500 rounded-full animate-pulse"></span>
            </div>
        </div>
        
        <div class="overflow-x-auto">
            {{-- Updated to min-w-200 to satisfy Tailwind Intellisense --}}
            <table class="w-full min-w-200">
                <thead>
                    <tr class="bg-slate-50/50 text-[10px] font-black text-slate-400 uppercase tracking-widest">
                        <th class="px-8 py-6 text-left">Mata Pelajaran</th>
                        <th class="px-6 py-6 text-center">Tugas (40%)</th>
                        <th class="px-6 py-6 text-center">UH (20%)</th>
                        <th class="px-6 py-6 text-center">UTS (20%)</th>
                        <th class="px-6 py-6 text-center">UAS (20%)</th>
                        <th class="px-8 py-6 text-center w-40">Nilai Akhir</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-50">
                    @php
                        $dummyNilai = [
                            ['nama' => 'Pemrograman Web (Laravel)', 'tgs' => 92, 'uh' => 88, 'uts' => 85, 'uas' => 95, 'akhir' => 91],
                            ['nama' => 'Basis Data (MySQL)', 'tgs' => 85, 'uh' => 82, 'uts' => 80, 'uas' => 88, 'akhir' => 84],
                            ['nama' => 'Bahasa Inggris', 'tgs' => 80, 'uh' => 85, 'uts' => 90, 'uas' => 85, 'akhir' => 85],
                            ['nama' => 'Matematika Diskrit', 'tgs' => 78, 'uh' => 75, 'uts' => 70, 'uas' => 82, 'akhir' => 77],
                            ['nama' => 'Pendidikan Agama', 'tgs' => 95, 'uh' => 90, 'uts' => 92, 'uas' => 94, 'akhir' => 93],
                        ];
                    @endphp

                    @foreach($dummyNilai as $n)
                    <tr class="hover:bg-slate-50/30 transition-all group">
                        <td class="px-8 py-6">
                            <div class="flex flex-col">
                                <span class="font-black text-slate-700 uppercase text-sm group-hover:text-indigo-600 transition-colors">{{ $n['nama'] }}</span>
                                <span class="text-[9px] font-bold text-slate-400 uppercase tracking-widest mt-1">Status: Tuntas</span>
                            </div>
                        </td>
                        <td class="px-6 py-6 text-center font-bold text-slate-600">{{ $n['tgs'] }}</td>
                        <td class="px-6 py-6 text-center font-bold text-slate-600">{{ $n['uh'] }}</td>
                        <td class="px-6 py-6 text-center font-bold text-slate-600">{{ $n['uts'] }}</td>
                        <td class="px-6 py-6 text-center font-bold text-slate-600">{{ $n['uas'] }}</td>
                        <td class="px-8 py-6 text-center">
                            <div class="inline-block px-5 py-2 rounded-2xl {{ $n['akhir'] >= 75 ? 'bg-emerald-50 text-emerald-600 border border-emerald-100' : 'bg-rose-50 text-rose-600 border border-rose-100' }} font-black text-sm italic">
                                {{ $n['akhir'] }}
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    {{-- Wali Kelas Feedback --}}
    <div class="bg-white rounded-4xl p-8 border border-slate-100 shadow-sm flex items-start gap-6 relative overflow-hidden">
        <div class="absolute left-0 top-0 bottom-0 w-2 bg-indigo-500"></div>
        <div class="w-12 h-12 bg-indigo-50 rounded-2xl flex items-center justify-center text-2xl shrink-0">
            💡
        </div>
        <div>
            <h4 class="font-black text-slate-800 uppercase text-sm tracking-widest mb-2 italic">Saran Akademik</h4>
            <p class="text-sm text-slate-500 leading-relaxed font-medium">
                "Hasil yang sangat memuaskan, terutama pada mata pelajaran produktif. Fokus pada pengembangan logika database agar seimbang dengan kemampuan front-end kamu. Pertahankan kedisiplinan!"
            </p>
        </div>
    </div>
</div>
@endsection