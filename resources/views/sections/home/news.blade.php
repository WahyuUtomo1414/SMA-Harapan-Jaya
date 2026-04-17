<!-- News Grid -->
<section class="py-32 bg-white border-b border-gray-100">
    <div class="max-w-7xl mx-auto px-8">
        <div class="flex flex-col md:flex-row justify-between items-end mb-20 border-b-2 border-primary pb-6">
            <div>
                <span class="text-gray-400 font-subhead font-bold text-[10px] tracking-[0.25em] uppercase mb-4 block">Kabar Sekolah</span>
                <h2 class="text-on-surface text-4xl md:text-5xl font-headline font-normal italic">Berita &amp; Artikel Terbaru</h2>
            </div>
            <a href="{{ route('blog.index') }}" class="mt-6 md:mt-0 text-[#111] font-subhead text-[11px] font-bold uppercase tracking-[0.2em] border-b border-black/20 hover:border-primary pb-1 transition-colors hover:text-primary">
                Lihat Semua
            </a>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-x-12 gap-y-16">
            @foreach($latestBlogs as $blog)
                <a href="{{ route('blog.show', $blog->slug) }}" class="group cursor-pointer">
                    <div class="overflow-hidden mb-6 aspect-[4/3] bg-gray-100 relative">
                        <img alt="{{ $blog->title }}" class="w-full h-full object-cover filter grayscale-[10%] group-hover:grayscale-0 group-hover:scale-105 transition-all duration-700" src="{{ Str::startsWith($blog->thumbnail, 'http') ? $blog->thumbnail : asset('storage/' . $blog->thumbnail) }}" />
                        <div class="absolute top-0 left-0 bg-primary/90 text-white font-subhead text-[9px] font-bold uppercase tracking-widest px-3 py-1">
                            {{ $blog->kategori->nama }}
                        </div>
                    </div>
                    <h4 class="text-on-surface text-2xl font-headline font-normal mb-4 group-hover:text-primary transition-colors leading-snug">
                        {{ $blog->title }}
                    </h4>
                    <div class="text-gray-500 font-body font-light text-sm line-clamp-3 mb-6 leading-relaxed">
                        {!! strip_tags($blog->konten) !!}
                    </div>
                    <div class="flex items-center gap-3">
                        <span class="w-8 h-[1px] bg-primary group-hover:w-16 transition-all duration-500"></span>
                        <span class="text-primary font-subhead font-bold text-[10px] uppercase tracking-widest">Baca</span>
                    </div>
                </a>
            @endforeach
        </div>
    </div>
</section>
