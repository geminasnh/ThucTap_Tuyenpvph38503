<?php

use App\Http\Controllers\Admins\DanhMucController;
use App\Http\Controllers\Admins\DonHangController;
use App\Http\Controllers\Admins\SanPhamController;
use App\Http\Controllers\Admins\SliderController;
use App\Http\Controllers\Admins\ThongTinController;
use App\Http\Controllers\Admins\UserController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BinhLuanController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::post('/binhluan', [BinhLuanController::class, 'store'])->name('binhluan.store');
Route::get('/products', [ProductController::class, 'index'])->name('products');

//Auth::routes();
//Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/profile', [AuthController::class, 'showProfile'])->name('profile.show');
Route::get('login', [AuthController::class, 'showLogin'])->name('showLogin');
Route::post('login', [AuthController::class, 'login'])->name('login');
Route::get('register', [AuthController::class, 'showRegister']);
Route::post('register', [AuthController::class, 'register'])->name('register');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/product/detail/{id}', [ProductController::class, 'detailProduct'])->name('product.detail');
Route::get('/list-cart', [CartController::class, 'listCart'])->name('cart.list');
Route::post('/add-to-cart', [CartController::class, 'addCart'])->name('cart.add');
Route::post('/update-cart', [CartController::class, 'updateCart'])->name('cart.update');
Route::get('/categories/{id}', [CategoryController::class, 'show'])->name('categories.show');
Route::get('/search', [ProductController::class, 'search'])->name('search');

Route::middleware(['auth',])->prefix('donhangs')->as('donhangs.')->group(function () {
    Route::get('/', [OrderController::class, 'index'])->name('index');
    Route::get('/create', [OrderController::class, 'create'])->name('create');
    Route::post('/store', [OrderController::class, 'store'])->name('store');
    Route::get('/show/{id}', [OrderController::class, 'show'])->name('show');
    Route::put('{id}/update', [OrderController::class, 'update'])->name('update');
});




Route::middleware(['auth', 'auth.admin'])->prefix('admins')->as('admins.')->group(function () {

    Route::get('/dashboard', function () {
        return view('layouts.admin');
    })->name('dashboard');

    Route::resource('danhmuc', DanhMucController::class);
    Route::resource('binhluan', BinhLuanController::class);
    Route::resource('sanpham', SanPhamController::class);
    Route::resource('donhang', DonHangController::class);
    Route::resource('user', UserController::class);
    Route::resource('slider', SliderController::class);
    Route::resource('thongtin', ThongTinController::class);

});


Route::get('/thong-tin', [HomeController::class, 'thongTin'])->name('clients.blocks.header');


Route::get('payment/create', [PaymentController::class, 'createPayment'])->name('payment.paypal.create');
Route::get('payment/callback', [PaymentController::class, 'paypalCallback'])->name('payment.paypal.callback');
Route::get('payment/cancel', [PaymentController::class, 'paypalCancel'])->name('payment.paypal.cancel');
Route::put('/profile', [AuthController::class, 'updateProfile'])->name('profile.update');
