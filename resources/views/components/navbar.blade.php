<nav class="sticky top-0 w-full z-50 bg-[#fdf9e9]/80 backdrop-blur-xl border-b border-outline-variant/30">
    <div class="flex justify-between items-center max-w-7xl mx-auto px-8 h-20">
        <a href="{{ route('home') }}" class="flex items-center gap-3 cursor-pointer active:opacity-70 transition-all">
            <img alt="SMA Harapan Jaya Logo" class="w-12 h-12 object-contain"
                src="https://lh3.googleusercontent.com/aida/ADBb0ujeWkuz4ycn39PIIznn1vISNTvRETPxUCcowf9F1Rwejiqn3nd5N0shHOcFwP94VFhDkoWS2g6SjDSfSRzA_Z587Cq_dUQfkE5GBsp2LNbKKbzb37srre9ntZTA2_HTGYKnwUVDgczaynchEsAq2rfptiWxhFybKec6Uk5RWDHlvhz4Qd2dGWHA5MngfRll3MFZpxx298aPiY3UQQu9U_blCYDeT3kMgAIP-1rUucujUDAMewAnchcAqN1ADhphx7qYcOQXDoPeUQ" />
            <div class="font-headline font-black text-xl text-primary uppercase tracking-tight">
                Harapan Jaya
            </div>
        </a>
        <div class="hidden md:flex items-center gap-8 font-headline font-semibold tracking-tight text-sm">
            <a class="nav-link {{ request()->routeIs('home') ? 'text-primary border-b-2 border-primary pb-1' : 'text-on-surface-variant hover:text-primary hover:scale-105' }} transition-all duration-300 ease-out cursor-pointer active:opacity-70"
                href="{{ route('home') }}">Beranda</a>
            <a class="nav-link {{ request()->routeIs('tentang-kami') ? 'text-primary border-b-2 border-primary pb-1' : 'text-on-surface-variant hover:text-primary hover:scale-105' }} transition-all duration-300 ease-out cursor-pointer active:opacity-70"
                href="{{ route('tentang-kami') }}">Tentang Sekolah</a>
            <a class="nav-link {{ request()->routeIs('blog.*') ? 'text-primary border-b-2 border-primary pb-1' : 'text-on-surface-variant hover:text-primary hover:scale-105' }} transition-all duration-300 ease-out cursor-pointer active:opacity-70"
                href="{{ route('blog.index') }}">Berita</a>
            <a class="nav-link {{ request()->routeIs('ppdb') ? 'text-primary border-b-2 border-primary pb-1' : 'text-on-surface-variant hover:text-primary hover:scale-105' }} transition-all duration-300 ease-out cursor-pointer active:opacity-70"
                href="{{ route('ppdb') }}">PPDB</a>
        </div>
        <button
            class="bg-primary text-on-primary px-6 py-2.5 rounded-xl font-headline font-bold text-sm hover:scale-105 transition-transform duration-300 ease-out active:opacity-70">
            Daftar Sekarang
        </button>
    </div>
</nav>
