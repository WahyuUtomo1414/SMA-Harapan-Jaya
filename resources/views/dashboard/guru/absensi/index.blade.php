@extends('layouts.dashboard')

@section('title', 'Data Absensi')
@section('page_title', 'Data Absensi')

@section('content')
<div class="max-w-7xl mx-auto pb-10">

    {{-- HEADER --}}
    <div class="flex flex-col md:flex-row justify-between items-start md:items-center gap-4 mb-8">
        <div>
            <h1 class="text-3xl font-extrabold text-slate-800 tracking-tight">
                Data <span class="text-emerald-700">Absensi</span>
            </h1>
            <p class="text-slate-500 font-medium text-sm">Monitoring dan kelola kehadiran siswa harian</p>
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
    <form method="GET" action="{{ route('guru.absensi.index') }}"
          class="bg-white p-5 rounded-2xl shadow-sm border border-slate-100 mb-8 flex flex-wrap gap-4 items-end">
        <div class="flex flex-col gap-1.5">
            <label class="text-[10px] font-bold text-slate-400 uppercase tracking-wider ml-1">Kelas</label>
            <select name="kelas_id" class="bg-slate-50 border-slate-200 text-slate-700 rounded-xl p-2.5 text-sm focus:ring-emerald-500 min-w-40">
                <option value="">Semua Kelas</option>
                @foreach($kelasList as $k)
                    <option value="{{ $k->id }}" {{ request('kelas_id') == $k->id ? 'selected' : '' }}>
                        {{ $k->nama ?? $k->kode }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="flex flex-col gap-1.5">
            <label class="text-[10px] font-bold text-slate-400 uppercase tracking-wider ml-1">Mata Pelajaran</label>
            <select name="mapel_id" class="bg-slate-50 border-slate-200 text-slate-700 rounded-xl p-2.5 text-sm focus:ring-emerald-500 min-w-45">
                <option value="">Semua Mapel</option>
                @foreach($mapelList as $m)
                    <option value="{{ $m->id }}" {{ request('mapel_id') == $m->id ? 'selected' : '' }}>
                        {{ $m->nama_pelajaran ?? $m->nama }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="flex flex-col gap-1.5">
            <label class="text-[10px] font-bold text-slate-400 uppercase tracking-wider ml-1">Tanggal</label>
            <input type="date" name="tanggal" value="{{ request('tanggal') }}"
                   class="bg-slate-50 border-slate-200 text-slate-700 rounded-xl p-2.5 text-sm focus:ring-emerald-500">
        </div>

        <div class="flex gap-2">
            <button type="submit" class="bg-emerald-700 hover:bg-emerald-800 text-white px-6 py-2.5 rounded-xl font-bold transition-all shadow-md">
                Filter
            </button>
            <a href="{{ route('guru.absensi.index') }}" class="bg-slate-100 hover:bg-slate-200 text-slate-600 px-6 py-2.5 rounded-xl font-bold transition-all">
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
                        <th class="p-5 text-[11px] font-bold text-slate-400 uppercase tracking-widest">Waktu & Murid</th>
                        <th class="p-5 text-[11px] font-bold text-slate-400 uppercase tracking-widest">Kelas & Mapel</th>
                        <th class="p-5 text-[11px] font-bold text-slate-400 uppercase tracking-widest text-center">Ringkasan</th>
                        <th class="p-5 text-[11px] font-bold text-slate-400 uppercase tracking-widest text-right">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-50">
                    @forelse($absensi as $i => $a)
                    @php
                        $details = $a->absensiDetail;
                        $summary = $details->countBy('status_absen');
                        
                        $kelasNama = $a->jadwalPelajaran->kelas->nama ?? $a->jadwalPelajaran->kelas->kode ?? '-';
                        $mapelNama = $a->jadwalPelajaran->mataPelajaran->nama_pelajaran ?? $a->jadwalPelajaran->mataPelajaran->nama ?? '-';
                        $tanggalFmt = \Carbon\Carbon::parse($a->tanggal)->translatedFormat('d F Y');

                        $modalData = $details->map(fn($d) => [
                            'nama' => $d->murid->nama,
                            'status' => $d->status_absen,
                            'keterangan' => $d->keterangan ?? '-'
                        ]);
                    @endphp

                    <tr class="group hover:bg-emerald-50/30 transition-colors text-sm">
                        <td class="p-5 text-slate-400 font-medium">{{ $i + 1 }}</td>
                        <td class="p-5">
                            <div class="font-bold text-slate-800 tracking-tight">{{ $details->count() }} Murid</div>
                            <div class="text-[10px] text-emerald-600 font-black uppercase">{{ $tanggalFmt }}</div>
                        </td>
                        <td class="p-5">
                            <div class="font-bold text-slate-700 leading-tight">{{ $mapelNama }}</div>
                            <div class="text-[10px] font-medium text-slate-400 uppercase">{{ $kelasNama }}</div>
                        </td>
                        <td class="p-5">
                            <div class="flex justify-center gap-1">
                                @foreach(['hadir' => 'H', 'izin' => 'I', 'sakit' => 'S', 'alpha' => 'A'] as $key => $label)
                                @php 
                                    $colors = [
                                        'hadir' => 'bg-emerald-50 text-emerald-600 border-emerald-100',
                                        'izin' => 'bg-blue-50 text-blue-600 border-blue-100',
                                        'sakit' => 'bg-amber-50 text-amber-600 border-amber-100',
                                        'alpha' => 'bg-rose-50 text-rose-600 border-rose-100'
                                    ][$key];
                                @endphp
                                {{-- Canonical Class: min-w-8 replaces min-w-[32px] --}}
                                <div class="flex flex-col items-center min-w-8 p-1 rounded-lg border {{ $colors }}">
                                    <span class="text-[8px] font-black uppercase">{{ $label }}</span>
                                    <span class="text-[11px] font-bold">{{ $summary->get($key, 0) }}</span>
                                </div>
                                @endforeach
                            </div>
                        </td>
                        <td class="p-5 text-right">
                            <div class="flex justify-end gap-2">
                                <button onclick="openDetailModal(@js($modalData), @js($tanggalFmt), @js($kelasNama), @js($mapelNama))"
                                        class="p-2 bg-slate-100 text-slate-500 hover:bg-emerald-600 hover:text-white rounded-xl transition-all shadow-sm">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/></svg>
                                </button>
                                <a href="{{ route('guru.absensi.edit', $a->id) }}" 
                                   class="p-2 bg-amber-50 text-amber-600 hover:bg-amber-500 hover:text-white rounded-xl transition-all shadow-sm">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/></svg>
                                </a>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5" class="p-20 text-center text-slate-400 italic">Belum ada data absensi.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>

{{-- ================= MODAL DETAIL ================= --}}
{{-- Canonical Class: z-100 replaces z-[100] --}}
<div id="modalDetail" class="fixed inset-0 bg-slate-900/60 backdrop-blur-sm hidden z-100 overflow-y-auto">
    <div class="flex items-center justify-center min-h-screen p-4">
        <div class="bg-white w-full max-w-md rounded-[28px] overflow-hidden shadow-2xl animate-modal-in border border-slate-100">
            <div class="bg-slate-900 p-6 text-white relative">
                <h2 id="modal-title" class="text-lg font-black tracking-tight leading-tight pr-8 text-emerald-400">Rincian</h2>
                <p id="modal-subtitle" class="text-slate-400 text-[10px] font-bold uppercase tracking-wider mt-1"></p>
                <button onclick="closeDetailModal()" class="absolute top-6 right-6 p-1 text-slate-400 hover:text-white transition-colors">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
                </button>
            </div>

            <div class="p-5">
                <div class="flex bg-slate-100 p-1 rounded-xl mb-5">
                    @foreach(['all' => 'Semua', 'izin' => 'Izin', 'sakit' => 'Sakit', 'alpha' => 'Alpha'] as $key => $label)
                        <button onclick="filterModalStatus('{{ $key }}')" 
                                id="tab-{{ $key }}" 
                                class="flex-1 py-1.5 text-[10px] font-black uppercase rounded-lg transition-all {{ $key == 'all' ? 'bg-white shadow-sm text-emerald-700' : 'text-slate-400' }}">
                            {{ $label }}
                        </button>
                    @endforeach
                </div>

                {{-- Canonical Class: max-h-80 (atau tetap gunakan pixel jika ingin presisi 350px) --}}
                <div id="modal-list-container" class="space-y-2 max-h-80 overflow-y-auto pr-1 custom-scrollbar">
                    </div>

                <div class="mt-6">
                    <button onclick="closeDetailModal()" class="w-full bg-slate-900 text-white font-bold py-3.5 rounded-2xl text-sm transition-all hover:bg-slate-800 active:scale-95 shadow-lg">
                        Tutup
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    @keyframes modalIn {
        from { opacity: 0; transform: scale(0.95) translateY(10px); }
        to { opacity: 1; transform: scale(1) translateY(0); }
    }
    .animate-modal-in { animation: modalIn 0.3s ease-out; }
    .custom-scrollbar::-webkit-scrollbar { width: 4px; }
    .custom-scrollbar::-webkit-scrollbar-thumb { background: #cbd5e1; border-radius: 10px; }
</style>

<script>
    let currentModalData = [];

    function openDetailModal(data, tanggal, kelas, mapel) {
        currentModalData = data;
        document.getElementById('modalDetail').classList.remove('hidden');
        document.getElementById('modal-title').innerText = mapel;
        document.getElementById('modal-subtitle').innerText = `${kelas} • ${tanggal}`;
        filterModalStatus('all');
    }

    function closeDetailModal() {
        document.getElementById('modalDetail').classList.add('hidden');
    }

    function filterModalStatus(status) {
        const container = document.getElementById('modal-list-container');
        container.innerHTML = '';

        const tabs = ['all', 'izin', 'sakit', 'alpha'];
        tabs.forEach(t => {
            const el = document.getElementById('tab-' + t);
            el.className = "flex-1 py-1.5 text-[10px] font-black uppercase rounded-lg transition-all text-slate-400";
        });

        const activeTab = document.getElementById('tab-' + status);
        activeTab.className = "flex-1 py-1.5 text-[10px] font-black uppercase rounded-lg transition-all bg-white shadow-sm text-emerald-700";

        const filtered = status === 'all' ? currentModalData : currentModalData.filter(d => d.status === status);

        if (filtered.length === 0) {
            container.innerHTML = `<div class="text-center py-10 text-slate-400 text-xs italic">Data tidak ada.</div>`;
            return;
        }

        filtered.forEach(item => {
            let colors = '';
            if(item.status === 'hadir') colors = 'bg-emerald-50 text-emerald-600 border-emerald-100';
            else if(item.status === 'izin') colors = 'bg-blue-50 text-blue-600 border-blue-100';
            else if(item.status === 'sakit') colors = 'bg-amber-50 text-amber-600 border-amber-100';
            else colors = 'bg-rose-50 text-rose-600 border-rose-100';

            const html = `
                <div class="p-3.5 rounded-2xl border border-slate-50 bg-slate-50/20">
                    <div class="flex justify-between items-start gap-3">
                        <div class="min-w-0">
                            <p class="font-bold text-slate-800 text-sm truncate">${item.nama}</p>
                            <p class="text-[10px] text-slate-400 italic leading-tight mt-1">Ket: ${item.keterangan}</p>
                        </div>
                        <span class="px-2.5 py-1 rounded-lg text-[9px] font-black uppercase border ${colors}">
                            ${item.status}
                        </span>
                    </div>
                </div>
            `;
            container.insertAdjacentHTML('beforeend', html);
        });
    }
</script>
@endsection