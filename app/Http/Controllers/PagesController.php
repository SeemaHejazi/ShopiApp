<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function index() {
        $title = 'Welcome';
        return view('pages.index')->with('title', $title);
    }

    public function about() {
        $title = 'About Me';
        return view('pages.about')->with('title', $title);
    }
}
