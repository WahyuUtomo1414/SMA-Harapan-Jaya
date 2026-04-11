# Frontend Development Guide — SMA Harapan Jaya

Dokumen ini menjelaskan standar konversi template dari `fe_code/` menjadi Laravel Blade, termasuk setup Tailwind CSS, struktur layout, dan komponen frontend untuk website SMA Harapan Jaya.

---

## 1. Setup Tailwind CSS (Vite)

Gunakan Tailwind CSS v4 dengan plugin Vite. Konfigurasi tema dipindahkan ke `app.css`.

```js
// vite.config.js
import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import tailwindcss from '@tailwindcss/vite';

export default defineConfig({
    plugins: [
        laravel({ input: ['resources/css/app.css', 'resources/js/app.js'], refresh: true }),
        tailwindcss(),
    ],
});
```

Di `resources/css/app.css`:
```css
@import "tailwindcss";

@theme {
    --font-headline: 'Manrope', sans-serif;
    --font-body: 'Inter', sans-serif;

    --color-primary: #008542;
    --color-primary-container: #b9f3cd;
    --color-secondary: #416656;
    --color-tertiary: #4a2400;
    --color-background: #fdf9e9;
    --color-surface: #fdf9e9;
    --color-on-surface: #1c1c13;
    --color-outline-variant: #bfc9c3;
}
```

---

## 2. Struktur Direktori Views

```
resources/views/
│
├── layouts/
│   └── app.blade.php            # Layout utama
│
├── components/
│   ├── navbar.blade.php         # Navbar SMA Harapan Jaya
│   └── footer.blade.php         # Footer SMA Harapan Jaya
│
├── sections/                    # Pecahan section per halaman
│   ├── home/
│   │   ├── hero.blade.php
│   │   ├── about.blade.php
│   │   ├── stats.blade.php
│   │   ├── gallery.blade.php
│   │   ├── news.blade.php
│   │   ├── faq.blade.php
│   │   └── cta.blade.php
│   ├── tentang-kami/
│   │   ├── hero.blade.php
│   │   ├── visi-misi.blade.php
│   │   ├── organisasi.blade.php
│   │   └── legalitas.blade.php
│   ├── ppdb/
│   │   ├── hero.blade.php
│   │   ├── alur.blade.php
│   │   ├── timeline.blade.php
│   │   └── persyaratan.blade.php
│   └── blog/
│       ├── header.blade.php
│       ├── filter.blade.php
│       └── grid.blade.php
│
└── pages/                       # View halaman utama (entry point)
    ├── home.blade.php
    ├── tentang-kami.blade.php
    ├── ppdb.blade.php
    └── blog/
        └── index.blade.php
```

---

## 3. Pemetaan Template

| Template Original        | Laravel Blade View                  |
|--------------------------|-------------------------------------|
| `home.blade.php`         | `pages/home.blade.php`              |
| `tentang_kami.blade.php` | `pages/tentang-kami.blade.php`      |
| `ppdb.blade.php`         | `pages/ppdb.blade.php`              |
| `blog.blade.php`         | `pages/blog/index.blade.php`        |

---

## 4. Komponen Utama (Snippets)

### Navbar (`components/navbar.blade.php`)
Menggunakan skema warna SMA Harapan Jaya dengan logo dan navigasi dinamis.

### Footer (`components/footer.blade.php`)
Footer dengan informasi kontak, navigasi cepat, dan newsletter.

---

## 5. Checklist Konversi
- [ ] Implementasikan `layouts/app.blade.php` dengan @yield('content')
- [ ] Pecah `home.blade.php` menjadi section-section kecil di `sections/home/`
- [ ] Pecah `tentang_kami.blade.php` menjadi section-section di `sections/tentang-kami/`
- [ ] Pecah `ppdb.blade.php` menjadi section-section di `sections/ppdb/`
- [ ] Pecah `blog.blade.php` menjadi section-section di `sections/blog/`
- [ ] Pastikan semua aset gambar menggunakan URL dari template original.
