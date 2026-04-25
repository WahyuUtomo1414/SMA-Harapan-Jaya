@extends('layouts.dashboard')

@section('title', 'Dashboard Murid')
@section('page_title', 'Dashboard Overview')

@section('content')

<div class="space-y-6 md:space-y-8 animate-fade-in pb-10 px-1 md:px-0">

    {{-- HEADER WITH ADAPTIVE GRADIENT (Tailwind v4 Standard) --}}
    <div class="relative overflow-hidden bg-linear-to-br from-emerald-600 via-green-600 to-teal-700 rounded-4xl p-6 md:p-8 shadow-2xl shadow-green-200/40">
        <div class="relative z-10 flex flex-col md:flex-row md:items-center justify-between gap-6">
            <div class="flex items-center gap-4 md:gap-6">
                <div class="group relative shrink-0">
                    <div class="absolute -inset-1 bg-white/40 rounded-2xl blur opacity-25 group-hover:opacity-50 transition duration-1000"></div>
                    <div class="relative w-14 h-14 md:w-20 md:h-20 bg-white/20 backdrop-blur-xl rounded-2xl flex items-center justify-center border border-white/30 shadow-inner">
                        <span class="text-2xl md:text-4xl transform group-hover:scale-110 transition-transform duration-300">🏫</span>
                    </div>
                </div>
                <div>
                    <h1 class="text-xl md:text-4xl font-black text-white tracking-tight leading-tight">
                        Halo, {{ explode(' ', trim($murid->nama ?? 'Siswa'))[0] }}!
                    </h1>
                    <p class="text-green-50 text-base mt-1 opacity-90 flex items-center gap-2">
                        <span class="w-1.5 h-1.5 md:w-2 md:h-2 bg-green-300 rounded-full animate-pulse"></span>
                        Semangat belajar hari ini!
                    </p>
                </div>
            </div>
            
            <div class="hidden md:block bg-white/10 backdrop-blur-md border border-white/20 rounded-2xl p-4 text-white">
                <p class="text-[10px] opacity-70 uppercase tracking-widest font-bold mb-1">Tanggal Hari Ini</p>
                <p class="text-lg font-semibold">{{ now()->isoFormat('dddd, D MMMM Y') }}</p>
            </div>
        </div>
        
        {{-- Decorative Elements --}}
        <div class="absolute -right-10 -top-10 w-40 h-40 md:w-64 md:h-64 bg-white/10 rounded-full blur-3xl"></div>
    </div>

    @if(!$murid)
        <div class="bg-rose-50 border-2 border-rose-100 text-rose-700 p-8 rounded-4xl flex flex-col items-center text-center">
            <span class="text-5xl mb-4">⚠️</span>
            <h3 class="text-xl font-bold">Data Murid Belum Tersedia</h3>
            <p class="opacity-80">Hubungi admin SMA Harapan Jaya untuk sinkronisasi data.</p>
        </div>
    @else

    {{-- STATS CARDS (Responsive Grid) --}}
    <div class="grid grid-cols-2 lg:grid-cols-4 gap-4 md:gap-6">
        @php
            $stats = [
                ['label' => 'Materi', 'value' => $nilai->count(), 'icon' => '📚', 'color' => 'text-blue-600'],
                ['label' => 'Rata-rata', 'value' => number_format($rataRata,1), 'icon' => '📈', 'color' => 'text-emerald-600'],
                ['label' => 'Hadir', 'value' => $hadir, 'icon' => '✅', 'color' => 'text-teal-600'],
                ['label' => 'Alpha', 'value' => $alpha, 'icon' => '❌', 'color' => 'text-rose-600'],
            ];
        @endphp

        @foreach($stats as $stat)
        <div class="bg-white p-5 md:p-6 rounded-4xl shadow-sm border border-slate-100 hover:shadow-md hover:-translate-y-1 transition-all group">
            <div class="flex justify-between items-start mb-2 md:mb-4">
                <span class="text-[10px] md:text-xs font-bold uppercase tracking-wider text-slate-400">{{ $stat['label'] }}</span>
                <span class="text-lg md:text-xl group-hover:scale-125 transition-transform">{{ $stat['icon'] }}</span>
            </div>
            <h2 class="text-xl md:text-3xl font-black {{ $stat['color'] }}">{{ $stat['value'] }}</h2>
        </div>
        @endforeach
    </div>

    {{-- MAIN CONTENT GRID --}}
    <div class="grid grid-cols-1 xl:grid-cols-2 gap-6 md:gap-8">

        {{-- NILAI TABLE --}}
        <div class="bg-white rounded-4xl shadow-sm border border-slate-100 overflow-hidden flex flex-col">
            <div class="p-5 md:p-6 px-6 md:px-8 flex justify-between items-center bg-slate-50/50 border-b">
                <h3 class="font-bold text-slate-800 flex items-center gap-2 text-sm md:text-base">
                    <span class="text-blue-600">📊</span>
                    Capaian Nilai Akademik
                </h3>
            </div>

            <div class="overflow-x-auto">
                <table class="w-full text-sm">
                    <thead>
                        <tr class="text-[10px] md:text-xs text-slate-400 uppercase tracking-widest border-b">
                            <th class="px-6 md:px-8 py-4 text-left font-semibold">Mapel</th>
                            <th class="text-center font-semibold">UTS/UAS</th>
                            <th class="text-right px-6 md:px-8 font-semibold">Total</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-50">
                        @forelse($nilai as $n)
                        <tr class="hover:bg-slate-50 transition-colors group">
                            <td class="px-6 md:px-8 py-4 font-bold text-slate-700 text-xs md:text-sm">
                                {{ $n->mataPelajaran->nama ?? '-' }}
                            </td>
                            <td class="text-center text-slate-500 font-medium">
                                <span class="bg-slate-100 px-2 py-0.5 rounded text-[10px] md:text-xs">{{ $n->uts }}</span>
                                <span class="mx-1 text-slate-300">/</span>
                                <span class="bg-slate-100 px-2 py-0.5 rounded text-[10px] md:text-xs">{{ $n->uas }}</span>
                            </td>
                            <td class="text-right px-6 md:px-8">
                                <span class="inline-block bg-blue-600 text-white px-2 md:px-3 py-1 rounded-xl font-bold text-xs shadow-sm shadow-blue-200">
                                    {{ $n->total_nilai }}
                                </span>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="3" class="text-center py-10 text-slate-400 italic">Belum ada nilai masuk.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        {{-- ABSENSI LIST --}}
        <div class="bg-white rounded-4xl shadow-sm border border-slate-100 overflow-hidden flex flex-col">
            <div class="p-5 md:p-6 px-6 md:px-8 flex justify-between items-center bg-slate-50/50 border-b">
                <h3 class="font-bold text-slate-800 flex items-center gap-2 text-sm md:text-base">
                    <span class="text-teal-600">📅</span>
                    Presensi Terakhir
                </h3>
            </div>

            <div class="divide-y divide-slate-50 overflow-y-auto max-h-100">
                @forelse($absensi as $a)
                <div class="px-6 md:px-8 py-4 flex items-center justify-between hover:bg-slate-50 transition-all group">
                    <div class="flex items-center gap-3 md:gap-4 overflow-hidden">
                        <div class="hidden sm:flex w-10 h-10 shrink-0 rounded-xl bg-slate-100 items-center justify-center font-bold text-slate-400 group-hover:bg-teal-50 group-hover:text-teal-600 transition-colors">
                            {{ substr($a->absensi->jadwalPelajaran->mataPelajaran->nama ?? '?', 0, 1) }}
                        </div>
                        <div class="truncate">
                            <p class="font-bold text-slate-700 leading-tight text-xs md:text-sm truncate">
                                {{ $a->absensi->jadwalPelajaran->mataPelajaran->nama ?? '-' }}
                            </p>
                            <p class="text-[10px] text-slate-400 mt-1">
                                {{ \Carbon\Carbon::parse($a->absensi->tanggal ?? now())->isoFormat('dddd, D MMM Y') }}
                            </p>
                        </div>
                    </div>
                    @php
                        $statusColor = match(strtolower($a->status_absen)) {
                            'hadir' => 'bg-emerald-100 text-emerald-700',
                            'sakit', 'izin' => 'bg-amber-100 text-amber-700',
                            default => 'bg-rose-100 text-rose-700',
                        };
                    @endphp
                    <span class="{{ $statusColor }} px-2.5 py-1 rounded-lg text-[10px] font-black uppercase tracking-wider shrink-0 ml-2">
                        {{ $a->status_absen }}
                    </span>
                </div>
                @empty
                <div class="text-center py-10 text-slate-400 italic">Data absensi kosong.</div>
                @endforelse
            </div>
        </div>

    </div>
    {{-- SPP SECTION --}}
    <div class="bg-indigo-950 rounded-4xl p-6 md:p-8 text-white shadow-2xl relative overflow-hidden group">
        {{-- Background Decoration --}}
        <div class="absolute top-0 right-0 p-10 opacity-5 transform group-hover:scale-110 transition-transform duration-1000">
            <svg width="150" height="150" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm1.41 16.09V20h-2.82v-1.91c-.06 0-.11.01-.17.01-1.21 0-2.32-.41-3.21-1.08l1.17-1.17c.58.44 1.28.71 2.04.71 1.25 0 2.26-1.01 2.26-2.26 0-1.25-1.01-2.26-2.26-2.26-.06 0-.11.01-.17.01V11h3.11c.76 0 1.38-.62 1.38-1.38V6.1c0-.76-.62-1.38-1.38-1.38h-3.11V2.82h2.82V4.9c1.21 0 2.32.41 3.21 1.08l-1.17 1.17c-.58-.44-1.28-.71-2.04-.71-1.25 0-2.26 1.01-2.26 2.26 0 1.25 1.01 2.26 2.26 2.26.06 0 .11-.01.17-.01V13h-3.11c-.76 0-1.38.62-1.38 1.38v3.52c0 .76.62 1.38 1.38 1.38h3.11z"/></svg>
        </div>

        <div class="relative z-10">
            <div class="flex flex-col md:flex-row md:items-center justify-between gap-4 mb-8">
                <div>
                    <h3 class="text-xl md:text-2xl font-black tracking-tight text-white">Administrasi SPP</h3>
                    <p class="text-indigo-300 text-xs md:text-sm mt-1">Status pembayaran uang sekolah per bulan.</p>
                </div>
                <div class="px-4 py-2 bg-white/10 backdrop-blur-md rounded-xl border border-white/20 inline-flex items-center gap-2">
                    <span class="w-2.5 h-2.5 bg-emerald-400 rounded-full"></span>
                    <span class="text-[10px] font-bold uppercase tracking-widest text-white">Data Terverifikasi</span>
                </div>
            </div>

            <div class="bg-white/5 backdrop-blur-sm rounded-3xl overflow-hidden border border-white/10">
                <div class="overflow-x-auto">
                    <table class="w-full text-sm">
                        <thead>
                            <tr class="text-[10px] text-indigo-300 uppercase tracking-widest border-b border-white/10">
                                <th class="px-6 md:px-8 py-5 text-left font-bold">Periode</th>
                                <th class="font-bold text-center">Tahun</th>
                                <th class="text-right px-6 md:px-8 font-bold">Status</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-white/5">
                            @forelse($spp as $item)
                            <tr class="hover:bg-white/5 transition-colors group/row">
                                <td class="px-6 md:px-8 py-4 font-bold text-indigo-50">
                                    {{ \Carbon\Carbon::create()->month($item->bulan)->translatedFormat('F') }}
                                </td>
                                <td class="text-center font-medium text-indigo-200 text-xs">{{ $item->tahun }}</td>
                                <td class="px-6 md:px-8 text-right">
                                    @php
                                        $isPaid = strtoupper($item->status_bayar ?? '') === 'LUNAS';
                                    @endphp

                                    @if($isPaid)
                                        <span class="bg-emerald-500 text-white px-3 py-1 rounded-full text-[10px] font-black uppercase">
                                            Lunas
                                        </span>
                                    @else
                                        <span class="bg-rose-500 text-white px-3 py-1 rounded-full text-[10px] font-black uppercase">
                                            Belum Bayar
                                        </span>
                                    @endif
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="3" class="text-center py-10 text-indigo-300 italic">Data SPP tidak ditemukan.</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    @endif

</div>

<style>
    @keyframes fade-in {
        from { opacity: 0; transform: translateY(10px); }
        to { opacity: 1; transform: translateY(0); }
    }
    .animate-fade-in { animation: fade-in 0.6s ease-out forwards; }
    
    /* Custom Scrollbar for desktop consistency */
    @media (min-width: 768px) {
        .overflow-y-auto::-webkit-scrollbar { width: 4px; }
        .overflow-y-auto::-webkit-scrollbar-track { background: transparent; }
        .overflow-y-auto::-webkit-scrollbar-thumb { background: #cbd5e1; border-radius: 10px; }
    }
</style>

@endsection
