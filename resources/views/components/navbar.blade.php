<nav class="sticky top-0 w-full z-50 bg-white/95 backdrop-blur-md border-b border-gray-100">
    <div class="flex justify-between items-center max-w-7xl mx-auto px-8 h-24">
        <a href="{{ route('home') }}" class="flex items-center gap-4 cursor-pointer group">
            <img alt="SMA Harapan Jaya Logo" class="w-12 h-12 object-contain"
                src="https://lh3.googleusercontent.com/aida/ADBb0ujeWkuz4ycn39PIIznn1vISNTvRETPxUCcowf9F1Rwejiqn3nd5N0shHOcFwP94VFhDkoWS2g6SjDSfSRzA_Z587Cq_dUQfkE5GBsp2LNbKKbzb37srre9ntZTA2_HTGYKnwUVDgczaynchEsAq2rfptiWxhFybKec6Uk5RWDHlvhz4Qd2dGWHA5MngfRll3MFZpxx298aPiY3UQQu9U_blCYDeT3kMgAIP-1rUucujUDAMewAnchcAqN1ADhphx7qYcOQXDoPeUQ" />
            <div class="font-headline font-bold lg:text-2xl md:text-xl text-primary tracking-wider uppercase">
                SMA Harapan Jaya
            </div>
        </a>
        <div class="hidden md:flex items-center gap-10 font-subhead font-medium tracking-wide text-sm uppercase">
            <a class="nav-link {{ request()->routeIs('home') ? 'text-primary' : 'text-gray-500 hover:text-primary' }} transition-colors duration-300 relative after:content-[''] after:absolute after:w-full after:scale-x-0 after:h-[1px] after:bottom-0 after:left-0 after:bg-primary after:origin-bottom-right hover:after:scale-x-100 hover:after:origin-bottom-left after:transition-transform after:duration-300 {{ request()->routeIs('home') ? 'after:scale-x-100' : '' }} pb-1"
                href="{{ route('home') }}">Beranda</a>
            <a class="nav-link {{ request()->routeIs('tentang-kami') ? 'text-primary' : 'text-gray-500 hover:text-primary' }} transition-colors duration-300 relative after:content-[''] after:absolute after:w-full after:scale-x-0 after:h-[1px] after:bottom-0 after:left-0 after:bg-primary after:origin-bottom-right hover:after:scale-x-100 hover:after:origin-bottom-left after:transition-transform after:duration-300 {{ request()->routeIs('tentang-kami') ? 'after:scale-x-100' : '' }} pb-1"
                href="{{ route('tentang-kami') }}">Tentang Sekolah</a>
            <a class="nav-link {{ request()->routeIs('blog.*') ? 'text-primary' : 'text-gray-500 hover:text-primary' }} transition-colors duration-300 relative after:content-[''] after:absolute after:w-full after:scale-x-0 after:h-[1px] after:bottom-0 after:left-0 after:bg-primary after:origin-bottom-right hover:after:scale-x-100 hover:after:origin-bottom-left after:transition-transform after:duration-300 {{ request()->routeIs('blog.*') ? 'after:scale-x-100' : '' }} pb-1"
                href="{{ route('blog.index') }}">Berita</a>
            <a class="nav-link {{ request()->routeIs('ppdb') ? 'text-primary' : 'text-gray-500 hover:text-primary' }} transition-colors duration-300 relative after:content-[''] after:absolute after:w-full after:scale-x-0 after:h-[1px] after:bottom-0 after:left-0 after:bg-primary after:origin-bottom-right hover:after:scale-x-100 hover:after:origin-bottom-left after:transition-transform after:duration-300 {{ request()->routeIs('ppdb') ? 'after:scale-x-100' : '' }} pb-1"
                href="{{ route('ppdb') }}">PPDB</a>
        </div>
        <button
            class="hidden md:block bg-primary text-white border border-primary px-8 py-3 font-subhead font-bold text-xs uppercase tracking-widest hover:bg-white hover:text-primary transition-all duration-300">
            Daftar Sekarang
        </button>
        <!-- Mobile Menu Icon -->
        <button class="md:hidden text-primary">
            <span class="material-symbols-outlined text-3xl">menu</span>
        </button>
    </div>
</nav>
