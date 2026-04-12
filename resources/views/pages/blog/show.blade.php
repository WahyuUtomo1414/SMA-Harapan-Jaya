@extends('layouts.app')

@section('title', $blog->title . ' | SMA Harapan Jaya')

@section('content')
    <!-- Article Header -->
    <header class="pt-32 pb-20 bg-white border-b border-gray-100">
        <div class="max-w-4xl mx-auto px-8 text-center">
            <span
                class="block text-primary font-subhead font-bold text-[11px] tracking-[0.3em] uppercase mb-6">{{ $blog->kategori->nama }}</span>
            <h1
                class="text-4xl md:text-6xl font-headline font-normal leading-[1.1] mb-10 tracking-tight italic text-on-surface">
                {{ $blog->title }}
            </h1>
            <div
                class="flex items-center justify-center gap-6 text-gray-400 font-subhead font-bold text-[10px] tracking-widest uppercase">
                <span>{{ $blog->created_at->translatedFormat('d F Y') }}</span>
                <span class="w-1.5 h-1.5 bg-primary/20 rounded-full"></span>
                <span>Oleh: Admin Sekolah</span>
            </div>
        </div>
    </header>

    <!-- Featured Image -->
    <div class="max-w-7xl mx-auto px-8 -mt-10 mb-20">
        <div class="aspect-[21/9] overflow-hidden shadow-2xl">
            <img src="{{ Str::startsWith($blog->thumbnail, 'http') ? $blog->thumbnail : asset('storage/' . $blog->thumbnail) }}" alt="{{ $blog->title }}" class="w-full h-full object-cover" />
        </div>
    </div>

    <!-- Content -->
    <article class="py-20 bg-white">
        <div class="max-w-7xl mx-auto px-8">
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-20">
                <!-- Sidebar Left (Share) -->
                <div class="hidden lg:block lg:col-span-1 sticky top-32 h-fit">
                    {{-- <div class="flex flex-col gap-6 items-center">
                        <span
                            class="font-subhead font-bold text-[9px] tracking-widest uppercase text-gray-300 vertical-text mb-4">Bagikan</span>
                        <a href="#"
                            class="w-10 h-10 flex items-center justify-center rounded-full border border-gray-100 text-gray-400 hover:border-primary hover:text-primary transition-colors">
                            <i class="fa fa-facebook text-sm"></i>
                        </a>
                        <a href="#"
                            class="w-10 h-10 flex items-center justify-center rounded-full border border-gray-100 text-gray-400 hover:border-primary hover:text-primary transition-colors">
                            <i class="fa fa-twitter text-sm"></i>
                        </a>
                    </div> --}}
                </div>

                <!-- Main Content -->
                <div class="lg:col-span-7">
                    <div class="prose prose-xl prose-primary max-w-none font-body text-gray-600 leading-relaxed font-light">
                        {!! $blog->konten !!}
                    </div>

                    <!-- Gallery -->
                    @if($blog->foto && is_array($blog->foto) && count($blog->foto) > 0)
                        <div class="mt-24">
                            <span class="block text-primary font-subhead font-bold text-[10px] tracking-[0.3em] uppercase mb-10">Galeri Foto</span>
                            <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                                @foreach($blog->foto as $image)
                                    <div class="aspect-[4/3] overflow-hidden bg-gray-50 border border-gray-100 group">
                                        <img src="{{ Str::startsWith($image, 'http') ? $image : asset('storage/' . $image) }}" 
                                             alt="Gallery Image" 
                                             class="w-full h-full object-cover transition-transform duration-1000 group-hover:scale-110" />
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endif

                    <!-- Tags/Meta -->
                    <div class="mt-20 pt-10 border-t border-gray-100 flex flex-wrap gap-4">
                        <span
                            class="px-4 py-1.5 bg-gray-50 text-gray-400 font-subhead font-bold text-[9px] tracking-widest uppercase border border-gray-100">Edukasi</span>
                        <span
                            class="px-4 py-1.5 bg-gray-50 text-gray-400 font-subhead font-bold text-[9px] tracking-widest uppercase border border-gray-100">Karakter</span>
                        <span
                            class="px-4 py-1.5 bg-gray-50 text-gray-400 font-subhead font-bold text-[9px] tracking-widest uppercase border border-gray-100">Siswa</span>
                    </div>
                </div>

                <!-- Sidebar Right (Related) -->
                <div class="lg:col-span-4 space-y-16">
                    <!-- Related Posts -->
                    @if ($relatedBlogs->count() > 0)
                        <div>
                            <span class="block text-on-surface font-headline font-bold text-xl mb-10 italic">Artikel
                                Terkait</span>
                            <div class="space-y-10">
                                @foreach ($relatedBlogs as $related)
                                    <a href="{{ route('blog.show', $related->slug) }}" class="group flex gap-6 items-start">
                                        <div class="w-20 h-20 flex-shrink-0 overflow-hidden">
                                            <img src="{{ $related->thumbnail }}"
                                                class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110" />
                                        </div>
                                        <div>
                                            <span
                                                class="block text-primary font-subhead font-bold text-[9px] tracking-widest uppercase mb-1">{{ $related->kategori->nama }}</span>
                                            <h4
                                                class="font-headline font-bold text-sm text-on-surface group-hover:text-primary transition-colors leading-tight line-clamp-2">
                                                {{ $related->title }}</h4>
                                        </div>
                                    </a>
                                @endforeach
                            </div>
                        </div>
                    @endif

                    <!-- Quote Section -->
                    <div class="bg-gray-50 p-10 border border-gray-100 relative overflow-hidden">
                        <div class="absolute top-0 right-0 w-20 h-20 bg-primary/5 -mr-8 -mt-8 rounded-full"></div>
                        <span class="material-symbols-outlined text-primary/20 text-5xl mb-6">format_quote</span>
                        <p class="text-xl font-headline font-bold text-on-surface leading-relaxed italic relative z-10">
                            "Pendidikan adalah senjata paling mematikan di dunia, karena dengan pendidikan, Anda dapat
                            mengubah dunia."
                        </p>
                        <div class="mt-8 pt-6 border-t border-gray-200">
                            <p class="font-subhead font-bold text-[10px] tracking-[0.2em] uppercase text-gray-400">Nelson
                                Mandela</p>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </article>

    <style>
        .vertical-text {
            writing-mode: vertical-rl;
            transform: rotate(180deg);
        }
    </style>
@endsection
