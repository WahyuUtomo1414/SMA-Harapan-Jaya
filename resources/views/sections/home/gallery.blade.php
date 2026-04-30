<!-- Galeri Sekolah Section -->
<section class="py-32 bg-white border-b border-gray-100">
    <div class="max-w-7xl mx-auto px-8">
        <div class="flex flex-col md:flex-row justify-between items-end mb-20 border-b-2 border-[#111] pb-6">
            <div>
                <span
                    class="text-gray-400 font-subhead font-bold text-[10px] tracking-[0.25em] uppercase mb-4 block">Visual</span>
                <h2 class="text-on-surface text-4xl md:text-5xl font-headline font-normal">Galeri <span
                        class="italic">Sekolah</span></h2>
            </div>
            {{-- <a href="#" class="mt-6 md:mt-0 text-[#111] font-subhead text-[11px] font-bold uppercase tracking-[0.2em] border-b border-black/20 hover:border-primary pb-1 transition-colors hover:text-primary">
                Lihat Kolom Visual
            </a> --}}
        </div>

        {{--
            Layout: 4 kolom, tiap kolom 2 foto.
            Kolom 1 & 3: foto[0] aspect-[3/4], foto[1] aspect-square
            Kolom 2 & 4: offset ke bawah (pt-16), foto[x] aspect-square, foto[y] aspect-[3/4]
            Total slot: 8 foto (index 0-7)
        --}}
        <div class="grid grid-cols-2 md:grid-cols-4 gap-1 md:gap-2">

            {{-- Kolom 1: foto 0 (3/4 tall) + foto 1 (square) --}}
            <div class="space-y-1 md:space-y-2">
                <div class="relative group overflow-hidden bg-gray-100 aspect-[3/4] cursor-pointer"
                    onclick="openLightbox('{{ $galleryPhotos[0] }}')">
                    <img alt="Galeri Sekolah 1"
                        class="w-full h-full object-cover filter grayscale contrast-125 transition-all duration-700 group-hover:grayscale-0 group-hover:scale-105"
                        src="{{ $galleryPhotos[0] }}" />
                </div>
                <div class="relative group overflow-hidden bg-gray-100 aspect-square cursor-pointer"
                    onclick="openLightbox('{{ $galleryPhotos[1] }}')">
                    <img alt="Galeri Sekolah 2"
                        class="w-full h-full object-cover filter grayscale contrast-125 transition-all duration-700 group-hover:grayscale-0 group-hover:scale-105"
                        src="{{ $galleryPhotos[1] }}" />
                </div>
            </div>

            {{-- Kolom 2: offset, foto 2 (square) + foto 3 (3/4 tall) --}}
            <div class="space-y-1 md:space-y-2 pt-0 md:pt-16">
                <div class="relative group overflow-hidden bg-gray-100 aspect-square cursor-pointer"
                    onclick="openLightbox('{{ $galleryPhotos[2] }}')">
                    <img alt="Galeri Sekolah 3"
                        class="w-full h-full object-cover filter grayscale contrast-125 transition-all duration-700 group-hover:grayscale-0 group-hover:scale-105"
                        src="{{ $galleryPhotos[2] }}" />
                </div>
                <div class="relative group overflow-hidden bg-gray-100 aspect-[3/4] cursor-pointer"
                    onclick="openLightbox('{{ $galleryPhotos[3] }}')">
                    <img alt="Galeri Sekolah 4"
                        class="w-full h-full object-cover filter grayscale contrast-125 transition-all duration-700 group-hover:grayscale-0 group-hover:scale-105"
                        src="{{ $galleryPhotos[3] }}" />
                </div>
            </div>

            {{-- Kolom 3: foto 4 (3/4 tall) + foto 5 (square) --}}
            <div class="space-y-1 md:space-y-2">
                <div class="relative group overflow-hidden bg-gray-100 aspect-[3/4] cursor-pointer"
                    onclick="openLightbox('{{ $galleryPhotos[4] }}')">
                    <img alt="Galeri Sekolah 5"
                        class="w-full h-full object-cover filter grayscale contrast-125 transition-all duration-700 group-hover:grayscale-0 group-hover:scale-105"
                        src="{{ $galleryPhotos[4] }}" />
                </div>
                <div class="relative group overflow-hidden bg-gray-100 aspect-square cursor-pointer"
                    onclick="openLightbox('{{ $galleryPhotos[5] }}')">
                    <img alt="Galeri Sekolah 6"
                        class="w-full h-full object-cover filter grayscale contrast-125 transition-all duration-700 group-hover:grayscale-0 group-hover:scale-105"
                        src="{{ $galleryPhotos[5] }}" />
                </div>
            </div>

            {{-- Kolom 4: offset, foto 6 (square) + foto 7 (3/4 tall) --}}
            <div class="space-y-1 md:space-y-2 pt-0 md:pt-16">
                <div class="relative group overflow-hidden bg-gray-100 aspect-square cursor-pointer"
                    onclick="openLightbox('{{ $galleryPhotos[6] }}')">
                    <img alt="Galeri Sekolah 7"
                        class="w-full h-full object-cover filter grayscale contrast-125 transition-all duration-700 group-hover:grayscale-0 group-hover:scale-105"
                        src="{{ $galleryPhotos[6] }}" />
                </div>
                <div class="relative group overflow-hidden bg-gray-100 aspect-[3/4] cursor-pointer"
                    onclick="openLightbox('{{ $galleryPhotos[7] }}')">
                    <img alt="Galeri Sekolah 8"
                        class="w-full h-full object-cover filter grayscale contrast-125 transition-all duration-700 group-hover:grayscale-0 group-hover:scale-105"
                        src="{{ $galleryPhotos[7] }}" />
                </div>
            </div>

        </div>
    </div>

    <!-- Lightbox Modal -->
    <div id="gallery-lightbox"
        class="fixed inset-0 z-[100] hidden flex items-center justify-center bg-black/90 p-4 md:p-8"
        onclick="closeLightbox()">
        <button class="absolute top-6 right-6 text-white hover:text-primary transition-colors duration-300"
            onclick="closeLightbox()">
            <span class="material-symbols-outlined !text-4xl">close</span>
        </button>
        <div class="relative max-w-5xl w-full h-full flex items-center justify-center"
            onclick="event.stopPropagation()">
            <img id="lightbox-image" src="" alt="Gallery Image Large"
                class="max-w-full max-h-full object-contain shadow-2xl transition-transform duration-500 scale-95" />
        </div>
    </div>

    <script>
        function openLightbox(imageSrc) {
            const lightbox = document.getElementById('gallery-lightbox');
            const lightboxImg = document.getElementById('lightbox-image');

            lightboxImg.src = imageSrc;
            lightbox.classList.remove('hidden');

            // Trigger animation
            setTimeout(() => {
                lightboxImg.classList.remove('scale-95');
                lightboxImg.classList.add('scale-100');
            }, 10);

            document.body.style.overflow = 'hidden';
        }

        function closeLightbox() {
            const lightbox = document.getElementById('gallery-lightbox');
            const lightboxImg = document.getElementById('lightbox-image');

            lightboxImg.classList.remove('scale-100');
            lightboxImg.classList.add('scale-95');

            setTimeout(() => {
                lightbox.classList.add('hidden');
                document.body.style.overflow = 'auto';
                lightboxImg.src = '';
            }, 300);
        }
    </script>
</section>
