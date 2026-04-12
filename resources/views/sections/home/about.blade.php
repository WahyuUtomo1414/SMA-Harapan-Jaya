<!-- About Preview -->
<section class="py-32 bg-white relative border-b border-gray-100">
    <div class="max-w-7xl mx-auto px-8 relative">
        <div class="text-center mb-24 max-w-4xl mx-auto">
            <h2 class="text-on-surface text-4xl md:text-6xl font-headline font-normal leading-tight italic">
                Membentuk Karakter, <br /> <span class="not-italic font-bold">Mengasah Potensi</span>
            </h2>
        </div>
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-16 items-start">
            <div class="lg:col-span-4 flex flex-col justify-between h-full lg:py-12">
                <div>
                    <span
                        class="text-gray-400 font-subhead font-bold text-[10px] tracking-[0.25em] uppercase mb-8 block border-b border-gray-200 pb-4">Siapa
                        Kami</span>
                    <p class="text-2xl font-headline leading-normal text-primary mb-8 italic">
                        "Lebih dari sekadar pendidik, kami membangun ekosistem dimana harmoni antara inovasi,
                        kepemimpinan, dan nilai luhur didedikasikan untuk setiap siswa."
                    </p>
                </div>
                {{-- <a href="{{ route('tentang-kami') }}" class="inline-flex items-center gap-3 text-[#111] font-subhead text-[11px] font-bold uppercase tracking-[0.2em] hover:text-primary transition-colors mt-8 lg:mt-0 border-b border-black/10 hover:border-primary/30 pb-2 w-fit">
                    Eksplorasi Profil Kami
                    <span class="material-symbols-outlined text-sm">east</span>
                </a> --}}
            </div>
            <div class="lg:col-span-8 relative">
                <div class="aspect-[16/10] overflow-hidden bg-gray-100">
                    <img alt="Kegiatan Siswa"
                        class="w-full h-full object-cover object-center transition-transform hover:scale-105 duration-700"
                        src="{{ asset('images/about.png') }}" />
                </div>
                <div
                    class="absolute -bottom-10 -left-10 bg-white p-10 border border-gray-100 max-w-sm hidden md:block shadow-2xl shadow-black/5">
                    <p class="font-body text-gray-500 text-sm leading-loose">
                        Kami memfasilitasi setiap siswa untuk tidak hanya cemerlang secara intelektual, tetapi juga
                        memiliki ketangguhan mental, berintegritas tinggi, dan responsif terhadap tantangan dunia yang
                        nyata.
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>
