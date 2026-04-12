@php
    $user = Auth::user();
    
    // Deteksi Role
    $isGuru = Request::is('guru*'); 
    $isSiswa = Request::is('murid*') || Request::is('siswa*');

    // Ambil inisial nama
    $initials = strtoupper(substr($user?->name ?? 'U', 0, 1));
    
    // Warna Tema Dinamis
    $themeColor = $isGuru ? 'emerald' : 'indigo';
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
        
        .custom-scroll::-webkit-scrollbar { width: 4px; }
        .custom-scroll::-webkit-scrollbar-track { background: transparent; }
        .custom-scroll::-webkit-scrollbar-thumb { background: rgba(255,255,255,0.1); border-radius: 20px; }
        
        .sidebar-gradient {
            background: linear-gradient(180deg, #1e293b 0%, #0f172a 100%);
        }

        .nav-active-indicator {
            position: absolute;
            left: 0;
            width: 4px;
            height: 18px;
            border-radius: 0 4px 4px 0;
        }

        .sidebar-transition {
            transition: width 0.5s cubic-bezier(0.4, 0, 0.2, 1), transform 0.5s cubic-bezier(0.4, 0, 0.2, 1);
        }
    </style>
</head>

<body class="bg-[#f8fafc] text-slate-700 antialiased overflow-hidden"
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
         {{-- Menggunakan z-40 agar tidak bentrok dengan sidebar --}}
         class="fixed inset-0 bg-slate-900/60 backdrop-blur-sm z-40 lg:hidden" x-cloak>
    </div>

    {{-- SIDEBAR --}}
    <aside
        class="fixed inset-y-0 left-0 z-50 sidebar-gradient text-slate-300 sidebar-transition shadow-2xl lg:static lg:inset-0 shrink-0"
        :class="{
            'w-72 translate-x-0': sidebarOpen && !mobileOpen,
            'w-20 translate-x-0': !sidebarOpen && !mobileOpen,
            'w-72 translate-x-0': mobileOpen,
            '-translate-x-full lg:translate-x-0': !mobileOpen
        }"
        x-cloak>

        <div class="flex flex-col h-full overflow-hidden relative">
            
            {{-- TOMBOL CLOSE KHUSUS MOBILE --}}
            <button @click="mobileOpen = false" 
                    class="lg:hidden absolute top-4 right-4 p-2 rounded-lg bg-white/5 text-slate-400 hover:text-white">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                </svg>
            </button>

            {{-- BRAND LOGO --}}
            <div class="p-6 flex items-center gap-4 group cursor-default overflow-hidden shrink-0">
                <div class="relative shrink-0">
                    <div class="absolute -inset-1 bg-{{ $themeColor }}-500 rounded-2xl blur opacity-20 group-hover:opacity-40 transition duration-500"></div>
                    <div class="relative w-12 h-12 rounded-2xl flex items-center justify-center bg-slate-800 border border-white/10 shadow-2xl">
                        <svg class="w-7 h-7 text-{{ $themeColor }}-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path d="M12 14l9-5-9-5-9 5 9 5z"></path>
                            <path d="M12 14l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14z"></path>
                        </svg>
                    </div>
                </div>
                
                <div class="flex flex-col transition-all duration-500" 
                     :class="(sidebarOpen || mobileOpen) ? 'opacity-100 translate-x-0' : 'opacity-0 -translate-x-10 w-0'">
                    <div class="flex items-center gap-1.5 whitespace-nowrap">
                        <span class="text-[10px] font-bold text-{{ $themeColor }}-500 uppercase tracking-[0.2em]">SMA</span>
                        <div class="h-px w-4 bg-slate-700"></div>
                    </div>
                    <h1 class="text-xl font-black text-white tracking-tighter leading-none italic whitespace-nowrap">
                        HARAPAN <span class="text-{{ $themeColor }}-400 not-italic">JAYA</span>
                    </h1>
                </div>
            </div>

            {{-- NAVIGASI UTAMA --}}
            <nav class="flex-1 px-4 space-y-8 overflow-y-auto custom-scroll overflow-x-hidden mt-4">
                
                <div>
                    <p class="px-4 mb-4 text-[11px] font-bold text-slate-500 uppercase tracking-widest transition-opacity duration-300"
                       :class="(sidebarOpen || mobileOpen) ? 'opacity-100' : 'opacity-0'">Utama</p>
                    <div class="space-y-1">
                        <a href="{{ $isGuru ? url('/guru/dashboard') : url('/murid/dashboard') }}"
                           class="group relative flex items-center gap-3 px-4 py-3 rounded-xl transition-all duration-200
                           {{ Request::is('*dashboard*') ? 'bg-white/10 text-white shadow-sm' : 'hover:bg-white/5 hover:text-slate-100' }}">
                            
                            @if(Request::is('*dashboard*'))
                                <div class="nav-active-indicator bg-{{ $themeColor }}-400"></div>
                            @endif

                            <svg class="w-5 h-5 shrink-0 {{ Request::is('*dashboard*') ? 'text-'.$themeColor.'-400' : 'text-slate-500 group-hover:text-slate-300' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"/>
                            </svg>
                            <span class="text-sm font-semibold transition-all duration-300" :class="(sidebarOpen || mobileOpen) ? 'opacity-100' : 'opacity-0 w-0 translate-x-5'">Dashboard</span>
                        </a>
                    </div>
                </div>

                <div>
                    <p class="px-4 mb-4 text-[11px] font-bold text-slate-500 uppercase tracking-widest transition-opacity duration-300"
                       :class="(sidebarOpen || mobileOpen) ? 'opacity-100' : 'opacity-0'">Manajemen</p>
                    <div class="space-y-1">
                        @php
                            $menus = $isGuru ? [
                                ['Nilai Siswa', 'guru.nilai', '📊'],
                                ['Absensi Kelas', 'guru.absensi', '📝'],
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
                               class="group relative flex items-center gap-3 px-4 py-3 rounded-xl transition-all duration-200 {{ Request::routeIs($m[1]) ? 'bg-white/10 text-white' : 'hover:bg-white/5 hover:text-slate-100' }}">
                                
                                @if(Request::routeIs($m[1]))
                                    <div class="nav-active-indicator bg-{{ $themeColor }}-400"></div>
                                @endif

                                <span class="text-lg shrink-0">{{ $m[2] }}</span>
                                <span class="text-sm font-semibold transition-all duration-300" :class="(sidebarOpen || mobileOpen) ? 'opacity-100' : 'opacity-0 w-0 translate-x-5'">{{ $m[0] }}</span>
                            </a>
                        @endforeach
                    </div>
                </div>
            </nav>

            {{-- LOGOUT AREA --}}
            <div class="p-4 transition-all duration-300 shrink-0">
                <div class="bg-white/5 rounded-2xl border border-white/10 p-2 overflow-hidden">
                    <form method="POST" action="/logout">
                        @csrf
                        <button type="submit" class="w-full flex items-center justify-center gap-2 py-2.5 rounded-lg bg-rose-500/10 hover:bg-rose-500 text-rose-500 hover:text-white text-xs font-bold transition-all duration-300">
                            <svg class="w-4 h-4 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m4 4H7m6 4v1"/></svg>
                            <span :class="(sidebarOpen || mobileOpen) ? 'inline' : 'hidden'">KELUAR</span>
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </aside>

    {{-- CONTENT AREA --}}
    <div class="flex-1 flex flex-col min-w-0 h-full overflow-hidden relative">

        {{-- TOPBAR --}}
        <header class="h-16 bg-white/80 backdrop-blur-md border-b border-slate-200/60 px-4 lg:px-8 flex items-center justify-between z-30 shrink-0">
            <div class="flex items-center gap-3">
                {{-- Toggle Desktop --}}
                <button @click="sidebarOpen = !sidebarOpen" 
                        class="hidden lg:flex items-center justify-center w-9 h-9 rounded-lg bg-slate-50 text-slate-500 hover:bg-{{ $themeColor }}-50 hover:text-{{ $themeColor }}-600 transition-all duration-300 border border-slate-200 shadow-sm active:scale-95">
                    <svg class="w-5 h-5 transition-transform duration-500" :class="!sidebarOpen ? 'rotate-180' : ''" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h10M4 18h16"/>
                    </svg>
                </button>

                {{-- Toggle Mobile --}}
                <button @click="mobileOpen = true" 
                        class="lg:hidden flex items-center justify-center w-9 h-9 rounded-lg bg-slate-50 text-slate-500 border border-slate-200 shadow-sm">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
                    </svg>
                </button>
                
                <div class="hidden sm:block">
                    <nav class="flex text-[10px] font-bold text-slate-400 mb-0.5 tracking-tight">
                        <span>SIAKAD</span><span class="mx-1.5 opacity-50">/</span><span class="text-{{ $themeColor }}-500 uppercase">{{ $isGuru ? 'Guru' : 'Siswa' }}</span>
                    </nav>
                    <h2 class="text-base font-bold text-slate-800 tracking-tight leading-none">@yield('title', 'Dashboard')</h2>
                </div>
            </div>

            {{-- PROFILE AREA --}}
            <div class="flex items-center gap-3 pl-4 border-l border-slate-200">
                <div class="text-right hidden sm:block">
                    <div class="flex items-center justify-end gap-2">
                        <svg class="w-3.5 h-3.5 text-{{ $themeColor }}-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                        </svg>
                        <p class="text-sm font-bold text-slate-800 leading-none tracking-tight">
                            {{ $user?->name ?? 'User Terdaftar' }}
                        </p>
                    </div>
                    <p class="text-[10px] font-bold text-slate-400 uppercase tracking-widest mt-1.5 flex items-center justify-end gap-1">
                        <span class="inline-block w-1 h-1 rounded-full bg-{{ $themeColor }}-400"></span>
                        ID: #{{ Auth::id() }} • {{ $isGuru ? 'Tenaga Pengajar' : 'Pelajar Aktif' }}
                    </p>
                </div>
                <div class="relative group cursor-pointer">
                    <div class="w-10 h-10 rounded-xl rotate-3 group-hover:rotate-0 transition-all duration-500 p-0.5 border-2 border-{{ $themeColor }}-100 bg-white shadow-sm overflow-hidden relative z-10">
                        @if($user?->photo)
                            <img src="{{ asset('storage/'.$user->photo) }}" class="w-full h-full rounded-[10px] object-cover">
                        @else
                            <div class="w-full h-full rounded-[10px] bg-linear-to-br from-{{ $themeColor }}-500 to-{{ $themeColor }}-700 flex items-center justify-center text-white relative">
                                <svg class="w-6 h-6 opacity-30 absolute -bottom-0.5" fill="currentColor" viewBox="0 0 24 24"><path d="M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm0 2c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4z" /></svg>
                                <span class="relative z-10 font-bold text-[10px]">{{ $initials }}</span>
                            </div>
                        @endif
                    </div>
                    <div class="absolute -bottom-0.5 -right-0.5 w-3 h-3 bg-emerald-500 border-2 border-white rounded-full z-20 shadow-sm animate-pulse"></div>
                </div>
            </div>
        </header>

        {{-- MAIN CONTENT --}}
        <main class="flex-1 overflow-y-auto custom-scroll p-4 lg:p-8 bg-[#f8fafc]">
            <div class="max-w-7xl mx-auto">
                <div x-data="{ show: false }" x-init="setTimeout(() => show = true, 50)" x-show="show" 
                     x-transition:enter="transition ease-out duration-500"
                     x-transition:enter-start="opacity-0 translate-y-8"
                     x-transition:enter-end="opacity-100 translate-y-0">
                    @yield('content')
                </div>
            </div>
        </main>
    </div>
</div>

</body>
</html>