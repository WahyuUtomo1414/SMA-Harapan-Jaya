<?php

namespace App\Http\Controllers\Pages;

use App\Http\Controllers\Controller;
use App\Models\Faq;
use App\Models\Blog;
use App\Models\Gallery;

class HomeController extends Controller
{
    // URL dummy foto sekolah (fallback jika galeri kosong/kurang dari 8)
    private const DUMMY_PHOTOS = [
        'https://images.unsplash.com/photo-1580582932707-520aed937b7b?q=80&w=800&auto=format&fit=crop',
        'https://images.unsplash.com/photo-1523050854058-8df90110c9f1?q=80&w=800&auto=format&fit=crop',
        'https://images.unsplash.com/photo-1427504494785-3a9ca7044f45?q=80&w=800&auto=format&fit=crop',
        'https://images.unsplash.com/photo-1509062522246-3755977927d7?q=80&w=800&auto=format&fit=crop',
        'https://images.unsplash.com/photo-1571260899304-425eee4c7efc?q=80&w=800&auto=format&fit=crop',
        'https://images.unsplash.com/photo-1544717297-fa95b6ee9643?q=80&w=800&auto=format&fit=crop',
        'https://images.unsplash.com/photo-1503676260728-1c00da094a0b?q=80&w=800&auto=format&fit=crop',
        'https://images.unsplash.com/photo-1606761568499-6d2451b23c66?q=80&w=800&auto=format&fit=crop',
    ];

    public function index()
    {
        $faqs = Faq::where('status', true)->get();

        $latestBlogs = Blog::with('kategori')
            ->where('status', true)
            ->latest()
            ->take(3)
            ->get();

        // Ambil 8 foto galeri aktif, sisanya isi dengan dummy
        $dbPhotos = Gallery::where('status', true)
            ->latest()
            ->take(8)
            ->pluck('foto')
            ->map(fn ($path) => asset('storage/' . $path))
            ->toArray();

        $galleryPhotos = array_slice(
            array_merge($dbPhotos, self::DUMMY_PHOTOS),
            0,
            8
        );

        return view('pages.home', compact('faqs', 'latestBlogs', 'galleryPhotos'));
    }
}
