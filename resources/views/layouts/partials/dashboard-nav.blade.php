@php
    $role = auth()->user()->hasRole('guru') ? 'guru' : (auth()->user()->hasRole('murid') ? 'murid' : 'admin');
    $dashboardRoute = $role === 'admin' ? '/admin' : route($role . '.dashboard');
@endphp

<!-- Common: Dashboard -->
<a href="{{ $dashboardRoute }}" 
   class="flex items-center gap-3 px-3 py-2 text-sm font-medium rounded-lg transition-all {{ request()->routeIs($role . '.dashboard') ? 'bg-primary text-white' : 'text-gray-400 hover:text-white hover:bg-white/5' }}">
    <span class="material-symbols-outlined text-xl">dashboard</span>
    <span>Dashboard</span>
</a>

@if(auth()->user()->hasRole('guru'))
    <!-- Guru Menus -->
    <a href="{{ route('guru.jadwal') }}" 
       class="flex items-center gap-3 px-3 py-2 text-sm font-medium rounded-lg transition-all {{ request()->routeIs('guru.jadwal') ? 'bg-primary text-white' : 'text-gray-400 hover:text-white hover:bg-white/5' }}">
        <span class="material-symbols-outlined text-xl">calendar_month</span>
        <span>Jadwal Mengajar</span>
    </a>

    <a href="{{ route('guru.absensi.index') }}" 
       class="flex items-center gap-3 px-3 py-2 text-sm font-medium rounded-lg transition-all {{ request()->routeIs('guru.absensi.*') ? 'bg-primary text-white' : 'text-gray-400 hover:text-white hover:bg-white/5' }}">
        <span class="material-symbols-outlined text-xl">assignment_turned_in</span>
        <span>Presensi Siswa</span>
    </a>

    <a href="{{ route('guru.nilai.index') }}" 
       class="flex items-center gap-3 px-3 py-2 text-sm font-medium rounded-lg transition-all {{ request()->routeIs('guru.nilai.*') ? 'bg-primary text-white' : 'text-gray-400 hover:text-white hover:bg-white/5' }}">
        <span class="material-symbols-outlined text-xl">grade</span>
        <span>Input Nilai</span>
    </a>

    <a href="{{ route('guru.data-siswa') }}" 
       class="flex items-center gap-3 px-3 py-2 text-sm font-medium rounded-lg transition-all {{ request()->routeIs('guru.data-siswa') ? 'bg-primary text-white' : 'text-gray-400 hover:text-white hover:bg-white/5' }}">
        <span class="material-symbols-outlined text-xl">groups</span>
        <span>Data Siswa</span>
    </a>
@endif

@if(auth()->user()->hasRole('murid'))
    <!-- Murid Menus -->
    <a href="{{ route('murid.nilai') }}" 
       class="flex items-center gap-3 px-3 py-2 text-sm font-medium rounded-lg transition-all {{ request()->routeIs('murid.nilai') ? 'bg-primary text-white' : 'text-gray-400 hover:text-white hover:bg-white/5' }}">
        <span class="material-symbols-outlined text-xl">school</span>
        <span>Nilai Saya</span>
    </a>

    <a href="{{ route('murid.absensi') }}" 
       class="flex items-center gap-3 px-3 py-2 text-sm font-medium rounded-lg transition-all {{ request()->routeIs('murid.absensi') ? 'bg-primary text-white' : 'text-gray-400 hover:text-white hover:bg-white/5' }}">
        <span class="material-symbols-outlined text-xl">history_edu</span>
        <span>Absensi Saya</span>
    </a>

    <a href="{{ route('murid.pembayaran') }}" 
       class="flex items-center gap-3 px-3 py-2 text-sm font-medium rounded-lg transition-all {{ request()->routeIs('murid.pembayaran') ? 'bg-primary text-white' : 'text-gray-400 hover:text-white hover:bg-white/5' }}">
        <span class="material-symbols-outlined text-xl">payments</span>
        <span>Pembayaran SPP</span>
    </a>
@endif
