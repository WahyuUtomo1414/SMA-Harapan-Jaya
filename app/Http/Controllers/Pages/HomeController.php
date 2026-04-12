<?php

namespace App\Http\Controllers\Pages;

use App\Http\Controllers\Controller;
use App\Models\Faq;

class HomeController extends Controller
{
    public function index()
    {
        $faqs = Faq::where('status', true)->get();
        return view('pages.home', compact('faqs'));
    }
}
