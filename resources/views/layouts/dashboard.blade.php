<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-full bg-gray-50">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>@yield('title', 'Dashboard | SMA Harapan Jaya')</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@200..800&family=Inter:wght@300..700&display=swap" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap" rel="stylesheet" />
    
    <link rel="icon" href="{{ $sekolah?->logo ? asset('storage/' . $sekolah->logo) : asset('images/logo.png') }}" type="image/png">

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Alpine.js -->
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>

    <style>
        .material-symbols-outlined {
            font-variation-settings: 'FILL' 0, 'wght' 300, 'GRAD' 0, 'opsz' 24;
        }
        [x-cloak] { display: none !important; }
    </style>
    @stack('styles')
</head>

<body class="h-full font-body text-on-surface antialiased selection:bg-primary/20 selection:text-primary">
    <div x-data="{ sidebarOpen: false }" class="flex h-full overflow-hidden">
        <!-- Sidebar for Mobile -->
        <div x-show="sidebarOpen" class="fixed inset-0 z-50 lg:hidden" x-cloak>
            <div class="fixed inset-0 bg-gray-900/80" @click="sidebarOpen = false"></div>
            <div class="fixed inset-y-0 left-0 flex w-full max-w-xs flex-col bg-[#111827]">
                <div class="flex items-center justify-between h-20 px-6 border-b border-white/5">
                    <div class="flex items-center gap-3">
                        <img src="{{ $sekolah?->logo ? asset('storage/' . $sekolah->logo) : asset('images/logo.png') }}" alt="Logo" class="w-8 h-8 object-contain" />
                        <span class="font-headline font-bold text-lg text-white tracking-tight">Harapan Jaya</span>
                    </div>
                    <button @click="sidebarOpen = false" class="text-gray-400">
                        <span class="material-symbols-outlined">close</span>
                    </button>
                </div>
                <nav class="flex-1 overflow-y-auto p-4 space-y-1">
                    @include('layouts.partials.dashboard-nav')
                </nav>
            </div>
        </div>

        <!-- Static Sidebar for Desktop -->
        <div class="hidden lg:flex lg:w-64 lg:flex-col bg-[#111827]">
            <div class="flex flex-col flex-1 overflow-y-auto">
                <div class="flex items-center h-20 px-6 border-b border-white/5 bg-[#111827] sticky top-0 z-10">
                    <div class="flex items-center gap-3">
                        <img src="{{ $sekolah?->logo ? asset('storage/' . $sekolah->logo) : asset('images/logo.png') }}" alt="Logo" class="w-9 h-9 object-contain" />
                        <div>
                            <div class="font-headline font-bold text-sm text-white tracking-tight uppercase leading-tight">Harapan Jaya</div>
                            <div class="text-[10px] text-gray-500 font-bold tracking-widest uppercase mt-0.5">Dashboard</div>
                        </div>
                    </div>
                </div>
                <nav class="flex-1 p-4 space-y-1">
                    @include('layouts.partials.dashboard-nav')
                </nav>
                <div class="p-4 border-t border-white/5 bg-[#0b0f1a]">
                    <div class="flex items-center gap-3 px-3 py-2">
                        <div class="w-8 h-8 rounded-full bg-primary/20 flex items-center justify-center text-primary font-bold text-xs">
                            {{ substr(auth()->user()->name, 0, 1) }}
                        </div>
                        <div class="flex-1 min-w-0">
                            <p class="text-xs font-bold text-white truncate">{{ auth()->user()->name }}</p>
                            <p class="text-[10px] text-gray-500 truncate capitalize">{{ auth()->user()->getRoleNames()->first() ?? 'User' }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Main Content area -->
        <div class="flex flex-1 flex-col overflow-hidden bg-gray-50">
            <header class="h-20 bg-white border-b border-gray-200 flex items-center justify-between px-6 lg:px-8 z-20">
                <div class="flex items-center gap-4">
                    <button @click="sidebarOpen = true" class="lg:hidden text-gray-500">
                        <span class="material-symbols-outlined">menu</span>
                    </button>
                    <h2 class="text-xl font-headline font-bold text-on-surface tracking-tight">@yield('page_title', 'Dashboard')</h2>
                </div>
                
                <div class="flex items-center gap-4">
                    <div class="hidden md:block text-right mr-2">
                        <p class="text-[10px] font-bold text-gray-400 uppercase tracking-widest">{{ now()->translatedFormat('l, d F Y') }}</p>
                    </div>
                    
                    <div class="w-px h-6 bg-gray-200"></div>

                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="p-2 text-gray-400 hover:text-red-600 transition-colors" title="Keluar">
                            <span class="material-symbols-outlined">logout</span>
                        </button>
                    </form>
                </div>
            </header>

            <main class="flex-1 overflow-y-auto">
                <div class="p-6 lg:p-8">
                    @yield('content')
                </div>
            </main>
        </div>
    </div>
    @stack('scripts')
</body>

</html>
