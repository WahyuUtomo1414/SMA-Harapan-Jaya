<?php

namespace App\Http\Controllers\Pages;

use App\Http\Controllers\Controller;
use App\Models\Faq;
use App\Models\Blog;

class HomeController extends Controller
{
    public function index()
    {
        $faqs = Faq::where('status', true)->get();
        $latestBlogs = Blog::with('kategori')
            ->where('status', true)
            ->latest()
            ->take(3)
            ->get();
            
        return view('pages.home', compact('faqs', 'latestBlogs'));
    }
}
