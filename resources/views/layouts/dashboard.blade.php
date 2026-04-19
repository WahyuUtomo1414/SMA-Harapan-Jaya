@php
    $user = Auth::user();
    
    // Deteksi Role
    $isGuru = Request::is('guru*'); 
    $isSiswa = Request::is('murid*') || Request::is('siswa*');

    // Ambil inisial nama
    $initials = strtoupper(substr($user?->name ?? 'U', 0, 1));
    
    /** * WARNA TEMA DISESUAIKAN DENGAN FOTO (SMA HARAPAN JAYA)
     * Primer: Hijau (#008744) -> Tailwind 'emerald-700' mendekati
     * Aksen: Kuning/Emas -> Tailwind 'amber-400'
     */
    $themeColor = 'emerald'; 
    $accentColor = 'amber-400';
@endphp

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Dashboard') | SMA Harapan Jaya</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    <style>
        [x-cloak] { display: none !important; }
        body { font-family: 'Plus Jakarta Sans', sans-serif; }
        
        /* Scrollbar tipis agar UI bersih */
        .custom-scroll::-webkit-scrollbar { width: 4px; }
        .custom-scroll::-webkit-scrollbar-track { background: transparent; }
        .custom-scroll::-webkit-scrollbar-thumb { background: rgba(0,0,0,0.05); border-radius: 20px; }
        
        /* Gradasi Sidebar: Menyesuaikan dengan nuansa Hijau Tua & Hitam Elegan */
        .sidebar-gradient {
            background: linear-gradient(180deg, #064e3b 0%, #022c22 100%);
        }

        .nav-active-indicator {
            position: absolute;
            left: 0;
            width: 4px;
            height: 20px;
            background-color: #fbbf24; /* Kuning seperti di logo */
            border-radius: 0 4px 4px 0;
        }

        .sidebar-transition {
            transition: width 0.4s cubic-bezier(0.4, 0, 0.2, 1), transform 0.4s cubic-bezier(0.4, 0, 0.2, 1);
        }
    </style>
</head>

<body class="bg-[#fcfdfd] text-slate-700 antialiased overflow-hidden"
      x-data="{ sidebarOpen: true, mobileOpen: false }">

<div class="flex h-screen w-full overflow-hidden relative">

    {{-- OVERLAY MOBILE --}}
    <div x-show="mobileOpen" 
         x-transition:enter="transition opacity duration-300"
         x-transition:enter-start="opacity-0"
         x-transition:enter-end="opacity-100"
         x-transition:leave="transition opacity duration-300"
         x-transition:leave-start="opacity-100"
         x-transition:leave-end="opacity-0"
         @click="mobileOpen = false"
         class="fixed inset-0 bg-emerald-950/60 backdrop-blur-sm z-40 lg:hidden" x-cloak>
    </div>

    {{-- SIDEBAR --}}
    <aside
        class="fixed inset-y-0 left-0 z-50 sidebar-gradient text-emerald-50/80 sidebar-transition shadow-2xl lg:static lg:inset-0 shrink-0 border-r border-white/5"
        :class="{
            'w-72 translate-x-0': sidebarOpen && !mobileOpen,
            'w-20 translate-x-0': !sidebarOpen && !mobileOpen,
            'w-72 translate-x-0': mobileOpen,
            '-translate-x-full lg:translate-x-0': !mobileOpen
        }"
        x-cloak>

        <div class="flex flex-col h-full overflow-hidden relative">
            
            {{-- BRAND LOGO (Warna Hijau & Kuning) --}}
            <div class="p-6 flex items-center gap-4 group cursor-default shrink-0 border-b border-white/5 overflow-hidden">
                <div class="relative shrink-0 transition-all duration-500"
                     :class="(sidebarOpen || mobileOpen) ? 'w-16' : 'w-10'">
                    
                    {{-- Efek cahaya di belakang logo --}}
                    <div class="absolute inset-0 bg-amber-400 rounded-full blur-xl opacity-20 group-hover:opacity-40 transition duration-500"></div>
                    
                    {{-- Container Logo --}}
                    <div class="relative aspect-square flex items-center justify-center transition-all duration-500">
                        {{-- Gambar Logo: Ukuran mengikuti parent div --}}
                        <img src="{{ asset('images/logo.png') }}" 
                             alt="Logo SMA Harapan Jaya" 
                             class="w-full h-full object-contain transform transition-all duration-500 group-hover:scale-110">
                    </div>
                </div>
                
                {{-- Text Label: Akan hilang halus saat sidebar ditutup --}}
                <div class="flex flex-col transition-all duration-500 overflow-hidden" 
                     :class="(sidebarOpen || mobileOpen) ? 'opacity-100 translate-x-0 w-auto' : 'opacity-0 -translate-x-10 w-0'">
                    <div class="flex items-center gap-1.5 whitespace-nowrap">
                        <span class="text-[10px] font-bold text-amber-400 uppercase tracking-[0.2em]">Sekolah SMA</span>
                    </div>
                    <h1 class="text-xl font-black text-white tracking-tight leading-none whitespace-nowrap uppercase">
                        Harapan <span class="text-emerald-400">Jaya</span>
                    </h1>
                </div>
            </div>

            {{-- NAVIGASI UTAMA --}}
            <nav class="flex-1 px-3 space-y-7 overflow-y-auto custom-scroll overflow-x-hidden mt-6">
                
                {{-- Kategori Utama --}}
                <div>
                    <p class="px-4 mb-3 text-[10px] font-bold text-emerald-500/60 uppercase tracking-[0.15em] transition-opacity duration-300"
                       :class="(sidebarOpen || mobileOpen) ? 'opacity-100' : 'opacity-0'">Menu Utama</p>
                    <div class="space-y-1">
                        <a href="{{ $isGuru ? url('/guru/dashboard') : url('/murid/dashboard') }}"
                           class="group relative flex items-center gap-3 px-4 py-3 rounded-xl transition-all duration-200
                           {{ Request::is('*dashboard*') ? 'bg-white/10 text-white' : 'hover:bg-white/5 hover:text-white' }}">
                           
                            @if(Request::is('*dashboard*'))
                                <div class="nav-active-indicator"></div>
                            @endif

                            <svg class="w-5 h-5 shrink-0 {{ Request::is('*dashboard*') ? 'text-amber-400' : 'text-emerald-500/70 group-hover:text-amber-400' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"/>
                            </svg>
                            <span class="text-sm font-medium transition-all duration-300" :class="(sidebarOpen || mobileOpen) ? 'opacity-100' : 'opacity-0 w-0 translate-x-5'">Dashboard</span>
                        </a>
                    </div>
                </div>

                {{-- Kategori Manajemen --}}
                <div>
                    <p class="px-4 mb-3 text-[10px] font-bold text-emerald-500/60 uppercase tracking-[0.15em] transition-opacity duration-300"
                       :class="(sidebarOpen || mobileOpen) ? 'opacity-100' : 'opacity-0'">Manajemen Akademik</p>
                    <div class="space-y-1">
                        @php
                            $menus = $isGuru ? [
                                ['Nilai Siswa', 'guru.nilai.index', '📊'],
                                ['Absensi Kelas', 'guru.absensi.index', '📝'],
                                ['Jadwal Mengajar', 'guru.jadwal', '📅'],
                                ['Data Pelajar', 'guru.data-siswa', '👨‍🎓']
                            ] : [
                                ['Nilai Saya', 'murid.nilai', '📈'],
                                ['Cek Absensi', 'murid.absensi', '📅'],
                                ['Tagihan SPP', 'murid.pembayaran', '💳']
                            ];
                        @endphp
                        @foreach($menus as $m)
                            <a href="{{ route($m[1]) }}" 
                               class="group relative flex items-center gap-3 px-4 py-3 rounded-xl transition-all duration-200 {{ Request::routeIs($m[1]) ? 'bg-white/10 text-white' : 'hover:bg-white/5 hover:text-white' }}">
                                
                                @if(Request::routeIs($m[1]))
                                    <div class="nav-active-indicator"></div>
                                @endif

                                <span class="text-lg shrink-0 opacity-80 group-hover:scale-110 transition-transform">{{ $m[2] }}</span>
                                <span class="text-sm font-medium transition-all duration-300" :class="(sidebarOpen || mobileOpen) ? 'opacity-100' : 'opacity-0 w-0 translate-x-5'">{{ $m[0] }}</span>
                            </a>
                        @endforeach
                    </div>
                </div>
            </nav>

            {{-- LOGOUT AREA --}}
            <div class="p-4 shrink-0 border-t border-white/5">
                <form method="POST" action="/logout">
                    @csrf
                    <button type="submit" class="w-full flex items-center justify-center gap-3 py-3 rounded-xl bg-red-500/10 hover:bg-red-500 text-red-400 hover:text-white text-xs font-bold transition-all duration-300 group">
                        <svg class="w-4 h-4 transition-transform group-hover:-translate-x-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1"/>
                        </svg>
                        <span :class="(sidebarOpen || mobileOpen) ? 'inline' : 'hidden'">KELUAR SISTEM</span>
                    </button>
                </form>
            </div>
        </div>
    </aside>

    {{-- CONTENT AREA --}}
    <div class="flex-1 flex flex-col min-w-0 h-full overflow-hidden relative">

        {{-- TOPBAR --}}
        <header class="h-20 bg-white border-b border-slate-100 px-6 lg:px-10 flex items-center justify-between z-30 shrink-0">
            <div class="flex items-center gap-4">
                {{-- Toggle Desktop --}}
                <button @click="sidebarOpen = !sidebarOpen" 
                        class="hidden lg:flex items-center justify-center w-10 h-10 rounded-xl bg-slate-50 text-emerald-700 hover:bg-emerald-600 hover:text-white transition-all duration-300 shadow-sm border border-slate-200 active:scale-95">
                    <svg class="w-5 h-5" :class="!sidebarOpen ? 'rotate-180' : ''" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h10M4 18h16"/>
                    </svg>
                </button>

                {{-- Toggle Mobile --}}
                <button @click="mobileOpen = true" 
                        class="lg:hidden flex items-center justify-center w-10 h-10 rounded-xl bg-slate-50 text-emerald-700 border border-slate-200 shadow-sm">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
                    </svg>
                </button>
                
                <div>
                    <h2 class="text-xl font-extrabold text-slate-800 tracking-tight">@yield('title', 'Dashboard')</h2>
                    <p class="text-[11px] font-semibold text-emerald-600 uppercase tracking-widest mt-0.5">SMA Harapan Jaya • {{ $isGuru ? 'Teacher Portal' : 'Student Portal' }}</p>
                </div>
            </div>

            {{-- PROFILE AREA --}}
            <div class="flex items-center gap-4 pl-4 border-l border-slate-100">
                <div class="text-right hidden sm:block">
                    <p class="text-sm font-bold text-slate-900 leading-none">
                        {{ $user?->name ?? 'User Terdaftar' }}
                    </p>
                    <p class="text-[10px] font-bold text-slate-400 uppercase tracking-tighter mt-1.5">
                        ID: #{{ Auth::id() }} • <span class="text-emerald-500">Online</span>
                    </p>
                </div>
                <div class="relative group cursor-pointer">
                    <div class="w-11 h-11 rounded-2xl bg-emerald-100 p-0.5 border-2 border-emerald-50 shadow-sm overflow-hidden transition-transform group-hover:scale-105">
                        @if($user?->photo)
                            <img src="{{ asset('storage/'.$user->photo) }}" class="w-full h-full rounded-[14px] object-cover">
                        @else
                            <div class="w-full h-full rounded-[14px] bg-emerald-600 flex items-center justify-center text-white font-bold text-sm">
                                {{ $initials }}
                            </div>
                        @endif
                    </div>
                    <div class="absolute -bottom-0.5 -right-0.5 w-3.5 h-3.5 bg-emerald-500 border-2 border-white rounded-full z-20 shadow-sm"></div>
                </div>
            </div>
        </header>

        {{-- MAIN CONTENT --}}
        <main class="flex-1 overflow-y-auto custom-scroll p-6 lg:p-10 bg-[#f8fafc]">
            <div class="max-w-7xl mx-auto">
                {{-- Animasi transisi konten --}}
                <div x-data="{ show: false }" x-init="setTimeout(() => show = true, 50)" x-show="show" 
                     x-transition:enter="transition ease-out duration-400"
                     x-transition:enter-start="opacity-0 translate-y-4"
                     x-transition:enter-end="opacity-100 translate-y-0">
                    @yield('content')
                </div>
            </div>
        </main>
    </div>
</div>

</body>
</html>
