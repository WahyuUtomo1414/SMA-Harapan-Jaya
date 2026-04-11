@php
    // DETEKSI BERDASARKAN URL (Logika yang kamu minta)
    $isGuru = Request::is('*dashboard-guru*') || Request::is('*guru*');
    $isSiswa = Request::is('*dashboard-murid*') || Request::is('*murid*') || Request::is('*siswa*');

    $user = Auth::user();
    // Ambil inisial nama untuk avatar jika tidak ada foto
    $initials = strtoupper(substr($user?->name ?? 'U', 0, 1));
@endphp

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Dashboard')</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>

    <style>
        [x-cloak] { display: none !important; }
        .custom-scroll::-webkit-scrollbar { width: 4px; }
        .custom-scroll::-webkit-scrollbar-track { background: transparent; }
        .custom-scroll::-webkit-scrollbar-thumb { background: #e2e8f0; border-radius: 10px; }
    </style>
</head>

<body class="bg-[#fcfcfd] text-slate-600 antialiased overflow-hidden"
      x-data="{ sidebarOpen: false }"
      @keydown.escape="sidebarOpen = false">

<div class="flex h-screen w-full overflow-hidden">

    {{-- SIDEBAR --}}
    <aside
        class="fixed inset-y-0 left-0 z-50 w-64 bg-[#1e293b] text-slate-300 transition-transform duration-300 transform lg:translate-x-0 lg:static lg:inset-0 shrink-0"
        :class="sidebarOpen ? 'translate-x-0' : '-translate-x-full'"
        x-cloak>

        <div class="flex flex-col h-full">

            {{-- BRAND --}}
            <div class="p-6 flex items-center justify-between border-b border-slate-700/50">
                <div class="flex items-center gap-3">
                    <div class="w-9 h-9 rounded-xl flex items-center justify-center shadow-lg shadow-black/20 {{ $isGuru ? 'bg-emerald-500' : 'bg-indigo-500' }}">
                        <span class="text-white text-lg">🎓</span>
                    </div>
                    <h1 class="text-sm font-black text-white tracking-widest uppercase">
                        School<span class="{{ $isGuru ? 'text-emerald-400' : 'text-indigo-400' }}">Hub</span>
                    </h1>
                </div>
            </div>

            {{-- MENU NAVIGASI --}}
            <nav class="flex-1 px-4 py-6 space-y-1.5 overflow-y-auto custom-scroll font-sans text-slate-400">

                <p class="px-3 pb-2 text-[10px] font-black text-slate-500 uppercase tracking-[0.2em]">Dashboard</p>

                {{-- BERANDA --}}
                <a href="{{ $isGuru ? url('/dashboard-guru') : url('/dashboard-murid') }}"
                   class="flex items-center gap-3 px-4 py-2.5 rounded-xl text-xs font-bold transition-all
                   {{ Request::is('*dashboard*')
                        ? ($isGuru ? 'bg-emerald-500 text-white shadow-lg shadow-emerald-500/20' : 'bg-indigo-500 text-white shadow-lg shadow-indigo-500/20')
                        : 'hover:bg-slate-800 hover:text-white' }}">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/></svg>
                    <span>Beranda Utama</span>
                </a>

                {{-- MENU GURU --}}
                @if($isGuru)
                <div class="pt-4 space-y-1.5">
                    <p class="px-3 pb-2 text-[10px] font-black text-slate-500 uppercase tracking-[0.2em]">Akademik Guru</p>
                    <a href="{{ url('/guru/nilai') }}" class="flex items-center gap-3 px-4 py-2.5 rounded-xl text-xs font-bold hover:bg-slate-800 hover:text-white transition-all">
                        <span class="text-emerald-500">📊</span> Input Nilai
                    </a>
                    <a href="{{ url('/guru/absensi') }}" class="flex items-center gap-3 px-4 py-2.5 rounded-xl text-xs font-bold hover:bg-slate-800 hover:text-white transition-all">
                        <span class="text-emerald-500">📝</span> Absensi Siswa
                    </a>
                    <a href="{{ url('/guru/data-siswa') }}" class="flex items-center gap-3 px-4 py-2.5 rounded-xl text-xs font-bold hover:bg-slate-800 hover:text-white transition-all">
                        <span class="text-emerald-500">👨‍🎓</span> Data Siswa
                    </a>
                    <a href="{{ url('/guru/jadwal') }}" class="flex items-center gap-3 px-4 py-2.5 rounded-xl text-xs font-bold hover:bg-slate-800 hover:text-white transition-all">
                        <span class="text-emerald-500">📅</span> Jadwal Mengajar
                    </a>
                </div>
                @endif

                {{-- MENU SISWA --}}
                @if($isSiswa)
                <div class="pt-4 space-y-1.5">
                    <p class="px-3 pb-2 text-[10px] font-black text-slate-500 uppercase tracking-[0.2em]">Menu Belajar</p>
                    <a href="{{ url('/siswa/nilai') }}" class="flex items-center gap-3 px-4 py-2.5 rounded-xl text-xs font-bold hover:bg-slate-800 hover:text-white transition-all">
                        <span class="text-indigo-400">📊</span> Nilai Saya
                    </a>
                    <a href="{{ url('/siswa/absensi') }}" class="flex items-center gap-3 px-4 py-2.5 rounded-xl text-xs font-bold hover:bg-slate-800 hover:text-white transition-all">
                        <span class="text-indigo-400">📝</span> Rekap Absen
                    </a>
                    <a href="{{ url('/siswa/materi') }}" class="flex items-center gap-3 px-4 py-2.5 rounded-xl text-xs font-bold hover:bg-slate-800 hover:text-white transition-all">
                        <span class="text-indigo-400">📘</span> Materi Pelajaran
                    </a>
                    <a href="{{ url('/siswa/pembayaran') }}" class="flex items-center gap-3 px-4 py-2.5 rounded-xl text-xs font-bold hover:bg-slate-800 hover:text-white transition-all">
                        <span class="text-indigo-400">💳</span> Pembayaran SPP
                    </a>
                </div>
                @endif

            </nav>

            {{-- LOGOUT --}}
            <div class="p-4 border-t border-slate-700/50">
                <form method="POST" action="/logout">
                    @csrf
                    <button class="w-full flex items-center gap-3 px-4 py-2.5 rounded-xl text-rose-400 hover:bg-rose-500/10 text-[11px] font-black uppercase tracking-widest transition-all">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/></svg>
                        <span>Keluar</span>
                    </button>
                </form>
            </div>
        </div>
    </aside>

    {{-- AREA KANAN --}}
    <div class="flex-1 flex flex-col min-w-0 h-full overflow-hidden">

        {{-- TOPBAR (NAVBAR) --}}
        <header class="shrink-0 bg-white border-b border-slate-100 px-4 lg:px-10 py-3 flex items-center justify-between shadow-sm z-30">
            
            {{-- Kiri: Judul Halaman & Mobile Toggle --}}
            <div class="flex items-center gap-4">
                <button @click="sidebarOpen = !sidebarOpen" class="p-2 rounded-lg bg-slate-50 lg:hidden border border-slate-100 text-slate-500">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/></svg>
                </button>
                <div class="hidden sm:block">
                    <h1 class="text-[10px] font-black text-slate-400 uppercase tracking-widest mb-0.5">Halaman Kontrol</h1>
                    <p class="text-sm font-black text-slate-800 uppercase leading-none">@yield('title')</p>
                </div>
            </div>

            {{-- Kanan: Profile & Identity --}}
            <div class="flex items-center gap-3 pl-4 border-l border-slate-100">
                <div class="text-right hidden sm:block">
                    <p class="text-[11px] font-black text-slate-800 uppercase leading-none">{{ $user?->name ?? 'User' }}</p>
                    <p class="text-[9px] font-bold mt-1 uppercase tracking-tighter {{ $isGuru ? 'text-emerald-500' : 'text-indigo-500' }}">
                        {{ $isGuru ? 'Tenaga Pengajar' : 'Siswa Aktif' }}
                    </p>
                </div>
                
                {{-- Foto Profile (Avatar) --}}
                <div class="relative group cursor-pointer">
                    <div class="w-10 h-10 rounded-full border-2 p-0.5 transition-all {{ $isGuru ? 'border-emerald-100 group-hover:border-emerald-500' : 'border-indigo-100 group-hover:border-indigo-500' }}">
                        @if($user?->photo)
                            <img src="{{ asset('storage/'.$user->photo) }}" class="w-full h-full rounded-full object-cover">
                        @else
                            <div class="w-full h-full rounded-full flex items-center justify-center font-black text-xs {{ $isGuru ? 'bg-emerald-500 text-white' : 'bg-indigo-500 text-white' }}">
                                {{ $initials }}
                            </div>
                        @endif
                    </div>
                    {{-- Status Dot --}}
                    <div class="absolute bottom-0 right-0 w-3 h-3 bg-green-500 border-2 border-white rounded-full"></div>
                </div>
            </div>
        </header>

        {{-- MAIN CONTENT --}}
        <main class="flex-1 overflow-y-auto custom-scroll p-4 lg:p-10 bg-[#f8fafc]">
            <div class="max-w-7xl mx-auto">
                @yield('content')
            </div>
        </main>

    </div>
</div>

</body>
</html>