@extends('layouts.dashboard')

@section('title', 'Input Nilai Baru')
@section('page_title', 'Input Nilai')

@section('content')
<div class="max-w-7xl mx-auto space-y-6 pb-10">

    {{-- HEADER --}}
    <div class="flex flex-col md:flex-row justify-between items-start md:items-center gap-4 px-2">
        <div>
            <h1 class="text-3xl font-extrabold text-slate-800 tracking-tight">
                Input <span class="text-emerald-600">Nilai Siswa</span>
            </h1>
            <p class="text-slate-500 mt-1 text-sm font-medium">
                Mata Pelajaran: <span class="text-slate-800 font-bold">{{ $info['mapel'] }}</span> • Semester {{ $info['semester'] }}
            </p>
        </div>
        
        <a href="{{ route('guru.nilai.index') }}" 
           class="flex items-center gap-2 bg-white border border-slate-200 text-slate-600 px-5 py-2.5 rounded-2xl font-bold text-sm hover:bg-slate-50 transition-all shadow-sm">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/></svg>
            Batal & Kembali
        </a>
    </div>

    {{-- FILTER SECTION --}}
    <div class="bg-white p-6 rounded-3xl shadow-sm border border-slate-100 mx-2">
        <form method="GET" action="{{ route('guru.nilai.create') }}" class="grid grid-cols-1 md:grid-cols-12 gap-4">
            {{-- KELAS --}}
            <div class="md:col-span-4">
                <label class="text-[10px] font-bold text-slate-400 uppercase mb-2 block ml-1 tracking-widest">Pilih Kelas</label>
                <select name="kelas_id" onchange="this.form.submit()"
                        class="w-full bg-slate-50 border border-slate-200 rounded-2xl p-3 text-slate-700 font-bold focus:ring-2 focus:ring-emerald-500 transition-all appearance-none cursor-pointer">
                    <option value="">🔵 Semua Kelas</option>
                    @foreach($kelasList as $k)
                        <option value="{{ $k->id }}" {{ request('kelas_id') == $k->id ? 'selected' : '' }}>
                            Kelas {{ $k->kode }}
                        </option>
                    @endforeach
                </select>
            </div>

            {{-- SEARCH --}}
            <div class="md:col-span-6">
                <label class="text-[10px] font-bold text-slate-400 uppercase mb-2 block ml-1 tracking-widest">Cari Siswa</label>
                <div class="relative">
                    <input type="text" name="search" value="{{ request('search') }}"
                           placeholder="Masukkan Nama atau NISN..."
                           class="w-full bg-slate-50 border border-slate-200 rounded-2xl p-3 pl-10 text-slate-700 font-medium focus:ring-2 focus:ring-emerald-500 transition-all">
                    <svg class="w-4 h-4 text-slate-400 absolute left-3.5 top-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>
                </div>
            </div>

            {{-- BUTTON --}}
            <div class="md:col-span-2 flex items-end">
                <button type="submit" class="w-full bg-slate-800 hover:bg-black text-white font-bold py-3.5 rounded-2xl transition-all shadow-lg flex justify-center items-center gap-2">
                    Cari
                </button>
            </div>
        </form>
    </div>

    {{-- TABLE INPUT SECTION --}}
    <div class="bg-white rounded-3xl shadow-sm border border-slate-100 overflow-hidden mx-2">
        <form action="{{ route('guru.nilai.store') }}" method="POST" id="form-nilai">
            @csrf
            {{-- Hidden input untuk mapel_id jika diperlukan oleh controller --}}
            <input type="hidden" name="mapel_id" value="{{ $info['mapel_id'] }}">

            <div class="overflow-x-auto">
                <table class="w-full text-left border-collapse">
                    <thead>
                        <tr class="bg-emerald-50/50 border-b border-emerald-100 text-[10px] text-emerald-700 uppercase tracking-widest font-black">
                            <th class="p-6 text-center w-20">No</th>
                            <th class="p-6">Informasi Siswa</th>
                            <th class="p-6 text-center w-32">Tugas (30%)</th>
                            <th class="p-6 text-center w-32">UTS (30%)</th>
                            <th class="p-6 text-center w-32">UAS (40%)</th>
                            <th class="p-6 text-center w-32 bg-emerald-100/30">Rata-Rata</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-50">
                        @forelse($siswas as $index => $siswa)
                            @php
                                $nilai = $siswa->nilai->first();
                                $tugas = $nilai->tugas ?? 0;
                                $uts   = $nilai->uts ?? 0;
                                $uas   = $nilai->uas ?? 0;
                                $rata  = ($tugas * 0.3) + ($uts * 0.3) + ($uas * 0.4);
                            @endphp
                            <tr class="group hover:bg-emerald-50/20 transition-colors row-nilai">
                                <td class="p-6 text-center font-bold text-slate-400 italic">
                                    {{ $siswas->firstItem() + $index }}
                                </td>
                                <td class="p-6">
                                    <div class="font-bold text-slate-700 uppercase text-sm leading-tight">{{ $siswa->nama }}</div>
                                    <div class="text-[10px] text-emerald-600 font-bold mt-1 uppercase tracking-tighter">NISN: {{ $siswa->nisn }}</div>
                                </td>
                                <td class="p-4">
                                    <input type="number" name="nilai[{{ $siswa->id }}][tugas]" value="{{ $tugas }}" data-type="tugas"
                                           class="input-nilai w-full text-center bg-slate-50 border-2 border-slate-100 rounded-xl py-2.5 font-black text-slate-700 focus:border-emerald-500 focus:bg-white transition-all outline-none"
                                           min="0" max="100">
                                </td>
                                <td class="p-4">
                                    <input type="number" name="nilai[{{ $siswa->id }}][uts]" value="{{ $uts }}" data-type="uts"
                                           class="input-nilai w-full text-center bg-slate-50 border-2 border-slate-100 rounded-xl py-2.5 font-black text-slate-700 focus:border-emerald-500 focus:bg-white transition-all outline-none"
                                           min="0" max="100">
                                </td>
                                <td class="p-4">
                                    <input type="number" name="nilai[{{ $siswa->id }}][uas]" value="{{ $uas }}" data-type="uas"
                                           class="input-nilai w-full text-center bg-slate-50 border-2 border-slate-100 rounded-xl py-2.5 font-black text-slate-700 focus:border-emerald-500 focus:bg-white transition-all outline-none"
                                           min="0" max="100">
                                </td>
                                <td class="p-4 text-center bg-emerald-50/30">
                                    <span class="display-rata font-black text-emerald-600 text-lg">
                                        {{ number_format($rata, 2) }}
                                    </span>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="p-24 text-center">
                                    <div class="flex flex-col items-center opacity-20">
                                        <svg class="w-16 h-16 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"/></svg>
                                        <h3 class="text-xl font-bold text-slate-700">Siswa tidak ditemukan</h3>
                                    </div>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            {{-- FOOTER / ACTION --}}
            <div class="p-8 bg-slate-50 border-t border-slate-100 flex flex-col md:flex-row justify-between items-center gap-6">
                <div class="flex items-center gap-4">
                    <div class="bg-emerald-600 text-white p-3 rounded-2xl shadow-lg shadow-emerald-200">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/></svg>
                    </div>
                    <div>
                        <p class="text-xs font-bold text-slate-400 uppercase tracking-widest">Siap Disimpan</p>
                        <p class="text-lg font-black text-slate-700">Total: {{ $info['total'] }} Siswa</p>
                    </div>
                </div>

                <div class="flex items-center gap-4 w-full md:w-auto">
                    {{-- Pagination --}}
                    @if($siswas->hasPages())
                        <div class="mr-4">
                            {{ $siswas->links() }}
                        </div>
                    @endif

                    <button type="submit" class="flex-1 md:flex-none bg-emerald-600 hover:bg-emerald-700 text-white px-10 py-4 rounded-2xl font-black shadow-xl shadow-emerald-200 transition-all active:scale-95 flex items-center justify-center gap-3">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-3m-1 4l-3 3m0 0l-3-3m3 3V4"/></svg>
                        Simpan Semua Nilai
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>

{{-- AUTO HITUNG JS --}}
<script>
document.addEventListener('input', function (e) {
    if (!e.target.classList.contains('input-nilai')) return;

    const row = e.target.closest('.row-nilai');
    if (!row) return;

    const t = parseFloat(row.querySelector('[data-type="tugas"]').value) || 0;
    const u = parseFloat(row.querySelector('[data-type="uts"]').value) || 0;
    const a = parseFloat(row.querySelector('[data-type="uas"]').value) || 0;

    // Rumus: 30% Tugas + 30% UTS + 40% UAS
    const total = (t * 0.3) + (u * 0.3) + (a * 0.4);

    const display = row.querySelector('.display-rata');
    display.innerText = total.toFixed(2);
    
    // Efek highlight saat angka berubah
    display.classList.add('scale-110', 'text-emerald-500');
    setTimeout(() => {
        display.classList.remove('scale-110', 'text-emerald-500');
    }, 200);
});
</script>

<style>
    .display-rata { transition: all 0.2s ease; display: inline-block; }
</style>
@endsection
