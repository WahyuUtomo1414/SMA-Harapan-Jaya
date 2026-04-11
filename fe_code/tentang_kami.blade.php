<!DOCTYPE html>

<html class="light" lang="id">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@400;500;600;700;800&amp;display=swap"
        rel="stylesheet" />
    <link
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap"
        rel="stylesheet" />
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <script id="tailwind-config">
        tailwind.config = {
            darkMode: "class",
            theme: {
                extend: {
                    "colors": {
                        "outline": "#707974",
                        "on-tertiary-container": "#ff9939",
                        "surface-dim": "#dedacb",
                        "on-tertiary-fixed-variant": "#6e3900",
                        "on-secondary-fixed-variant": "#294e3f",
                        "primary-container": "#e6f3ec",
                        "surface-bright": "#fdf9e9",
                        "inverse-primary": "#95d3ba",
                        "secondary-fixed-dim": "#a8cfbc",
                        "outline-variant": "#bfc9c3",
                        "error": "#ba1a1a",
                        "surface": "#fdf9e9",
                        "inverse-on-surface": "#f5f1e1",
                        "surface-container-low": "#f8f4e4",
                        "on-primary": "#ffffff",
                        "on-secondary-fixed": "#002115",
                        "secondary": "#416656",
                        "on-tertiary-fixed": "#2f1500",
                        "tertiary-fixed-dim": "#ffb77d",
                        "on-surface-variant": "#404944",
                        "surface-variant": "#e6e3d3",
                        "primary-fixed-dim": "#95d3ba",
                        "on-error": "#ffffff",
                        "on-primary-container": "#002111",
                        "on-background": "#1c1c13",
                        "surface-container-high": "#ece8d9",
                        "error-container": "#ffdad6",
                        "primary": "#008542",
                        "on-tertiary": "#ffffff",
                        "tertiary-container": "#6a3700",
                        "secondary-container": "#c3ecd7",
                        "surface-container-highest": "#e6e3d3",
                        "surface-container-lowest": "#ffffff",
                        "on-secondary-container": "#476c5b",
                        "on-error-container": "#93000a",
                        "on-secondary": "#ffffff",
                        "inverse-surface": "#323126",
                        "tertiary": "#4a2400",
                        "primary-fixed": "#b0f0d6",
                        "tertiary-fixed": "#ffdcc3",
                        "on-primary-fixed-variant": "#005228",
                        "background": "#fdf9e9",
                        "surface-container": "#f2eede",
                        "surface-tint": "#008542",
                        "on-surface": "#1c1c13",
                        "secondary-fixed": "#c3ecd7",
                        "on-primary-fixed": "#002111"
                    },
                    "borderRadius": {
                        "DEFAULT": "0.25rem",
                        "lg": "0.5rem",
                        "xl": "0.75rem",
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

        .hero-gradient {
            background: linear-gradient(180deg, rgba(0, 53, 39, 0.4) 0%, rgba(0, 53, 39, 0.8) 100%);
        }

        .org-tree-line {
            position: relative;
        }

        .org-tree-line::after {
            content: '';
            position: absolute;
            background-color: #bfc9c3;
        }

        .org-v-line::after {
            width: 1px;
            height: 40px;
            left: 50%;
            bottom: -40px;
            transform: translateX(-50%);
        }

        .org-h-line::after {
            height: 1px;
            width: 100%;
            top: 0;
            left: 0;
        }

        .org-node-line::before {
            content: '';
            position: absolute;
            width: 1px;
            height: 20px;
            background-color: #bfc9c3;
            left: 50%;
            top: -20px;
            transform: translateX(-50%);
        }
    </style>
</head>

<body class="bg-surface font-body text-on-surface antialiased">
    <!-- TopNavBar -->
    <nav class="sticky top-0 w-full z-50 bg-surface/80 backdrop-blur-xl border-b border-outline-variant/30">
        <div class="flex justify-between items-center max-w-7xl mx-auto px-8 h-20">
            <div class="flex items-center gap-4">
                <img alt="Logo" class="h-14 w-auto"
                    src="https://lh3.googleusercontent.com/aida/ADBb0ujeWkuz4ycn39PIIznn1vISNTvRETPxUCcowf9F1Rwejiqn3nd5N0shHOcFwP94VFhDkoWS2g6SjDSfSRzA_Z587Cq_dUQfkE5GBsp2LNbKKbzb37srre9ntZTA2_HTGYKnwUVDgczaynchEsAq2rfptiWxhFybKec6Uk5RWDHlvhz4Qd2dGWHA5MngfRll3MFZpxx298aPiY3UQQu9U_blCYDeT3kMgAIP-1rUucujUDAMewAnchcAqN1ADhphx7qYcOQXDoPeUQ" />
                <div class="font-headline font-extrabold text-lg text-primary uppercase tracking-tighter leading-tight">
                    SMA HARAPAN JAYA<br /><span class="text-[10px] tracking-widest font-bold opacity-60">JAKARTA
                        BARAT</span>
                </div>
            </div>
            <div class="hidden md:flex items-center space-x-10 font-headline font-bold tracking-tight text-sm">
                <a class="text-secondary hover:text-primary transition-all" href="#">Beranda</a>
                <a class="text-primary border-b-2 border-primary pb-1" href="#">Tentang Sekolah</a>
                <a class="text-secondary hover:text-primary transition-all" href="#">Berita</a>
                <a class="text-secondary hover:text-primary transition-all" href="#">PPDB</a>
                <button
                    class="bg-primary text-on-primary px-7 py-3 rounded-lg hover:shadow-lg transition-all active:scale-95 font-bold">
                    Daftar Sekarang
                </button>
            </div>
        </div>
    </nav>
    <main>
        <!-- Hero Section -->
        <header class="relative h-[640px] w-full overflow-hidden">
            <img alt="Main campus building" class="absolute inset-0 w-full h-full object-cover"
                src="https://lh3.googleusercontent.com/aida-public/AB6AXuB-XEPjIMxu1NoW7xczh3G-wH5EO78t7LID-2JLHEoYR0_PMsAmkH0EpqMXwF3_jTnkt_p7oOs_EetVrWqG7d958_qNz0VLFzEYLiMLLKps1nQ_RQnN3kzkR_u7mMrqpU6UBe_4j7aGj1scNNdJ7qi-ZmRUrwBHJSKFtY2rwwJ5ZQ_4xSmptSGHhhhdX1TVXqYWYTyJcF8fP6wvFuGjz2rkzW_lqFVyq5BsUEFzMdzgtSRXTg5EiWgbBnfeH7yZv9HNDn0cSOjoanc" />
            <div class="absolute inset-0 hero-gradient flex flex-col justify-end pb-24 px-8 md:px-24">
                <div class="max-w-7xl mx-auto w-full">
                    <span
                        class="text-primary-fixed font-headline font-bold tracking-[0.3em] text-[10px] uppercase mb-6 block opacity-80">PROFIL
                        LEMBAGA</span>
                    <h1
                        class="font-headline font-extrabold text-5xl md:text-7xl text-on-primary tracking-tighter leading-none max-w-4xl">
                        Membangun Masa Depan Melalui Karakter &amp; Integritas
                    </h1>
                </div>
            </div>
        </header>
        <!-- Visi & Misi Section -->
        <section class="py-32 px-8 md:px-24 bg-surface max-w-7xl mx-auto">
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-20 items-start">
                <div class="lg:col-span-12 text-center mb-24">
                    <span class="text-primary font-bold text-xs tracking-widest uppercase mb-8 block">Visi Utama
                        Kami</span>
                    <h2
                        class="font-headline font-extrabold text-4xl md:text-5xl text-primary max-w-5xl mx-auto leading-tight italic">
                        "Menjadi institusi pendidikan yang membina integritas intelektual dan kemuliaan karakter di era
                        global."
                    </h2>
                    <div class="h-1 w-24 bg-primary/20 mx-auto mt-12 rounded-full"></div>
                </div>
                <div class="lg:col-span-5 space-y-10">
                    <h3 class="font-headline font-extrabold text-3xl text-on-surface border-l-4 border-primary pl-6">
                        Misi Kami</h3>
                    <div class="grid gap-8">
                        <div
                            class="flex gap-6 p-8 rounded-xl bg-white border border-outline-variant/30 shadow-sm hover:shadow-md transition-shadow">
                            <span class="material-symbols-outlined text-primary text-4xl"
                                data-icon="school">school</span>
                            <div>
                                <h4 class="font-headline font-extrabold text-on-surface">Ekselensi Akademik</h4>
                                <p class="text-on-surface-variant text-sm mt-2 leading-relaxed">Kurikulum adaptif yang
                                    menantang pemikiran kritis siswa dengan standar internasional.</p>
                            </div>
                        </div>
                        <div
                            class="flex gap-6 p-8 rounded-xl bg-white border border-outline-variant/30 shadow-sm hover:shadow-md transition-shadow">
                            <span class="material-symbols-outlined text-primary text-4xl"
                                data-icon="diversity_3">diversity_3</span>
                            <div>
                                <h4 class="font-headline font-extrabold text-on-surface">Pengembangan Karakter</h4>
                                <p class="text-on-surface-variant text-sm mt-2 leading-relaxed">Membentuk pribadi
                                    beretika, bertanggung jawab, dan memiliki empati sosial yang tinggi.</p>
                            </div>
                        </div>
                        <div
                            class="flex gap-6 p-8 rounded-xl bg-white border border-outline-variant/30 shadow-sm hover:shadow-md transition-shadow">
                            <span class="material-symbols-outlined text-primary text-4xl"
                                data-icon="language">language</span>
                            <div>
                                <h4 class="font-headline font-extrabold text-on-surface">Wawasan Global</h4>
                                <p class="text-on-surface-variant text-sm mt-2 leading-relaxed">Mempersiapkan siswa
                                    untuk berkompetisi dan berkolaborasi dalam kancah dunia modern.</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="lg:col-span-7 space-y-10">
                    <div class="prose prose-lg text-on-surface-variant leading-relaxed font-medium">
                        <p class="mb-8">
                            <span
                                class="text-6xl font-headline font-extrabold text-primary float-left mr-4 mt-1 leading-none">S</span>
                            MA Harapan Jaya bukan sekadar tempat menuntut ilmu; ia adalah ekosistem tempat ide-ide
                            tumbuh dan karakter ditempa secara mendalam. Berdiri dengan filosofi bahwa pendidikan adalah
                            perjalanan penemuan diri yang tak berujung, kami mengintegrasikan tradisi intelektual yang
                            kuat dengan inovasi pedagogi modern yang relevan.
                        </p>
                        <p class="mb-10">
                            Setiap sudut sekolah kami dirancang untuk menginspirasi keingintahuan. Dari perpustakaan
                            yang menyimpan khazanah literatur klasik hingga laboratorium digital mutakhir, kami
                            memastikan bahwa setiap siswa memiliki alat yang mereka butuhkan untuk mengeksplorasi
                            potensi penuh mereka.
                        </p>
                    </div>
                    <div class="relative overflow-hidden rounded-2xl shadow-2xl">
                        <img alt="Students in discussion"
                            class="w-full h-[400px] object-cover grayscale hover:grayscale-0 transition-all duration-1000"
                            src="https://lh3.googleusercontent.com/aida-public/AB6AXuClSMWEdge7maIFlfsky4h21xgtc8DekIEmuEG0efFeFrK3RZAzK2gFKBqiV7PTDuVOBingAZo59A5T3GzG6ylr-XTGeFxE3r8sT2sDKe49hhYfSqTIPmYogIZwEN2xuQcPEMaUkaZa1hpuIi6Tpkuy8vMdwKNL8NO84Xx3YPZYZE7eXZbGnXBPkfZeNrz_EZ51Kb-22sJWAw6LkUKqIEI9aywtLp5XrF8pbcJ-iudRNJqZ73Z5ehG56PqPiqo1737mUFjuZ_63W0s" />
                        <div class="absolute bottom-0 left-0 right-0 bg-gradient-to-t from-black/60 to-transparent p-8">
                            <p class="text-white text-sm italic font-medium">Suasana kolaboratif di Student Center Utama
                                kami.</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Struktur Organisasi Section -->
        <section class="py-32 bg-surface-container-lowest border-y border-outline-variant/20 overflow-x-auto">
            <div class="max-w-7xl mx-auto px-8 md:px-24 min-w-[1000px]">
                <div class="text-center mb-24">
                    <span class="text-primary font-bold text-[10px] uppercase tracking-[0.4em] mb-4 block">HIERARKI
                        KEPEMIMPINAN</span>
                    <h2 class="font-headline font-extrabold text-4xl text-primary tracking-tight">Struktur Organisasi
                    </h2>
                    <div class="h-1.5 w-16 bg-primary mx-auto mt-6 rounded-full"></div>
                </div>
                <div class="flex flex-col items-center">
                    <!-- Headmaster -->
                    <div class="org-tree-line org-v-line mb-10">
                        <div
                            class="group bg-white border border-primary/20 p-8 rounded-xl shadow-xl w-72 text-center hover:border-primary hover:bg-primary transition-all duration-500">
                            <div
                                class="w-24 h-24 mx-auto rounded-full overflow-hidden mb-6 border-4 border-primary/10 group-hover:border-white/20">
                                <img alt="Headmaster"
                                    class="w-full h-full object-cover grayscale group-hover:grayscale-0 transition-all"
                                    src="https://lh3.googleusercontent.com/aida-public/AB6AXuBFKQLDVBuW740Enz-HIYR0SUktS2j2zOtLlSJA-uDBIDcNudIRQHEj_aX823Y-Ah58OhJq6kySjtxDaa8h_vXaEyWM8ExnpNb0Lw8irFlljimjWrPDxnMcjwPvRhgLNhH9Ss28a53gjyje0y2Gpjaku5ww019eDXKLyeb8VOP1yHZonXtFZ9ciQQoxx1sthZdULpGTYP4JAcA87enFxMsJRlJ9RaEoCRLlftu59cAbY-cw_-xRvsTOwZ6w4WeIrqxJMTrlvD-k0iw" />
                            </div>
                            <h4
                                class="font-headline font-extrabold text-primary group-hover:text-white transition-colors text-lg">
                                Dr. Alexander Sterling</h4>
                            <p
                                class="text-on-surface-variant text-[10px] font-extrabold tracking-[0.2em] uppercase group-hover:text-white/70 transition-colors mt-1">
                                Kepala Sekolah</p>
                        </div>
                    </div>
                    <!-- Connectors -->
                    <div class="w-[60%] org-tree-line org-h-line mb-10"></div>
                    <!-- Vices -->
                    <div class="grid grid-cols-2 gap-40 mb-16 relative w-full justify-items-center">
                        <div class="org-node-line org-v-line relative">
                            <div
                                class="group bg-white border border-outline-variant/30 p-6 rounded-xl shadow-md w-64 text-center hover:border-primary transition-all">
                                <div
                                    class="w-20 h-20 mx-auto rounded-full overflow-hidden mb-4 border-2 border-primary/5">
                                    <img alt="Vice Headmaster"
                                        class="w-full h-full object-cover grayscale group-hover:grayscale-0 transition-all"
                                        src="https://lh3.googleusercontent.com/aida-public/AB6AXuCK3O1Qqyim1a4lf0KdwKbmvXl9emBKmJ61s_JxmILO-qzHnx0mzjMOdaSU0ueZXeTY4b1yYV1KGJstHsZC64PpfN_bg4MfC45JsfLiLxct5Ac2jAU4FKXdPwgyBe7bULDMM33Zt1K0hMge_EmTcUxmK9GJr025Qtgn0WPaGbv9EUnu50zb2lMUdVClhU5YMwwCzmDlJNDxGyja4BGsGALWr2jak_2d93_29G2cfQMQAYnsvxz8o7rJ1fzK6Z4-fx4aC_bqOX5oD2o" />
                                </div>
                                <h4 class="font-headline font-extrabold text-on-surface text-base">Prof. Helena Vancroft
                                </h4>
                                <p class="text-primary text-[9px] font-bold tracking-widest uppercase mt-1">Waka
                                    Kurikulum</p>
                            </div>
                        </div>
                        <div class="org-node-line org-v-line relative">
                            <div
                                class="group bg-white border border-outline-variant/30 p-6 rounded-xl shadow-md w-64 text-center hover:border-primary transition-all">
                                <div
                                    class="w-20 h-20 mx-auto rounded-full overflow-hidden mb-4 border-2 border-primary/5">
                                    <img alt="Vice Headmaster"
                                        class="w-full h-full object-cover grayscale group-hover:grayscale-0 transition-all"
                                        src="https://lh3.googleusercontent.com/aida-public/AB6AXuBk7fYO9olpbP6eH4UxuN7EWVp98eqvVHaEY5ewSQvvbw5Rvf40LuijJ20DVJ7EQTTAgo-UpBH5B9vKT0ssfxpVWo01ptwvmsGfkwjZEIfQcfH5DAobewTLNzK58Uljey-dmTaCJYUhnH2A2an_UYnPsL6y8rdtNBLmaM06e7JUq1TnCUr1wKDLyhJ6u3uSna_OkLUsCNSjsrVSLfAAQvE9HGfAwsqwRLKcSezqtJTo8jQ11F7iVMrJ-079Pcs4K8ITDrA1tEDKU5A" />
                                </div>
                                <h4 class="font-headline font-extrabold text-on-surface text-base">Julian Thorne, M.Ed.
                                </h4>
                                <p class="text-primary text-[9px] font-bold tracking-widest uppercase mt-1">Waka
                                    Kesiswaan</p>
                            </div>
                        </div>
                    </div>
                    <!-- Dept Heads -->
                    <div class="w-4/5 org-tree-line org-h-line mb-6"></div>
                    <div class="grid grid-cols-4 gap-8 w-full justify-items-center">
                        <div class="org-node-line relative pt-6">
                            <div
                                class="bg-surface-container-low p-5 rounded-lg border border-outline-variant/40 w-48 text-center hover:shadow-lg transition-all">
                                <h5 class="font-headline font-bold text-on-surface text-xs">Dr. Sarah Chen</h5>
                                <p class="text-primary text-[8px] font-bold uppercase tracking-[0.2em] mt-2">Kepala
                                    Dept. Sains</p>
                            </div>
                        </div>
                        <div class="org-node-line relative pt-6">
                            <div
                                class="bg-surface-container-low p-5 rounded-lg border border-outline-variant/40 w-48 text-center hover:shadow-lg transition-all">
                                <h5 class="font-headline font-bold text-on-surface text-xs">Marcus Aurelius, M.A.</h5>
                                <p class="text-primary text-[8px] font-bold uppercase tracking-[0.2em] mt-2">Kepala
                                    Dept. Bahasa</p>
                            </div>
                        </div>
                        <div class="org-node-line relative pt-6">
                            <div
                                class="bg-surface-container-low p-5 rounded-lg border border-outline-variant/40 w-48 text-center hover:shadow-lg transition-all">
                                <h5 class="font-headline font-bold text-on-surface text-xs">Isabella Rossini</h5>
                                <p class="text-primary text-[8px] font-bold uppercase tracking-[0.2em] mt-2">Kepala
                                    Dept. Seni</p>
                            </div>
                        </div>
                        <div class="org-node-line relative pt-6">
                            <div
                                class="bg-surface-container-low p-5 rounded-lg border border-outline-variant/40 w-48 text-center hover:shadow-lg transition-all">
                                <h5 class="font-headline font-bold text-on-surface text-xs">Dr. Thomas Wright</h5>
                                <p class="text-primary text-[8px] font-bold uppercase tracking-[0.2em] mt-2">Kepala
                                    Dept. Olahraga</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Institutional Details Section -->
        <section class="py-32 px-8 md:px-24">
            <div
                class="max-w-7xl mx-auto bg-primary rounded-3xl p-12 md:p-24 text-on-primary relative overflow-hidden shadow-2xl">
                <div
                    class="absolute top-0 right-0 w-96 h-96 bg-white/5 rounded-full -translate-y-1/2 translate-x-1/2 blur-[100px]">
                </div>
                <div
                    class="absolute bottom-0 left-0 w-64 h-64 bg-black/10 rounded-full translate-y-1/2 -translate-x-1/2 blur-[80px]">
                </div>
                <div class="relative z-10 grid grid-cols-1 lg:grid-cols-2 gap-20 items-center">
                    <div>
                        <h2 class="font-headline font-extrabold text-4xl md:text-5xl mb-10 leading-tight">Informasi
                            Legal &amp; Institusional</h2>
                        <p class="text-primary-fixed text-lg opacity-80 mb-14 font-medium">Kami berkomitmen pada
                            standar transparansi dan akreditasi internasional untuk menjamin kualitas pendidikan terbaik
                            bagi setiap generasi.</p>
                        <div class="space-y-2">
                            <div class="flex items-center justify-between py-5 border-b border-white/10">
                                <span
                                    class="font-headline font-bold text-primary-fixed/70 uppercase text-xs tracking-widest">Tahun
                                    Berdiri</span>
                                <span class="font-headline font-extrabold text-xl">1994</span>
                            </div>
                            <div class="flex items-center justify-between py-5 border-b border-white/10">
                                <span
                                    class="font-headline font-bold text-primary-fixed/70 uppercase text-xs tracking-widest">Akreditasi</span>
                                <span
                                    class="px-5 py-2 bg-white/10 border border-white/20 text-white rounded-full text-[10px] font-extrabold uppercase tracking-[0.2em]">Peringkat
                                    A</span>
                            </div>
                            <div class="flex items-center justify-between py-5 border-b border-white/10">
                                <span
                                    class="font-headline font-bold text-primary-fixed/70 uppercase text-xs tracking-widest">Status
                                    Sekolah</span>
                                <span class="font-headline font-bold">Satuan Pendidikan Kerjasama (SPK)</span>
                            </div>
                            <div class="flex items-center justify-between py-5">
                                <span
                                    class="font-headline font-bold text-primary-fixed/70 uppercase text-xs tracking-widest">NPSN</span>
                                <span class="font-headline font-extrabold text-xl">20104567</span>
                            </div>
                        </div>
                    </div>
                    <div class="bg-white rounded-2xl p-10 text-on-surface shadow-2xl relative">
                        <div class="absolute -top-4 -right-4 bg-primary p-4 rounded-xl shadow-lg">
                            <span class="material-symbols-outlined text-white text-3xl">location_on</span>
                        </div>
                        <h3 class="font-headline font-extrabold text-2xl text-primary mb-6">Kampus Utama</h3>
                        <p class="text-on-surface-variant font-semibold leading-relaxed mb-10">
                            Jl. Pendidikan Luhur No. 88, <br />
                            Kawasan Menteng, Jakarta Pusat, <br />
                            Indonesia 10310
                        </p>
                        <div
                            class="aspect-[16/9] rounded-xl overflow-hidden grayscale contrast-125 border border-outline-variant/30">
                            <img alt="Map" class="w-full h-full object-cover"
                                src="https://lh3.googleusercontent.com/aida-public/AB6AXuAivmw_rFT5mQnTM91pqbb8llLK4lJYc0kUZU-HciSoRuekNK-jsHnogTZJkLJy1W1E7cUyMbmRKa2nkVI3f_n2ws1HjRKZnpmS92en18WmVNVq23ckQ5IkRrtOyB8TRvuvq1-dCh-9lRfRGN-1EZfEZkJb7QixJgPn1T6heyraIYIv6TYx7YrAnht_BW0ltEUOdCab1FUAk0AXb2_Xx44zhWtANwkth_gBZNKh_iVvGZKZrW50SuQQMtn0JS2hIMzJFO0RlwKNDM8" />
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
    <!-- Footer -->
    <footer class="w-full bg-[#002111] text-white pt-24 pb-12 border-t border-white/5">
        <div class="grid grid-cols-1 md:grid-cols-4 gap-16 px-12 max-w-7xl mx-auto mb-20">
            <div class="md:col-span-1">
                <div class="flex items-center gap-3 mb-8">
                    <img alt="Logo" class="h-14 w-auto brightness-0 invert"
                        src="https://lh3.googleusercontent.com/aida/ADBb0ujeWkuz4ycn39PIIznn1vISNTvRETPxUCcowf9F1Rwejiqn3nd5N0shHOcFwP94VFhDkoWS2g6SjDSfSRzA_Z587Cq_dUQfkE5GBsp2LNbKKbzb37srre9ntZTA2_HTGYKnwUVDgczaynchEsAq2rfptiWxhFybKec6Uk5RWDHlvhz4Qd2dGWHA5MngfRll3MFZpxx298aPiY3UQQu9U_blCYDeT3kMgAIP-1rUucujUDAMewAnchcAqN1ADhphx7qYcOQXDoPeUQ" />
                    <div class="font-headline font-extrabold text-sm tracking-tighter leading-tight uppercase">
                        SMA HARAPAN JAYA<br /><span class="text-[8px] opacity-40">EST. 1994</span>
                    </div>
                </div>
                <p class="font-body text-xs leading-loose text-white/50 font-medium">© 2024 SMA Harapan Jaya.
                    Mendedikasikan diri untuk membina pemimpin masa depan dengan integritas tak tergoyahkan.</p>
            </div>
            <div>
                <h5 class="text-white font-headline font-extrabold text-xs uppercase tracking-[0.3em] mb-10">Tautan
                    Cepat</h5>
                <ul class="space-y-5 font-body text-sm font-semibold">
                    <li><a class="text-white/60 hover:text-white transition-colors" href="#">Visi &amp; Misi</a>
                    </li>
                    <li><a class="text-white/60 hover:text-white transition-colors" href="#">Kurikulum</a></li>
                    <li><a class="text-white/60 hover:text-white transition-colors" href="#">Fasilitas
                            Kampus</a></li>
                </ul>
            </div>
            <div>
                <h5 class="text-white font-headline font-extrabold text-xs uppercase tracking-[0.3em] mb-10">Informasi
                </h5>
                <ul class="space-y-5 font-body text-sm font-semibold">
                    <li><a class="text-white/60 hover:text-white transition-colors" href="#">Hubungi Kami</a>
                    </li>
                    <li><a class="text-white/60 hover:text-white transition-colors" href="#">Peta Lokasi</a>
                    </li>
                    <li><a class="text-white/60 hover:text-white transition-colors" href="#">Karir Akademik</a>
                    </li>
                </ul>
            </div>
            <div>
                <h5 class="text-white font-headline font-extrabold text-xs uppercase tracking-[0.3em] mb-10">Kontak
                    Resmi</h5>
                <p class="text-white/60 font-body text-sm font-semibold leading-relaxed mb-8">
                    info@harapanjaya.sch.id<br />
                    +62 21 555 0123
                </p>
                <div class="flex space-x-6">
                    <span
                        class="material-symbols-outlined text-white/40 cursor-pointer hover:text-white transition-colors"
                        data-icon="facebook">social_leaderboard</span>
                    <span
                        class="material-symbols-outlined text-white/40 cursor-pointer hover:text-white transition-colors"
                        data-icon="alternate_email">alternate_email</span>
                    <span
                        class="material-symbols-outlined text-white/40 cursor-pointer hover:text-white transition-colors"
                        data-icon="language">language</span>
                </div>
            </div>
        </div>
        <div class="max-w-7xl mx-auto px-12 pt-8 border-t border-white/5 text-center">
            <p class="text-white/20 text-[10px] font-bold tracking-[0.5em] uppercase">Excellence • Integrity •
                Character</p>
        </div>
    </footer>
</body>

</html>
