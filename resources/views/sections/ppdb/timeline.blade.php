<!-- Information & Key Dates -->
<section class="py-24">
    <div class="max-w-7xl mx-auto px-6">
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            <!-- Column 1: Important Dates -->
            <div
                class="lg:col-span-2 bg-[#004d26] text-on-primary rounded-[3rem] p-12 overflow-hidden relative group">
                <div class="relative z-10 h-full flex flex-col">
                    <div class="flex items-center gap-3 mb-12">
                        <div class="p-2 bg-white/10 rounded-lg">
                            <span class="material-symbols-outlined text-primary-container">calendar_today</span>
                        </div>
                        <h3 class="font-headline font-bold text-2xl tracking-tight">Timeline Akademik 2024</h3>
                    </div>
                    <div class="space-y-0 flex-grow">
                        <div
                            class="flex items-center gap-8 py-6 border-b border-white/10 hover:bg-white/5 transition-colors px-4 -mx-4 rounded-xl">
                            <div
                                class="bg-primary-container text-on-primary-container h-14 w-14 flex flex-col items-center justify-center rounded-xl shrink-0">
                                <p class="text-[10px] font-bold uppercase leading-none">JAN</p>
                                <p class="text-xl font-black leading-none mt-1">15</p>
                            </div>
                            <div class="flex-grow">
                                <h4 class="font-headline font-bold text-lg text-white">Gelombang I (Early Bird)
                                </h4>
                                <p class="text-white/60 text-sm">Kesempatan beasiswa prestasi dan potongan uang
                                    pangkal.</p>
                            </div>
                            <span class="material-symbols-outlined text-white/30">chevron_right</span>
                        </div>
                        <div
                            class="flex items-center gap-8 py-6 border-b border-white/10 hover:bg-white/5 transition-colors px-4 -mx-4 rounded-xl">
                            <div
                                class="bg-secondary-container text-on-secondary-container h-14 w-14 flex flex-col items-center justify-center rounded-xl shrink-0">
                                <p class="text-[10px] font-bold uppercase leading-none">MAR</p>
                                <p class="text-xl font-black leading-none mt-1">20</p>
                            </div>
                            <div class="flex-grow">
                                <h4 class="font-headline font-bold text-lg text-white">Batas Akhir Berkas</h4>
                                <p class="text-white/60 text-sm">Penutupan unggah dokumen persyaratan Gelombang
                                    I.</p>
                            </div>
                            <span class="material-symbols-outlined text-white/30">chevron_right</span>
                        </div>
                        <div
                            class="flex items-center gap-8 py-6 hover:bg-white/5 transition-colors px-4 -mx-4 rounded-xl">
                            <div
                                class="bg-tertiary-container text-on-tertiary-container h-14 w-14 flex flex-col items-center justify-center rounded-xl shrink-0">
                                <p class="text-[10px] font-bold uppercase leading-none">APR</p>
                                <p class="text-xl font-black leading-none mt-1">05</p>
                            </div>
                            <div class="flex-grow">
                                <h4 class="font-headline font-bold text-lg text-white">Tes Potensi (CBT)</h4>
                                <p class="text-white/60 text-sm">Computer Based Test yang dilakukan secara
                                    serentak.</p>
                            </div>
                            <span class="material-symbols-outlined text-white/30">chevron_right</span>
                        </div>
                    </div>
                    <div
                        class="mt-12 bg-black/20 p-6 rounded-2xl border border-white/5 flex items-center gap-4">
                        <span class="material-symbols-outlined text-primary-container">info</span>
                        <p class="text-sm font-medium italic opacity-80">"Jadwal dapat berubah sewaktu-waktu
                            sesuai kebijakan komite."</p>
                    </div>
                </div>
                <!-- Ambient Decor -->
                <div
                    class="absolute -top-24 -right-24 w-64 h-64 bg-primary rounded-full blur-[100px] opacity-20">
                </div>
            </div>
            <!-- Requirements Placeholder -->
            @include('sections.ppdb.persyaratan')
        </div>
    </div>
</section>
