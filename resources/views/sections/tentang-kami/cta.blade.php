<!-- CTA Section -->
<section class="py-24 px-8 bg-surface">
    <div class="max-w-7xl mx-auto">
        <div class="relative bg-primary rounded-[2.5rem] overflow-hidden p-12 md:p-24 text-center shadow-2xl">
            <div class="absolute inset-0 opacity-20">
                <div class="absolute inset-0 bg-[radial-gradient(circle_at_top_right,_#ffffff,_transparent)]">
                </div>
            </div>
            <div class="relative z-10">
                <h2 class="text-white text-4xl md:text-5xl font-headline font-bold mb-8 italic">
                    Siap Menjadi Bagian dari <span class="not-italic font-black">Masa Depan?</span>
                </h2>
                <p class="text-primary-container text-lg max-w-2xl mx-auto mb-12 font-body font-light">
                    Jadilah bagian dari komunitas pendidikan yang inspiratif. Kami membuka pendaftaran untuk tahun
                    ajaran baru dengan kuota terbatas.
                </p>
                <div class="flex flex-col sm:flex-row justify-center gap-6">
                    <a href="{{ route('ppdb') }}"
                        class="bg-white text-primary px-10 py-5 rounded-xl font-headline font-black text-lg hover:scale-105 transition-all shadow-xl inline-flex items-center justify-center gap-3">
                        Daftar Sekarang
                        <span class="material-symbols-outlined">east</span>
                    </a>
                    @php
                        $waNumber = preg_replace('/[^0-9]/', '', $sekolah?->no_telepon ?? '62215401920');
                        if (str_starts_with($waNumber, '0')) {
                            $waNumber = '62' . substr($waNumber, 1);
                        }
                    @endphp
                    <a href="https://wa.me/{{ $waNumber }}" target="_blank"
                        class="bg-transparent text-white border-2 border-white/30 px-10 py-5 rounded-xl font-headline font-bold text-lg hover:bg-white/10 transition-all inline-flex items-center justify-center gap-3">
                        Hubungi kami
                        <i class="fa fa-whatsapp text-2xl"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>
