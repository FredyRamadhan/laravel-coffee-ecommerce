<?php

use App\Http\Controllers\AddressController;
use App\Http\Controllers\CartItemController;
use App\Http\Controllers\OrderHistoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RatingController;
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

// Public routes
Route::get('/products', [ProductController::class,'index'])->name('products');
Route::get('/products/{slug}', [ProductController::class, 'product'])->name('product');
Route::post('/products/{slug}/addToCart', [CartItemController::class, 'store'])->name('addToCart');
Route::get('/cart', [CartItemController::class, 'index'])->name('cart');
Route::post('/cart/update', [CartItemController::class, 'update'])->name('cart.update');
Route::get('/checkout', [CartItemController::class, 'checkout'])->name('checkout');
Route::post('/checkout', [OrderHistoryController::class, 'checkout'])->name('checkout.process');
Route::get('/invoice/{orderNumber}', [OrderHistoryController::class, 'invoice'])->name('invoice');
Route::get('/order-history', [OrderHistoryController::class, 'index'])->name('order.history');
Route::post('/order-history/{orderHistoryId}/rate', [RatingController::class, 'store'])->name('rating.store');
Route::get('/address', [AddressController::class, 'index'])->name('address.index');
Route::post('/address', [AddressController::class, 'store'])->name('address.store');
Route::get('/api/shipping-cost', [AddressController::class, 'getShippingCost'])->name('api.shipping-cost');



Route::view('/about', 'about', ['title'=>'Tentang Kami'])->name('about');
Route::view('/docs', 'docs', ['title'=>'Dokumentasi'])->name('docs');

Route::get('/test/{input}', [ProductController::class,'test'])->name('test');

require __DIR__.'/auth.php';