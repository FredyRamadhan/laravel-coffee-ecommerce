<?php

use App\Http\Controllers\CartItemController;
use App\Http\Controllers\OrderHistoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home', ['title'=>'Beranda']);
})->name('home');

Route::get('/dashboard', function () {
    return view('dashboard', ['title'=> 'Dashboard']);
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});



Route::get('/products', function() {
    return view('products', ['title'=>'Katalog']);
})->name('products');


// Route::get('/products', [ProductController::class, 'index'])->name('products');
// Route::get('/products/{slug}', [ProductController::class, 'product'])->name('product');
// Route::post('/products/{slug}/addToCart', [CartItemController::class, 'store'])->name('addToCart');
// Route::get('/cart', [CartItemController::class, 'index'])->name('cart');
// Route::get('/cart/delete', [CartItemController::class, 'update'])->name('edit');
// Route::post('/cart/delete', [CartItemController::class, 'update'])->name('deleteCart');
// Route::get('/checkout', [OrderHistoryController::class, 'store'])->name('checkout');

Route::view('/cart', 'cart', ['title'=>'Keranjang'])->name('cart');
Route::view('/about', 'about', ['title'=>'Tentang Kami'])->name('about');
Route::view('/docs', 'docs', ['title'=>'Dokumentasi'])->name('docs');

Route::get('/test/{input}', [ProductController::class,'test'])->name('test');



require __DIR__.'/auth.php';