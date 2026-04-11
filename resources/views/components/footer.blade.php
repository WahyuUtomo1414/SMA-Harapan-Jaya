<footer class="bg-primary text-on-primary w-full rounded-t-[2.5rem] mt-20">
    <div
        class="grid grid-cols-1 md:grid-cols-4 gap-12 px-12 py-16 max-w-7xl mx-auto font-body text-sm leading-relaxed">
        <div class="md:col-span-1">
            <div class="flex items-center gap-2 mb-6">
                <img alt="Logo" class="w-10 h-10 object-contain brightness-0 invert"
                    src="https://lh3.googleusercontent.com/aida/ADBb0ujeWkuz4ycn39PIIznn1vISNTvRETPxUCcowf9F1Rwejiqn3nd5N0shHOcFwP94VFhDkoWS2g6SjDSfSRzA_Z587Cq_dUQfkE5GBsp2LNbKKbzb37srre9ntZTA2_HTGYKnwUVDgczaynchEsAq2rfptiWxhFybKec6Uk5RWDHlvhz4Qd2dGWHA5MngfRll3MFZpxx298aPiY3UQQu9U_blCYDeT3kMgAIP-1rUucujUDAMewAnchcAqN1ADhphx7qYcOQXDoPeUQ" />
                <div class="font-headline font-black text-xl text-white">Harapan Jaya</div>
            </div>
            <p class="text-white/80 mb-6">
                Membangun jembatan antara tradisi keunggulan dan inovasi masa depan dalam setiap langkah pendidikan.
            </p>
            <div class="flex gap-4">
                <span
                    class="material-symbols-outlined text-white cursor-pointer hover:scale-110 transition-transform">public</span>
                <span
                    class="material-symbols-outlined text-white cursor-pointer hover:scale-110 transition-transform">share</span>
                <span
                    class="material-symbols-outlined text-white cursor-pointer hover:scale-110 transition-transform">alternate_email</span>
            </div>
        </div>
        <div>
            <h4 class="text-white font-headline font-bold mb-6">Navigasi Cepat</h4>
            <ul class="space-y-4">
                <li><a class="text-white/80 hover:text-white transition-colors" href="{{ route('tentang-kami') }}">Visi &amp; Misi</a>
                </li>
                <li><a class="text-white/80 hover:text-white transition-colors" href="#">Kurikulum</a></li>
                <li><a class="text-white/80 hover:text-white transition-colors" href="#">Fasilitas</a></li>
                <li><a class="text-white/80 hover:text-white transition-colors" href="#">Kontak</a></li>
            </ul>
        </div>
        <div>
            <h4 class="text-white font-headline font-bold mb-6">Informasi Kontak</h4>
            <ul class="space-y-4 text-white/80">
                <li class="flex items-start gap-3">
                    <span class="material-symbols-outlined text-sm mt-1">location_on</span>
                    Jl. Daan Mogot KM 13, Cengkareng, Jakarta Barat
                </li>
                <li class="flex items-center gap-3">
                    <span class="material-symbols-outlined text-sm">call</span>
                    +62 (21) 540-1920
                </li>
                <li class="flex items-center gap-3">
                    <span class="material-symbols-outlined text-sm">mail</span>
                    info@harapanjaya.sch.id
                </li>
            </ul>
        </div>
        <div>
            <h4 class="text-white font-headline font-bold mb-6">Buletin</h4>
            <p class="text-white/80 mb-4">Dapatkan update terbaru seputar kegiatan sekolah.</p>
            <div class="relative">
                <input
                    class="w-full bg-white/10 border-none rounded-xl py-3 px-4 text-white placeholder:text-white/40 focus:ring-2 focus:ring-white"
                    placeholder="Email Anda" type="email" />
                <button class="absolute right-2 top-1.5 p-1.5 text-primary bg-white rounded-lg">
                    <span class="material-symbols-outlined text-sm">send</span>
                </button>
            </div>
        </div>
    </div>
    <div class="border-t border-white/10 py-8 px-12 text-center">
        <p class="text-white/60">© {{ date('Y') }} SMA Harapan Jaya. Cultivating Excellence through Innovation and Integrity.
        </p>
    </div>
</footer>
