<?php

use App\Http\Controllers\PublicPageController;
use App\Http\Controllers\SitemapController;
use Illuminate\Support\Facades\Route;

// Public Architectural SSR Pages
Route::get('/', [PublicPageController::class, 'home'])->name('home');

Route::prefix('projects')->name('projects.')->group(function () {
    Route::get('/', [PublicPageController::class, 'projectsIndex'])->name('index');
    Route::get('/{slug}', [PublicPageController::class, 'projectShow'])->name('show');
});

Route::prefix('services')->name('services.')->group(function () {
    Route::get('/', [PublicPageController::class, 'servicesIndex'])->name('index');
    Route::get('/{slug}', [PublicPageController::class, 'serviceShow'])->name('show');
});

Route::get('/about', [PublicPageController::class, 'about'])->name('about');
Route::get('/process', [PublicPageController::class, 'process'])->name('process');
Route::get('/contact', [PublicPageController::class, 'contact'])->name('contact');
Route::post('/contact/inquiry', [PublicPageController::class, 'submitInquiry'])
    ->middleware('throttle:5,1')
    ->name('contact.inquiry');

Route::prefix('insights')->name('insights.')->group(function () {
    Route::get('/', [PublicPageController::class, 'insightsIndex'])->name('index');
    Route::get('/{slug}', [PublicPageController::class, 'insightShow'])->name('show');
});

// Dynamic XML Sitemap
Route::get('/sitemap.xml', [SitemapController::class, 'index'])->name('sitemap');

// Authenticated Application (Inertia Dashboard)
Route::middleware(['auth', 'verified'])->group(function () {
    Route::inertia('dashboard', 'dashboard')->name('dashboard');
});

require __DIR__.'/settings.php';
