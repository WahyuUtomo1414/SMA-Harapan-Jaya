@php
    $role = auth()->user()->hasRole('guru') ? 'guru' : (auth()->user()->hasRole('murid') ? 'murid' : 'admin');
    $dashboardRoute = $role === 'admin' ? '/admin' : route($role . '.dashboard');
@endphp

<!-- Dashboard -->
<a href="{{ $dashboardRoute }}" 
   class="flex items-center gap-3 px-3 py-2 text-sm font-medium rounded-lg transition-all {{ request()->routeIs($role . '.dashboard') ? 'bg-primary text-white' : 'text-gray-400 hover:text-white hover:bg-white/5' }}">
    <span class="material-symbols-outlined text-xl">dashboard</span>
    <span>Dashboard</span>
</a>

@if(auth()->user()->hasRole('guru'))
    <!-- Guru Specific Menus (Placeholders) -->
    {{-- <a href="#" class="flex items-center gap-3 px-3 py-2 text-sm font-medium rounded-lg text-gray-400 hover:text-white hover:bg-white/5 transition-all">
        <span class="material-symbols-outlined text-xl">calendar_month</span>
        <span>Jadwal Mengajar</span>
    </a> --}}
@endif

@if(auth()->user()->hasRole('murid'))
    <!-- Murid Specific Menus (Placeholders) -->
    {{-- <a href="#" class="flex items-center gap-3 px-3 py-2 text-sm font-medium rounded-lg text-gray-400 hover:text-white hover:bg-white/5 transition-all">
        <span class="material-symbols-outlined text-xl">school</span>
        <span>Nilai Saya</span>
    </a> --}}
@endif
