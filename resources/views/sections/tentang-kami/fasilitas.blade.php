<!-- Fasilitas Sekolah Section -->
<section class="py-32 px-8 bg-surface border-t border-gray-100">
    <div class="max-w-7xl mx-auto">
        <div class="flex flex-col md:flex-row justify-between items-end mb-16">
            <div class="max-w-2xl">
                <span class="text-gray-400 font-subhead font-bold text-[10px] tracking-[0.25em] uppercase mb-4 block">Sarana & Prasarana</span>
                <h2 class="text-on-surface text-4xl md:text-5xl font-headline font-normal italic">Fasilitas <span class="not-italic font-bold text-primary">Unggulan</span></h2>
            </div>
            <div class="mt-8 md:mt-0 flex gap-4">
                <p class="text-gray-500 font-body text-sm max-w-xs text-right hidden md:block">
                    Mendukung potensi siswa dengan fasilitas modern dan lingkungan belajar yang inspiratif.
                </p>
            </div>
        </div>

        <!-- Horizontal Scroll Container -->
        <div class="relative group">
            <div class="flex overflow-x-auto pb-12 gap-8 no-scrollbar snap-x snap-mandatory scroll-smooth" id="fasilitas-container">
                @forelse($fasilitas as $item)
                    <div class="flex-none w-72 md:w-80 snap-start group/item">
                        <div class="relative aspect-[4/5] overflow-hidden bg-gray-100 mb-6 border border-gray-100">
                            <img src="{{ $item->foto }}" alt="{{ $item->nama }}" 
                                 class="w-full h-full object-cover grayscale contrast-125 group-hover/item:grayscale-0 group-hover/item:scale-105 transition-all duration-700">
                            
                            <!-- Overlay detail on hover if needed, or keep it minimal -->
                            <div class="absolute inset-0 bg-gradient-to-t from-black/60 via-transparent to-transparent opacity-0 group-hover/item:opacity-100 transition-opacity duration-500 flex items-end p-8">
                                <p class="text-white text-xs font-body font-light leading-relaxed">
                                    {{ $item->deskripsi }}
                                </p>
                            </div>
                        </div>
                        <h3 class="text-xl font-headline font-bold text-on-surface group-hover/item:text-primary transition-colors duration-300">
                            {{ $item->nama }}
                        </h3>
                        <div class="w-12 h-0.5 bg-gray-200 mt-4 group-hover/item:w-full group-hover/item:bg-primary transition-all duration-500"></div>
                    </div>
                @empty
                    <div class="w-full py-20 text-center border-2 border-dashed border-gray-100 rounded-xl">
                        <p class="text-gray-400 font-body">Data fasilitas belum tersedia.</p>
                    </div>
                @endforelse
            </div>

            <!-- Custom Navigation Dots or hints could go here -->
            <div class="flex items-center gap-2 mt-4 md:hidden">
                <div class="w-full h-1 bg-gray-100 rounded-full overflow-hidden">
                    <div class="w-1/3 h-full bg-primary/30"></div>
                </div>
                <span class="text-[10px] text-gray-400 font-subhead uppercase font-bold whitespace-nowrap">Geser</span>
            </div>
        </div>
    </div>
</section>

<style>
    .no-scrollbar::-webkit-scrollbar {
        display: none;
    }
    .no-scrollbar {
        -ms-overflow-style: none;
        scrollbar-width: none;
    }
</style>
