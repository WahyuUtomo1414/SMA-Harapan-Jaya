<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Kategori;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index(Request $request)
    {
        $categories = Kategori::where('status', true)->get();
        
        $query = Blog::with('kategori')->where('status', true);

        if ($request->has('category')) {
            $query->whereHas('kategori', function($q) use ($request) {
                $q->where('nama', $request->category);
            });
        }

        if ($request->has('search')) {
            $query->where('title', 'like', '%' . $request->search . '%');
        }

        $blogs = $query->latest()->paginate(9);

        return view('pages.blog.index', compact('categories', 'blogs'));
    }

    public function show($slug)
    {
        $blog = Blog::with('kategori')
            ->where('slug', $slug)
            ->where('status', true)
            ->firstOrFail();

        $relatedBlogs = Blog::where('kategori_id', $blog->kategori_id)
            ->where('id', '!=', $blog->id)
            ->where('status', true)
            ->limit(3)
            ->get();

        return view('pages.blog.show', compact('blog', 'relatedBlogs'));
    }
}
