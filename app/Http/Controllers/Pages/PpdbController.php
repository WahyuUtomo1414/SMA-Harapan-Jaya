<?php

namespace App\Http\Controllers\Pages;

use App\Http\Controllers\Controller;

class PpdbController extends Controller
{
    public function index()
    {
        return view('pages.ppdb');
    }
}
