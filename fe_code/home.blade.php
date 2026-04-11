<!DOCTYPE html>

<html class="light" lang="id">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <title>The Scholarly Editorial | Membangun Generasi Unggul</title>
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <link
        href="https://fonts.googleapis.com/css2?family=Manrope:wght@200..800&amp;family=Inter:wght@300..700&amp;display=swap"
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
                        "primary-container": "#b9f3cd",
                        "on-primary-container": "#00210c",
                        "secondary": "#416656",
                        "on-secondary": "#ffffff",
                        "secondary-container": "#c3ecd7",
                        "on-secondary-container": "#002115",
                        "tertiary": "#4a2400",
                        "on-tertiary": "#ffffff",
                        "tertiary-container": "#ffdcc3",
                        "on-tertiary-container": "#2f1500",
                        "error": "#ba1a1a",
                        "on-error": "#ffffff",
                        "error-container": "#ffdad6",
                        "on-error-container": "#410002",
                        "background": "#fdf9e9",
                        "on-background": "#1c1c13",
                        "surface": "#fdf9e9",
                        "on-surface": "#1c1c13",
                        "surface-variant": "#e6e3d3",
                        "on-surface-variant": "#404944",
                        "outline": "#707974",
                        "outline-variant": "#bfc9c3",
                        "inverse-surface": "#323126",
                        "inverse-on-surface": "#f5f1e1",
                        "inverse-primary": "#95d3ba",
                        "surface-dim": "#dedacb",
                        "surface-bright": "#fdf9e9",
                        "surface-container-lowest": "#ffffff",
                        "surface-container-low": "#f8f4e4",
                        "surface-container": "#f2eede",
                        "surface-container-high": "#ece8d9",
                        "surface-container-highest": "#e6e3d3"
                    },
                    "borderRadius": {
                        "DEFAULT": "0.25rem",
                        "lg": "0.5rem",
                        "xl": "1.5rem",
                        "full": "9999px"
                    },
                    "fontFamily": {
                        "headline": ["Manrope"],
                        "body": ["Inter"],
                        "label": ["Inter"]
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
            font-family: 'Inter', sans-serif;
        }

        h1,
        h2,
        h3,
        h4 {
            font-family: 'Manrope', sans-serif;
        }
    </style>
</head>

<body class="bg-surface text-on-surface selection:bg-primary-container selection:text-on-primary-container">
    <!-- Top Navigation Bar -->
    <nav class="sticky top-0 w-full z-50 bg-[#fdf9e9]/80 backdrop-blur-xl border-b border-outline-variant/30">
        <div class="flex justify-between items-center max-w-7xl mx-auto px-8 h-20">
            <div class="flex items-center gap-3 cursor-pointer active:opacity-70 transition-all">
                <img alt="SMA Harapan Jaya Logo" class="w-12 h-12 object-contain"
                    src="https://lh3.googleusercontent.com/aida/ADBb0ujeWkuz4ycn39PIIznn1vISNTvRETPxUCcowf9F1Rwejiqn3nd5N0shHOcFwP94VFhDkoWS2g6SjDSfSRzA_Z587Cq_dUQfkE5GBsp2LNbKKbzb37srre9ntZTA2_HTGYKnwUVDgczaynchEsAq2rfptiWxhFybKec6Uk5RWDHlvhz4Qd2dGWHA5MngfRll3MFZpxx298aPiY3UQQu9U_blCYDeT3kMgAIP-1rUucujUDAMewAnchcAqN1ADhphx7qYcOQXDoPeUQ" />
                <div class="font-manrope font-black text-xl text-primary uppercase tracking-tight">
                    Harapan Jaya
                </div>
            </div>
            <div class="hidden md:flex items-center gap-8 font-manrope font-semibold tracking-tight text-sm">
                <a class="text-primary border-b-2 border-primary pb-1 cursor-pointer active:opacity-70 transition-all"
                    href="#">Beranda</a>
                <a class="text-on-surface-variant hover:text-primary hover:scale-105 transition-transform duration-300 ease-out cursor-pointer active:opacity-70 transition-all"
                    href="#">Tentang Sekolah</a>
                <a class="text-on-surface-variant hover:text-primary hover:scale-105 transition-transform duration-300 ease-out cursor-pointer active:opacity-70 transition-all"
                    href="#">Berita</a>
                <a class="text-on-surface-variant hover:text-primary hover:scale-105 transition-transform duration-300 ease-out cursor-pointer active:opacity-70 transition-all"
                    href="#">PPDB</a>
            </div>
            <button
                class="bg-primary text-on-primary px-6 py-2.5 rounded-xl font-headline font-bold text-sm hover:scale-105 transition-transform duration-300 ease-out active:opacity-70">
                Daftar Sekarang
            </button>
        </div>
    </nav>
    <main>
        <!-- Hero Section -->
        <section class="relative h-[800px] flex items-center overflow-hidden">
            <div class="absolute inset-0 z-0">
                <img alt="SMA Harapan Jaya Campus" class="w-full h-full object-cover"
                    src="https://lh3.googleusercontent.com/aida/ADBb0uinw1bVXBq6JOU7WpVX-KHf-9Vq0AQybu1F0ryKQogzYuqToPPjmi8J_mNX8Fdsxh4u69763yiMzifpgM6_nyZPuWYeHJE6rc9HriZyfGi4pP-in2CgcdpJRmxttF7Rx7qRpHOVbcoyiorh4pc8lGaU602S27P__snlaOKxqyMUjFzofO3zuSPNAnGvUSlCuV-nL1ODmRKq390AGHTLBbSoZUSYUYfkLIjm5aH8BbTHcHATxf9AFjp1XJEtvZ4LFbTkz9xIPbS8QA" />
                <div class="absolute inset-0 bg-gradient-to-r from-primary/95 via-primary/60 to-transparent"></div>
            </div>
            <div class="relative z-10 max-w-7xl mx-auto px-8 w-full">
                <div class="max-w-2xl">
                    <span
                        class="inline-block px-4 py-1.5 rounded-full bg-tertiary-container text-on-tertiary-container text-xs font-bold tracking-widest uppercase mb-6">Membangun
                        Masa Depan</span>
                    <h1
                        class="text-white text-5xl md:text-7xl font-headline font-extrabold tracking-tight leading-[1.1] mb-8">
                        Membangun Generasi Unggul dan Berkarakter
                    </h1>
                    <p class="text-primary-container text-lg md:text-xl font-body leading-relaxed mb-10 opacity-95">
                        Menyediakan pendidikan berkualitas dunia yang berakar pada nilai-nilai luhur untuk mencetak
                        pemimpin masa depan yang inovatif dan berintegritas di SMA Harapan Jaya.
                    </p>
                    <div class="flex flex-wrap gap-4">
                        <button
                            class="bg-surface text-primary px-8 py-4 rounded-xl font-headline font-bold text-base hover:scale-105 transition-transform duration-300 shadow-xl">
                            Pelajari Lebih Lanjut
                        </button>
                        <button
                            class="bg-transparent text-white border-2 border-white/50 px-8 py-4 rounded-xl font-headline font-bold text-base hover:bg-white/10 transition-colors duration-300">
                            Daftar Sekarang
                        </button>
                    </div>
                </div>
            </div>
        </section>
        <!-- About Preview -->
        <section class="py-24 bg-surface relative overflow-hidden">
            <div class="max-w-7xl mx-auto px-8">
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-16 items-center">
                    <div class="relative">
                        <div
                            class="absolute -top-8 -left-8 w-64 h-64 bg-secondary-container rounded-full blur-3xl opacity-30">
                        </div>
                        <img alt="Student interaction"
                            class="relative z-10 rounded-xl object-cover aspect-[4/5] shadow-2xl"
                            src="https://lh3.googleusercontent.com/aida-public/AB6AXuDS-TbphEETXviIUgpNo3waS7m7D0WcQYlMnC2fteXtKZHluY5ybF3fBdkpTtV6S_r9NuY8EXQgEXHIE7S5F2ZKERikyKa6_ilJByWFdBRjhN1CtrrTdOeg-YYTNOQCg1NQMqClpL5dvGeekOYYS_zT5gcV-da4DAJzEIt_TWPbnIDfDpso66lxEBMXF-Fl5t1X6USqwvRNDYAp4z03tpseG0VoEVjqqoQTEt62L0GZErtJBcfGhqvnM3M-LhIVEo4oUmfbC5XpWsY" />
                        <div
                            class="absolute -bottom-6 -right-6 w-1/2 h-1/2 bg-surface-container-highest rounded-xl z-0">
                        </div>
                    </div>
                    <div>
                        <span
                            class="text-primary font-headline font-bold text-sm tracking-widest uppercase mb-4 block">Siapa
                            Kami</span>
                        <h2 class="text-on-surface text-4xl md:text-5xl font-headline font-bold mb-8 leading-tight">
                            Mendedikasikan Diri untuk Masa Depan Bangsa</h2>
                        <p class="text-on-surface-variant text-lg leading-relaxed mb-8">
                            SMA Harapan Jaya bukan sekadar lembaga pendidikan; kami adalah komunitas pembelajar yang
                            dinamis. Dengan kurikulum yang mengintegrasikan kecerdasan intelektual, emosional, dan
                            spiritual, kami memastikan setiap siswa menemukan potensi terbaik mereka.
                        </p>
                        <button
                            class="group flex items-center gap-3 text-primary font-headline font-bold text-lg hover:gap-5 transition-all">
                            Lihat Selengkapnya
                            <span class="material-symbols-outlined">arrow_forward</span>
                        </button>
                    </div>
                </div>
            </div>
        </section>
        <!-- Statistics Section -->
        <section class="py-20 bg-surface-container-low">
            <div class="max-w-7xl mx-auto px-8">
                <div class="grid grid-cols-2 lg:grid-cols-4 gap-8">
                    <div
                        class="bg-surface-container-lowest p-10 rounded-xl text-center group hover:bg-primary transition-colors duration-500">
                        <span
                            class="material-symbols-outlined text-4xl text-primary mb-4 group-hover:text-on-primary">calendar_month</span>
                        <h3 class="text-4xl font-headline font-black text-on-surface mb-2 group-hover:text-on-primary">
                            1985</h3>
                        <p class="text-on-surface-variant font-body font-medium group-hover:text-primary-container">
                            Tahun Berdiri</p>
                    </div>
                    <div
                        class="bg-surface-container-lowest p-10 rounded-xl text-center group hover:bg-primary transition-colors duration-500">
                        <span
                            class="material-symbols-outlined text-4xl text-primary mb-4 group-hover:text-on-primary">groups</span>
                        <h3 class="text-4xl font-headline font-black text-on-surface mb-2 group-hover:text-on-primary">
                            1,250</h3>
                        <p class="text-on-surface-variant font-body font-medium group-hover:text-primary-container">
                            Jumlah Murid</p>
                    </div>
                    <div
                        class="bg-surface-container-lowest p-10 rounded-xl text-center group hover:bg-primary transition-colors duration-500">
                        <span
                            class="material-symbols-outlined text-4xl text-primary mb-4 group-hover:text-on-primary">school</span>
                        <h3 class="text-4xl font-headline font-black text-on-surface mb-2 group-hover:text-on-primary">
                            85</h3>
                        <p class="text-on-surface-variant font-body font-medium group-hover:text-primary-container">
                            Jumlah Guru</p>
                    </div>
                    <div
                        class="bg-surface-container-lowest p-10 rounded-xl text-center group hover:bg-primary transition-colors duration-500">
                        <span
                            class="material-symbols-outlined text-4xl text-primary mb-4 group-hover:text-on-primary">workspace_premium</span>
                        <h3 class="text-4xl font-headline font-black text-on-surface mb-2 group-hover:text-on-primary">
                            15k+</h3>
                        <p class="text-on-surface-variant font-body font-medium group-hover:text-primary-container">
                            Jumlah Alumni</p>
                    </div>
                </div>
            </div>
        </section>
        <!-- Galeri Sekolah Section -->
        <section class="py-24 bg-surface">
            <div class="max-w-7xl mx-auto px-8">
                <div class="text-center mb-16">
                    <span
                        class="text-primary font-headline font-bold text-sm tracking-widest uppercase mb-4 block">Eksplorasi</span>
                    <h2 class="text-on-surface text-4xl font-headline font-bold">Galeri Sekolah</h2>
                    <div class="w-20 h-1.5 bg-primary mx-auto mt-6 rounded-full"></div>
                </div>
                <div class="grid grid-cols-2 md:grid-cols-4 gap-4 md:gap-6">
                    <div class="space-y-4 md:space-y-6">
                        <div class="relative group overflow-hidden rounded-xl aspect-[3/4]">
                            <img alt="Campus Life"
                                class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110"
                                src="https://lh3.googleusercontent.com/aida-public/AB6AXuAhJpssL3RAcdgi7EKqZQfh59CgznWNPPkR2WxYriozRF8LD0Nn4xAeESUwYLzS11JLPXrji_sHXC1eZWvvYdSQck4SxWTvgKre4N9bJKPbM5nS04yN3EIMv30ejJyHwmYaNxcRATz4S-aOwI0V3AHBykICtLs7e9frIrbMU5wcfAFvEy701e-oTox0-yTn-Ziz_2v_CNexDxNNx8YuvIFoOqQLlf8pWN8voRsY7080eEFN0ZOvBrlOB19p8KDV8xzhbGHU0jGdhSI" />
                            <div
                                class="absolute inset-0 bg-black/40 opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-center justify-center">
                                <span class="text-white font-headline font-bold text-sm">Lingkungan Kampus</span>
                            </div>
                        </div>
                        <div class="relative group overflow-hidden rounded-xl aspect-square">
                            <img alt="Learning"
                                class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110"
                                src="https://lh3.googleusercontent.com/aida-public/AB6AXuBdbWr6xd6wVO-Hxh5ogG4GxiYHuO6-zC9kHLoQvL-Om_R_j9BKENG-O9_XHANO8TOZ7XiCJBjqp29ex6o-s-UZ7ISop743aUQUKIH62BZ-wWM0cphriU9Ox9oSISLLLwmYriMhTLEs_Zzoo3GAWgyWJKX-XBi-Gl_LUSZ83bTRFz9_WfT-5HZVrWIkYCV77XZIPaPu2W1RExpxV9hvH0rYblqWnBg0EDHwL1Df1nVEA6kzo5mk-yafvp8I_JS-n0sYY50xqSf4VO4" />
                            <div
                                class="absolute inset-0 bg-black/40 opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-center justify-center">
                                <span class="text-white font-headline font-bold text-sm">Proses Belajar</span>
                            </div>
                        </div>
                    </div>
                    <div class="space-y-4 md:space-y-6 pt-8">
                        <div class="relative group overflow-hidden rounded-xl aspect-square">
                            <img alt="Sports"
                                class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110"
                                src="https://lh3.googleusercontent.com/aida-public/AB6AXuCcbWDzMAilINfHNgarm8vaQpU2Zot-kZrqX3HrEWFothCzeMIhi6nTpHKszNxPn33-ybtsFAnqIszuMwoKFtNeiPMsgMfueWhMoy7DAVTGojETFEXxFzraL-w5fS6Pe5ej68H4A0GED0rw0Aoj5WRIWBuLTjVmj18VibiNgET2zEYTyG83zcKfyow59OY0iYodeh9nEjcBmJnZP19U9gNe-nM7rmQ28wulX2qeIQgVQ-RJWZDwa98CR2KXc3bPWk9OfUBnp767P1Y" />
                            <div
                                class="absolute inset-0 bg-black/40 opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-center justify-center">
                                <span class="text-white font-headline font-bold text-sm">Kegiatan Olahraga</span>
                            </div>
                        </div>
                        <div class="relative group overflow-hidden rounded-xl aspect-[3/4]">
                            <img alt="Art &amp; Music"
                                class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110"
                                src="https://lh3.googleusercontent.com/aida-public/AB6AXuCJdcy31WPby1IBhMeh5NtaoFi7NTS0vtdTKKMBu57PShdrRSi1q1GJ_Z2fcT5nXLDDwpz3EDw_LENaIa0gZ2D5O0j186ePNBbvagM9xqV16CYsT221B5SIOj2NAW9CNLzdlRjmms5lT8LEeASbsm1Lk1P8Efrep8W7BKQSZoQx479S-ReKObFUwPvffIZIeq08v_--iWeedaD6rl-KvZkykNKLnQ3G8tuL_kn_-3221S4znuD9UXbn22sZMzWhzyDNKpeDD13LQsw" />
                            <div
                                class="absolute inset-0 bg-black/40 opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-center justify-center">
                                <span class="text-white font-headline font-bold text-sm">Seni &amp; Budaya</span>
                            </div>
                        </div>
                    </div>
                    <div class="space-y-4 md:space-y-6">
                        <div class="relative group overflow-hidden rounded-xl aspect-[3/4]">
                            <img alt="Interaction"
                                class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110"
                                src="https://lh3.googleusercontent.com/aida-public/AB6AXuC5KlaJndNuYNm8dQOH0x8IsLlY_LXYg69TmY-nZ87ekHWAH2QU5JWKP6pX90P7D_BjAFnl188cjFuTCuepEP_BoU6tKGBJljYD2_YGHVTbuDPzQYUtdYyIVob4R_NSQQ-VoEFAph47FcJc9e-tJ0mPYUDvQWCE5PbTvPDhgZq3dChwV08miof3HS29lIeGHu3N7pvMFV0ZmoxskTLwNzNSEH8A_0kmMALFmlUpOg7M-qXQ-gt85sMC9pNaWZcFJRQU6XS_APJGpFs" />
                            <div
                                class="absolute inset-0 bg-black/40 opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-center justify-center">
                                <span class="text-white font-headline font-bold text-sm">Interaksi Siswa</span>
                            </div>
                        </div>
                        <div class="relative group overflow-hidden rounded-xl aspect-square">
                            <img alt="Tech Lab"
                                class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110"
                                src="https://lh3.googleusercontent.com/aida-public/AB6AXuBXIHgzAeCDOV5elP2PPFuiksiX4rbhVEnmRRxBDsRgEAUCqhnUrBjEEyIHw8N6dFfxysJh0YEY0NT3a00dxqsGtM02YnS6yo5mpYv60TL5GRjYTNuXaKOWWWj4E2W8rWcJDTk73g7T7iezQcCQEmFrA8GeZlTQKa4TwUj1rhKTFVD7Qs4gI-e-mBqzaAOZQlJZvPaANGli96jQABFa0SyGdjXEdbGjciU6tWvq_V5UCPrOH9vKXwpcLAH6-eq4Zo458_rx0XUBQH8" />
                            <div
                                class="absolute inset-0 bg-black/40 opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-center justify-center">
                                <span class="text-white font-headline font-bold text-sm">Lab Teknologi</span>
                            </div>
                        </div>
                    </div>
                    <div class="space-y-4 md:space-y-6 pt-8">
                        <div class="relative group overflow-hidden rounded-xl aspect-square">
                            <img alt="Graduation"
                                class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110"
                                src="https://lh3.googleusercontent.com/aida-public/AB6AXuD0htpAmdQA8xon7ned2gBFYuDsaV6anmUuVIESE8Q7JetZJa7S4P-JgVZ_98KUpR6Mer-V8ZYNEHVbOa1yhmr1fqOD4t-M7el1jur3piAlQhMq9aVJc-dNU3aUCLNV5PRIm3CMF9Sv7kXWp_fvJbhkGhY7xS9Lgshjjnipb_VZcXyzo2VhdJ3ohijdbZjJUBJz62FJkgPOZQcqthpf0Rh3VvAo-dIReELzOozrSQwkyZVXkG4i3oq6iZQz7ULCMBJtX787xXb5U2U" />
                            <div
                                class="absolute inset-0 bg-black/40 opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-center justify-center">
                                <span class="text-white font-headline font-bold text-sm">Wisuda</span>
                            </div>
                        </div>
                        <div class="relative group overflow-hidden rounded-xl aspect-[3/4]">
                            <img alt="Library"
                                class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110"
                                src="https://lh3.googleusercontent.com/aida-public/AB6AXuCtGugbkqURT-lnLALAu7uoSh9_iJzX7v5gzJ1IWwgDY6eH3pCE3tOTI9tUzCaml00gNeWkOk07DosSdadwbNsekXNmUrXodrMOPaOZAlxsW68V0Bm_Eh8GPnB-dEtGnUDUMUSPBAxshTKxw0t9KEotsiPz4f8iyZoO7NBx2LNNAGKOASF8Hc0Xsc-i89D-2-8BDqpWxSavktp_lBYFSXc2GzqjVMBaLfkvScgJ13DgXaYDOCj8LIZfQGrbsW6p0WnNOSle37oSqHY" />
                            <div
                                class="absolute inset-0 bg-black/40 opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-center justify-center">
                                <span class="text-white font-headline font-bold text-sm">Perpustakaan</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="mt-16 text-center">
                    <button
                        class="bg-primary-container text-on-primary-container px-10 py-4 rounded-xl font-headline font-bold hover:bg-primary hover:text-white transition-all duration-300">
                        Lihat Galeri Lengkap
                    </button>
                </div>
            </div>
        </section>
        <!-- News Grid -->
        <section class="py-24 bg-surface-container-lowest">
            <div class="max-w-7xl mx-auto px-8">
                <div class="flex justify-between items-end mb-16">
                    <div>
                        <span
                            class="text-primary font-headline font-bold text-sm tracking-widest uppercase mb-4 block">Kabar
                            Sekolah</span>
                        <h2 class="text-on-surface text-4xl font-headline font-bold">Berita &amp; Artikel Terbaru</h2>
                    </div>
                    <button
                        class="hidden md:block text-primary font-headline font-bold border-b-2 border-primary">Lihat
                        Semua Berita</button>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-12">
                    <!-- News Card 1 -->
                    <div class="group cursor-pointer">
                        <div class="overflow-hidden rounded-xl mb-6 aspect-video bg-surface-container">
                            <img alt="Tech competition"
                                class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500"
                                src="https://lh3.googleusercontent.com/aida-public/AB6AXuAjz04dJsLm0Avd61CWQlrOMZLatTf7TU7rJeSzdTJGoiRZGdsstXMPGjEgQ5Tr9SbAofFFh3LLzSDE3NHI8hlcL3KwW_DHlbqCcGvtjvMwW5Zv1saNMo673NBycxeJ6gvxjxK6m7jKwgAuJHXAvCqLhCA0VdEaPTmyirvE9af3reT3w6M8tliMznxgSG1piVYEeyy8kkRT-sqeGfpKtMqtFYykBh7zYgMiew9P1JCic39n9RUAGu8hLoylVWyVQQvLfnxm7DH37l4" />
                        </div>
                        <p class="text-primary font-headline font-bold text-xs uppercase tracking-widest mb-3">Prestasi
                        </p>
                        <h4
                            class="text-on-surface text-xl font-headline font-bold mb-4 group-hover:text-primary transition-colors">
                            Juara Umum Kompetisi Robotik Nasional 2024</h4>
                        <p class="text-on-surface-variant line-clamp-2 mb-6">Tim robotik kami berhasil menyabet gelar
                            juara umum setelah mengalahkan 50 sekolah di seluruh Indonesia.</p>
                        <span
                            class="text-primary font-headline font-bold text-sm inline-flex items-center gap-2 group-hover:gap-4 transition-all">Baca
                            Selengkapnya <span class="material-symbols-outlined text-sm">east</span></span>
                    </div>
                    <!-- News Card 2 -->
                    <div class="group cursor-pointer">
                        <div class="overflow-hidden rounded-xl mb-6 aspect-video bg-surface-container">
                            <img alt="Library"
                                class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500"
                                src="https://lh3.googleusercontent.com/aida-public/AB6AXuCAJa_O8ZhnJxjhA01r--MAayaOgzdxdu90jzZBZaebQefS7GuhFZi1PGLbtNosTviPFLogOKCPibpokFe9azdQjRZMuOULQ5SelE-u9D_2r7C4t4Y7Pus_d9InaDNlUiVA43X9vkqFKUuN_RIEu2PE8ykKicxoSyVft2qKkoYKDQTkTgjJT6jAdBtEYGWj3CD2r8JG2s71TUKMKaaU9wCtESOUznpdGUr_Mp3uHYucRkXd24hrScpr7ccUsyLQ7h-RyKCOt509QyM" />
                        </div>
                        <p class="text-primary font-headline font-bold text-xs uppercase tracking-widest mb-3">Akademik
                        </p>
                        <h4
                            class="text-on-surface text-xl font-headline font-bold mb-4 group-hover:text-primary transition-colors">
                            Penerapan Kurikulum Internasional Terbaru</h4>
                        <p class="text-on-surface-variant line-clamp-2 mb-6">Mulai semester depan, kami secara resmi
                            mengadopsi standar internasional untuk mata pelajaran sains dan matematika.</p>
                        <span
                            class="text-primary font-headline font-bold text-sm inline-flex items-center gap-2 group-hover:gap-4 transition-all">Baca
                            Selengkapnya <span class="material-symbols-outlined text-sm">east</span></span>
                    </div>
                    <!-- News Card 3 -->
                    <div class="group cursor-pointer">
                        <div class="overflow-hidden rounded-xl mb-6 aspect-video bg-surface-container">
                            <img alt="School Festival"
                                class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500"
                                src="https://lh3.googleusercontent.com/aida-public/AB6AXuBs-KRv3tMzJ2CK6AURl5UkxjwoHcEE1_5KMPiyyGPAE7XypQXmgwOyWDsSg8-vZB5HFi2RmeLMKR_4Rjq2KlOLKqPEBcZPATlAcntLjQKetlTH_MfIlnrril6hcmY11VWwBMBlHeLOLI1gafhz5lZ52ata_xQXgoeJ1MWTblJlIrD84sa1PeuzbUI-_7FzLnCRVA0ppz7aJkNRTrPgggmDq35zkC9lIvN-AacyUUB_rfou-i-eH_WtMqt93NWdHXyErZ7QydmWbJ8" />
                        </div>
                        <p class="text-primary font-headline font-bold text-xs uppercase tracking-widest mb-3">Acara
                        </p>
                        <h4
                            class="text-on-surface text-xl font-headline font-bold mb-4 group-hover:text-primary transition-colors">
                            Festival Budaya Tahunan 2024</h4>
                        <p class="text-on-surface-variant line-clamp-2 mb-6">Kemeriahan festival budaya yang
                            menampilkan bakat seni dan kuliner nusantara dari seluruh siswa-siswi kami.</p>
                        <span
                            class="text-primary font-headline font-bold text-sm inline-flex items-center gap-2 group-hover:gap-4 transition-all">Baca
                            Selengkapnya <span class="material-symbols-outlined text-sm">east</span></span>
                    </div>
                </div>
            </div>
        </section>
        <!-- FAQ Section -->
        <section class="py-24 bg-surface-container-low">
            <div class="max-w-4xl mx-auto px-8">
                <div class="text-center mb-16">
                    <span
                        class="text-primary font-headline font-bold text-sm tracking-widest uppercase mb-4 block">Bantuan</span>
                    <h2 class="text-on-surface text-4xl font-headline font-bold mb-4">Pertanyaan Umum</h2>
                    <p class="text-on-surface-variant">Temukan jawaban untuk pertanyaan yang paling sering ditanyakan
                        mengenai sekolah kami.</p>
                </div>
                <div class="space-y-4">
                    <div class="bg-surface-container-lowest rounded-xl p-6 border border-outline-variant/10">
                        <details class="group">
                            <summary
                                class="flex justify-between items-center cursor-pointer list-none font-headline font-bold text-lg text-on-surface">
                                Bagaimana prosedur pendaftaran siswa baru?
                                <span
                                    class="material-symbols-outlined transition-transform duration-300 group-open:rotate-180">expand_more</span>
                            </summary>
                            <div class="pt-4 text-on-surface-variant font-body leading-relaxed">
                                Prosedur pendaftaran dapat dilakukan secara online melalui portal PPDB kami atau datang
                                langsung ke sekretariat pendaftaran di kampus utama pada jam kerja (08:00 - 15:00).
                            </div>
                        </details>
                    </div>
                    <div class="bg-surface-container-lowest rounded-xl p-6 border border-outline-variant/10">
                        <details class="group">
                            <summary
                                class="flex justify-between items-center cursor-pointer list-none font-headline font-bold text-lg text-on-surface">
                                Apakah tersedia beasiswa untuk siswa berprestasi?
                                <span
                                    class="material-symbols-outlined transition-transform duration-300 group-open:rotate-180">expand_more</span>
                            </summary>
                            <div class="pt-4 text-on-surface-variant font-body leading-relaxed">
                                Ya, kami menyediakan berbagai jalur beasiswa mulai dari beasiswa akademik, non-akademik
                                (seni &amp; olahraga), hingga bantuan finansial bagi keluarga yang membutuhkan.
                            </div>
                        </details>
                    </div>
                    <div class="bg-surface-container-lowest rounded-xl p-6 border border-outline-variant/10">
                        <details class="group">
                            <summary
                                class="flex justify-between items-center cursor-pointer list-none font-headline font-bold text-lg text-on-surface">
                                Fasilitas apa saja yang mendukung pembelajaran digital?
                                <span
                                    class="material-symbols-outlined transition-transform duration-300 group-open:rotate-180">expand_more</span>
                            </summary>
                            <div class="pt-4 text-on-surface-variant font-body leading-relaxed">
                                Seluruh ruang kelas dilengkapi dengan smart board, akses Wi-Fi berkecepatan tinggi,
                                laboratorium komputer multimedia, serta sistem manajemen pembelajaran (LMS) berbasis
                                cloud.
                            </div>
                        </details>
                    </div>
                </div>
            </div>
        </section>
        <!-- CTA Section -->
        <section class="py-24 max-w-7xl mx-auto px-8">
            <div class="relative bg-primary rounded-[2.5rem] overflow-hidden p-12 md:p-24 text-center shadow-2xl">
                <div class="absolute inset-0 opacity-20">
                    <div class="absolute inset-0 bg-[radial-gradient(circle_at_top_right,_#ffffff,_transparent)]">
                    </div>
                </div>
                <div class="relative z-10">
                    <h2 class="text-white text-4xl md:text-5xl font-headline font-black mb-8">Bergabung Bersama Kami
                        Sekarang</h2>
                    <p class="text-primary-container text-lg max-w-2xl mx-auto mb-12">Jadilah bagian dari komunitas
                        pendidikan yang inspiratif dan mulailah perjalanan akademik Anda menuju masa depan yang gemilang
                        di SMA Harapan Jaya.</p>
                    <div class="flex flex-col sm:flex-row justify-center gap-6">
                        <button
                            class="bg-white text-primary px-10 py-5 rounded-xl font-headline font-black text-lg hover:scale-105 transition-all shadow-xl">Daftar
                            Sekarang</button>
                        <button
                            class="bg-transparent text-white border-2 border-white/30 px-10 py-5 rounded-xl font-headline font-bold text-lg hover:bg-white/10 transition-all">Hubungi
                            Admission</button>
                    </div>
                </div>
            </div>
        </section>
    </main>
    <!-- Footer -->
    <footer class="bg-primary text-on-primary w-full rounded-t-[2.5rem] mt-20">
        <div
            class="grid grid-cols-1 md:grid-cols-4 gap-12 px-12 py-16 max-w-7xl mx-auto font-inter text-sm leading-relaxed">
            <div class="md:col-span-1">
                <div class="flex items-center gap-2 mb-6">
                    <img alt="Logo" class="w-10 h-10 object-contain brightness-0 invert"
                        src="https://lh3.googleusercontent.com/aida/ADBb0ujeWkuz4ycn39PIIznn1vISNTvRETPxUCcowf9F1Rwejiqn3nd5N0shHOcFwP94VFhDkoWS2g6SjDSfSRzA_Z587Cq_dUQfkE5GBsp2LNbKKbzb37srre9ntZTA2_HTGYKnwUVDgczaynchEsAq2rfptiWxhFybKec6Uk5RWDHlvhz4Qd2dGWHA5MngfRll3MFZpxx298aPiY3UQQu9U_blCYDeT3kMgAIP-1rUucujUDAMewAnchcAqN1ADhphx7qYcOQXDoPeUQ" />
                    <div class="font-manrope font-black text-xl text-white">Harapan Jaya</div>
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
                    <li><a class="text-white/80 hover:text-white transition-colors" href="#">Visi &amp; Misi</a>
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
            <p class="text-white/60">© 2024 SMA Harapan Jaya. Cultivating Excellence through Innovation and Integrity.
            </p>
        </div>
    </footer>
</body>

</html>
