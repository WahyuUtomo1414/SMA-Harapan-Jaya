<!DOCTYPE html>

<html class="light" lang="id">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@400;500;600;700;800&amp;display=swap"
        rel="stylesheet" />
    <link
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap"
        rel="stylesheet" />
    <script id="tailwind-config">
        tailwind.config = {
            darkMode: "class",
            theme: {
                extend: {
                    "colors": {
                        "primary": "#008542",
                        "on-primary": "#ffffff",
                        "primary-container": "#9ef4ae",
                        "on-primary-container": "#00210b",
                        "secondary": "#4f6352",
                        "on-secondary": "#ffffff",
                        "secondary-container": "#d2e8d3",
                        "on-secondary-container": "#0d1f12",
                        "tertiary": "#3a656e",
                        "on-tertiary": "#ffffff",
                        "tertiary-container": "#beeaf5",
                        "on-tertiary-container": "#001f25",
                        "error": "#ba1a1a",
                        "outline": "#727971",
                        "background": "#fbfdf8",
                        "on-background": "#191c19",
                        "surface": "#fbfdf8",
                        "on-surface": "#191c19",
                        "surface-variant": "#dde5db",
                        "on-surface-variant": "#414942",
                        "outline-variant": "#c1c9bf"
                    },
                    "borderRadius": {
                        "DEFAULT": "0.25rem",
                        "lg": "0.5rem",
                        "xl": "1rem",
                        "full": "9999px"
                    },
                    "fontFamily": {
                        "headline": ["Manrope"],
                        "body": ["Manrope"],
                        "label": ["Manrope"]
                    }
                },
            },
        }
    </script>
    <style>
        .material-symbols-outlined {
            font-variation-settings: 'FILL' 0, 'wght' 400, 'GRAD' 0, 'opsz' 24;
        }

        body {
            font-family: 'Manrope', sans-serif;
            background-color: #fbfdf8;
        }

        h1,
        h2,
        h3,
        .headline {
            font-family: 'Manrope', sans-serif;
        }

        .article-card {
            transition: all 0.4s cubic-bezier(0.165, 0.84, 0.44, 1);
        }

        .article-card:hover {
            transform: translateY(-4px);
        }
    </style>
</head>

<body class="bg-surface text-on-surface selection:bg-primary-container selection:text-on-primary-container">
    <nav class="sticky top-0 w-full z-50 bg-white/90 backdrop-blur-md border-b border-outline-variant/30">
        <div class="flex justify-between items-center max-w-7xl mx-auto px-6 h-20">
            <div class="flex items-center gap-4">
                <img alt="Logo" class="h-14 w-14 object-contain"
                    src="https://lh3.googleusercontent.com/aida/ADBb0ujeWkuz4ycn39PIIznn1vISNTvRETPxUCcowf9F1Rwejiqn3nd5N0shHOcFwP94VFhDkoWS2g6SjDSfSRzA_Z587Cq_dUQfkE5GBsp2LNbKKbzb37srre9ntZTA2_HTGYKnwUVDgczaynchEsAq2rfptiWxhFybKec6Uk5RWDHlvhz4Qd2dGWHA5MngfRll3MFZpxx298aPiY3UQQu9U_blCYDeT3kMgAIP-1rUucujUDAMewAnchcAqN1ADhphx7qYcOQXDoPeUQ" />
                <div class="font-headline font-extrabold text-lg text-primary uppercase tracking-tight leading-none">
                    The Scholarly<br />Editorial
                </div>
            </div>
            <div class="hidden md:flex items-center gap-10 font-headline font-semibold tracking-tight text-sm">
                <a class="text-on-surface-variant hover:text-primary transition-colors" href="#">Beranda</a>
                <a class="text-on-surface-variant hover:text-primary transition-colors" href="#">Tentang
                    Sekolah</a>
                <a class="text-primary relative py-1" href="#">
                    Berita
                    <span class="absolute bottom-0 left-0 w-full h-0.5 bg-primary"></span>
                </a>
                <a class="text-on-surface-variant hover:text-primary transition-colors" href="#">PPDB</a>
            </div>
            <button
                class="bg-primary text-on-primary px-7 py-3 rounded-lg font-headline font-bold text-sm hover:brightness-110 transition-all active:scale-95 shadow-sm">
                Daftar Sekarang
            </button>
        </div>
    </nav>
    <header class="relative pt-24 pb-20 overflow-hidden bg-white border-b border-outline-variant/20">
        <div class="max-w-7xl mx-auto px-6 relative z-10">
            <div class="flex flex-col items-start gap-4">
                <span
                    class="bg-primary/10 text-primary px-4 py-1.5 rounded-full text-[11px] font-bold uppercase tracking-[0.2em]">Warta
                    Kampus</span>
                <h1 class="text-5xl md:text-7xl font-black text-on-surface tracking-tighter leading-none mb-4">
                    Berita &amp; <br /> Informasi
                </h1>
                <p class="max-w-xl text-lg text-on-surface-variant/80 leading-relaxed font-medium">
                    Kumpulan narasi, pencapaian, dan pembaruan terkini dari ekosistem pendidikan kami yang dinamis.
                </p>
            </div>
        </div>
        <div class="absolute -right-24 top-0 w-1/3 h-full opacity-[0.03] pointer-events-none">
            <span class="material-symbols-outlined text-[24rem] text-primary select-none">history_edu</span>
        </div>
    </header>
    <section class="max-w-7xl mx-auto px-6 mt-12 mb-16">
        <div class="flex flex-col md:flex-row justify-between items-center gap-8 py-6">
            <div class="flex flex-wrap gap-2 items-center w-full md:w-auto">
                <button
                    class="px-6 py-2.5 bg-primary text-on-primary rounded-lg text-sm font-bold transition-all shadow-md">Semua</button>
                <button
                    class="px-6 py-2.5 bg-white border border-outline-variant/50 text-on-surface-variant hover:bg-primary/5 hover:border-primary/30 rounded-lg text-sm font-semibold transition-all">Akademik</button>
                <button
                    class="px-6 py-2.5 bg-white border border-outline-variant/50 text-on-surface-variant hover:bg-primary/5 hover:border-primary/30 rounded-lg text-sm font-semibold transition-all">Ekstrakurikuler</button>
                <button
                    class="px-6 py-2.5 bg-white border border-outline-variant/50 text-on-surface-variant hover:bg-primary/5 hover:border-primary/30 rounded-lg text-sm font-semibold transition-all">Prestasi</button>
                <button
                    class="px-6 py-2.5 bg-white border border-outline-variant/50 text-on-surface-variant hover:bg-primary/5 hover:border-primary/30 rounded-lg text-sm font-semibold transition-all">Event</button>
            </div>
            <div class="relative w-full md:w-96 group">
                <span
                    class="material-symbols-outlined absolute left-4 top-1/2 -translate-y-1/2 text-outline group-focus-within:text-primary transition-colors">search</span>
                <input
                    class="w-full pl-12 pr-4 py-3.5 bg-white border border-outline-variant/50 rounded-xl focus:ring-4 focus:ring-primary/10 focus:border-primary text-sm placeholder:text-outline/70 transition-all shadow-sm"
                    placeholder="Cari berdasarkan judul atau topik..." type="text" />
            </div>
        </div>
    </section>
    <main class="max-w-7xl mx-auto px-6">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-x-10 gap-y-16">
            <!-- Article 1 -->
            <article class="article-card flex flex-col group cursor-pointer">
                <div class="relative aspect-[16/10] overflow-hidden rounded-xl mb-7 bg-surface-variant/20 shadow-sm">
                    <img class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700"
                        data-alt="Modern university campus library"
                        src="https://lh3.googleusercontent.com/aida-public/AB6AXuDEUtLkyomvdwlQfXbK8KsKiaFgcq1lPy0xKlC9mpMo21wkXfcN_1OqbBgnnQtOndB2HA9z3sQdm_LxyHeN-bB-xGFeDDUz2SIz37jMJ7ZoINjuAlCyHmxoxNWSLUne4FST94CI1Q6KsVYF1lTs9_xLmBhDTE_ge1GlnGMpAlbIU2UPg6olxrdtMN_7mhpvaYTVhmgwdq0kaqK9wgpFgzY3w4-hubfKfgxngNZPLxrUx-VzkPzSvnos16K9MPhty7NJ9UCTHPRECf8" />
                    <div
                        class="absolute top-4 left-4 bg-primary text-white text-[10px] font-bold px-3 py-1 rounded-sm uppercase tracking-widest shadow-lg">
                        Akademik</div>
                </div>
                <div class="flex items-center gap-3 mb-4 text-outline font-bold text-[11px] uppercase tracking-widest">
                    <span>12 Okt 2024</span>
                    <span class="w-1.5 h-1.5 border border-outline-variant rotate-45"></span>
                    <span>Admin</span>
                </div>
                <h3
                    class="text-2xl font-extrabold text-on-surface leading-[1.2] mb-5 group-hover:text-primary transition-colors line-clamp-2">
                    Transformasi Digital: Implementasi Kurikulum Berbasis AI di Semester Ganjil</h3>
                <p class="text-on-surface-variant/80 text-[15px] leading-relaxed line-clamp-3 font-medium mb-7">
                    Menghadapi tantangan masa depan, The Scholarly Editorial resmi mengintegrasikan kecerdasan buatan
                    dalam metode pembelajaran interaktif siswa...
                </p>
                <div
                    class="mt-auto flex items-center gap-2 text-primary font-bold text-xs uppercase tracking-[0.15em] border-b border-primary/20 pb-1 w-fit group-hover:border-primary transition-all">
                    Baca Selengkapnya
                    <span
                        class="material-symbols-outlined text-sm group-hover:translate-x-1 transition-transform">arrow_right_alt</span>
                </div>
            </article>
            <!-- Article 2 -->
            <article class="article-card flex flex-col group cursor-pointer">
                <div class="relative aspect-[16/10] overflow-hidden rounded-xl mb-7 bg-surface-variant/20 shadow-sm">
                    <img class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700"
                        data-alt="Science laboratory"
                        src="https://lh3.googleusercontent.com/aida-public/AB6AXuDFRRU-0OvT81qVv_u5Avq3eb2aTn32YZAzB1ouuiMqqo3FTeXWFv2U06I2sRh-atmSms5_sn0u0TDtpj2yR4tAcaSkPHw4a2KBnnR8FDMbeeJ1AnTcB7aOvhy4bpGetT6NU4OVIO-tXqU3BehntJQSSpVGRmqa1nM1wgtODW8HuFHLcYccryM1Sv3KO8IiYiYyXuPcpFzSeEwMFFm1gQ6V1GEnVTMBrOA0vxQczpDNxFW_ar9apY_vGaVTNYFWpqoSqHFuDFm3iog" />
                    <div
                        class="absolute top-4 left-4 bg-primary text-white text-[10px] font-bold px-3 py-1 rounded-sm uppercase tracking-widest shadow-lg">
                        Prestasi</div>
                </div>
                <div class="flex items-center gap-3 mb-4 text-outline font-bold text-[11px] uppercase tracking-widest">
                    <span>08 Okt 2024</span>
                    <span class="w-1.5 h-1.5 border border-outline-variant rotate-45"></span>
                    <span>Humas</span>
                </div>
                <h3
                    class="text-2xl font-extrabold text-on-surface leading-[1.2] mb-5 group-hover:text-primary transition-colors line-clamp-2">
                    Medali Emas Olimpiade Sains Nasional Berhasil Dibawa Pulang Tim Robotik</h3>
                <p class="text-on-surface-variant/80 text-[15px] leading-relaxed line-clamp-3 font-medium mb-7">
                    Melalui inovasi alat penyaring mikroplastik otomatis, tim robotik sekolah berhasil mengungguli 50
                    peserta lainnya di tingkat nasional...
                </p>
                <div
                    class="mt-auto flex items-center gap-2 text-primary font-bold text-xs uppercase tracking-[0.15em] border-b border-primary/20 pb-1 w-fit group-hover:border-primary transition-all">
                    Baca Selengkapnya
                    <span
                        class="material-symbols-outlined text-sm group-hover:translate-x-1 transition-transform">arrow_right_alt</span>
                </div>
            </article>
            <!-- Article 3 -->
            <article
                class="article-card flex flex-col group cursor-pointer bg-primary/[0.02] border border-primary/5 p-6 rounded-xl">
                <div class="relative aspect-[16/10] overflow-hidden rounded-lg mb-7 bg-surface-variant/20 shadow-sm">
                    <img class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700"
                        data-alt="Special edition book"
                        src="https://lh3.googleusercontent.com/aida-public/AB6AXuBY5YtEQl0Xkhk-K7-GR0dHEp1YXD9RogWnrQxJP8jX6EwsIPaUtC5bYMQv4mQHD_CNzYa8bg3O8WluwTXoqY_Wy1kHv_hGBHWp3CTC3H3hNtWAmxq2ePBhyyOJo5RUHUd1I5NYYlQLzWLSOkY1KvI16gUXUQxvo409dCGxJpGrPW6LuWXIlIINhulfNx0Ej-w7HWyVl23vEWz_L8ibRXoCdJVTwuJHwqkppI5RGJk3qlgkTfFEAlJDwbuxfU8qFccPG1h0J1zULMs" />
                    <div
                        class="absolute top-4 left-4 bg-on-background text-white text-[10px] font-bold px-3 py-1 rounded-sm uppercase tracking-widest shadow-lg">
                        Edisi Khusus</div>
                </div>
                <div class="flex items-center gap-3 mb-4 text-outline font-bold text-[11px] uppercase tracking-widest">
                    <span>05 Okt 2024</span>
                    <span class="w-1.5 h-1.5 border border-outline-variant rotate-45"></span>
                    <span>Editorial</span>
                </div>
                <h3
                    class="text-2xl font-extrabold text-on-surface leading-[1.2] mb-5 group-hover:text-primary transition-colors line-clamp-2">
                    Manifesto Pendidikan Abad 21: Esensi Living Archive Dalam Pembelajaran</h3>
                <p class="text-on-surface-variant/80 text-[15px] leading-relaxed line-clamp-3 font-medium mb-7">
                    Menjelajahi bagaimana sejarah dan inovasi berpadu dalam menciptakan kurikulum yang tidak hanya
                    mendidik intelektual namun juga karakter luhur.
                </p>
                <div class="mt-auto flex items-center justify-between">
                    <div
                        class="flex items-center gap-2 text-primary font-bold text-xs uppercase tracking-[0.15em] border-b border-primary/20 pb-1 w-fit group-hover:border-primary transition-all">
                        Baca Selengkapnya
                        <span
                            class="material-symbols-outlined text-sm group-hover:translate-x-1 transition-transform">arrow_right_alt</span>
                    </div>
                    <span class="text-outline text-[10px] font-bold uppercase tracking-widest">12 Min Read</span>
                </div>
            </article>
            <!-- Article 4 -->
            <article class="article-card flex flex-col group cursor-pointer">
                <div class="relative aspect-[16/10] overflow-hidden rounded-xl mb-7 bg-surface-variant/20 shadow-sm">
                    <img class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700"
                        data-alt="School auditorium"
                        src="https://lh3.googleusercontent.com/aida-public/AB6AXuCQJl2TMfZLjJyNOobaN_TD1h3mBZTGLdZuc6ZeagifbtkQrNjj_BHjsXVlwJbaiQSH_g18US98Dg_xGzXJtQW5-jSaLg3Wn64phniD5CHNFdhWwsr0bvaNdO8qcOlNXMV3fkZVgI5jhcXHnI8nacbXNrlgf9JGuMyg2iOIjwUlXopsUdt7aEPdFY9T9gcEOSSGpCTuIyTkmBgP7ShXg9fp7Ebi-0FM3hp1ZLXyrB6xwW4UMStC8EG5IFRcThYA5jX3Zym95pATGgA" />
                    <div
                        class="absolute top-4 left-4 bg-primary text-white text-[10px] font-bold px-3 py-1 rounded-sm uppercase tracking-widest shadow-lg">
                        Event</div>
                </div>
                <div class="flex items-center gap-3 mb-4 text-outline font-bold text-[11px] uppercase tracking-widest">
                    <span>01 Okt 2024</span>
                    <span class="w-1.5 h-1.5 border border-outline-variant rotate-45"></span>
                    <span>Kesiswaan</span>
                </div>
                <h3
                    class="text-2xl font-extrabold text-on-surface leading-[1.2] mb-5 group-hover:text-primary transition-colors line-clamp-2">
                    Open House &amp; Bazaar Tahunan: Membuka Pintu Masa Depan Bagi Calon Siswa</h3>
                <p class="text-on-surface-variant/80 text-[15px] leading-relaxed line-clamp-3 font-medium mb-7">
                    Rangkaian acara yang memamerkan karya terbaik siswa serta talkshow inspiratif bersama para alumni
                    sukses yang berkiprah di mancanegara...
                </p>
                <div
                    class="mt-auto flex items-center gap-2 text-primary font-bold text-xs uppercase tracking-[0.15em] border-b border-primary/20 pb-1 w-fit group-hover:border-primary transition-all">
                    Baca Selengkapnya
                    <span
                        class="material-symbols-outlined text-sm group-hover:translate-x-1 transition-transform">arrow_right_alt</span>
                </div>
            </article>
            <!-- Article 5 -->
            <article class="article-card flex flex-col group cursor-pointer">
                <div class="relative aspect-[16/10] overflow-hidden rounded-xl mb-7 bg-surface-variant/20 shadow-sm">
                    <img class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700"
                        data-alt="Students laughing"
                        src="https://lh3.googleusercontent.com/aida-public/AB6AXuA4HWYe4ysFhe_6Xu-e6o3CZWC-K__cKjH0HzWG0HSPmLsyrPblDi1C1YGzcIq2-DrwUborQ3uOX9QiBzNF6S80tjZellI-25-iAkK1ubCqOjcdZ8vQjKjLHW9QEC9hh9zvY-CrsucNEgLurgNqyHTrWyUtcpVS0hNfEXwkfA7GLcqOaNVaIYB_C0ZkiuSo9-bRQhNzcZ5DXtUtWT7i0ijPUQZ0ttNmhGvMJ4LWe6_taiVbFSftjQ02qKJUvf3D9KE0qyDlYOCrFuE" />
                    <div
                        class="absolute top-4 left-4 bg-primary text-white text-[10px] font-bold px-3 py-1 rounded-sm uppercase tracking-widest shadow-lg">
                        Ekstrakurikuler</div>
                </div>
                <div class="flex items-center gap-3 mb-4 text-outline font-bold text-[11px] uppercase tracking-widest">
                    <span>28 Sep 2024</span>
                    <span class="w-1.5 h-1.5 border border-outline-variant rotate-45"></span>
                    <span>OSIS</span>
                </div>
                <h3
                    class="text-2xl font-extrabold text-on-surface leading-[1.2] mb-5 group-hover:text-primary transition-colors line-clamp-2">
                    Latihan Gabungan Kepemimpinan: Membentuk Karakter Tangguh Menuju Pemimpin Masa Depan</h3>
                <p class="text-on-surface-variant/80 text-[15px] leading-relaxed line-clamp-3 font-medium mb-7">
                    Program intensif tiga hari di kaki gunung yang melatih ketangkasan fisik, mental, serta kemampuan
                    pengambilan keputusan strategis siswa...
                </p>
                <div
                    class="mt-auto flex items-center gap-2 text-primary font-bold text-xs uppercase tracking-[0.15em] border-b border-primary/20 pb-1 w-fit group-hover:border-primary transition-all">
                    Baca Selengkapnya
                    <span
                        class="material-symbols-outlined text-sm group-hover:translate-x-1 transition-transform">arrow_right_alt</span>
                </div>
            </article>
        </div>
        <div class="mt-32 mb-20 flex flex-col items-center gap-10">
            <div class="flex items-center gap-3">
                <button
                    class="w-11 h-11 rounded-lg border border-outline-variant/50 flex items-center justify-center text-on-surface-variant hover:bg-primary/5 hover:border-primary transition-all">
                    <span class="material-symbols-outlined text-xl">chevron_left</span>
                </button>
                <div class="flex items-center gap-2 font-headline">
                    <button
                        class="w-11 h-11 rounded-lg bg-primary text-on-primary font-bold shadow-md shadow-primary/20">1</button>
                    <button
                        class="w-11 h-11 rounded-lg hover:bg-primary/5 font-bold text-on-surface-variant transition-all">2</button>
                    <button
                        class="w-11 h-11 rounded-lg hover:bg-primary/5 font-bold text-on-surface-variant transition-all">3</button>
                    <span class="px-2 font-bold text-outline-variant">...</span>
                    <button
                        class="w-11 h-11 rounded-lg hover:bg-primary/5 font-bold text-on-surface-variant transition-all">12</button>
                </div>
                <button
                    class="w-11 h-11 rounded-lg border border-outline-variant/50 flex items-center justify-center text-on-surface-variant hover:bg-primary/5 hover:border-primary transition-all">
                    <span class="material-symbols-outlined text-xl">chevron_right</span>
                </button>
            </div>
            <button
                class="px-12 py-4.5 bg-white border border-primary/20 rounded-xl font-bold text-primary hover:bg-primary/5 transition-all flex items-center gap-3 group">
                <span
                    class="material-symbols-outlined text-xl group-hover:rotate-180 transition-transform duration-500">expand_more</span>
                Muat Lebih Banyak Berita
            </button>
        </div>
    </main>
    <footer class="w-full bg-[#101412] text-white py-20">
        <div class="max-w-7xl mx-auto px-6">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-16 mb-20">
                <div class="flex flex-col gap-8">
                    <div class="flex items-center gap-4">
                        <img alt="Logo" class="h-12 w-12 object-contain"
                            src="https://lh3.googleusercontent.com/aida/ADBb0ujeWkuz4ycn39PIIznn1vISNTvRETPxUCcowf9F1Rwejiqn3nd5N0shHOcFwP94VFhDkoWS2g6SjDSfSRzA_Z587Cq_dUQfkE5GBsp2LNbKKbzb37srre9ntZTA2_HTGYKnwUVDgczaynchEsAq2rfptiWxhFybKec6Uk5RWDHlvhz4Qd2dGWHA5MngfRll3MFZpxx298aPiY3UQQu9U_blCYDeT3kMgAIP-1rUucujUDAMewAnchcAqN1ADhphx7qYcOQXDoPeUQ" />
                        <div
                            class="font-headline font-black text-xl text-primary-container uppercase tracking-tight leading-none">
                            The Scholarly<br />Editorial
                        </div>
                    </div>
                    <p class="text-white/50 font-medium text-sm leading-relaxed max-w-xs">
                        Membentuk pemimpin masa depan dengan fondasi akademik yang kokoh dan karakter yang luhur dalam
                        lingkungan belajar yang inklusif.
                    </p>
                    <div class="flex gap-3">
                        <a class="w-11 h-11 rounded-lg bg-white/5 flex items-center justify-center text-primary-container hover:bg-primary/20 transition-all border border-white/5"
                            href="#">
                            <span class="material-symbols-outlined text-lg">public</span>
                        </a>
                        <a class="w-11 h-11 rounded-lg bg-white/5 flex items-center justify-center text-primary-container hover:bg-primary/20 transition-all border border-white/5"
                            href="#">
                            <span class="material-symbols-outlined text-lg">mail</span>
                        </a>
                        <a class="w-11 h-11 rounded-lg bg-white/5 flex items-center justify-center text-primary-container hover:bg-primary/20 transition-all border border-white/5"
                            href="#">
                            <span class="material-symbols-outlined text-lg">phone</span>
                        </a>
                    </div>
                </div>
                <div class="flex flex-col gap-8">
                    <h4 class="font-headline font-bold text-primary-container uppercase tracking-[0.2em] text-[11px]">
                        Institusi</h4>
                    <div class="flex flex-col gap-5">
                        <a class="text-white/60 text-sm hover:text-white transition-colors" href="#">Visi &amp;
                            Misi</a>
                        <a class="text-white/60 text-sm hover:text-white transition-colors"
                            href="#">Kurikulum</a>
                        <a class="text-white/60 text-sm hover:text-white transition-colors" href="#">Tenaga
                            Pendidik</a>
                        <a class="text-white/60 text-sm hover:text-white transition-colors"
                            href="#">Fasilitas</a>
                    </div>
                </div>
                <div class="flex flex-col gap-8">
                    <h4 class="font-headline font-bold text-primary-container uppercase tracking-[0.2em] text-[11px]">
                        Navigasi Cepat</h4>
                    <div class="flex flex-col gap-5">
                        <a class="text-white/60 text-sm hover:text-white transition-colors" href="#">Beranda</a>
                        <a class="text-white/60 text-sm hover:text-white transition-colors"
                            href="#">Pendaftaran</a>
                        <a class="text-primary-container font-bold text-sm" href="#">Berita &amp; Informasi</a>
                        <a class="text-white/60 text-sm hover:text-white transition-colors" href="#">Kontak</a>
                    </div>
                </div>
                <div class="flex flex-col gap-8">
                    <h4 class="font-headline font-bold text-primary-container uppercase tracking-[0.2em] text-[11px]">
                        Buletin Mingguan</h4>
                    <p class="text-white/60 text-sm leading-relaxed">Dapatkan update akademik dan prestasi terkini
                        langsung di inbox Anda.</p>
                    <div class="flex gap-2">
                        <input
                            class="bg-white/5 border-white/10 rounded-lg px-4 py-3 text-white text-sm focus:ring-2 focus:ring-primary/40 focus:bg-white/10 w-full outline-none transition-all"
                            placeholder="Alamat email Anda" type="email" />
                        <button
                            class="bg-primary text-white w-12 h-12 rounded-lg flex items-center justify-center flex-shrink-0 hover:brightness-110 transition-all shadow-lg shadow-primary/10">
                            <span class="material-symbols-outlined">send</span>
                        </button>
                    </div>
                </div>
            </div>
            <div class="pt-10 border-t border-white/5 flex flex-col md:flex-row justify-between items-center gap-6">
                <p class="text-white/30 text-xs font-medium tracking-wide">
                    © 2024 SMA Harapan Jaya. Cultivating Excellence through the Living Archive.
                </p>
                <div class="flex gap-10 text-white/30 text-xs font-bold uppercase tracking-widest">
                    <a class="hover:text-white transition-colors" href="#">Kebijakan Privasi</a>
                    <a class="hover:text-white transition-colors" href="#">Syarat &amp; Ketentuan</a>
                </div>
            </div>
        </div>
    </footer>
</body>

</html>
