<!-- Hero Section -->
<section class="relative min-h-[60vh] flex flex-col lg:flex-row items-stretch border-b border-gray-200">
    <div class="w-full lg:w-1/2 flex flex-col justify-center px-12 py-20 lg:py-0 bg-white z-10 relative">
        <div class="absolute top-0 left-0 w-full h-[6px] bg-primary"></div>
        <div class="max-w-xl mx-auto xl:ml-auto xl:mr-12">
            <span
                class="inline-block border border-gray-300 text-gray-500 px-4 py-1.5 text-[10px] font-subhead font-bold tracking-[0.25em] uppercase mb-10">
                Penerimaan Peserta Didik Baru
            </span>
            <h1
                class="text-on-surface text-5xl md:text-7xl font-headline font-normal leading-[1.05] mb-8 tracking-tight">
                Mulai <br /> <span class="italic text-primary">Langkah</span> <br /> Masa Depan.
            </h1>
            <p
                class="text-gray-600 text-lg font-body leading-relaxed mb-12 font-light border-l border-gray-300 pl-6 ml-1">
                {{ $ppdb?->deskripsi ?? 'Wujudkan potensi terbaik putra-putri Anda melalui ekosistem pembelajaran yang kolaboratif, modern, dan berlandaskan nilai-nilai luhur.' }}
            </p>
            <div class="flex flex-wrap items-center gap-8">
                <a href="#alur"
                    class="group relative inline-flex items-center justify-center bg-[#111] text-white px-8 py-4 font-subhead uppercase tracking-[0.2em] text-xs transition-colors hover:bg-primary">
                    Lihat Alur
                </a>
                @if($ppdb?->brosur)
                    <a href="{{ asset('storage/' . $ppdb->brosur) }}" target="_blank"
                        class="text-primary font-subhead uppercase tracking-widest text-[11px] font-bold hover:text-[#111] transition-colors border-b border-primary/30 hover:border-[#111] pb-1">
                        Unduh Brosur
                    </a>
                @endif
            </div>
        </div>
    </div>
    <div
        class="w-full lg:w-1/2 relative min-h-[40vh] lg:min-h-full bg-gray-100 flex items-center justify-center overflow-hidden">
        <img alt="PPDB SMA Harapan Jaya"
            class="w-full h-full object-cover transition-transform hover:scale-[1.05] duration-1000"
            src="https://images.unsplash.com/photo-1523050335392-93851179ae22?q=80&w=2067&auto=format&fit=crop" />
        <div class="absolute inset-0 bg-primary/10 mix-blend-multiply"></div>
    </div>
</section>
