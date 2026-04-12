<!-- Information & Key Dates -->
<section class="py-32 bg-white">
    <div class="max-w-7xl mx-auto px-8">
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-16">
            <!-- Column 1: Timeline -->
            <div class="lg:col-span-7">
                <div class="bg-on-surface p-12 lg:p-20 relative overflow-hidden group h-full">
                    <div class="absolute top-0 right-0 w-64 h-64 bg-primary/10 -mr-32 -mt-32 rounded-full blur-3xl"></div>
                    
                    <div class="relative z-10">
                        <div class="flex items-center gap-4 mb-16 border-b border-white/10 pb-8">
                            <span class="material-symbols-outlined text-primary text-3xl">calendar_today</span>
                            <h3 class="text-3xl font-headline font-bold text-white italic">Timeline Akademik</h3>
                        </div>

                        <div class="space-y-12">
                            @if($ppdb?->timeline)
                                @foreach($ppdb->timeline as $item)
                                    <div class="flex items-start gap-8 group/item">
                                        <div class="pt-2">
                                            <div class="w-2 h-2 bg-primary rounded-full group-hover/item:scale-150 transition-transform"></div>
                                        </div>
                                        <div>
                                            <span class="block text-primary font-subhead font-bold text-[10px] tracking-[0.3em] uppercase mb-2">{{ $item['waktu'] ?? '' }}</span>
                                            <h4 class="text-xl font-headline font-bold text-white mb-2 italic">{{ $item['label'] ?? '' }}</h4>
                                            @if(isset($item['link']))
                                                <a href="{{ $item['link'] }}" target="_blank" class="text-sm font-body text-gray-400 hover:text-primary transition-colors flex items-center gap-2">
                                                    {{ parse_url($item['link'], PHP_URL_HOST) }}
                                                    <span class="material-symbols-outlined text-xs">open_in_new</span>
                                                </a>
                                            @endif
                                            @if(isset($item['keterangan']))
                                                <p class="text-sm font-body text-gray-400 font-light leading-relaxed">{{ $item['keterangan'] }}</p>
                                            @endif
                                        </div>
                                    </div>
                                @endforeach
                            @endif
                        </div>

                        <div class="mt-20 p-8 bg-white/5 border border-white/5">
                            <p class="text-sm font-body text-gray-400 font-light italic leading-relaxed">
                                <span class="text-primary font-bold">Catatan:</span> Jadwal dapat berubah sewaktu-waktu sesuai dengan kebijakan komite sekolah dan dinas pendidikan terkait.
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Column 2: Requirements -->
            <div class="lg:col-span-5">
                @include('sections.ppdb.persyaratan')
            </div>
        </div>
    </div>
</section>
