@extends('layouts.dashboard')

@section('title', 'Edit Nilai')

@section('content')
<div class="max-w-4xl mx-auto pb-10">

    {{-- HEADER --}}
    <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-6 mb-8 px-2">
        <div>
            <h1 class="text-3xl font-black text-slate-800 tracking-tight">
                Edit <span class="text-emerald-600">Nilai</span>
            </h1>
            <p class="text-sm font-medium text-slate-400 mt-1">
                Perbarui nilai untuk mata pelajaran <span class="text-slate-700 font-bold">{{ $info['mapel'] }}</span>
            </p>
        </div>

        <a href="{{ route('guru.nilai.index') }}"
           class="inline-flex items-center gap-2 bg-white text-slate-600 hover:bg-slate-50 border border-slate-200 px-6 py-2.5 rounded-2xl font-bold text-sm shadow-sm transition-all">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/></svg>
            Kembali
        </a>
    </div>

    {{-- FORM --}}
    {{-- $siswa tunggal dikirim dari controller --}}
    <form method="POST" action="{{ route('guru.nilai.update', $siswa->id) }}">
        @csrf
        @method('PUT')

        <div class="bg-white rounded-3xl shadow-sm border border-slate-100 overflow-hidden mx-2">
            
            {{-- SUB HEADER --}}
            <div class="bg-emerald-50/50 border-b border-emerald-100 px-8 py-5 flex justify-between items-center">
                <div class="flex items-center gap-3">
                    <div class="w-10 h-10 bg-emerald-600 rounded-xl flex items-center justify-center text-white font-bold shadow-lg shadow-emerald-200">
                        {{ substr($siswa->nama, 0, 1) }}
                    </div>
                    <div>
                        <span class="font-black text-slate-700 uppercase text-sm block leading-none">
                            {{ $siswa->nama }}
                        </span>
                        <span class="text-[10px] text-emerald-600 font-bold tracking-widest uppercase">
                            NISN: {{ $siswa->nisn }}
                        </span>
                    </div>
                </div>
                <span class="text-[10px] font-black text-emerald-700 bg-emerald-100 px-4 py-1.5 rounded-full border border-emerald-200">
                    {{ $info['kelas'] }}
                </span>
            </div>

            <div class="p-8">
                @php
                    $nilai = $siswa->nilai->first();
                    $t = $nilai->tugas ?? 0;
                    $u = $nilai->uts ?? 0;
                    $a = $nilai->uas ?? 0;
                    $rata = ($t * 0.3) + ($u * 0.3) + ($a * 0.4);
                @endphp

                <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                    
                    {{-- INPUT TUGAS --}}
                    <div class="space-y-2">
                        <label class="text-xs font-black text-slate-400 uppercase ml-1">Nilai Tugas (30%)</label>
                        <input type="number" name="tugas" value="{{ $t }}" data-type="tugas"
                               class="input-nilai w-full bg-slate-50 border-2 border-slate-100 rounded-2xl p-4 text-xl font-black text-slate-700 focus:border-emerald-500 focus:ring-0 transition-all"
                               placeholder="0">
                    </div>

                    {{-- INPUT UTS --}}
                    <div class="space-y-2">
                        <label class="text-xs font-black text-slate-400 uppercase ml-1">Nilai UTS (30%)</label>
                        <input type="number" name="uts" value="{{ $u }}" data-type="uts"
                               class="input-nilai w-full bg-slate-50 border-2 border-slate-100 rounded-2xl p-4 text-xl font-black text-slate-700 focus:border-emerald-500 focus:ring-0 transition-all"
                               placeholder="0">
                    </div>

                    {{-- INPUT UAS --}}
                    <div class="space-y-2">
                        <label class="text-xs font-black text-slate-400 uppercase ml-1">Nilai UAS (40%)</label>
                        <input type="number" name="uas" value="{{ $a }}" data-type="uas"
                               class="input-nilai w-full bg-slate-50 border-2 border-slate-100 rounded-2xl p-4 text-xl font-black text-slate-700 focus:border-emerald-500 focus:ring-0 transition-all"
                               placeholder="0">
                    </div>

                </div>

                {{-- HASIL RATA-RATA --}}
                <div class="mt-10 p-6 bg-emerald-50 rounded-3xl border border-emerald-100 flex items-center justify-between">
                    <div>
                        <p class="text-emerald-800 font-black text-lg">Prediksi Rata-Rata</p>
                        <p class="text-emerald-600/60 text-xs font-bold uppercase tracking-widest">Dihitung otomatis berdasarkan bobot</p>
                    </div>
                    <div class="text-right">
                        <span id="display-rata" class="text-4xl font-black text-emerald-700">
                            {{ number_format($rata, 2) }}
                        </span>
                    </div>
                </div>
            </div>
        </div>

        {{-- BUTTON SIMPAN --}}
        <div class="flex justify-end mt-8 px-2">
            <button type="submit"
                class="w-full md:w-auto bg-emerald-600 hover:bg-emerald-700 text-white px-12 py-4 rounded-2xl font-black shadow-xl shadow-emerald-200 transition-all active:scale-95 flex items-center justify-center gap-3">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                Simpan Perubahan Nilai
            </button>
        </div>

    </form>
</div>

{{-- SCRIPT HITUNG OTOMATIS --}}
<script>
document.querySelectorAll('.input-nilai').forEach(input => {
    input.addEventListener('input', function () {
        const t = parseFloat(document.querySelector('[data-type="tugas"]').value) || 0;
        const u = parseFloat(document.querySelector('[data-type="uts"]').value) || 0;
        const a = parseFloat(document.querySelector('[data-type="uas"]').value) || 0;

        const total = (t * 0.3) + (u * 0.3) + (a * 0.4);
        document.getElementById('display-rata').innerText = total.toFixed(2);
    });
});
</script>
@endsection