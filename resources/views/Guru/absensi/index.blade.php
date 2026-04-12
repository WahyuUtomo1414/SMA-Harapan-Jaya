@extends('layouts.dashboard')

@section('title', 'Input Absensi')

@section('content')
<div class="animate-fade-in space-y-4 md:space-y-6 px-2 md:px-0">
    
    {{-- CARD HEADER --}}
    <div class="bg-white rounded-4xl md:rounded-[2.5rem] p-6 md:p-8 shadow-sm border border-slate-100">
        <div class="flex flex-col lg:flex-row lg:items-center justify-between gap-6">
            <div>
                <h2 class="text-xl md:text-2xl font-black text-slate-800 tracking-tight uppercase">
                    Input Absensi - {{ $info['mapel'] }}
                </h2>
                <div class="flex items-center gap-2 mt-1">
                    <span class="px-2 py-0.5 bg-indigo-50 text-indigo-600 text-[10px] font-black rounded-md uppercase">{{ $info['kelas'] }}</span>
                    <span class="text-slate-300">•</span>
                    <p class="text-xs md:text-sm text-slate-400 font-bold italic tracking-wide">2025/2026</p>
                </div>
            </div>
            
            <div class="group flex items-center justify-between lg:justify-start gap-3 bg-white px-5 py-3 rounded-2xl border border-slate-200 shadow-sm transition-all focus-within:border-indigo-500 focus-within:ring-4 focus-within:ring-indigo-50/50 w-full lg:w-auto">
                <label for="tanggal" class="text-[10px] font-black text-slate-400 uppercase tracking-[0.2em] border-r border-slate-100 pr-4">Tanggal</label>
                <input type="date" form="form-absensi" name="tanggal" id="tanggal" value="{{ date('Y-m-d') }}" 
                    class="bg-transparent border-none text-sm font-black text-slate-700 focus:ring-0 cursor-pointer p-0 text-right lg:text-left">
            </div>
        </div>
    </div>

    {{-- FILTER & SEARCH --}}
    <div class="flex flex-col md:flex-row md:items-center justify-between gap-4 px-2">
        <div class="flex items-center justify-between md:justify-start gap-4">
            <form action="{{ route('guru.absensi') }}" method="GET" class="flex items-center gap-2 bg-white border border-slate-200 px-3 py-2 rounded-xl">
                <span class="text-[10px] font-black text-slate-400 uppercase tracking-widest text-nowrap">Show</span>
                <select name="limit" onchange="this.form.submit()" class="bg-transparent border-none text-xs font-black text-slate-700 focus:ring-0 cursor-pointer p-0">
                    <option value="10" {{ request('limit') == 10 ? 'selected' : '' }}>10</option>
                    <option value="25" {{ request('limit') == 25 ? 'selected' : '' }}>25</option>
                    <option value="50" {{ request('limit') == 50 ? 'selected' : '' }}>50</option>
                </select>
            </form>
            <p class="text-[11px] font-bold text-slate-400 uppercase tracking-widest text-nowrap">
                Total: <span class="text-slate-800">{{ $info['total'] }} Siswa</span>
            </p>
        </div>

        <form action="{{ route('guru.absensi') }}" method="GET" class="relative w-full md:w-64">
            <input type="text" name="search" value="{{ request('search') }}" placeholder="Cari Nama/NISN..." class="pl-10 pr-4 py-3 bg-white border border-slate-200 rounded-xl text-xs font-bold focus:ring-4 focus:ring-indigo-50 focus:border-indigo-500 transition-all w-full">
            <svg class="w-4 h-4 absolute left-3 top-3.5 text-slate-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>
        </form>
    </div>

    {{-- TABLE --}}
    <div class="bg-white rounded-4xl md:rounded-[2.5rem] shadow-sm border border-slate-100 overflow-hidden relative">
        <form id="form-absensi" action="{{ route('guru.absensi.store') }}" method="POST">
            @csrf
            <div class="overflow-x-auto scrollbar-hide">
                {{-- FIX: Menggunakan min-w-175 sesuai saran Tailwind --}}
                <table class="w-full min-w-175">
                    <thead>
                        <tr class="bg-slate-50/50 border-b border-slate-100 text-[11px] font-black text-slate-400 uppercase tracking-[0.2em]">
                            <th class="px-6 md:px-8 py-6 text-left w-20">No</th>
                            <th class="px-6 md:px-8 py-6 text-left sticky left-0 bg-white/95 backdrop-blur z-10">Informasi Siswa</th>
                            <th class="px-4 py-6 text-center w-24 text-emerald-500 text-xs">Hadir</th>
                            <th class="px-4 py-6 text-center w-24 text-amber-500 text-xs">Izin</th>
                            <th class="px-4 py-6 text-center w-24 text-blue-500 text-xs">Sakit</th>
                            <th class="px-4 py-6 text-center w-24 text-rose-500 text-xs">Alpha</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-50">
                        @forelse($siswas as $index => $siswa)
                        <tr class="group hover:bg-slate-50/50 transition-all duration-200">
                            <td class="px-6 md:px-8 py-5 text-sm font-black text-slate-300 group-hover:text-slate-500">
                                {{ str_pad($siswas->firstItem() + $index, 2, '0', STR_PAD_LEFT) }}
                            </td>
                            <td class="px-6 md:px-8 py-5 sticky left-0 bg-white/95 group-hover:bg-slate-50/95 backdrop-blur z-10 transition-colors">
                                <div class="flex flex-col">
                                    <span class="text-sm font-black text-slate-700 group-hover:text-indigo-600 uppercase tracking-tight truncate max-w-40 md:max-w-none">
                                        {{ $siswa->nama }}
                                    </span>
                                    <span class="text-[9px] text-slate-400 font-bold uppercase tracking-widest mt-0.5">NISN: {{ $siswa->nisn ?? '-' }}</span>
                                </div>
                            </td>
                            
                            @foreach(['hadir', 'izin', 'sakit', 'alpha'] as $status)
                            <td class="px-4 py-5 text-center">
                                <div class="flex justify-center">
                                    <input type="radio" name="absensi[{{ $siswa->id }}]" value="{{ $status }}" 
                                           {{ $status == 'hadir' ? 'checked' : '' }}
                                           class="custom-radio w-6 h-6 md:w-7 md:h-7 cursor-pointer transition-all duration-300">
                                </div>
                            </td>
                            @endforeach
                        </tr>
                        @empty
                        <tr>
                            <td colspan="6" class="px-8 py-16 text-center">
                                <p class="text-xs font-black text-slate-300 uppercase tracking-widest">Siswa tidak ditemukan</p>
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            {{-- FOOTER --}}
            <div class="px-6 md:px-10 py-8 bg-slate-50/30 border-t border-slate-100 flex flex-col-reverse md:flex-row items-center justify-between gap-8">
                <div class="flex flex-col md:flex-row items-center gap-6 w-full md:w-auto">
                    <div class="text-[10px] font-black text-slate-400 uppercase tracking-widest">
                        Data <span class="text-slate-800">{{ $siswas->firstItem() ?? 0 }}</span> - <span class="text-slate-800">{{ $siswas->lastItem() ?? 0 }}</span> dari <span class="text-slate-800">{{ $siswas->total() }}</span>
                    </div>

                    <div class="custom-pagination">
                        {{ $siswas->links() }}
                    </div>
                </div>

                <button type="submit" class="group w-full md:w-auto bg-indigo-600 hover:bg-indigo-700 text-white px-10 py-4 rounded-2xl font-black text-[11px] uppercase tracking-[0.2em] shadow-xl shadow-indigo-200 transition-all active:scale-95">
                    Simpan Absensi
                </button>
            </div>
        </form>
    </div>
</div>

<style>
    .scrollbar-hide::-webkit-scrollbar { display: none; }
    .scrollbar-hide { -ms-overflow-style: none; scrollbar-width: none; }

    .custom-radio {
        appearance: none; -webkit-appearance: none;
        background-color: #fff; margin: 0;
        border: 2px solid #e2e8f0; border-radius: 9px;
        display: grid; place-content: center; position: relative;
    }
    .custom-radio:hover { border-color: #6366f1; }
    .custom-radio::before {
        content: ""; width: 12px; height: 12px; transform: scale(0);
        transition: 180ms transform cubic-bezier(0.34, 1.56, 0.64, 1);
        background-color: white;
        mask-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24' fill='none' stroke='white' stroke-width='4' stroke-linecap='round' stroke-linejoin='round'%3e%3cpolyline points='20 6 9 17 4 12'/%3e%3c/svg%3e");
        -webkit-mask-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24' fill='none' stroke='white' stroke-width='4' stroke-linecap='round' stroke-linejoin='round'%3e%3cpolyline points='20 6 9 17 4 12'/%3e%3c/svg%3e");
        mask-repeat: no-repeat; mask-position: center;
    }
    .custom-radio:checked { background-color: #4f46e5; border-color: #4f46e5; box-shadow: 0 4px 10px -2px rgba(79, 70, 229, 0.3); }
    .custom-radio:checked::before { transform: scale(1); }

    @media (max-width: 1024px) {
        .sticky { box-shadow: 10px 0 15px -10px rgba(0,0,0,0.05); }
    }
</style>
@endsection