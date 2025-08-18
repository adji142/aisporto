<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

class LandingController extends Controller {
    public function index() {
        $meta = [
            'title' => 'Nama Anda — Portfolio',
            'description' => 'Deskripsi singkat jasa / portfolio Anda',
            'image' => asset('images/og-image.png'),
        ];
        return view('landing.index', compact('meta'));
    }
}
