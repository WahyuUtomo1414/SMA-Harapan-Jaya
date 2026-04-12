<!-- Process Flow -->
<section id="alur" class="py-32 bg-white border-b border-gray-100">
    <div class="max-w-7xl mx-auto px-8">
        <div class="text-center mb-24">
            <span
                class="inline-block border border-gray-300 text-gray-500 px-4 py-1.5 text-[10px] font-subhead font-bold tracking-[0.25em] uppercase mb-10">
                Tata Cara Pendaftaran
            </span>
            <h2 class="text-on-surface text-4xl md:text-6xl font-headline font-normal leading-tight italic">
                Alur <span class="not-italic font-bold text-primary">Pendaftaran</span>
            </h2>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-16 items-start">
            <!-- Offline Path -->
            <div>
                <div class="flex items-center gap-4 mb-12 border-b border-gray-100 pb-6">
                    <span class="material-symbols-outlined text-primary text-3xl">storefront</span>
                    <h3 class="text-2xl font-headline font-bold text-on-surface italic">Jalur Mandiri (Offline)</h3>
                </div>
                <div class="space-y-8">
                    @if($ppdb?->alur_ppdb && isset($ppdb->alur_ppdb['offline']))
                        @foreach($ppdb->alur_ppdb['offline'] as $index => $step)
                            <div class="group flex items-start gap-8 transition-colors hover:bg-gray-50 p-6 -mx-6">
                                <span class="text-3xl font-headline font-light text-gray-200 group-hover:text-primary/20 transition-colors">{{ sprintf('%02d', $index + 1) }}</span>
                                <p class="text-lg font-body text-gray-600 leading-relaxed font-light pt-1">{{ $step }}</p>
                            </div>
                        @endforeach
                    @endif
                </div>
            </div>

            <!-- Online Path -->
            <div>
                <div class="flex items-center gap-4 mb-12 border-b border-gray-100 pb-6">
                    <span class="material-symbols-outlined text-primary text-3xl">language</span>
                    <h3 class="text-2xl font-headline font-bold text-on-surface italic">Jalur SPMB Bersama (Online)</h3>
                </div>
                <div class="space-y-8">
                    @if($ppdb?->alur_ppdb && isset($ppdb->alur_ppdb['online']))
                        @foreach($ppdb->alur_ppdb['online'] as $index => $step)
                            <div class="group flex items-start gap-8 transition-colors hover:bg-gray-50 p-6 -mx-6">
                                <span class="text-3xl font-headline font-light text-gray-200 group-hover:text-primary/20 transition-colors">{{ sprintf('%02d', $index + 1) }}</span>
                                <p class="text-lg font-body text-gray-600 leading-relaxed font-light pt-1">{!! $step !!}</p>
                            </div>
                        @endforeach
                    @endif
                </div>
            </div>
        </div>
    </div>
</section>
