<?php

use App\Http\Controllers\Admin\DashboardController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User\HomeController as UserHomeController;
use App\Http\Controllers\User\ProductController as UserProductController;
use App\Http\Controllers\User\CartController as UserCartController;
use App\Http\Controllers\User\CheckoutController as UserCheckoutController;
use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\Admin\ProductController as AdminProductController;
use App\Http\Controllers\Admin\CategoryController as AdminCategoryController;
use App\Http\Controllers\Admin\ColorController as AdminColorController;
use Illuminate\Support\Facades\Auth;

// Halaman Welcome Default (opsional)
Route::get('/', function () {
    return view('welcome');
});

// User routes
Route::middleware(['auth'])->group(function () {
    Route::get('/home', [UserHomeController::class, 'index'])->name('home');
    Route::get('/produk/{id}', [UserProductController::class, 'show'])->name('product.show');
    Route::get('/cart', [UserCartController::class, 'index'])->name('cart.index');
    Route::get('/checkout', [UserCheckoutController::class, 'index'])->name('checkout.index');
});

// Admin routes
Route::middleware(['auth', ' admin'])->group(function () {
    Route::get('/admin/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');
    Route::resource('/products', AdminProductController::class);
    Route::resource('/categories', AdminCategoryController::class);
    Route::resource('/colors', AdminColorController::class);
});

// Auth
Auth::routes();

Route::post('/logout', function () {
    Auth::logout();
    return redirect('/login');
})->name('logout');
