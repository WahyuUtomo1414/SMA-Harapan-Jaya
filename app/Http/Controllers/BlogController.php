<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index()
    {
        $categories = Kategori::where('status', true)->get();
        
        // Dummy blog data for UI testing as requested
        $blogs = collect([
            (object)[
                'title' => 'Membangun Karakter Melalui Pendidikan Nilai',
                'excerpt' => 'Pendidikan bukan sekadar transfer ilmu pengetahuan, melainkan proses pembentukan karakter yang berintegritas dan luhur.',
                'image' => 'https://images.unsplash.com/photo-1523050335392-93851179ae22?q=80&w=2067&auto=format&fit=crop',
                'category' => 'Pendidikan',
                'date' => '12 April 2026',
                'slug' => 'membangun-karakter'
            ],
            (object)[
                'title' => 'Inovasi Digital dalam Pembelajaran Modern',
                'excerpt' => 'Bagaimana SMA Harapan Jaya mengintegrasikan teknologi terkini untuk menciptakan pengalaman belajar yang interaktif.',
                'image' => 'https://images.unsplash.com/photo-1516321318423-f06f85e504b3?q=80&w=2070&auto=format&fit=crop',
                'category' => 'Teknologi',
                'date' => '10 April 2026',
                'slug' => 'inovasi-digital'
            ],
            (object)[
                'title' => 'Prestasi Siswa di Kancah Internasional',
                'excerpt' => 'Kisah inspiratif para siswa yang berhasil mengharumkan nama sekolah dan bangsa melalui kompetisi sains tingkat dunia.',
                'image' => 'https://images.unsplash.com/photo-1523240795612-9a054b0db644?q=80&w=2070&auto=format&fit=crop',
                'category' => 'Prestasi',
                'date' => '08 April 2026',
                'slug' => 'prestasi-internasional'
            ],
        ]);

        return view('pages.blog.index', compact('categories', 'blogs'));
    }

    public function show($slug)
    {
        // Dummy blog detail for UI testing
        $blog = (object)[
            'title' => 'Membangun Karakter Melalui Pendidikan Nilai',
            'content' => '<p>SMA Harapan Jaya berkomitmen untuk tidak hanya mencetak lulusan yang cerdas secara intelektual, tetapi juga memiliki kedalaman karakter. Pendidikan karakter di sekolah kami diintegrasikan dalam setiap aspek pembelajaran.</p><p>Melalui berbagai kegiatan kokurikuler dan ekstrakurikuler, siswa diajak untuk mempraktikkan nilai-nilai kejujuran, disiplin, dan tanggung jawab dalam kehidupan sehari-hari.</p>',
            'image' => 'https://images.unsplash.com/photo-1523050335392-93851179ae22?q=80&w=2067&auto=format&fit=crop',
            'category' => 'Pendidikan',
            'date' => '12 April 2026',
            'author' => 'Admin Sekolah'
        ];

        return view('pages.blog.show', compact('blog'));
    }
}
