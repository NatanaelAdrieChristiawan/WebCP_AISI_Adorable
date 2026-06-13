<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\GalleryController;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/company', [CompanyController::class, 'index'])->name('company');
Route::get('/products', [ProductController::class, 'index'])->name('products.index');
Route::get('/products/{slug}', [ProductController::class, 'show'])->name('products.show');
Route::get('/blog', [BlogController::class, 'index'])->name('blog.index');
Route::get('/blog/{slug}', [BlogController::class, 'show'])->name('blog.show');
Route::get('/gallery', [GalleryController::class, 'index'])->name('gallery.index');
Route::get('/contact', [ContactController::class, 'index'])->name('contact.index');
Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');

// Serve private or public certificate files
Route::get('/certifications/view/{filename}', function (string $filename) {
    $path = 'certifications/' . $filename;
    if (Storage::disk('public')->exists($path)) {
        return Storage::disk('public')->response($path);
    }
    if (Storage::disk('local')->exists($path)) {
        return Storage::disk('local')->response($path);
    }
    abort(404);
})->name('certification.file')->where('filename', '[^/]+');
