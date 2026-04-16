<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Seller\DashboardController;
use App\Http\Controllers\Seller\SellerProductController;
use App\Http\Controllers\Seller\TokoController;
use App\Http\Controllers\Seller\PesananController;
use App\Http\Controllers\Seller\PengaturanController;
use App\Http\Controllers\Seller\KeuanganController;

// ======================
// HOME
// ======================
Route::get('/', [HomeController::class, 'index'])->name('home');

// ======================
// AUTH
// ======================
Route::get('/register', [AuthController::class, 'indexRegister'])->name('register');
Route::post('/register', [AuthController::class, 'store'])->name('register.store');

Route::get('/login', [AuthController::class, 'indexLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.store');

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// ======================
// PRODUK (PUBLIC)
// ======================
Route::get('/produk', [ProdukController::class, 'index'])->name('produk.index');
Route::get('/produk/{id}', [ProdukController::class, 'show'])->name('produk.show');

// ======================
// CART
// ======================
Route::middleware(['auth'])->group(function () {
    Route::post('/cart/add', [CartController::class, 'add'])->name('cart.add');
    Route::get('/cart', [CartController::class, 'index'])->name('user.cart.index');
    Route::delete('/cart/{id}', [CartController::class, 'delete'])->name('cart.delete');
});

// ======================
// CHECKOUT
// ======================
Route::get('/checkout', [OrderController::class, 'checkout'])->name('checkout');
Route::post('/checkout/process', [OrderController::class, 'processCheckout'])->name('checkout.process');
Route::post('/buy-now', [OrderController::class, 'buyNow'])->name('buy.now');

// ======================
// ORDER HISTORY
// ======================
Route::get('/orders', [OrderController::class, 'history'])->name('orders.history');
Route::get('/orders/{id}', [OrderController::class, 'detail'])->name('orders.detail');

// ======================
// PROFILE
// ======================
Route::get('/profile', [ProfileController::class, 'index'])->name('profile');
Route::post('/profile/alamat', [ProfileController::class, 'storeAlamat'])->name('profile.alamat.store');
Route::get('/profile/alamat/{id}/default', [ProfileController::class, 'setDefault'])->name('profile.alamat.default');
Route::delete('/profile/alamat/{id}', [ProfileController::class, 'deleteAlamat'])->name('profile.alamat.delete');
Route::put('/profile/update', [ProfileController::class, 'updateProfile'])->name('profile.update');



Route::middleware(['auth'])->prefix('seller')->name('seller.')->group(function () {

    Route::get('/register', [TokoController::class, 'create'])->name('register');
    Route::post('/register', [TokoController::class, 'store'])->name('store');

    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::resource('/produk', SellerProductController::class);

    Route::get('/pesanan', [PesananController::class, 'index'])->name('pesanan');
    Route::get('/pengaturan', [PengaturanController::class, 'index'])->name('pengaturan');
    Route::get('/keuangan', [KeuanganController::class, 'index'])->name('keuangan');
});

Route::get('/seller/produk/{id}/varian', [SellerProductController::class, 'getVarian']);
