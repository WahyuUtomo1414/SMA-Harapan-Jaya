<!-- Institutional Details Section -->
<section class="py-32 px-8 bg-white">
    <div class="max-w-7xl mx-auto">
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-20 items-center">
            <div class="lg:col-span-7">
                <span
                    class="inline-block border border-gray-300 text-gray-500 px-4 py-1.5 text-[10px] font-subhead font-bold tracking-[0.25em] uppercase mb-10">
                    Legalitas & Akreditasi
                </span>
                <h2
                    class="text-on-surface text-4xl md:text-6xl font-headline font-normal leading-[1.1] mb-10 tracking-tight italic">
                    Standar <span class="not-italic font-bold text-primary">Transparansi</span> & Kualitas.
                </h2>
                <p
                    class="text-gray-600 text-lg font-body leading-relaxed mb-12 font-light border-l border-gray-300 pl-6 max-w-2xl">
                    {{ $sekolah?->nama ?? 'Kami' }} berkomitmen pada standar transparansi dan akreditasi nasional untuk
                    menjamin kualitas pendidikan terbaik bagi setiap generasi.
                </p>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-x-12 gap-y-2">
                    <div class="flex items-center justify-between py-6 border-b border-gray-100">
                        <span class="font-subhead font-bold text-gray-400 uppercase text-[10px] tracking-widest">Tahun
                            Berdiri</span>
                        <span
                            class="font-headline font-bold text-xl text-on-surface">{{ $sekolah?->tahun_berdiri ? \Carbon\Carbon::parse($sekolah->tahun_berdiri)->format('Y') : '1994' }}</span>
                    </div>
                    <div class="flex items-center justify-between py-6 border-b border-gray-100">
                        <span
                            class="font-subhead font-bold text-gray-400 uppercase text-[10px] tracking-widest">Akreditasi</span>
                        <span class="font-headline font-bold text-xl text-primary italic">Peringkat
                            {{ $sekolah?->status_akreditasi ?? 'A' }}</span>
                    </div>
                    <div class="flex items-center justify-between py-6 border-b border-gray-100 md:border-b-0">
                        <span
                            class="font-subhead font-bold text-gray-400 uppercase text-[10px] tracking-widest">NPSN</span>
                        <span
                            class="font-headline font-bold text-xl text-on-surface">{{ $sekolah?->nss_npsn ?? '20104567' }}</span>
                    </div>
                    <div class="flex items-center justify-between py-6">
                        <span
                            class="font-subhead font-bold text-gray-400 uppercase text-[10px] tracking-widest">Status</span>
                        <span
                            class="font-headline font-bold text-lg text-on-surface">{{ $sekolah?->status_sekolah ?? 'SPK' }}</span>
                    </div>
                </div>
            </div>

            <div class="lg:col-span-5">
                <div class="bg-gray-50 p-12 relative border border-gray-100">
                    <div
                        class="absolute -top-6 -right-6 bg-primary w-12 h-12 flex items-center justify-center text-white shadow-xl">
                        <span class="material-symbols-outlined">location_on</span>
                    </div>
                    <h3 class="text-2xl font-headline font-bold text-on-surface mb-6 italic">Lokasi Sekolah</h3>
                    <p class="text-gray-600 font-body leading-relaxed font-light mb-10">
                        {{ $sekolah?->alamat ?? 'Jl. Pendidikan Luhur No. 88, Kawasan Menteng, Jakarta Pusat' }}
                    </p>
                    <div class="aspect-[4/3] overflow-hidden grayscale contrast-125 border border-gray-200">
                        @if ($sekolah?->maps)
                            {!! $sekolah->maps !!}
                        @else
                            <img alt="Map"
                                class="w-full h-full object-cover transition-transform duration-1000 hover:scale-110"
                                src="https://lh3.googleusercontent.com/aida-public/AB6AXuAivmw_rFT5mQnTM91pqbb8llLK4lJYc0kUZU-HciSoRuekNK-jsHnogTZJkLJy1W1E7cUyMbmRKa2nkVI3f_n2ws1HjRKZnpmS92en18WmVNVq23ckQ5IkRrtOyB8TRvuvq1-dCh-9lRfRGN-1EZfEZkJb7QixJgPn1T6heyraIYIv6TYx7YrAnht_BW0ltEUOdCab1FUAk0AXb2_Xx44zhWtANwkth_gBZNKh_iVvGZKZrW50SuQQMtn0JS2hIMzJFO0RlwKNDM8" />
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
