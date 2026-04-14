<nav class="sticky top-0 w-full z-50 bg-white/95 backdrop-blur-md border-b border-gray-100">
    <div class="flex justify-between items-center max-w-7xl mx-auto px-8 h-24">
        <a href="{{ route('home') }}" class="flex items-center gap-4 cursor-pointer group">
            <img alt="SMA Harapan Jaya Logo" class="w-12 h-12 object-contain" src="{{ asset('images/logo.png') }}" />
            <div class="font-headline font-bold text-xl text-primary tracking-wider uppercase">
                SMA Harapan Jaya
            </div>
        </a>
        <div class="hidden md:flex items-center gap-10 font-subhead font-medium tracking-wide text-sm uppercase">
            <a class="nav-link {{ request()->routeIs('home') ? 'text-primary' : 'text-gray-500 hover:text-primary' }} transition-colors duration-300 relative after:content-[''] after:absolute after:w-full after:scale-x-0 after:h-[1px] after:bottom-0 after:left-0 after:bg-primary after:origin-bottom-right hover:after:scale-x-100 hover:after:origin-bottom-left after:transition-transform after:duration-300 {{ request()->routeIs('home') ? 'after:scale-x-100' : '' }} pb-1"
                href="{{ route('home') }}">Beranda</a>
            <a class="nav-link {{ request()->routeIs('tentang-kami') ? 'text-primary' : 'text-gray-500 hover:text-primary' }} transition-colors duration-300 relative after:content-[''] after:absolute after:w-full after:scale-x-0 after:h-[1px] after:bottom-0 after:left-0 after:bg-primary after:origin-bottom-right hover:after:scale-x-100 hover:after:origin-bottom-left after:transition-transform after:duration-300 {{ request()->routeIs('tentang-kami') ? 'after:scale-x-100' : '' }} pb-1"
                href="{{ route('tentang-kami') }}">Tentang Kami</a>
            <a class="nav-link {{ request()->routeIs('blog.*') ? 'text-primary' : 'text-gray-500 hover:text-primary' }} transition-colors duration-300 relative after:content-[''] after:absolute after:w-full after:scale-x-0 after:h-[1px] after:bottom-0 after:left-0 after:bg-primary after:origin-bottom-right hover:after:scale-x-100 hover:after:origin-bottom-left after:transition-transform after:duration-300 {{ request()->routeIs('blog.*') ? 'after:scale-x-100' : '' }} pb-1"
                href="{{ route('blog.index') }}">Berita</a>
            <a class="nav-link {{ request()->routeIs('ppdb') ? 'text-primary' : 'text-gray-500 hover:text-primary' }} transition-colors duration-300 relative after:content-[''] after:absolute after:w-full after:scale-x-0 after:h-[1px] after:bottom-0 after:left-0 after:bg-primary after:origin-bottom-right hover:after:scale-x-100 hover:after:origin-bottom-left after:transition-transform after:duration-300 {{ request()->routeIs('ppdb') ? 'after:scale-x-100' : '' }} pb-1"
                href="{{ route('ppdb') }}">PPDB</a>
        </div>
        <a href="{{ route('ppdb') }}"
            class="hidden md:block bg-primary text-white border border-primary px-8 py-3 font-subhead font-bold text-xs uppercase tracking-widest hover:bg-white hover:text-primary transition-all duration-300">
            Daftar Sekarang
        </a>
        <!-- Mobile Menu Icon -->
        <button id="mobile-menu-btn" class="md:hidden text-primary p-2">
            <span class="material-symbols-outlined text-3xl">menu</span>
        </button>
    </div>

    <!-- Mobile Menu Dropdown -->
    <div id="mobile-menu"
        class="hidden absolute top-24 left-0 w-full bg-white border-b border-gray-100 shadow-xl overflow-hidden z-40 transition-all duration-300">
        <div class="flex flex-col font-subhead font-medium text-sm uppercase px-8 py-6 gap-6">
            <a class="{{ request()->routeIs('home') ? 'text-primary' : 'text-gray-500' }}"
                href="{{ route('home') }}">Beranda</a>
            <a class="{{ request()->routeIs('tentang-kami') ? 'text-primary' : 'text-gray-500' }}"
                href="{{ route('tentang-kami') }}">Tentang Sekolah</a>
            <a class="{{ request()->routeIs('blog.*') ? 'text-primary' : 'text-gray-500' }}"
                href="{{ route('blog.index') }}">Berita</a>
            <a class="{{ request()->routeIs('ppdb') ? 'text-primary' : 'text-gray-500' }}"
                href="{{ route('ppdb') }}">PPDB</a>
            <a href="{{ route('ppdb') }}"
                class="bg-primary text-white border border-primary px-8 py-3 font-subhead font-bold text-xs uppercase tracking-widest w-full mt-4 block text-center">
                Daftar Sekarang
            </a>
        </div>
    </div>
</nav>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const btn = document.getElementById('mobile-menu-btn');
        const menu = document.getElementById('mobile-menu');
        const icon = btn.querySelector('.material-symbols-outlined');

        btn.addEventListener('click', function() {
            menu.classList.toggle('hidden');
            if (menu.classList.contains('hidden')) {
                icon.textContent = 'menu';
            } else {
                icon.textContent = 'close';
            }
        });
    });
</script>
