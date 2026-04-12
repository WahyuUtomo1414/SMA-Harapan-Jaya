<?php

namespace App\Http\Controllers;

use App\Models\Faq;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $faqs = Faq::where('status', true)->get();
        return view('pages.home', compact('faqs'));
    }

    public function tentangKami()
    {
        return view('pages.tentang-kami');
    }

    public function ppdb()
    {
        return view('pages.ppdb');
    }
}
