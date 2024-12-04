<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\CartController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Admin\CategoryController;

// Public routes
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/menu', [MenuController::class, 'index'])->name('menu');
Route::get('/cart', [CartController::class, 'index'])->name('cart');

// Admin routes
Route::middleware(['admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');
    Route::resource('categories', CategoryController::class);
    // other routes here
});



require __DIR__.'/auth.php';
