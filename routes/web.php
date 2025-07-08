<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\LoadingController;
use App\Http\Controllers\CartController;
use Illuminate\Support\Facades\Route;

Route::get('/', [LoadingController::class, 'index'])->name('loading');

Route::get('/store', function () {
    return view('store');
})->name('store');

Route::get('/products', function () {
    return view('products');
})->name('products');

// Rutas del carrito
Route::prefix('cart')->group(function () {
    Route::get('/', [CartController::class, 'index'])->name('cart');
    Route::post('/add', [CartController::class, 'add'])->name('cart.add');
    Route::put('/update/{item}', [CartController::class, 'update'])->name('cart.update');
    Route::delete('/remove/{item}', [CartController::class, 'remove'])->name('cart.remove');
    Route::delete('/clear', [CartController::class, 'clear'])->name('cart.clear');
    Route::get('/info', [CartController::class, 'info'])->name('cart.info');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
