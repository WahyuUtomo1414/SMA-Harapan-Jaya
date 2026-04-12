<!-- FAQ Section -->
<section class="py-32 bg-white border-b border-gray-100">
    <div class="max-w-4xl mx-auto px-8">
        <div class="text-center mb-20">
            <span class="text-gray-400 font-subhead font-bold text-[10px] tracking-[0.25em] uppercase mb-4 block">Panduan</span>
            <h2 class="text-[#111] text-4xl md:text-5xl font-headline font-normal mb-8 italic">Pertanyaan <span class="not-italic font-bold">Umum</span></h2>
        </div>
        <div class="space-y-0">
            @forelse($faqs as $faq)
                <div class="border-b border-black py-6 {{ $loop->first ? 'border-t' : '' }}">
                    <details class="group">
                        <summary class="flex justify-between items-center cursor-pointer list-none font-headline font-normal text-2xl text-[#111]">
                            {{ $faq->pertanyaan }}
                            <span class="material-symbols-outlined transition-transform duration-300 group-open:rotate-45">add</span>
                        </summary>
                        <div class="pt-6 pb-2 text-gray-600 font-body leading-relaxed max-w-3xl">
                            {{ $faq->jawaban }}
                        </div>
                    </details>
                </div>
            @empty
                <div class="text-center text-gray-500 py-12 font-body border-t border-b border-gray-200">
                    FAQ belum tersedia saat ini.
                </div>
            @endforelse
        </div>
    </div>
</section>
