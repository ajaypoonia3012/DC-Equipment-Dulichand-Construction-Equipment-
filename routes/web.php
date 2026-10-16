<?php

use App\Http\Controllers\PageController;
use App\Http\Controllers\EnquiryController;
use Illuminate\Support\Facades\Route;

// Public Corporate Website Routes
Route::get('/', [PageController::class, 'home'])->name('home');
Route::get('/about', [PageController::class, 'about'])->name('about');

// Products & Equipment
Route::get('/products', [PageController::class, 'products'])->name('products');
Route::get('/products/{slug}', [PageController::class, 'productDetail'])->name('products.detail');

// DCP Construction Chemicals
Route::get('/chemicals', [PageController::class, 'chemicals'])->name('chemicals');

// Workshop & Field Services
Route::get('/services', [PageController::class, 'services'])->name('services');
Route::get('/services/{slug}', [PageController::class, 'serviceDetail'])->name('services.detail');

// Projects & Client References
Route::get('/projects', [PageController::class, 'projects'])->name('projects');

// Contact & Quote
Route::get('/contact', [PageController::class, 'contact'])->name('contact');

// Lead / Quote Submission
Route::post('/enquiry', [EnquiryController::class, 'store'])->name('enquiry.store');
