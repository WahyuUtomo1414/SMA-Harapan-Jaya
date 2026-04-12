@extends('layouts.dashboard')

@section('content')
<div class="animate-fade-in space-y-6 px-2 md:px-0">
    {{-- Header Card --}}
    <div class="bg-white rounded-4xl p-8 shadow-sm border border-slate-100 flex justify-between items-center">
        <div>
            <h2 class="text-2xl font-black text-slate-800 uppercase tracking-tight">Input Nilai - {{ $info['mapel'] }}</h2>
            <p class="text-[10px] font-black text-indigo-600 uppercase tracking-[0.2em] mt-1">{{ $info['kelas'] }} • SEMESTER {{ $info['semester'] }}</p>
        </div>
        <div class="hidden md:block text-right">
            <span class="text-[10px] font-black text-slate-400 uppercase tracking-widest">Bobot: T(30%) U(30%) UA(40%)</span>
        </div>
    </div>

    <div class="bg-white rounded-4xl shadow-sm border border-slate-100 overflow-hidden">
        <form action="{{ route('guru.nilai.store') }}" method="POST">
            @csrf
            <div class="overflow-x-auto scrollbar-hide">
                <table class="w-full min-w-175">
                    <thead>
                        <tr class="bg-slate-50/50 border-b border-slate-100 text-[11px] font-black text-slate-400 uppercase tracking-[0.2em]">
                            <th class="px-8 py-6 text-left w-20">No</th>
                            <th class="px-8 py-6 text-left sticky left-0 bg-white/95 backdrop-blur z-10">Nama Siswa</th>
                            <th class="px-4 py-6 text-center w-32">Tugas</th>
                            <th class="px-4 py-6 text-center w-32">UTS</th>
                            <th class="px-4 py-6 text-center w-32">UAS</th>
                            <th class="px-8 py-6 text-center w-32 text-indigo-600">Rata-rata</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-50">
                        @foreach($siswas as $index => $siswa)
                        @php
                            if (method_exists($siswa, 'nilai')) {
                                $dbNilai = $siswa->nilai->first();
                                $tugas = $dbNilai->tugas ?? 0;
                                $uts   = $dbNilai->uts   ?? 0;
                                $uas   = $dbNilai->uas   ?? 0;
                            } else {
                                $tugas = $siswa->tugas ?? 0;
                                $uts   = $siswa->uts   ?? 0;
                                $uas   = $siswa->uas   ?? 0;
                            }
                            $total = ($tugas * 0.3) + ($uts * 0.3) + ($uas * 0.4);
                        @endphp
                        <tr class="group hover:bg-slate-50/30 transition-all row-nilai">
                            <td class="px-8 py-5 text-sm font-black text-slate-300">
                                {{ str_pad($siswas->firstItem() + $index, 2, '0', STR_PAD_LEFT) }}
                            </td>
                            <td class="px-8 py-5 sticky left-0 bg-white/95 group-hover:bg-slate-50/95 backdrop-blur z-10">
                                <span class="text-sm font-black text-slate-700 uppercase tracking-tight">{{ $siswa->nama }}</span>
                            </td>
                            
                            <td class="px-4 py-5">
                                <input type="number" name="nilai[{{ $siswa->id }}][tugas]" value="{{ $tugas }}" 
                                    class="input-nilai w-full bg-slate-50 border-2 border-transparent focus:border-indigo-500 focus:bg-white rounded-xl py-2.5 text-center text-sm font-black text-slate-700 transition-all" data-type="tugas">
                            </td>
                            <td class="px-4 py-5">
                                <input type="number" name="nilai[{{ $siswa->id }}][uts]" value="{{ $uts }}" 
                                    class="input-nilai w-full bg-slate-50 border-2 border-transparent focus:border-indigo-500 focus:bg-white rounded-xl py-2.5 text-center text-sm font-black text-slate-700 transition-all" data-type="uts">
                            </td>
                            <td class="px-4 py-5">
                                <input type="number" name="nilai[{{ $siswa->id }}][uas]" value="{{ $uas }}" 
                                    class="input-nilai w-full bg-slate-50 border-2 border-transparent focus:border-indigo-500 focus:bg-white rounded-xl py-2.5 text-center text-sm font-black text-slate-700 transition-all" data-type="uas">
                            </td>

                            <td class="px-8 py-5 text-center">
                                <span class="display-rata inline-block px-4 py-2 bg-indigo-50 text-indigo-600 rounded-xl text-sm font-black">
                                    {{ number_format($total, 2) }}
                                </span>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <div class="px-10 py-8 bg-slate-50/30 border-t border-slate-100 flex flex-col md:flex-row items-center justify-between gap-6">
                <p class="text-[10px] font-black text-slate-400 uppercase tracking-widest">Total: {{ $info['total'] }} Siswa</p>
                <button type="submit" class="bg-indigo-600 hover:bg-indigo-700 text-white px-12 py-4 rounded-2xl font-black text-[11px] uppercase tracking-[0.2em] shadow-xl shadow-indigo-100 transition-all">
                    Simpan Nilai
                </button>
            </div>
        </form>
    </div>
</div>

{{-- SCRIPT HITUNG OTOMATIS --}}
<script>
    document.addEventListener('input', function (e) {
        if (e.target.classList.contains('input-nilai')) {
            const row = e.target.closest('.row-nilai');
            const tugas = parseFloat(row.querySelector('[data-type="tugas"]').value) || 0;
            const uts = parseFloat(row.querySelector('[data-type="uts"]').value) || 0;
            const uas = parseFloat(row.querySelector('[data-type="uas"]').value) || 0;

            // Rumus: 30% Tugas + 30% UTS + 40% UAS
            const rataRata = (tugas * 0.3) + (uts * 0.3) + (uas * 0.4);
            
            row.querySelector('.display-rata').innerText = rataRata.toFixed(2);
        }
    });
</script>
@endsection