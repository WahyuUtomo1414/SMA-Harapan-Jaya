<!-- Hero Section -->
<section class="relative min-h-[60vh] flex flex-col lg:flex-row items-stretch border-b border-gray-200">
    <div class="w-full lg:w-1/2 flex flex-col justify-center px-12 py-20 lg:py-0 bg-white z-10 relative">
        <div class="absolute top-0 left-0 w-full h-[6px] bg-primary"></div>
        <div class="max-w-xl mx-auto xl:ml-auto xl:mr-12">
            <span
                class="inline-block border border-gray-300 text-gray-500 px-4 py-1.5 text-[10px] font-subhead font-bold tracking-[0.25em] uppercase mb-10">
                Penerimaan Peserta Didik Baru
            </span>
            <h1
                class="text-on-surface text-5xl md:text-7xl font-headline font-normal leading-[1.05] mb-10 tracking-tight">
                Mulai <br /> <span class="italic text-primary">Langkah</span> <br /> Masa Depan.
            </h1>
            <p class="text-gray-600 text-lg font-body leading-relaxed mb-12 font-light max-w-lg">
                {{ $ppdb?->deskripsi ?? 'Wujudkan Mimpi di Sekolah Sang Juara! SMA Harapan Jaya resmi membuka Sistem Penerimaan Murid Baru (SPMB) Tahun Pelajaran 2026-2027. Kami berpegang pada SATRIA: Solidaritas, Aktif, Tekun, Raih Impian, Amanah.' }}
            </p>
            <div class="flex flex-wrap items-center gap-8">
                <a href="{{ route('ppdb.form') }}"
                    class="group relative inline-flex items-center justify-center bg-primary text-white px-10 py-4 font-subhead uppercase tracking-[0.2em] text-xs transition-all hover:bg-[#006b35] hover:shadow-lg">
                    Daftar Sekarang
                </a>
                @if ($ppdb?->brosur)
                    <a href="{{ asset('storage/' . $ppdb->brosur) }}" target="_blank"
                        class="text-primary font-subhead uppercase tracking-widest text-[11px] font-bold hover:text-[#111] transition-colors border-b border-primary/30 hover:border-[#111] pb-1">
                        Unduh Brosur
                    </a>
                @endif
            </div>
        </div>
    </div>
    <div
        class="w-full lg:w-1/2 relative min-h-[50vh] lg:min-h-full bg-[#fffff] flex items-end justify-center overflow-hidden">
        <div class="relative w-full h-full flex items-end justify-center">
            <img alt="PPDB SMA Harapan Jaya"
                class="w-auto h-auto max-h-[90%] max-w-[90%] object-contain transition-transform hover:scale-[1.02] duration-1000 block"
                src="{{ asset('images/ppdb.png') }}" />
        </div>
    </div>
</section>
