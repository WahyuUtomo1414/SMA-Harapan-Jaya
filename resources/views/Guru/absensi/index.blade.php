@extends('layouts.dashboard')

@section('title', 'Data Absensi')

@section('content')
<div class="max-w-7xl mx-auto">

    {{-- HEADER --}}
    <div class="flex flex-col md:flex-row justify-between items-start md:items-center gap-4 mb-8">
        <div>
            <h1 class="text-3xl font-extrabold text-slate-800 tracking-tight">
                Data <span class="text-emerald-700">Absensi</span>
            </h1>
            <p class="text-slate-500 font-medium">Monitoring dan kelola kehadiran siswa harian</p>
        </div>

        <a href="{{ route('guru.absensi.create') }}"
           class="inline-flex items-center gap-2 bg-emerald-700 hover:bg-emerald-800 text-white px-6 py-3 rounded-xl font-bold transition-all shadow-lg shadow-emerald-700/20 active:scale-95">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 4v16m8-8H4"/>
            </svg>
            Tambah Absensi
        </a>
    </div>

    {{-- FILTER BOX --}}
    <form method="GET"
          action="{{ route('guru.absensi.index') }}"
          class="bg-white p-5 rounded-2xl shadow-sm border border-slate-100 mb-8 flex flex-wrap gap-4 items-end">

        <div class="flex flex-col gap-1.5">
            <label class="text-[11px] font-bold text-slate-400 uppercase tracking-wider ml-1">Kelas</label>
            <select name="kelas_id" class="bg-slate-50 border-slate-200 text-slate-700 rounded-xl p-2.5 focus:ring-emerald-500 focus:border-emerald-500 min-w-37.5">
                <option value="">Semua Kelas</option>
                @foreach($kelasList as $k)
                    <option value="{{ $k->id }}" {{ request('kelas_id') == $k->id ? 'selected' : '' }}>
                        {{ $k->nama ?? $k->kode }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="flex flex-col gap-1.5">
            <label class="text-[11px] font-bold text-slate-400 uppercase tracking-wider ml-1">Mata Pelajaran</label>
            <select name="mapel_id" class="bg-slate-50 border-slate-200 text-slate-700 rounded-xl p-2.5 focus:ring-emerald-500 focus:border-emerald-500 min-w-45">
                <option value="">Semua Mapel</option>
                @foreach($mapelList as $m)
                    <option value="{{ $m->id }}" {{ request('mapel_id') == $m->id ? 'selected' : '' }}>
                        {{ $m->nama_pelajaran ?? $m->nama }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="flex flex-col gap-1.5">
            <label class="text-[11px] font-bold text-slate-400 uppercase tracking-wider ml-1">Tanggal</label>
            <input type="date"
                   name="tanggal"
                   value="{{ request('tanggal') }}"
                   class="bg-slate-50 border-slate-200 text-slate-700 rounded-xl p-2.5 focus:ring-emerald-500 focus:border-emerald-500">
        </div>

        <div class="flex gap-2">
            <button type="submit" class="bg-emerald-700 hover:bg-emerald-800 text-white px-6 py-2.5 rounded-xl font-bold transition-all shadow-md shadow-emerald-700/10">
                Filter
            </button>

            <a href="{{ route('guru.absensi.index') }}"
               class="bg-slate-100 hover:bg-slate-200 text-slate-600 px-6 py-2.5 rounded-xl font-bold transition-all">
                Reset
            </a>
        </div>
    </form>

    {{-- TABLE AREA --}}
    <div class="bg-white rounded-3xl shadow-sm border border-slate-100 overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="bg-slate-50/50 border-b border-slate-100">
                        <th class="p-5 text-[11px] font-bold text-slate-400 uppercase tracking-widest">No</th>
                        <th class="p-5 text-[11px] font-bold text-slate-400 uppercase tracking-widest">Nama Murid</th>
                        <th class="p-5 text-[11px] font-bold text-slate-400 uppercase tracking-widest">Kelas</th>
                        <th class="p-5 text-[11px] font-bold text-slate-400 uppercase tracking-widest">Mapel</th>
                        <th class="p-5 text-[11px] font-bold text-slate-400 uppercase tracking-widest text-center">Status</th>
                        <th class="p-5 text-[11px] font-bold text-slate-400 uppercase tracking-widest">Aksi</th>
                    </tr>
                </thead>

                <tbody class="divide-y divide-slate-50">
                    @forelse($absensi as $i => $a)
                    @php
                        $kelas = optional(optional($a->jadwalPelajaran)->kelas);
                        $mapel = optional(optional($a->jadwalPelajaran)->mataPelajaran);
                        $detail = $a->absensiDetail->first();
                        $status = optional($detail)->status_absen;
                        $keterangan = $detail->keterangan ?? '-';
                        $nama = optional($detail->murid)->nama ?? '-';
                    @endphp

                    <tr class="group hover:bg-emerald-50/30 transition-colors">
                        <td class="p-5 text-sm text-slate-500 font-medium">{{ $i + 1 }}</td>
                        <td class="p-5">
                            <div class="font-bold text-slate-800">{{ $nama }}</div>
                            <div class="text-[10px] text-slate-400 font-bold uppercase tracking-tighter">{{ \Carbon\Carbon::parse($a->tanggal)->translatedFormat('d F Y') }}</div>
                        </td>
                        <td class="p-5">
                            <span class="px-2.5 py-1 bg-slate-100 text-slate-600 rounded-lg text-[11px] font-bold uppercase">
                                {{ $kelas->kode ?? $kelas->nama ?? '-' }}
                            </span>
                        </td>
                        <td class="p-5 text-sm text-slate-600 font-medium">{{ $mapel->nama_pelajaran ?? $mapel->nama ?? '-' }}</td>

                        <td class="p-5">
                            <div class="flex justify-center">
                                <span class="px-4 py-1.5 rounded-full text-[10px] font-black uppercase tracking-widest
                                {{ $status=='hadir'?'bg-emerald-100 text-emerald-700':
                                   ($status=='izin'?'bg-blue-100 text-blue-700':
                                   ($status=='sakit'?'bg-amber-100 text-amber-700':'bg-rose-100 text-rose-700')) }}">
                                    {{ $status }}
                                </span>
                            </div>
                        </td>

                        <td class="p-5">
                            <div class="flex items-center gap-2">
                                <button onclick="openModal('{{ $nama }}','{{ $kelas->kode ?? $kelas->nama ?? '-' }}','{{ $mapel->nama_pelajaran ?? $mapel->nama ?? '-' }}','{{ \Carbon\Carbon::parse($a->tanggal)->format('d M Y') }}','{{ ucfirst($status) }}','{{ $keterangan }}')"
                                        class="p-2 bg-emerald-50 text-emerald-700 hover:bg-emerald-700 hover:text-white rounded-lg transition-all" title="Lihat Detail">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/></svg>
                                </button>
                                
                                <a href="{{ route('guru.absensi.edit', $a->id) }}"
                                   class="p-2 bg-amber-50 text-amber-700 hover:bg-amber-500 hover:text-white rounded-lg transition-all" title="Edit Data">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/></svg>
                                </a>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6" class="p-20 text-center">
                            <div class="flex flex-col items-center">
                                <div class="w-16 h-16 bg-slate-50 text-slate-300 rounded-full flex items-center justify-center mb-4">
                                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.172 9.172a4 4 0 015.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                                </div>
                                <h3 class="text-slate-800 font-bold">Data tidak ditemukan</h3>
                                <p class="text-slate-400 text-sm">Coba sesuaikan filter atau tambah data baru.</p>
                            </div>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>

{{-- ================= MODAL DETAIL (THEMED) ================= --}}
<div id="modal" class="fixed inset-0 bg-slate-900/60 backdrop-blur-sm hidden z-100 transition-all duration-300">
    <div class="flex items-center justify-center min-h-screen px-4">
        <div class="bg-white w-full max-w-md rounded-3xl overflow-hidden shadow-2xl transform transition-all">
            <div class="bg-emerald-700 p-6 text-white relative">
                <button onclick="closeModal()" class="absolute top-4 right-4 text-white/50 hover:text-white transition-colors">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
                </button>
                <h2 class="text-xl font-bold">Detail Kehadiran</h2>
                <p class="text-emerald-100 text-xs mt-1 uppercase tracking-widest font-semibold">Informasi Absensi Murid</p>
            </div>

            <div class="p-8 space-y-5">
                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <p class="text-[10px] font-bold text-slate-400 uppercase tracking-widest">Nama Murid</p>
                        <p id="m-nama" class="font-bold text-slate-800"></p>
                    </div>
                    <div>
                        <p class="text-[10px] font-bold text-slate-400 uppercase tracking-widest">Kelas</p>
                        <p id="m-kelas" class="font-bold text-slate-800"></p>
                    </div>
                </div>

                <div class="border-t border-slate-50 pt-4">
                    <p class="text-[10px] font-bold text-slate-400 uppercase tracking-widest">Mata Pelajaran</p>
                    <p id="m-mapel" class="font-bold text-slate-800"></p>
                </div>

                <div class="grid grid-cols-2 gap-4 border-t border-slate-50 pt-4">
                    <div>
                        <p class="text-[10px] font-bold text-slate-400 uppercase tracking-widest">Tanggal</p>
                        <p id="m-tanggal" class="font-bold text-slate-800"></p>
                    </div>
                    <div>
                        <p class="text-[10px] font-bold text-slate-400 uppercase tracking-widest">Status</p>
                        <span id="m-status-pill" class="inline-block px-3 py-1 rounded-full text-[10px] font-black uppercase tracking-widest mt-1"></span>
                    </div>
                </div>

                <div class="bg-slate-50 p-4 rounded-2xl border border-slate-100">
                    <p class="text-[10px] font-bold text-slate-400 uppercase tracking-widest mb-1">Keterangan Tambahan</p>
                    <p id="m-keterangan" class="text-sm text-slate-600 leading-relaxed italic"></p>
                </div>

                <button onclick="closeModal()"
                        class="bg-slate-800 hover:bg-slate-900 text-white font-bold py-3 rounded-2xl w-full transition-all shadow-lg active:scale-95">
                    Tutup Detail
                </button>
            </div>
        </div>
    </div>
</div>

{{-- SCRIPT --}}
<script>
document.addEventListener('DOMContentLoaded', function () {
    window.openModal = function(nama, kelas, mapel, tanggal, status, keterangan){
        document.getElementById('m-nama').innerText = nama;
        document.getElementById('m-kelas').innerText = kelas;
        document.getElementById('m-mapel').innerText = mapel;
        document.getElementById('m-tanggal').innerText = tanggal;
        
        const pill = document.getElementById('m-status-pill');
        pill.innerText = status;
        
        // Atur warna pill status di modal secara dinamis
        pill.className = "inline-block px-3 py-1 rounded-full text-[10px] font-black uppercase tracking-widest mt-1 ";
        const s = status.toLowerCase();
        if(s === 'hadir') pill.classList.add('bg-emerald-100', 'text-emerald-700');
        else if(s === 'izin') pill.classList.add('bg-blue-100', 'text-blue-700');
        else if(s === 'sakit') pill.classList.add('bg-amber-100', 'text-amber-700');
        else pill.classList.add('bg-rose-100', 'text-rose-700');

        document.getElementById('m-keterangan').innerText = keterangan || 'Tidak ada keterangan tambahan.';
        document.getElementById('modal').classList.remove('hidden');
    }

    window.closeModal = function(){
        document.getElementById('modal').classList.add('hidden');
    }
});
</script>
@endsection