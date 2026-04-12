<footer class="bg-[#0f1f15] text-white w-full mt-32 border-t-[8px] border-primary">
    <div class="grid grid-cols-1 md:grid-cols-4 gap-16 px-8 py-20 max-w-7xl mx-auto font-body text-sm leading-relaxed">
        <div class="md:col-span-1">
            <div class="flex items-center gap-3 mb-8">
                <img alt="Logo" class="w-12 h-12 object-contain brightness-0 invert"
                    src="https://lh3.googleusercontent.com/aida/ADBb0ujeWkuz4ycn39PIIznn1vISNTvRETPxUCcowf9F1Rwejiqn3nd5N0shHOcFwP94VFhDkoWS2g6SjDSfSRzA_Z587Cq_dUQfkE5GBsp2LNbKKbzb37srre9ntZTA2_HTGYKnwUVDgczaynchEsAq2rfptiWxhFybKec6Uk5RWDHlvhz4Qd2dGWHA5MngfRll3MFZpxx298aPiY3UQQu9U_blCYDeT3kMgAIP-1rUucujUDAMewAnchcAqN1ADhphx7qYcOQXDoPeUQ" />
                <div class="font-headline font-bold text-2xl text-white uppercase tracking-wider">SMA Harapan Jaya</div>
            </div>
            <p class="text-gray-400 mb-8 font-subhead font-light leading-loose text-xs tracking-wide uppercase">
                Membangun jembatan antara tradisi keunggulan dan inovasi masa depan dalam setiap langkah pendidikan.
            </p>
            <div class="flex gap-6">
                <span
                    class="material-symbols-outlined text-gray-400 hover:text-white cursor-pointer transition-colors">public</span>
                <span
                    class="material-symbols-outlined text-gray-400 hover:text-white cursor-pointer transition-colors">share</span>
                <span
                    class="material-symbols-outlined text-gray-400 hover:text-white cursor-pointer transition-colors">alternate_email</span>
            </div>
        </div>
        <div>
            <h4
                class="text-white font-subhead font-bold text-xs uppercase tracking-widest mb-8 border-b border-white/20 pb-4">
                Navigasi Cepat</h4>
            <ul class="space-y-4 font-subhead text-sm">
                <li><a class="text-gray-400 hover:text-white transition-colors" href="{{ route('tentang-kami') }}">Visi
                        &amp; Misi</a></li>
                <li><a class="text-gray-400 hover:text-white transition-colors" href="#">Kurikulum</a></li>
                <li><a class="text-gray-400 hover:text-white transition-colors" href="#">Fasilitas</a></li>
                <li><a class="text-gray-400 hover:text-white transition-colors" href="#">Kontak</a></li>
            </ul>
        </div>
        <div>
            <h4
                class="text-white font-subhead font-bold text-xs uppercase tracking-widest mb-8 border-b border-white/20 pb-4">
                Informasi Kontak</h4>
            <ul class="space-y-5 text-gray-400 font-subhead">
                <li class="flex items-start gap-4">
                    <span class="material-symbols-outlined text-lg">location_on</span>
                    <span class="leading-relaxed">Jl. Daan Mogot KM 13,<br />Cengkareng, Jakarta Barat</span>
                </li>
                <li class="flex items-center gap-4">
                    <span class="material-symbols-outlined text-lg">call</span>
                    +62 (21) 540-1920
                </li>
                <li class="flex items-center gap-4">
                    <span class="material-symbols-outlined text-lg">mail</span>
                    info@harapanjaya.sch.id
                </li>
            </ul>
        </div>
        <div>
            <h4
                class="text-white font-subhead font-bold text-xs uppercase tracking-widest mb-8 border-b border-white/20 pb-4">
                Edisi Buletin</h4>
            <p class="text-gray-400 mb-6 font-subhead text-sm leading-relaxed">Dapatkan pembaruan bulanan eksklusif
                mengenai aktivitas akademik dan pencapaian siswa.</p>
            <div class="relative">
                <input
                    class="w-full bg-white/5 border border-white/10 rounded-none py-3 px-4 text-white placeholder:text-gray-600 focus:ring-1 focus:ring-primary focus:outline-none font-subhead text-sm"
                    placeholder="Alamat Email Anda" type="email" />
                <button
                    class="absolute right-0 top-0 h-full px-4 text-white bg-primary hover:bg-white hover:text-primary transition-colors border-l border-primary">
                    <span class="material-symbols-outlined text-sm font-bold">arrow_forward</span>
                </button>
            </div>
        </div>
    </div>
    <div class="border-t border-white/10 py-6 px-8 text-center bg-[#070f0a]">
        <p class="text-gray-500 font-subhead text-xs uppercase tracking-widest">&copy; {{ date('Y') }} SMA Harapan
            Jaya. Cultivating Excellence.</p>
    </div>
</footer>
