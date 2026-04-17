@extends('layouts.dashboard')

@section('title', 'Dashboard Guru | SMA Harapan Jaya')
@section('page_title', 'Dashboard Guru')

@section('content')
<div class="space-y-8">
    <!-- Welcome Card -->
    <div class="bg-white border border-gray-200 p-8 relative overflow-hidden">
        <div class="absolute top-0 right-0 w-32 h-32 bg-primary/5 -mr-16 -mt-16 rounded-full"></div>
        <div class="relative z-10">
            <h1 class="text-3xl font-headline font-bold text-on-surface mb-2">
                Selamat Datang, <span class="text-primary italic">{{ auth()->user()->name }}</span>
            </h1>
            <p class="text-gray-500 font-body max-w-2xl leading-relaxed">
                Akses semua fitur akademik dan kelola data pengajaran Anda melalui panel kontrol terpusat SMA Harapan Jaya.
            </p>
        </div>
    </div>

    <!-- Stats Grid -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        <div class="bg-white border border-gray-200 p-6 flex items-center gap-6">
            <div class="w-14 h-14 bg-primary/10 rounded-xl flex items-center justify-center text-primary">
                <span class="material-symbols-outlined text-3xl">groups</span>
            </div>
            <div>
                <p class="text-[10px] font-bold text-gray-400 uppercase tracking-widest mb-1">Total Kelas</p>
                <p class="text-2xl font-headline font-bold text-on-surface">--</p>
            </div>
        </div>
        <div class="bg-white border border-gray-200 p-6 flex items-center gap-6">
            <div class="w-14 h-14 bg-secondary/10 rounded-xl flex items-center justify-center text-secondary">
                <span class="material-symbols-outlined text-3xl">menu_book</span>
            </div>
            <div>
                <p class="text-[10px] font-bold text-gray-400 uppercase tracking-widest mb-1">Mata Pelajaran</p>
                <p class="text-2xl font-headline font-bold text-on-surface">--</p>
            </div>
        </div>
        <div class="bg-white border border-gray-200 p-6 flex items-center gap-6">
            <div class="w-14 h-14 bg-tertiary/10 rounded-xl flex items-center justify-center text-tertiary">
                <span class="material-symbols-outlined text-3xl">assignment_turned_in</span>
            </div>
            <div>
                <p class="text-[10px] font-bold text-gray-400 uppercase tracking-widest mb-1">Absensi Hari Ini</p>
                <p class="text-2xl font-headline font-bold text-on-surface">--</p>
            </div>
        </div>
    </div>

    <!-- Account Details -->
    <div class="bg-white border border-gray-200 overflow-hidden">
        <div class="px-8 py-5 border-b border-gray-100 flex items-center justify-between bg-gray-50/50">
            <h3 class="font-headline font-bold text-on-surface italic">Informasi Akun</h3>
            <span class="px-3 py-1 bg-primary/10 text-primary text-[10px] font-bold uppercase tracking-widest border border-primary/20">Aktif</span>
        </div>
        <div class="p-8">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-y-8 gap-x-12">
                <div>
                    <label class="block text-[10px] font-bold text-gray-400 uppercase tracking-widest mb-2">Nama Lengkap</label>
                    <p class="text-on-surface font-headline font-bold text-lg border-b border-gray-100 pb-2">{{ auth()->user()->name }}</p>
                </div>
                <div>
                    <label class="block text-[10px] font-bold text-gray-400 uppercase tracking-widest mb-2">Alamat Email</label>
                    <p class="text-on-surface font-body border-b border-gray-100 pb-2">{{ auth()->user()->email }}</p>
                </div>
                <div>
                    <label class="block text-[10px] font-bold text-gray-400 uppercase tracking-widest mb-2">Status Role</label>
                    <p class="text-on-surface font-headline font-bold text-lg border-b border-gray-100 pb-2">Guru Pengajar</p>
                </div>
                <div>
                    <label class="block text-[10px] font-bold text-gray-400 uppercase tracking-widest mb-2">Terdaftar Sejak</label>
                    <p class="text-on-surface font-body border-b border-gray-100 pb-2">{{ auth()->user()->created_at->translatedFormat('d F Y') }}</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
