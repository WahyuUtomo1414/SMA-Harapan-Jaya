<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        return view('pages.home');
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
