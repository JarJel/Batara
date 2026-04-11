<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\OrderController;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    return view('welcome');
});

// halaman register
Route::get('/register', [AuthController::class, 'indexRegister'])->name('register');

// proses register
Route::post('/register', [AuthController::class, 'store'])->name('register.store');

// halaman login (opsional)
Route::get('/login', [AuthController::class, 'indexLogin'])->name('login');

// proses login
Route::post('/login', [AuthController::class, 'login'])->name('login.store');

// logout
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

//HomePage
Route::get('/', [HomeController::class, 'index']);

//product
Route::get('/produk', [ProdukController::class, 'index'])->name('homepage.home');

//Cart
Route::post('/cart/add', [CartController::class, 'add'])->name('cart.add')->middleware('auth');
Route::get('/cart', [CartController::class, 'index'])->name('cart.index')->middleware('auth');
Route::delete('/cart/{id}', [CartController::class, 'delete'])->name('cart.delete');

// checkout
Route::get('/checkout', [OrderController::class, 'checkout'])->name('checkout');
Route::post('/checkout/process', [OrderController::class, 'processCheckout'])->name('checkout.process');

// buy now
Route::post('/buy-now', [OrderController::class, 'buyNow'])->name('buy.now');

//History
Route::get('/orders', [OrderController::class, 'history'])->name('orders.history');
Route::get('/orders/{id}', [OrderController::class, 'detail'])->name('orders.detail');