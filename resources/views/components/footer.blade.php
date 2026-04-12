<footer class="bg-[#0D4715] text-white w-full mt-32 border-t-[8px] border-primary">
    <div class="grid grid-cols-1 md:grid-cols-4 gap-16 px-8 py-20 max-w-7xl mx-auto font-body text-sm leading-relaxed">
        <div class="md:col-span-2 md:pr-12">
            <div class="flex items-center gap-3 mb-8">
                <img alt="Logo" class="w-12 h-12 object-contain" src="{{ asset('images/logo.png') }}" />
                <div class="font-headline font-bold text-2xl text-white uppercase tracking-wider">SMA Harapan Jaya</div>
            </div>
            <p class="text-gray-200 mb-8 font-subhead font-light leading-loose text-xs tracking-wide uppercase max-w-md">
                Membangun jembatan antara tradisi keunggulan dan inovasi masa depan dalam setiap langkah pendidikan.
                Berkomitmen untuk mencetak generasi yang berintegritas dan siap bersaing secara global.
            </p>
            <div class="flex gap-6">
                <!-- FontAwesome icons a la W3Schools -->
                <a href="#" class="text-gray-200 hover:text-white transition-colors text-xl">
                    <i class="fa fa-facebook-official"></i>
                </a>
                <a href="#" class="text-gray-200 hover:text-white transition-colors text-xl">
                    <i class="fa fa-instagram"></i>
                </a>
                <a href="#" class="text-gray-200 hover:text-white transition-colors text-xl">
                    <i class="fa fa-youtube-play"></i>
                </a>
            </div>
        </div>
        <div class="md:col-span-1">
            <h4
                class="text-white font-subhead font-bold text-xs uppercase tracking-widest mb-8 border-b border-white/20 pb-4">
                Navigasi Cepat</h4>
            <ul class="space-y-4 font-subhead text-sm">
                <li><a class="text-gray-200 hover:text-white transition-colors" href="{{ route('tentang-kami') }}">Visi
                        &amp; Misi</a></li>
                <li><a class="text-gray-200 hover:text-white transition-colors" href="#">Kurikulum</a></li>
                <li><a class="text-gray-200 hover:text-white transition-colors" href="#">Fasilitas</a></li>
                <li><a class="text-gray-200 hover:text-white transition-colors" href="#">Kontak</a></li>
            </ul>
        </div>
        <div class="md:col-span-1">
            <h4
                class="text-white font-subhead font-bold text-xs uppercase tracking-widest mb-8 border-b border-white/20 pb-4">
                Informasi Kontak</h4>
            <ul class="space-y-5 text-gray-200 font-subhead">
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
    </div>
    <div class="border-t border-white/10 py-6 px-8 text-center bg-[#41644A]">
        <p class="text-gray-300 font-subhead text-xs uppercase tracking-widest">&copy; {{ date('Y') }} SMA Harapan
            Jaya.</p>
    </div>
</footer>
