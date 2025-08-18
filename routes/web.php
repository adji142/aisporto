<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LandingController;
use App\Http\Controllers\LandingPageController;


// Setting
Route::post('/toggle-dark-mode', function () {
    session(['filament.dark_mode' => !session('filament.dark_mode', false)]);
    return back();
})->name('toggle-dark-mode');

Route::get('/', [LandingPageController::class, 'index'])->name('landing');

Route::get('/portfolio', [LandingPageController::class, 'portofolio'])->name('portfolio');
Route::get('/portfolio/{slug}', [LandingPageController::class, 'portfoliodetail'])->name('portfolio.detail');

Route::get('/blog', [LandingPageController::class, 'blog'])->name('blog');
Route::get('/blog/{slug}', [LandingPageController::class, 'blogdetail'])->name('blog.detail');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

require __DIR__.'/auth.php';
