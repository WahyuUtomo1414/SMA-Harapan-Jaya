<!-- Hero Section -->
<section class="relative min-h-[85vh] flex flex-col lg:flex-row items-stretch border-b border-gray-200">
    <div class="w-full lg:w-1/2 flex flex-col justify-center px-12 py-20 lg:py-0 bg-white z-10 relative">
        <div class="absolute top-0 left-0 w-full h-[6px] bg-primary"></div>
        <div class="max-w-xl mx-auto xl:ml-auto xl:mr-12">
            <span
                class="inline-block border border-gray-300 text-gray-500 px-4 py-1.5 text-[10px] font-subhead font-bold tracking-[0.25em] uppercase mb-10">
                SMA Harapan Jaya
            </span>
            <h1
                class="text-on-surface text-5xl md:text-7xl font-headline font-normal leading-[1.05] mb-8 tracking-tight">
                Generasi <br /> <span class="italic text-primary">Unggul</span> <br /> Berkarakter.
            </h1>
            <p
                class="text-gray-600 text-lg font-body leading-relaxed mb-12 font-light border-l border-gray-300 pl-6 ml-1">
                Pendidikan duniawi berakar pada nilai luhur untuk mencetak pemimpin masa depan yang inovatif dan
                berintegritas tinggi.
            </p>
            <div class="flex flex-wrap items-center gap-8">
                <a href="{{ route('ppdb') }}"
                    class="group relative inline-flex items-center justify-center bg-[#111] text-white px-8 py-4 font-subhead uppercase tracking-[0.2em] text-xs transition-colors hover:bg-primary">
                    Daftar Sekarang
                </a>
                <a href="#"
                    class="text-primary font-subhead uppercase tracking-widest text-[11px] font-bold hover:text-[#111] transition-colors border-b border-primary/30 hover:border-[#111] pb-1">
                    Tentang Kami
                </a>
            </div>
        </div>
    </div>
    <div
        class="w-full lg:w-1/2 relative min-h-[50vh] lg:min-h-full bg-white flex items-center justify-center overflow-hidden">
        <img alt="Hero Image SMA Harapan Jaya"
            class="w-full h-full object-contain p-4 lg:p-16 object-center transition-transform hover:scale-[1.02] duration-700"
            src="{{ asset('images/hero.png') }}" />
    </div>
</section>
