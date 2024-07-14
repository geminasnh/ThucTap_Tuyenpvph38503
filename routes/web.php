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
Route::resource('sanpham',\App\Http\Controllers\Admins\SanPhamController::class);
Route::resource('donhang',\App\Http\Controllers\Admins\DonHangController::class);
Route::resource('binhluan',\App\Http\Controllers\Admins\BinhLuanController::class);
Route::resource('taikhoan',\App\Http\Controllers\Admins\TaiKhoanController::class);

