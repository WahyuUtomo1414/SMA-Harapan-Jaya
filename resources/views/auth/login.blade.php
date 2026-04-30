@extends('layouts.app')

@section('title', 'Masuk | SMA Harapan Jaya')

@section('content')
<section class="relative border-b border-gray-200 bg-white">
    <div class="absolute top-0 left-0 w-full h-[6px] bg-primary"></div>
    <div class="max-w-4xl mx-auto px-6 py-16 text-center">
        <span class="inline-block border border-gray-300 text-gray-500 px-4 py-1.5 text-[10px] font-subhead font-bold tracking-[0.25em] uppercase mb-6">
            Portal Sekolah
        </span>
        <h1 class="text-on-surface text-4xl md:text-5xl font-headline font-normal leading-tight mb-4 tracking-tight">
            Masuk ke <span class="italic text-primary">Akun</span> Anda
        </h1>
        <p class="text-gray-500 font-body text-base leading-relaxed max-w-xl mx-auto">
            Gunakan email dan kata sandi yang sudah terdaftar untuk mengakses dashboard sesuai role akun.
        </p>
    </div>
</section>

<section class="max-w-xl mx-auto px-6 py-14">
    @if(session('status'))
        <div class="mb-6 border border-green-200 bg-green-50 px-6 py-4 text-sm font-body text-green-800">
            {{ session('status') }}
        </div>
    @endif

    <form method="POST" action="{{ route('login.store') }}" class="border border-gray-200 bg-white">
        @csrf

        <div class="bg-primary px-8 py-4">
            <h2 class="text-white font-headline text-lg font-medium tracking-tight">Masuk Akun</h2>
        </div>

        <div class="p-8 space-y-6">
            <div>
                <label for="email" class="block text-xs font-subhead font-bold uppercase tracking-widest text-gray-600 mb-2">
                    Email <span class="text-red-500">*</span>
                </label>
                <input id="email" name="email" type="email" value="{{ old('email') }}" required autofocus
                    placeholder="email@contoh.com"
                    class="w-full border @error('email') border-red-400 bg-red-50 @else border-gray-300 @enderror px-4 py-3 text-sm font-body text-on-surface placeholder-gray-400 focus:outline-none focus:border-primary transition">
                @error('email')
                    <p class="mt-2 text-xs text-red-500">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="password" class="block text-xs font-subhead font-bold uppercase tracking-widest text-gray-600 mb-2">
                    Kata Sandi <span class="text-red-500">*</span>
                </label>
                <input id="password" name="password" type="password" required
                    placeholder="Masukkan kata sandi"
                    class="w-full border @error('password') border-red-400 bg-red-50 @else border-gray-300 @enderror px-4 py-3 text-sm font-body text-on-surface placeholder-gray-400 focus:outline-none focus:border-primary transition">
                @error('password')
                    <p class="mt-2 text-xs text-red-500">{{ $message }}</p>
                @enderror
            </div>

            <label class="flex items-center gap-3 cursor-pointer">
                <input type="checkbox" name="remember" value="1" class="w-4 h-4 accent-primary">
                <span class="font-body text-sm text-gray-600">Ingat saya</span>
            </label>

            <button type="submit"
                class="w-full inline-flex items-center justify-center gap-2 bg-primary text-white border border-primary px-8 py-3.5 font-subhead font-bold text-xs uppercase tracking-widest hover:bg-white hover:text-primary transition-all duration-300">
                <span class="material-symbols-outlined text-base">login</span>
                Masuk
            </button>
        </div>
    </form>
</section>
@endsection
