<!-- Hero Section -->
<section class="relative min-h-[60vh] flex flex-col lg:flex-row items-stretch border-b border-gray-200">
    <div class="w-full lg:w-1/2 flex flex-col justify-center px-12 py-20 lg:py-0 bg-white z-10 relative">
        <div class="absolute top-0 left-0 w-full h-[6px] bg-primary"></div>
        <div class="max-w-xl mx-auto xl:ml-auto xl:mr-12">
            <span
                class="inline-block border border-gray-300 text-gray-500 px-4 py-1.5 text-[10px] font-subhead font-bold tracking-[0.25em] uppercase mb-10">
                Profil {{ $sekolah?->nama ?? 'Lembaga' }}
            </span>
            <h1
                class="text-on-surface text-5xl md:text-7xl font-headline font-normal leading-[1.05] mb-8 tracking-tight">
                Membangun <br /> <span class="italic text-primary">Karakter</span> <br /> & Integritas.
            </h1>
            <p
                class="text-gray-600 text-lg font-body leading-relaxed mb-12 font-light border-l border-gray-300 pl-6 ml-1">
                SMA Harapan Jaya bukan sekadar tempat menuntut ilmu; ia adalah ekosistem tempat ide-ide tumbuh dan karakter ditempa secara mendalam. Kami mengintegrasikan tradisi intelektual yang kuat dengan inovasi pedagogi modern.
            </p>
        </div>
    </div>
    <div
        class="w-full lg:w-1/2 relative min-h-[40vh] lg:min-h-full bg-gray-100 flex items-center justify-center overflow-hidden">
        <img alt="Tentang Kami {{ $sekolah?->nama }}"
            class="w-full h-full object-cover transition-transform hover:scale-[1.05] duration-1000"
            src="{{ $sekolah?->thumbnail ? asset('storage/' . $sekolah->thumbnail) : 'https://lh3.googleusercontent.com/aida-public/AB6AXuB-XEPjIMxu1NoW7xczh3G-wH5EO78t7LID-2JLHEoYR0_PMsAmkH0EpqMXwF3_jTnkt_p7oOs_EetVrWqG7d958_qNz0VLFzEYLiMLLKps1nQ_RQnN3kzkR_u7mMrqpU6UBe_4j7aGj1scNNdJ7qi-ZmRUrwBHJSKFtY2rwwJ5ZQ_4xSmptSGHhhhdX1TVXqYWYTyJcF8fP6wvFuGjz2rkzW_lqFVyq5BsUEFzMdzgtSRXTg5EiWgbBnfeH7yZv9HNDn0cSOjoanc' }}" />
        <div class="absolute inset-0 bg-primary/10 mix-blend-multiply"></div>
    </div>
</section>
