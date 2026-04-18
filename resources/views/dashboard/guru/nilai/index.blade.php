@extends('layouts.dashboard')

@section('title', 'Data Nilai')
@section('page_title', 'Data Nilai')

@section('content')
<div class="max-w-7xl mx-auto space-y-6 pb-10">

    {{-- HEADER --}}
    <div class="flex flex-col md:flex-row justify-between items-start md:items-center gap-4 px-2">
        <div>
            <h1 class="text-3xl font-extrabold text-slate-800 tracking-tight">
                Data <span class="text-emerald-600">Nilai</span>
            </h1>
            <p class="text-slate-500 mt-1 text-sm">Manajemen perolehan nilai akademik siswa secara efisien.</p>
        </div>

        {{-- TOMBOL INPUT NILAI (YANG TADI HILANG) --}}
        <a href="{{ route('guru.nilai.create', request()->only('kelas_id', 'mapel_id')) }}" 
           class="flex items-center gap-2 bg-emerald-600 hover:bg-emerald-700 text-white px-6 py-3.5 rounded-2xl font-black shadow-xl shadow-emerald-200 transition-all active:scale-95">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M12 4v16m8-8H4"/>
            </svg>
            INPUT NILAI BARU
        </a>
    </div>

    {{-- FILTER SECTION --}}
    <div class="bg-white p-6 rounded-3xl shadow-sm border border-slate-100 mx-2">
        <form method="GET" action="{{ route('guru.nilai.index') }}" class="grid grid-cols-1 md:grid-cols-12 gap-5">
            <div class="md:col-span-3">
                <label class="text-[10px] font-bold text-slate-400 uppercase mb-2 block ml-1 tracking-widest">Kelas</label>
                <select name="kelas_id" onchange="this.form.submit()" class="w-full bg-slate-50 border border-slate-200 rounded-2xl p-3 text-slate-700 font-bold focus:ring-2 focus:ring-emerald-500 transition-all appearance-none cursor-pointer">
                    <option value="">Semua Kelas</option>
                    @foreach($kelasList as $k)
                        <option value="{{ $k->id }}" {{ request('kelas_id') == $k->id ? 'selected' : '' }}>
                            Kelas {{ $k->kode }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="md:col-span-3">
                <label class="text-[10px] font-bold text-slate-400 uppercase mb-2 block ml-1 tracking-widest">Mata Pelajaran</label>
                <select name="mapel_id" onchange="this.form.submit()" class="w-full bg-slate-50 border border-slate-200 rounded-2xl p-3 text-slate-700 font-bold focus:ring-2 focus:ring-emerald-500 transition-all appearance-none cursor-pointer">
                    @foreach($mapelList as $m)
                        <option value="{{ $m->id }}" {{ request('mapel_id', $info['mapel_id']) == $m->id ? 'selected' : '' }}>
                            {{ $m->nama }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="md:col-span-4">
                <label class="text-[10px] font-bold text-slate-400 uppercase mb-2 block ml-1 tracking-widest">Pencarian</label>
                <input type="text" name="search" value="{{ request('search') }}" 
                       placeholder="Cari Nama atau NISN..." 
                       class="w-full bg-slate-50 border border-slate-200 rounded-2xl p-3 text-slate-700 focus:ring-2 focus:ring-emerald-500 transition-all">
            </div>

            <div class="md:col-span-2 flex items-end">
                <button type="submit" class="w-full bg-slate-800 hover:bg-black text-white font-bold py-3.5 rounded-2xl transition-all shadow-lg flex justify-center items-center gap-2">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>
                    Filter Data
                </button>
            </div>
        </form>
    </div>

    {{-- TABLE SECTION --}}
    <div class="bg-white rounded-3xl shadow-sm border border-slate-100 overflow-hidden mx-2">
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="bg-emerald-50/50 border-b border-emerald-100 text-[10px] text-emerald-700 uppercase tracking-[0.15em]">
                        <th class="p-6 font-bold text-center w-20">No</th>
                        <th class="p-6 font-bold">Informasi Siswa</th>
                        <th class="p-6 text-center font-bold">Tugas</th>
                        <th class="p-6 text-center font-bold">UTS</th>
                        <th class="p-6 text-center font-bold">UAS</th>
                        <th class="p-6 text-center font-bold">Rata-Rata</th>
                        <th class="p-6 text-center font-bold">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-50">
                    @forelse($siswas as $index => $siswa)
                        @php
                            $nilaiData = $siswa->nilai->first();
                            $tugas = $nilaiData->tugas ?? 0;
                            $uts   = $nilaiData->uts ?? 0;
                            $uas   = $nilaiData->uas ?? 0;
                            $rata  = ($tugas * 0.3) + ($uts * 0.3) + ($uas * 0.4);
                        @endphp
                        <tr class="group hover:bg-emerald-50/20 transition-colors">
                            <td class="p-6 text-slate-400 text-sm font-medium text-center italic">
                                #{{ $siswas->firstItem() + $index }}
                            </td>
                            <td class="p-6">
                                <div class="font-bold text-slate-700 group-hover:text-emerald-600 transition-colors uppercase text-sm">
                                    {{ $siswa->nama }}
                                </div>
                                <div class="text-[10px] text-slate-400 font-bold mt-0.5 tracking-tight">NISN: {{ $siswa->nisn }}</div>
                            </td>
                            <td class="p-6 text-center font-bold text-slate-600">{{ $tugas }}</td>
                            <td class="p-6 text-center font-bold text-slate-600">{{ $uts }}</td>
                            <td class="p-6 text-center font-bold text-slate-600">{{ $uas }}</td>
                            <td class="p-6 text-center">
                                <span class="inline-block px-4 py-1.5 rounded-xl font-black {{ $rata > 0 ? 'bg-emerald-100 text-emerald-700' : 'bg-slate-100 text-slate-400' }} border border-emerald-200/30 text-xs shadow-sm">
                                    {{ number_format($rata, 2) }}
                                </span>
                            </td>
                            <td class="p-6">
                                <div class="flex items-center justify-center gap-2">
                                    <button onclick="openModal({{ $tugas }}, {{ $uts }}, {{ $uas }}, '{{ addslashes($siswa->nama) }}')" 
                                            class="p-2.5 bg-emerald-50 text-emerald-700 hover:bg-emerald-600 hover:text-white rounded-xl transition-all" 
                                            title="Lihat Detail">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                                        </svg>
                                    </button>
                                    
                                    <a href="{{ route('guru.nilai.edit', ['id' => $siswa->id, 'mapel_id' => $info['mapel_id']]) }}"
                                       class="p-2.5 bg-amber-50 text-amber-700 hover:bg-amber-500 hover:text-white rounded-xl transition-all" 
                                       title="Edit Data">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                                        </svg>
                                    </a>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="p-24 text-center">
                                <div class="flex flex-col items-center opacity-30">
                                    <svg class="w-16 h-16 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/></svg>
                                    <h3 class="text-xl font-bold text-slate-700">Tidak ada data nilai ditemukan</h3>
                                </div>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        @if($siswas->hasPages())
        <div class="p-6 border-t border-slate-50 bg-slate-50/30">
            {{ $siswas->links() }}
        </div>
        @endif
    </div>
</div>

{{-- MODAL SYSTEM --}}
<div id="modal" class="fixed inset-0 hidden items-center justify-center z-50 p-4">
    <div class="absolute inset-0 bg-slate-900/60 backdrop-blur-sm transition-opacity" onclick="closeModal()"></div>

    <div class="relative bg-white rounded-3xl w-full max-w-sm overflow-hidden shadow-2xl transform transition-all animate-scale border border-emerald-100">
        <div class="p-8 text-center">
            <div class="w-16 h-16 bg-emerald-50 rounded-2xl flex items-center justify-center mx-auto mb-6">
                <svg class="w-8 h-8 text-emerald-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"/></svg>
            </div>
            
            <h3 class="text-2xl font-black text-slate-800 mb-1 uppercase" id="m_nama"></h3>
            <p class="text-emerald-600 text-[10px] mb-8 font-bold uppercase tracking-[0.2em]">Rincian Nilai Terkini</p>

            <div class="grid grid-cols-1 gap-3 text-left">
                <div class="flex justify-between items-center bg-slate-50 p-4 rounded-2xl border border-slate-100">
                    <span class="text-slate-400 font-bold text-[10px] uppercase">Tugas (30%)</span>
                    <span id="m_tugas" class="text-xl font-black text-emerald-700"></span>
                </div>
                <div class="flex justify-between items-center bg-slate-50 p-4 rounded-2xl border border-slate-100">
                    <span class="text-slate-400 font-bold text-[10px] uppercase">UTS (30%)</span>
                    <span id="m_uts" class="text-xl font-black text-emerald-700"></span>
                </div>
                <div class="flex justify-between items-center bg-slate-50 p-4 rounded-2xl border border-slate-100">
                    <span class="text-slate-400 font-bold text-[10px] uppercase">UAS (40%)</span>
                    <span id="m_uas" class="text-xl font-black text-emerald-700"></span>
                </div>
            </div>

            <button onclick="closeModal()" class="w-full mt-8 bg-slate-900 hover:bg-black text-white font-bold py-4 rounded-2xl transition-all shadow-lg">
                Tutup Detail
            </button>
        </div>
    </div>
</div>

<script>
    function openModal(t, u, a, nama) {
        const modal = document.getElementById('modal');
        document.getElementById('m_nama').innerText = nama;
        document.getElementById('m_tugas').innerText = t;
        document.getElementById('m_uts').innerText = u;
        document.getElementById('m_uas').innerText = a;

        modal.classList.remove('hidden');
        modal.classList.add('flex');
        document.body.style.overflow = 'hidden'; 
    }

    function closeModal() {
        const modal = document.getElementById('modal');
        modal.classList.add('hidden');
        modal.classList.remove('flex');
        document.body.style.overflow = 'auto'; 
    }
</script>

<style>
    @keyframes modalIn {
        from { opacity: 0; transform: scale(0.9) translateY(10px); }
        to { opacity: 1; transform: scale(1) translateY(0); }
    }
    .animate-scale { animation: modalIn 0.3s cubic-bezier(0.34, 1.56, 0.64, 1); }
</style>
@endsection