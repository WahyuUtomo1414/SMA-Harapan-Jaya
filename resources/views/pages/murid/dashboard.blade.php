@extends('layouts.dashboard')

@section('title', 'Dashboard Murid | SMA Harapan Jaya')
@section('dashboardHome', route('murid.dashboard'))

@section('content')
<section class="relative border-b border-gray-200 bg-white">
    <div class="absolute top-0 left-0 w-full h-[6px] bg-primary"></div>
    <div class="max-w-7xl mx-auto px-6 md:px-8 py-14">
        <span class="inline-block border border-gray-300 text-gray-500 px-4 py-1.5 text-[10px] font-subhead font-bold tracking-[0.25em] uppercase mb-6">
            Dashboard Murid
        </span>
        <h1 class="text-on-surface text-4xl md:text-5xl font-headline font-normal leading-tight mb-4 tracking-tight">
            Selamat datang, <span class="italic text-primary">{{ $user->name }}</span>
        </h1>
        <p class="text-gray-500 font-body text-base leading-relaxed max-w-2xl">
            Ini adalah halaman awal dashboard murid. Informasi akademik pribadi akan ditambahkan bertahap sesuai kebutuhan.
        </p>
    </div>
</section>

<section class="max-w-7xl mx-auto px-6 md:px-8 py-12">
    <div class="border border-gray-200 bg-white">
        <div class="bg-primary px-8 py-4">
            <h2 class="text-white font-headline text-lg font-medium tracking-tight">Ringkasan Akun</h2>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-0">
            <div class="border-b md:border-b-0 md:border-r border-gray-200 p-8">
                <div class="font-subhead text-[10px] font-bold uppercase tracking-[0.25em] text-gray-500 mb-3">Nama</div>
                <div class="font-headline text-2xl text-on-surface">{{ $user->name }}</div>
            </div>
            <div class="border-b md:border-b-0 md:border-r border-gray-200 p-8">
                <div class="font-subhead text-[10px] font-bold uppercase tracking-[0.25em] text-gray-500 mb-3">Email</div>
                <div class="font-body text-sm text-gray-700 break-words">{{ $user->email }}</div>
            </div>
            <div class="p-8">
                <div class="font-subhead text-[10px] font-bold uppercase tracking-[0.25em] text-gray-500 mb-3">Role</div>
                <div class="inline-flex items-center border border-primary-container bg-primary-container px-4 py-2 font-subhead text-xs font-bold uppercase tracking-widest text-primary">
                    Murid
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
