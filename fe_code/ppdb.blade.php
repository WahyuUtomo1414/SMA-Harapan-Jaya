<!DOCTYPE html>

<html class="light" lang="id">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <link href="https://fonts.googleapis.com" rel="preconnect" />
    <link crossorigin="" href="https://fonts.gstatic.com" rel="preconnect" />
    <link
        href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&amp;family=Manrope:wght@400;500;600;700;800;900&amp;display=swap"
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
                        "primary": "#008542",
                        "on-primary": "#ffffff",
                        "primary-container": "#b3f0cc",
                        "on-primary-container": "#00210d",
                        "secondary": "#4e6354",
                        "on-secondary": "#ffffff",
                        "secondary-container": "#d1e8d5",
                        "on-secondary-container": "#0c1f14",
                        "tertiary": "#3b6470",
                        "on-tertiary": "#ffffff",
                        "tertiary-container": "#beeaf7",
                        "on-tertiary-container": "#001f26",
                        "error": "#ba1a1a",
                        "on-error": "#ffffff",
                        "background": "#fbfdf8",
                        "on-background": "#191c1a",
                        "surface": "#fbfdf8",
                        "on-surface": "#191c1a",
                        "surface-variant": "#dce5dc",
                        "on-surface-variant": "#414942",
                        "outline": "#717972",
                        "outline-variant": "#c0c9c0"
                    },
                    "borderRadius": {
                        "DEFAULT": "0.25rem",
                        "lg": "0.5rem",
                        "xl": "0.75rem",
                        "2xl": "1rem",
                        "3xl": "1.5rem",
                        "full": "9999px"
                    },
                    "fontFamily": {
                        "headline": ["Manrope", "sans-serif"],
                        "body": ["Inter", "sans-serif"],
                        "label": ["Inter", "sans-serif"]
                    }
                },
            },
        }
    </script>
    <style>
        .material-symbols-outlined {
            font-variation-settings: 'FILL' 0, 'wght' 400, 'GRAD' 0, 'opsz' 24;
        }

        .emerald-gradient {
            background: linear-gradient(135deg, #008542 0%, #006b35 100%);
        }

        .step-card-active {
            box-shadow: 0 20px 25px -5px rgb(0 133 66 / 0.1), 0 8px 10px -6px rgb(0 133 66 / 0.1);
        }
    </style>
</head>

<body class="bg-surface text-on-surface font-body selection:bg-primary-container selection:text-on-primary-container">
    <!-- TopNavBar -->
    <header class="sticky top-0 w-full z-50 bg-surface/90 backdrop-blur-md border-b border-outline-variant/30">
        <nav class="flex justify-between items-center max-w-7xl mx-auto px-6 h-20">
            <div class="flex items-center gap-3 cursor-pointer group">
                <img alt="Logo" class="h-10 w-10 object-contain group-hover:scale-105 transition-transform"
                    src="https://lh3.googleusercontent.com/aida/ADBb0ujeWkuz4ycn39PIIznn1vISNTvRETPxUCcowf9F1Rwejiqn3nd5N0shHOcFwP94VFhDkoWS2g6SjDSfSRzA_Z587Cq_dUQfkE5GBsp2LNbKKbzb37srre9ntZTA2_HTGYKnwUVDgczaynchEsAq2rfptiWxhFybKec6Uk5RWDHlvhz4Qd2dGWHA5MngfRll3MFZpxx298aPiY3UQQu9U_blCYDeT3kMgAIP-1rUucujUDAMewAnchcAqN1ADhphx7qYcOQXDoPeUQ" />
                <div class="font-headline font-extrabold text-xl text-primary tracking-tight leading-none uppercase">
                    The Scholarly<br /><span class="text-secondary font-bold text-base tracking-widest">Editorial</span>
                </div>
            </div>
            <div class="hidden md:flex items-center gap-8 font-label font-semibold text-sm">
                <a class="text-on-surface-variant hover:text-primary transition-colors" href="#">Beranda</a>
                <a class="text-on-surface-variant hover:text-primary transition-colors" href="#">Tentang
                    Sekolah</a>
                <a class="text-on-surface-variant hover:text-primary transition-colors" href="#">Berita</a>
                <a class="text-primary relative after:absolute after:bottom-[-4px] after:left-0 after:w-full after:h-0.5 after:bg-primary"
                    href="#">PPDB</a>
            </div>
            <button
                class="bg-primary text-on-primary px-6 py-2.5 rounded-full font-headline font-bold text-sm hover:opacity-90 transition-opacity active:scale-95">
                Daftar Sekarang
            </button>
        </nav>
    </header>
    <main>
        <!-- Hero Section -->
        <section class="relative pt-16 pb-24 overflow-hidden">
            <div class="max-w-7xl mx-auto px-6 relative z-10">
                <div class="flex flex-col lg:flex-row items-center gap-16">
                    <div class="flex-1 space-y-6">
                        <div
                            class="inline-flex items-center gap-2 px-4 py-1.5 rounded-full bg-primary-container text-on-primary-container text-xs font-bold uppercase tracking-wider">
                            <span class="w-2 h-2 rounded-full bg-primary animate-pulse"></span>
                            Pendaftaran 2024/2025 Dibuka
                        </div>
                        <h1
                            class="font-headline text-5xl md:text-7xl font-extrabold text-on-surface tracking-tight leading-[1.1]">
                            Pendaftaran <br /> <span class="text-primary italic">Peserta Didik Baru</span>
                        </h1>
                        <p class="text-on-surface-variant text-lg max-w-xl leading-relaxed font-medium">
                            Wujudkan potensi terbaik putra-putri Anda melalui ekosistem pembelajaran yang kolaboratif,
                            modern, dan berlandaskan nilai-nilai luhur.
                        </p>
                        <div class="flex flex-wrap gap-4 pt-4">
                            <button
                                class="emerald-gradient text-on-primary px-10 py-4 rounded-full font-headline font-bold text-lg shadow-lg shadow-primary/20 hover:shadow-xl transition-all">
                                Mulai Pendaftaran
                            </button>
                            <button
                                class="bg-surface-variant text-on-surface-variant px-10 py-4 rounded-full font-headline font-bold text-lg hover:bg-outline-variant/30 transition-all">
                                Unduh Brosur
                            </button>
                        </div>
                    </div>
                    <div class="flex-1 relative">
                        <div
                            class="relative rounded-[3rem] overflow-hidden aspect-[4/5] shadow-2xl border-8 border-surface-variant">
                            <img alt="hero image" class="w-full h-full object-cover"
                                data-alt="Female student looking confident in a library setting with warm, scholarly lighting"
                                src="https://lh3.googleusercontent.com/aida-public/AB6AXuBcmpNDtQs9GqikEarZwEU4Zq_Iij0i7FYRsrIditAQqqK1N93I5Zl0ARBZ4dwRRz8NMB8Av0zKvF-cgVHqbRVFiUGRptUZPx08lNykc1waSj0ehYuwqJ-aaOqYtqHKFKku_91gDBy7ySJWGSRhHGXZvybV0sAHlE3C-xD9b4iS56LQlxJTRZd7E8v5nuxnArQ89PZ2tPsLrjfk-alEdM4u5YjiqISouS-9ERPNAQFmkKfaP4ed1KjHpVIt7i8SVIM9ORunsp0Y8rU" />
                        </div>
                        <!-- Floating Badge -->
                        <div
                            class="absolute -bottom-8 left-8 bg-surface p-5 rounded-2xl shadow-2xl flex items-center gap-4 max-w-xs border border-outline-variant/20">
                            <div
                                class="h-12 w-12 rounded-xl bg-primary-container flex items-center justify-center text-primary">
                                <span class="material-symbols-outlined font-bold" data-icon="verified">verified</span>
                            </div>
                            <div>
                                <p class="text-[10px] font-black text-primary uppercase tracking-[0.2em]">Akreditasi A
                                </p>
                                <p class="text-sm font-bold text-on-surface">Institusi Berstandar Internasional</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Subtle Decor -->
            <div class="absolute top-0 right-0 w-1/3 h-full bg-primary-container/10 -z-10 rounded-l-[10rem]"></div>
        </section>
        <!-- Process Flow -->
        <section class="py-24 bg-surface-variant/20">
            <div class="max-w-7xl mx-auto px-6">
                <div class="text-center space-y-4 mb-20">
                    <h2 class="font-headline text-4xl font-extrabold text-on-surface tracking-tight">Alur Pendaftaran
                    </h2>
                    <div class="w-20 h-1.5 bg-primary mx-auto rounded-full"></div>
                    <p class="text-on-surface-variant max-w-2xl mx-auto font-medium">Sistem pendaftaran kami dirancang
                        untuk memberikan kemudahan bagi calon orang tua murid dengan transparansi penuh di setiap
                        tahapnya.</p>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-4 gap-6 relative">
                    <!-- Step 1 -->
                    <div class="group">
                        <div
                            class="h-full bg-surface p-8 rounded-3xl border border-outline-variant/30 transition-all hover:border-primary/50 hover:shadow-xl relative overflow-hidden">
                            <div class="absolute top-4 right-6 text-6xl font-black text-outline-variant/10">01</div>
                            <div
                                class="h-14 w-14 bg-primary text-on-primary rounded-2xl flex items-center justify-center mb-8 shadow-md group-hover:rotate-6 transition-transform">
                                <span class="material-symbols-outlined text-2xl"
                                    data-icon="person_add">person_add</span>
                            </div>
                            <h3 class="font-headline font-bold text-xl mb-4 text-on-surface">Registrasi</h3>
                            <p class="text-on-surface-variant text-sm leading-relaxed">Isi formulir data diri melalui
                                portal PPDB online kami secara akurat.</p>
                        </div>
                    </div>
                    <!-- Step 2 -->
                    <div class="group">
                        <div
                            class="h-full bg-surface p-8 rounded-3xl border border-outline-variant/30 transition-all hover:border-secondary/50 hover:shadow-xl relative overflow-hidden">
                            <div class="absolute top-4 right-6 text-6xl font-black text-outline-variant/10">02</div>
                            <div
                                class="h-14 w-14 bg-secondary text-on-secondary rounded-2xl flex items-center justify-center mb-8 shadow-md group-hover:rotate-6 transition-transform">
                                <span class="material-symbols-outlined text-2xl"
                                    data-icon="description">description</span>
                            </div>
                            <h3 class="font-headline font-bold text-xl mb-4 text-on-surface">Verifikasi</h3>
                            <p class="text-on-surface-variant text-sm leading-relaxed">Tim administrasi akan memvalidasi
                                berkas fisik dan dokumen pendukung Anda.</p>
                        </div>
                    </div>
                    <!-- Step 3 -->
                    <div class="group">
                        <div
                            class="h-full bg-surface p-8 rounded-3xl border border-outline-variant/30 transition-all hover:border-tertiary/50 hover:shadow-xl relative overflow-hidden">
                            <div class="absolute top-4 right-6 text-6xl font-black text-outline-variant/10">03</div>
                            <div
                                class="h-14 w-14 bg-tertiary text-on-tertiary rounded-2xl flex items-center justify-center mb-8 shadow-md group-hover:rotate-6 transition-transform">
                                <span class="material-symbols-outlined text-2xl"
                                    data-icon="psychology">psychology</span>
                            </div>
                            <h3 class="font-headline font-bold text-xl mb-4 text-on-surface">Seleksi</h3>
                            <p class="text-on-surface-variant text-sm leading-relaxed">Pelaksanaan observasi, wawancara,
                                dan tes pemetaan potensi akademik.</p>
                        </div>
                    </div>
                    <!-- Step 4 -->
                    <div class="group">
                        <div
                            class="h-full bg-primary text-on-primary p-8 rounded-3xl border border-primary transition-all shadow-xl shadow-primary/20 relative overflow-hidden">
                            <div class="absolute top-4 right-6 text-6xl font-black text-white/10">04</div>
                            <div
                                class="h-14 w-14 bg-white text-primary rounded-2xl flex items-center justify-center mb-8 shadow-md group-hover:scale-110 transition-transform">
                                <span class="material-symbols-outlined text-2xl font-bold"
                                    data-icon="campaign">campaign</span>
                            </div>
                            <h3 class="font-headline font-bold text-xl mb-4">Pengumuman</h3>
                            <p class="text-on-primary/80 text-sm leading-relaxed">Hasil seleksi diumumkan melalui portal
                                dan email pribadi pendaftar.</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Information & Key Dates -->
        <section class="py-24">
            <div class="max-w-7xl mx-auto px-6">
                <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                    <!-- Column 1: Important Dates -->
                    <div
                        class="lg:col-span-2 bg-[#004d26] text-on-primary rounded-[3rem] p-12 overflow-hidden relative group">
                        <div class="relative z-10 h-full flex flex-col">
                            <div class="flex items-center gap-3 mb-12">
                                <div class="p-2 bg-white/10 rounded-lg">
                                    <span class="material-symbols-outlined text-primary-container"
                                        data-icon="calendar_today">calendar_today</span>
                                </div>
                                <h3 class="font-headline font-bold text-2xl tracking-tight">Timeline Akademik 2024</h3>
                            </div>
                            <div class="space-y-0 flex-grow">
                                <div
                                    class="flex items-center gap-8 py-6 border-b border-white/10 hover:bg-white/5 transition-colors px-4 -mx-4 rounded-xl">
                                    <div
                                        class="bg-primary-container text-on-primary-container h-14 w-14 flex flex-col items-center justify-center rounded-xl shrink-0">
                                        <p class="text-[10px] font-bold uppercase leading-none">JAN</p>
                                        <p class="text-xl font-black leading-none mt-1">15</p>
                                    </div>
                                    <div class="flex-grow">
                                        <h4 class="font-headline font-bold text-lg text-white">Gelombang I (Early Bird)
                                        </h4>
                                        <p class="text-white/60 text-sm">Kesempatan beasiswa prestasi dan potongan uang
                                            pangkal.</p>
                                    </div>
                                    <span class="material-symbols-outlined text-white/30"
                                        data-icon="chevron_right">chevron_right</span>
                                </div>
                                <div
                                    class="flex items-center gap-8 py-6 border-b border-white/10 hover:bg-white/5 transition-colors px-4 -mx-4 rounded-xl">
                                    <div
                                        class="bg-secondary-container text-on-secondary-container h-14 w-14 flex flex-col items-center justify-center rounded-xl shrink-0">
                                        <p class="text-[10px] font-bold uppercase leading-none">MAR</p>
                                        <p class="text-xl font-black leading-none mt-1">20</p>
                                    </div>
                                    <div class="flex-grow">
                                        <h4 class="font-headline font-bold text-lg text-white">Batas Akhir Berkas</h4>
                                        <p class="text-white/60 text-sm">Penutupan unggah dokumen persyaratan Gelombang
                                            I.</p>
                                    </div>
                                    <span class="material-symbols-outlined text-white/30"
                                        data-icon="chevron_right">chevron_right</span>
                                </div>
                                <div
                                    class="flex items-center gap-8 py-6 hover:bg-white/5 transition-colors px-4 -mx-4 rounded-xl">
                                    <div
                                        class="bg-tertiary-container text-on-tertiary-container h-14 w-14 flex flex-col items-center justify-center rounded-xl shrink-0">
                                        <p class="text-[10px] font-bold uppercase leading-none">APR</p>
                                        <p class="text-xl font-black leading-none mt-1">05</p>
                                    </div>
                                    <div class="flex-grow">
                                        <h4 class="font-headline font-bold text-lg text-white">Tes Potensi (CBT)</h4>
                                        <p class="text-white/60 text-sm">Computer Based Test yang dilakukan secara
                                            serentak.</p>
                                    </div>
                                    <span class="material-symbols-outlined text-white/30"
                                        data-icon="chevron_right">chevron_right</span>
                                </div>
                            </div>
                            <div
                                class="mt-12 bg-black/20 p-6 rounded-2xl border border-white/5 flex items-center gap-4">
                                <span class="material-symbols-outlined text-primary-container"
                                    data-icon="info">info</span>
                                <p class="text-sm font-medium italic opacity-80">"Jadwal dapat berubah sewaktu-waktu
                                    sesuai kebijakan komite."</p>
                            </div>
                        </div>
                        <!-- Ambient Decor -->
                        <div
                            class="absolute -top-24 -right-24 w-64 h-64 bg-primary rounded-full blur-[100px] opacity-20">
                        </div>
                    </div>
                    <!-- Column 2: Requirements -->
                    <div
                        class="bg-surface-variant/40 rounded-[3rem] p-10 flex flex-col h-full border border-outline-variant/30">
                        <h3 class="font-headline font-bold text-2xl mb-8 text-on-surface">Persyaratan Umum</h3>
                        <ul class="space-y-6 flex-grow">
                            <li class="flex items-start gap-4 group">
                                <div
                                    class="h-6 w-6 rounded-full bg-primary/10 flex items-center justify-center shrink-0 group-hover:bg-primary group-hover:text-white transition-colors">
                                    <span class="material-symbols-outlined text-sm font-black"
                                        data-icon="check">check</span>
                                </div>
                                <span class="text-sm text-on-surface-variant font-semibold">Fotokopi Akta Kelahiran
                                    &amp; KK</span>
                            </li>
                            <li class="flex items-start gap-4 group">
                                <div
                                    class="h-6 w-6 rounded-full bg-primary/10 flex items-center justify-center shrink-0 group-hover:bg-primary group-hover:text-white transition-colors">
                                    <span class="material-symbols-outlined text-sm font-black"
                                        data-icon="check">check</span>
                                </div>
                                <span class="text-sm text-on-surface-variant font-semibold">Pas Foto Terbaru Ukuran
                                    3x4</span>
                            </li>
                            <li class="flex items-start gap-4 group">
                                <div
                                    class="h-6 w-6 rounded-full bg-primary/10 flex items-center justify-center shrink-0 group-hover:bg-primary group-hover:text-white transition-colors">
                                    <span class="material-symbols-outlined text-sm font-black"
                                        data-icon="check">check</span>
                                </div>
                                <span class="text-sm text-on-surface-variant font-semibold">Rapor 3 Semester
                                    Terakhir</span>
                            </li>
                            <li class="flex items-start gap-4 group">
                                <div
                                    class="h-6 w-6 rounded-full bg-primary/10 flex items-center justify-center shrink-0 group-hover:bg-primary group-hover:text-white transition-colors">
                                    <span class="material-symbols-outlined text-sm font-black"
                                        data-icon="check">check</span>
                                </div>
                                <span class="text-sm text-on-surface-variant font-semibold">Sertifikat Prestasi
                                    (Opsional)</span>
                            </li>
                        </ul>
                        <div class="mt-12 bg-secondary-container/50 p-6 rounded-2xl border border-secondary-container">
                            <h4 class="font-headline font-bold text-on-secondary-container text-sm mb-2">Bantuan Admisi
                            </h4>
                            <p class="text-xs text-on-secondary-container/80 mb-4 font-medium leading-relaxed">Tim kami
                                tersedia untuk konsultasi tatap muka maupun daring.</p>
                            <a class="text-sm font-bold text-primary flex items-center gap-2 group" href="#">
                                Hubungi WhatsApp
                                <span
                                    class="material-symbols-outlined text-sm group-hover:translate-x-1 transition-transform"
                                    data-icon="arrow_forward">arrow_forward</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- CTA Section -->
        <section class="py-20">
            <div class="max-w-7xl mx-auto px-6">
                <div
                    class="rounded-[4rem] emerald-gradient p-16 text-center space-y-10 shadow-2xl relative overflow-hidden">
                    <div class="relative z-10">
                        <h2
                            class="font-headline text-4xl md:text-5xl font-black text-on-primary tracking-tight max-w-3xl mx-auto leading-tight">
                            Mulai Perjalanan Akademik <br />Unggul Bersama Kami
                        </h2>
                        <p class="text-on-primary/70 text-lg max-w-xl mx-auto font-medium">
                            Daftarkan sekarang sebelum kuota setiap jenjang terpenuhi. Prioritaskan pendidikan terbaik
                            untuk masa depan.
                        </p>
                        <div class="pt-6 flex flex-col sm:flex-row justify-center gap-4">
                            <button
                                class="bg-white text-primary px-12 py-5 rounded-full font-headline font-extrabold text-xl shadow-xl hover:bg-primary-container transition-colors">
                                Daftar Online Sekarang
                            </button>
                            <button
                                class="border-2 border-white/30 text-white px-12 py-5 rounded-full font-headline font-extrabold text-xl hover:bg-white/10 transition-colors">
                                Jadwalkan Visit Sekolah
                            </button>
                        </div>
                    </div>
                    <!-- Abstract Elements -->
                    <div class="absolute top-0 left-0 w-full h-full opacity-5 pointer-events-none">
                        <svg class="h-full w-full" preserveaspectratio="none" viewbox="0 0 100 100">
                            <path d="M0,100 C20,80 40,80 60,100 S80,120 100,100" fill="none" stroke="white"
                                stroke-width="0.5"></path>
                            <circle cx="10" cy="10" fill="white" r="15"></circle>
                            <circle cx="90" cy="80" fill="white" r="20"></circle>
                        </svg>
                    </div>
                </div>
            </div>
        </section>
    </main>
    <!-- Footer -->
    <footer class="bg-on-background text-on-primary py-20 mt-20">
        <div class="max-w-7xl mx-auto px-6">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-16">
                <div class="col-span-1 md:col-span-1 space-y-6">
                    <div class="flex items-center gap-3">
                        <img alt="Logo" class="h-10 w-10 brightness-0 invert opacity-80"
                            src="https://lh3.googleusercontent.com/aida/ADBb0ujeWkuz4ycn39PIIznn1vISNTvRETPxUCcowf9F1Rwejiqn3nd5N0shHOcFwP94VFhDkoWS2g6SjDSfSRzA_Z587Cq_dUQfkE5GBsp2LNbKKbzb37srre9ntZTA2_HTGYKnwUVDgczaynchEsAq2rfptiWxhFybKec6Uk5RWDHlvhz4Qd2dGWHA5MngfRll3MFZpxx298aPiY3UQQu9U_blCYDeT3kMgAIP-1rUucujUDAMewAnchcAqN1ADhphx7qYcOQXDoPeUQ" />
                        <div
                            class="font-headline font-black text-lg tracking-tight leading-none uppercase text-white/90">
                            The Scholarly<br /><span class="text-primary-container text-sm">Editorial</span>
                        </div>
                    </div>
                    <p class="text-sm leading-relaxed text-white/50 font-medium">
                        © 2024 The Scholarly Editorial. <br />Membangun karakter dan kecerdasan melalui pendidikan yang
                        holistik.
                    </p>
                </div>
                <div>
                    <h4 class="font-headline font-bold text-white mb-8 text-lg uppercase tracking-widest">Navigasi</h4>
                    <ul class="space-y-4 text-sm font-medium text-white/60">
                        <li><a class="hover:text-primary-container transition-colors" href="#">Visi &amp;
                                Misi</a></li>
                        <li><a class="hover:text-primary-container transition-colors" href="#">Kurikulum
                                2024</a></li>
                        <li><a class="hover:text-primary-container transition-colors" href="#">Fasilitas
                                Kampus</a></li>
                        <li><a class="hover:text-primary-container transition-colors" href="#">Kegiatan
                                Siswa</a></li>
                    </ul>
                </div>
                <div>
                    <h4 class="font-headline font-bold text-white mb-8 text-lg uppercase tracking-widest">Kontak</h4>
                    <ul class="space-y-4 text-sm font-medium text-white/60">
                        <li class="flex items-center gap-3"><span class="material-symbols-outlined text-xs"
                                data-icon="mail">mail</span> info@scholarly.sch.id</li>
                        <li class="flex items-center gap-3"><span class="material-symbols-outlined text-xs"
                                data-icon="call">call</span> +62 21 555 1234</li>
                        <li class="flex items-center gap-3"><span class="material-symbols-outlined text-xs"
                                data-icon="location_on">location_on</span> Jakarta Barat, Indonesia</li>
                    </ul>
                </div>
                <div>
                    <h4 class="font-headline font-bold text-white mb-8 text-lg uppercase tracking-widest">Media</h4>
                    <div class="flex gap-4">
                        <a class="w-12 h-12 rounded-full border border-white/10 flex items-center justify-center hover:bg-primary hover:border-primary transition-all group"
                            href="#">
                            <span class="material-symbols-outlined text-white/60 group-hover:text-white"
                                data-icon="public">public</span>
                        </a>
                        <a class="w-12 h-12 rounded-full border border-white/10 flex items-center justify-center hover:bg-primary hover:border-primary transition-all group"
                            href="#">
                            <span class="material-symbols-outlined text-white/60 group-hover:text-white"
                                data-icon="share">share</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </footer>
</body>

</html>
