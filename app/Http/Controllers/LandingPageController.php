<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SiteSetting;
use App\Models\Service;
use App\Models\HighlightProduct;
use App\Models\Portfolio;
use App\Models\Blog;

class LandingPageController extends Controller
{
    public function index()
    {
        // Ambil site setting pertama (atau sesuai ID)
        $siteSetting = SiteSetting::with('banners')->first();
        $services = Service::orderBy('id', 'asc')->get();
        $highlight = HighlightProduct::first();
        $portfolios = Portfolio::latest()->take(6)->get();
        $blogs = Blog::latest()->take(3)->get();

        return view('frontend.index', compact('siteSetting','services','highlight','portfolios','blogs'));
    }

    public function portofolio(){
        $portfolios = Portfolio::latest()->paginate(6);
        $siteSetting = SiteSetting::with('banners')->first();
        return view('frontend.portofolio', compact('portfolios','siteSetting'));
    }

    public function portfoliodetail($slug){
        $portfolio = Portfolio::where('slug', $slug)
                    ->with('images')
                    ->firstOrFail();
        $siteSetting = SiteSetting::with('banners')->first();
        return view('frontend.portofolio-detail', compact('portfolio','siteSetting'));
    }

    public function blog(){
        $blog = Blog::latest()->paginate(6);
        $siteSetting = SiteSetting::with('banners')->first();
        return view('frontend.blog', compact('blog','siteSetting'));
    }

    public function blogdetail($slug){
        $blog = Blog::where('slug', $slug)
                    ->firstOrFail();
        $siteSetting = SiteSetting::with('banners')->first();
        return view('frontend.blog-detail', compact('blog','siteSetting'));
    }
}
