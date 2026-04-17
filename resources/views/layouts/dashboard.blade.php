<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>@yield('title', 'Dashboard | SMA Harapan Jaya')</title>

    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400..900;1,400..900&family=Manrope:wght@200..800&family=Inter:wght@300..700&display=swap"
        rel="stylesheet" />
    <link
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap"
        rel="stylesheet" />
    <link rel="icon" href="{{ asset('images/logo.png') }}" type="image/png">

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        .material-symbols-outlined {
            font-variation-settings: 'FILL' 0, 'wght' 300, 'GRAD' 0, 'opsz' 24;
        }
    </style>
</head>

<body class="min-h-screen bg-surface text-on-surface antialiased selection:bg-primary/20 selection:text-primary">
    <header class="sticky top-0 z-50 bg-white/95 border-b border-gray-100 backdrop-blur-md">
        <div class="max-w-7xl mx-auto h-20 px-6 md:px-8 flex items-center justify-between">
            <a href="@yield('dashboardHome')" class="flex items-center gap-4">
                <img alt="SMA Harapan Jaya Logo" class="w-11 h-11 object-contain" src="{{ asset('images/logo.png') }}" />
                <div>
                    <div class="font-headline font-bold text-lg md:text-xl text-primary tracking-wider uppercase">
                        SMA Harapan Jaya
                    </div>
                    <div class="font-subhead text-[10px] uppercase tracking-[0.25em] text-gray-500">
                        Dashboard
                    </div>
                </div>
            </a>

            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit"
                    class="inline-flex items-center gap-2 border border-primary bg-primary px-4 py-2.5 text-xs font-subhead font-bold uppercase tracking-widest text-white transition hover:bg-white hover:text-primary">
                    <span class="material-symbols-outlined text-base">logout</span>
                    Keluar
                </button>
            </form>
        </div>
    </header>

    <main>
        @yield('content')
    </main>
</body>

</html>
