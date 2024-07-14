<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admins\BinhLuanController;
use App\Http\Controllers\Admins\DonHangController;
use App\Http\Controllers\Admins\SanPhamController;
use App\Http\Controllers\Admins\TaiKhoanController;

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

Route::get('/', function () {
    return view('welcome');
});
Route::get('/admin', function () {
    return view('layouts.admin');
})->name('admin');
Route::resource('sanpham',SanPhamController::class);
Route::resource('donhang',DonHangController::class);
Route::resource('binhluan',BinhLuanController::class);
Route::resource('taikhoan',TaiKhoanController::class);

