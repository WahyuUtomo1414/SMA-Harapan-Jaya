@extends('layouts.dashboard')

@section('title', 'Status Pembayaran SPP')

@section('content')
<div class="animate-fade-in space-y-6 px-2 md:px-0">
    {{-- Summary Cards --}}
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        {{-- Total Terbayar --}}
        <div class="bg-blue-600 rounded-4xl p-8 text-white shadow-xl shadow-blue-100 relative overflow-hidden group">
            <div class="absolute -right-5 -top-5 opacity-10 group-hover:scale-110 transition-transform duration-700">
                <svg class="w-40 h-40" fill="currentColor" viewBox="0 0 24 24">
                    <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm1 17h-2v-2h2v2zm2.07-7.75l-.9.92C13.45 12.9 13 13.5 13 15h-2v-.5c0-1.1.45-2.1 1.17-2.83l1.24-1.26c.37-.36.59-.86.59-1.41 0-1.1-.9-2-2-2s-2 .9-2 2H8c0-2.21 1.79-4 4-4s4 1.79 4 4c0 .88-.36 1.68-.93 2.25z"></path>
                </svg>
            </div>
            <p class="text-[10px] font-black uppercase tracking-[0.2em] opacity-70">Total Terbayar (2025/2026)</p>
            <div class="flex items-baseline gap-2 mt-2">
                <span class="text-xl font-bold opacity-70 italic">Rp</span>
                <h3 class="text-4xl font-black italic">3.500.000</h3>
            </div>
            <p class="mt-6 text-[9px] font-black uppercase tracking-widest italic text-blue-100">7 dari 12 Bulan Lunas</p>
        </div>

        {{-- Info Pembayaran Terakhir --}}
        <div class="bg-white rounded-4xl p-8 border border-slate-100 shadow-sm md:col-span-2 flex flex-col justify-between">
            <div>
                {{-- PERBAIKAN DI SINI: Hanya gunakan text-blue-600 agar tidak konflik --}}
                <h4 class="text-xl font-black uppercase tracking-tighter italic text-blue-600">Catatan Keuangan</h4>
                <p class="text-[10px] font-black text-slate-400 mt-1 uppercase tracking-[0.2em]">Siswa hanya dapat memantau riwayat pembayaran</p>
            </div>
            <div class="mt-6 p-4 rounded-3xl bg-slate-50 border border-slate-100 flex items-center justify-between">
                <div>
                    <p class="text-[8px] font-black text-slate-400 uppercase tracking-widest">Pembayaran Terakhir</p>
                    <p class="text-sm font-black text-slate-700 italic uppercase">SPP Bulan Januari 2026</p>
                </div>
                <div class="text-right">
                    <span class="px-3 py-1 bg-emerald-100 text-emerald-600 rounded-full text-[9px] font-black uppercase tracking-widest">Sukses</span>
                </div>
            </div>
        </div>
    </div>

    {{-- Tabel Status Per Bulan --}}
    <div class="bg-white rounded-4xl shadow-sm border border-slate-100 overflow-hidden">
        <div class="p-8 border-b border-slate-50">
            <h3 class="font-black text-slate-800 uppercase text-sm tracking-[0.15em]">Riwayat Iuran SPP Tahunan</h3>
        </div>
        
        <div class="overflow-x-auto">
            <table class="w-full min-w-200">
                <thead>
                    <tr class="bg-slate-50/50 text-[10px] font-black text-slate-400 uppercase tracking-widest">
                        <th class="px-8 py-6 text-left">Bulan</th>
                        <th class="px-6 py-6 text-center italic">Nominal Tagihan</th>
                        <th class="px-6 py-6 text-center italic">Tanggal Bayar</th>
                        <th class="px-8 py-6 text-center">Status</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-50">
                    @php
                        $sppData = [
                            ['bulan' => 'Juli 2025', 'nominal' => '500.000', 'tgl' => '10/07/2025', 'lunas' => true],
                            ['bulan' => 'Agustus 2025', 'nominal' => '500.000', 'tgl' => '05/08/2025', 'lunas' => true],
                            ['bulan' => 'September 2025', 'nominal' => '500.000', 'tgl' => '12/09/2025', 'lunas' => true],
                            ['bulan' => 'Oktober 2025', 'nominal' => '500.000', 'tgl' => '08/10/2025', 'lunas' => true],
                            ['bulan' => 'November 2025', 'nominal' => '500.000', 'tgl' => '15/11/2025', 'lunas' => true],
                            ['bulan' => 'Desember 2025', 'nominal' => '500.000', 'tgl' => '02/12/2025', 'lunas' => true],
                            ['bulan' => 'Januari 2026', 'nominal' => '500.000', 'tgl' => '07/01/2026', 'lunas' => true],
                            ['bulan' => 'Februari 2026', 'nominal' => '500.000', 'tgl' => '-', 'lunas' => false],
                            ['bulan' => 'Maret 2026', 'nominal' => '500.000', 'tgl' => '-', 'lunas' => false],
                        ];
                    @endphp

                    @foreach($sppData as $s)
                    <tr class="hover:bg-slate-50/30 transition-all group">
                        <td class="px-8 py-6 font-black text-slate-700 uppercase text-sm group-hover:text-blue-600">
                            {{ $s['bulan'] }}
                        </td>
                        <td class="px-6 py-6 text-center font-bold text-slate-500">Rp {{ $s['nominal'] }}</td>
                        <td class="px-6 py-6 text-center font-medium text-slate-400 text-xs">{{ $s['tgl'] }}</td>
                        <td class="px-8 py-6 text-center">
                            @if($s['lunas'])
                                <div class="inline-block px-5 py-2 rounded-2xl bg-emerald-50 text-emerald-600 border border-emerald-100 font-black text-[10px] uppercase tracking-widest italic">
                                    Lunas
                                </div>
                            @else
                                <div class="inline-block px-5 py-2 rounded-2xl bg-rose-50 text-rose-600 border border-rose-100 font-black text-[10px] uppercase tracking-widest italic">
                                    Belum Bayar
                                </div>
                            @endif
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    {{-- Alert Info --}}
    <div class="bg-amber-50 rounded-3xl p-6 border border-amber-100 flex items-start gap-4">
        <span class="text-xl">⚠️</span>
        <div>
            <p class="text-[10px] font-black text-amber-800 uppercase tracking-widest italic">Peringatan Sistem</p>
            <p class="text-xs text-amber-700 font-medium mt-1 leading-relaxed">
                Pembayaran SPP dilakukan melalui Tata Usaha (TU) atau transfer Bank. Data pada dashboard ini akan diperbarui maksimal 1x24 jam setelah proses verifikasi admin.
            </p>
        </div>
    </div>
</div>
@endsection