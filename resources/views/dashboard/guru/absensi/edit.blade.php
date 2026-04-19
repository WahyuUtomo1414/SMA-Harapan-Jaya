@extends('layouts.dashboard')

@section('title', 'Edit Absensi')
@section('page_title', 'Edit Absensi')

@section('content')
<div class="max-w-6xl mx-auto pb-10">

    {{-- Breadcrumbs / Back Button --}}
    <div class="mb-6">
        <a href="{{ route('guru.absensi.index') }}" class="inline-flex items-center gap-2 px-4 py-2 bg-white border border-gray-200 text-gray-600 rounded-xl hover:bg-gray-50 hover:text-emerald-600 transition-all shadow-sm group">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 transform group-hover:-translate-x-1 transition-transform" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
            </svg>
            <span class="font-medium">Kembali ke Daftar</span>
        </a>
    </div>

    @if(session('success'))
        <div class="mb-6 bg-emerald-50 border-l-4 border-emerald-500 text-emerald-700 p-4 rounded-xl flex items-center gap-3 animate-fade-in">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
            </svg>
            {{ session('success') }}
        </div>
    @endif

    <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
        <div class="p-6 border-b bg-gray-50/50">
            <h1 class="text-xl font-bold text-gray-800">Edit Data Absensi</h1>
            <p class="text-sm text-gray-500">Perbarui kehadiran siswa secara akurat.</p>
        </div>

        <form method="POST" action="{{ route('guru.absensi.update', $absensi->id) }}">
            @csrf
            @method('PUT')

            <div class="divide-y divide-gray-100">
                @foreach($absensi->absensiDetail as $detail)
                <div class="p-5 flex flex-col lg:flex-row lg:items-center justify-between gap-6 hover:bg-gray-50/80 transition">
                    
                    {{-- Student Info - Fixed & Responsive --}}
                    <div class="w-full lg:w-1/4">
                        <p class="font-bold text-gray-900 truncate" title="{{ $detail->murid->nama }}">
                            {{ $detail->murid->nama }}
                        </p>
                        <p class="text-xs font-medium text-gray-400 tracking-wider">NISN: {{ $detail->murid->nisn }}</p>
                    </div>

                    {{-- Status Selection --}}
                    <div class="flex flex-wrap gap-2 sm:gap-3">
                        @foreach([
                            'hadir' => 'bg-emerald-50 text-emerald-600 border-emerald-200 peer-checked:bg-emerald-600 peer-checked:text-white peer-checked:border-emerald-600',
                            'izin'  => 'bg-blue-50 text-blue-600 border-blue-200 peer-checked:bg-blue-600 peer-checked:text-white peer-checked:border-blue-600',
                            'sakit' => 'bg-amber-50 text-amber-600 border-amber-200 peer-checked:bg-amber-600 peer-checked:text-white peer-checked:border-amber-600',
                            'alpha' => 'bg-rose-50 text-rose-600 border-rose-200 peer-checked:bg-rose-600 peer-checked:text-white peer-checked:border-rose-600'
                        ] as $status => $classes)
                        
                        <label class="relative flex-1 sm:flex-none">
                            <input type="radio"
                                   name="absensi[{{ $detail->murid_id }}]"
                                   value="{{ $status }}"
                                   class="sr-only peer"
                                   required
                                   {{ $detail->status_absen == $status ? 'checked' : '' }}>
                            
                            <span class="cursor-pointer px-3 py-2 rounded-lg border text-xs sm:text-sm font-bold transition-all duration-200 block text-center uppercase tracking-tight {{ $classes }}">
                                {{ $status }}
                            </span>
                        </label>
                        @endforeach
                    </div>

                    {{-- Note Input --}}
                    <div class="grow w-full lg:max-w-xs">
                        <div class="relative">
                            <input type="text"
                                   name="keterangan[{{ $detail->murid_id }}]"
                                   value="{{ $detail->keterangan }}"
                                   class="w-full border-gray-200 rounded-lg pl-3 pr-3 py-2 text-sm focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 transition-all bg-gray-50/50 focus:bg-white"
                                   placeholder="Catatan tambahan...">
                        </div>
                    </div>

                </div>
                @endforeach
            </div>

            {{-- Action Buttons --}}
            <div class="p-6 bg-gray-50 border-t flex flex-col sm:flex-row justify-end gap-3">
                <a href="{{ route('guru.absensi.index') }}" class="px-6 py-2.5 rounded-xl border border-gray-300 text-gray-700 font-semibold hover:bg-white text-center transition">
                    Batal
                </a>
                <button type="submit" class="bg-emerald-600 hover:bg-emerald-700 text-white px-8 py-2.5 rounded-xl font-semibold shadow-lg shadow-emerald-200 transition-all active:scale-95">
                    Simpan Perubahan
                </button>
            </div>

        </form>
    </div>
</div>

<style>
    .animate-fade-in {
        animation: fadeIn 0.5s ease-out;
    }
    @keyframes fadeIn {
        from { opacity: 0; transform: translateY(-10px); }
        to { opacity: 1; transform: translateY(0); }
    }
</style>
@endsection