@extends('layouts.app')

@section('title', 'Berita & Artikel | SMA Harapan Jaya')

@section('content')
<!-- Hero Section -->
<section class="relative py-32 bg-white border-b border-gray-200 overflow-hidden">
    <div class="absolute top-0 left-0 w-full h-[6px] bg-primary"></div>
    <div class="max-w-7xl mx-auto px-8 relative text-center">
        <span
            class="inline-block border border-gray-300 text-gray-500 px-4 py-1.5 text-[10px] font-subhead font-bold tracking-[0.25em] uppercase mb-10">
            Berita & Wawasan
        </span>
        <h1
            class="text-on-surface text-5xl md:text-8xl font-headline font-normal leading-[1.05] mb-8 tracking-tight italic">
            Jendela <span class="not-italic font-bold text-primary">Inspirasi</span> <br /> & Prestasi.
        </h1>
        <p class="text-gray-400 font-subhead font-bold text-[11px] tracking-[0.3em] uppercase">SMA Harapan Jaya Jakarta</p>
    </div>
</section>

<!-- Filter & Search -->
<section class="py-12 bg-white border-b border-gray-100 sticky top-[72px] z-30 shadow-sm shadow-black/5">
    <div class="max-w-7xl mx-auto px-8">
        <div class="flex flex-col md:flex-row md:items-center justify-between gap-8">
            <div class="flex items-center gap-4 overflow-x-auto pb-4 md:pb-0 scrollbar-hide">
                <a href="#" class="whitespace-nowrap px-6 py-2 bg-primary text-white font-subhead font-bold text-[10px] tracking-widest uppercase shadow-lg shadow-primary/20">Semua</a>
                @foreach($categories as $category)
                    <a href="#" class="whitespace-nowrap px-6 py-2 bg-gray-50 text-gray-400 hover:bg-gray-100 hover:text-on-surface transition-colors font-subhead font-bold text-[10px] tracking-widest uppercase border border-gray-100">{{ $category->nama }}</a>
                @endforeach
            </div>
            <div class="relative group max-w-xs w-full">
                <input type="text" placeholder="Cari artikel..." class="w-full bg-gray-50 border border-gray-100 px-6 py-3 font-body text-sm focus:outline-none focus:border-primary/30 transition-colors" />
                <span class="material-symbols-outlined absolute right-4 top-1/2 -translate-y-1/2 text-gray-400 group-focus-within:text-primary transition-colors">search</span>
            </div>
        </div>
    </div>
</section>

<!-- Blog Grid -->
<section class="py-32 bg-white">
    <div class="max-w-7xl mx-auto px-8">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-x-12 gap-y-24">
            @foreach($blogs as $blog)
                <article class="group flex flex-col h-full">
                    <div class="relative aspect-[4/3] overflow-hidden mb-10">
                        <img src="{{ $blog->image }}" alt="{{ $blog->title }}" class="w-full h-full object-cover transition-transform duration-1000 group-hover:scale-105" />
                        <div class="absolute top-0 left-0 bg-white px-4 py-2 border-b border-r border-gray-100">
                            <span class="text-primary font-subhead font-bold text-[9px] tracking-[0.2em] uppercase">{{ $blog->category }}</span>
                        </div>
                    </div>
                    <div class="flex flex-col flex-grow">
                        <span class="text-gray-400 font-subhead font-bold text-[10px] tracking-widest uppercase mb-4 block">{{ $blog->date }}</span>
                        <h3 class="text-2xl font-headline font-bold text-on-surface mb-6 leading-tight group-hover:text-primary transition-colors italic">
                            <a href="{{ route('blog.show', $blog->slug) }}">{{ $blog->title }}</a>
                        </h3>
                        <p class="text-gray-500 font-body text-sm leading-relaxed font-light line-clamp-3 mb-8 flex-grow">
                            {{ $blog->excerpt }}
                        </p>
                        <a href="{{ route('blog.show', $blog->slug) }}" class="inline-flex items-center gap-3 text-on-surface font-subhead text-[10px] font-bold uppercase tracking-[0.25em] group-hover:text-primary transition-colors border-b border-gray-100 pb-2 w-fit">
                            Baca Selengkapnya
                            <span class="material-symbols-outlined text-sm">east</span>
                        </a>
                    </div>
                </article>
            @endforeach
        </div>

        <!-- Pagination -->
        <div class="mt-32 pt-12 border-t border-gray-100 flex justify-center">
            <nav class="flex items-center gap-2">
                <a href="#" class="w-12 h-12 flex items-center justify-center border border-primary bg-primary text-white text-xs font-bold">1</a>
                <a href="#" class="w-12 h-12 flex items-center justify-center border border-gray-100 text-gray-400 hover:border-primary hover:text-primary transition-colors text-xs font-bold">2</a>
                <a href="#" class="w-12 h-12 flex items-center justify-center border border-gray-100 text-gray-400 hover:border-primary hover:text-primary transition-colors text-xs font-bold">3</a>
                <span class="px-4 text-gray-300">...</span>
                <a href="#" class="w-12 h-12 flex items-center justify-center border border-gray-100 text-gray-400 hover:border-primary hover:text-primary transition-colors">
                    <span class="material-symbols-outlined text-sm">east</span>
                </a>
            </nav>
        </div>
    </div>
</section>
@endsection
