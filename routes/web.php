<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// User routes
Route::get('/', [User\HomeController::class, 'index'])->name('home');
Route::get('/produk/{id}', [User\ProductController::class, 'show']);
Route::get('/cart', [User\CartController::class, 'index']);
Route::get('/checkout', [User\CheckoutController::class, 'index']);

// Admin routes
Route::middleware(['auth', 'admin'])->prefix('admin')->group(function () {
    Route::get('/dashboard', [Admin\DashboardController::class, 'index']);
    Route::resource('/products', Admin\ProductController::class);
    Route::resource('/colors', Admin\ColorController::class);
    Route::resource('/categories', Admin\CategoryController::class);
});

Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/admin', [App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('admin.dashboard');