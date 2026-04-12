@extends('layouts.dashboard')

@section('title', 'Rekap Presensi Mapel')

@section('content')
<div class="animate-fade-in space-y-6 px-2 md:px-0">
    {{-- Header & Info --}}
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        <div class="bg-emerald-600 rounded-4xl p-8 text-white shadow-xl shadow-emerald-100 relative overflow-hidden group">
            <div class="absolute -right-5 -top-5 opacity-10 group-hover:scale-110 transition-transform duration-700">
                <svg class="w-40 h-40" fill="currentColor" viewBox="0 0 24 24">
                    <path d="M19 3h-1V1h-2v2H8V1H6v2H5c-1.11 0-1.99.9-1.99 2L3 19c0 1.1.89 2 2 2h14c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2zm0 16H5V8h14v11zM7 10h5v5H7z"></path>
                </svg>
            </div>
            <p class="text-[10px] font-black uppercase tracking-[0.2em] opacity-70">Rata-Rata Kehadiran</p>
            <div class="flex items-baseline gap-2 mt-2">
                <h3 class="text-6xl font-black italic">100</h3>
                <span class="text-sm font-bold opacity-70">%</span>
            </div>
            {{-- Perbaikan di baris bawah ini: Menghapus duplikasi class 'italic' --}}
            <p class="mt-6 text-[9px] font-black uppercase tracking-widest text-emerald-100 italic">Semua Mapel Terpenuhi</p>
        </div>

        <div class="bg-white rounded-4xl p-8 border border-slate-100 shadow-sm md:col-span-2 flex flex-col justify-between">
            <div>
                <h4 class="text-xl font-black text-slate-800 uppercase tracking-tighter italic">Informasi Presensi</h4>
                <p class="text-[10px] font-black text-slate-400 mt-1 uppercase tracking-[0.2em]">Data diambil berdasarkan absensi Guru di kelas</p>
            </div>
            <div class="grid grid-cols-3 gap-4 mt-6">
                <div class="p-4 rounded-3xl bg-slate-50 border border-slate-100 text-center">
                    <p class="text-[8px] font-black text-slate-400 uppercase tracking-widest">Sakit</p>
                    <p class="text-lg font-black text-amber-500">0</p>
                </div>
                <div class="p-4 rounded-3xl bg-slate-50 border border-slate-100 text-center">
                    <p class="text-[8px] font-black text-slate-400 uppercase tracking-widest">Izin</p>
                    <p class="text-lg font-black text-indigo-500">0</p>
                </div>
                <div class="p-4 rounded-3xl bg-rose-50 border border-rose-100 text-center">
                    <p class="text-[8px] font-black text-rose-400 uppercase tracking-widest">Tanpa Ket.</p>
                    <p class="text-lg font-black text-rose-600">0</p>
                </div>
            </div>
        </div>
    </div>

    {{-- Tabel Absensi Per Mata Pelajaran --}}
    <div class="bg-white rounded-4xl shadow-sm border border-slate-100 overflow-hidden">
        <div class="p-8 border-b border-slate-50 flex justify-between items-center">
            <div>
                <h3 class="font-black text-slate-800 uppercase text-sm tracking-[0.15em]">Laporan Kehadiran Per Mapel</h3>
                <p class="text-[10px] font-bold text-slate-400 uppercase mt-1 italic">Semester Ganjil 2025/2026</p>
            </div>
        </div>
        
        <div class="overflow-x-auto">
            <table class="w-full min-w-200">
                <thead>
                    <tr class="bg-slate-50/50 text-[10px] font-black text-slate-400 uppercase tracking-widest">
                        <th class="px-8 py-6 text-left">Mata Pelajaran</th>
                        <th class="px-6 py-6 text-center">Total Pertemuan</th>
                        <th class="px-6 py-6 text-center">Hadir</th>
                        <th class="px-6 py-6 text-center">S/I/A</th>
                        <th class="px-8 py-6 text-center italic">Persentase</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-50">
                    @php
                        $dataAbsenMapel = [
                            ['nama' => 'Pemrograman Web (Laravel)', 'total' => 12, 'hadir' => 12, 'non' => 0, 'persen' => 100],
                            ['nama' => 'Basis Data (MySQL)', 'total' => 12, 'hadir' => 11, 'non' => 1, 'persen' => 92],
                            ['nama' => 'Bahasa Inggris', 'total' => 10, 'hadir' => 10, 'non' => 0, 'persen' => 100],
                            ['nama' => 'Matematika Diskrit', 'total' => 10, 'hadir' => 9, 'non' => 1, 'persen' => 90],
                            ['nama' => 'Pendidikan Agama', 'total' => 8, 'hadir' => 8, 'non' => 0, 'persen' => 100],
                        ];
                    @endphp

                    @foreach($dataAbsenMapel as $m)
                    <tr class="hover:bg-slate-50/30 transition-all group">
                        <td class="px-8 py-6">
                            <div class="flex flex-col">
                                <span class="font-black text-slate-700 uppercase text-sm group-hover:text-emerald-600 transition-colors">
                                    {{ $m['nama'] }}
                                </span>
                                <span class="text-[9px] font-bold text-slate-400 uppercase mt-0.5 tracking-tighter">Guru: Terdata di Sistem</span>
                            </div>
                        </td>
                        <td class="px-6 py-6 text-center font-bold text-slate-600">{{ $m['total'] }}</td>
                        <td class="px-6 py-6 text-center font-bold text-emerald-600">{{ $m['hadir'] }}</td>
                        <td class="px-6 py-6 text-center font-bold text-rose-500">{{ $m['non'] }}</td>
                        <td class="px-8 py-6 text-center">
                            <div class="inline-block px-4 py-1.5 rounded-xl {{ $m['persen'] == 100 ? 'bg-emerald-50 text-emerald-600' : 'bg-amber-50 text-amber-600' }} border border-current font-black text-[10px]">
                                {{ $m['persen'] }}%
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    {{-- Info Tambahan --}}
    <div class="bg-slate-900 rounded-4xl p-8 text-white relative overflow-hidden shadow-xl">
        <div class="flex items-center gap-6">
            <div class="w-12 h-12 bg-white/10 rounded-2xl flex items-center justify-center text-xl shrink-0">
                📝
            </div>
            <div>
                <h4 class="font-black uppercase text-xs tracking-[0.2em] mb-1">Catatan Kehadiran</h4>
                <p class="text-xs text-slate-400 font-medium leading-relaxed">
                    Jika terdapat ketidaksesuaian data absensi pada mata pelajaran tertentu, harap segera hubungi Guru Pengajar yang bersangkutan atau Wali Kelas untuk perbaikan data manual.
                </p>
            </div>
        </div>
    </div>
</div>
@endsection