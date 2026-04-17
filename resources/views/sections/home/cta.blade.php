<!-- CTA Section -->
<section class="py-0 relative overflow-hidden bg-primary text-white flex min-h-[60vh] items-center">
    <div class="absolute inset-0 z-0 bg-primary">
        <img alt="Gedung SMA Harapan Jaya"
            class="w-full h-full object-cover mix-blend-luminosity opacity-30 filter contrast-125 saturate-50"
            src="{{ asset('images/sekolah.png') }}" />
        <div class="absolute inset-0 bg-gradient-to-r from-primary via-primary/80 to-transparent"></div>
    </div>
    <div class="relative z-10 w-full">
        <div
            class="max-w-7xl mx-auto px-8 py-32 text-center md:text-left flex flex-col md:flex-row items-center justify-between gap-16">
            <div class="max-w-2xl">
                <span
                    class="text-white/60 font-subhead font-bold text-[10px] tracking-[0.25em] uppercase mb-8 block font-mono">Penerimaan
                    Siswa Baru</span>
                <h2 class="text-white text-5xl md:text-[5rem] md:leading-[1.1] font-headline font-normal mb-8">
                    Masa Depan <br /><span class="italic font-light">Dimulai</span> Di Sini.
                </h2>
                <p class="text-white/80 font-subhead text-sm md:text-base max-w-xl font-light leading-relaxed mb-4">
                    Jadilah bagian dari komunitas pendidikan yang inspiratif. Kami membuka pendaftaran untuk tahun
                    ajaran baru dengan kuota terbatas.
                </p>
            </div>
            <div class="flex flex-col gap-6 min-w-[240px]">
                <a href="{{ route('ppdb') }}"
                    class="group relative inline-flex items-center justify-between bg-white text-primary px-8 py-5 font-subhead uppercase tracking-[0.2em] text-[11px] font-bold transition-all hover:bg-gray-100 text-left w-full">
                    Daftar Sekarang
                    <span
                        class="material-symbols-outlined transform group-hover:translate-x-2 transition-transform">east</span>
                </a>
                @php
                    $waNumber = preg_replace('/[^0-9]/', '', $sekolah?->no_telepon ?? '62215401920');
                    if (str_starts_with($waNumber, '0')) {
                        $waNumber = '62' . substr($waNumber, 1);
                    }
                @endphp
                <a href="https://wa.me/{{ $waNumber }}" target="_blank"
                    class="group relative inline-flex items-center justify-between bg-transparent border border-white/30 text-white px-8 py-5 font-subhead uppercase tracking-[0.2em] text-[11px] font-bold transition-all hover:border-white hover:bg-white/5 text-left w-full">
                    Hubungi kami
                    <i class="text-xl transform group-hover:translate-x-2 transition-transform"></i>
                </a>
            </div>
        </div>
    </div>
</section>
