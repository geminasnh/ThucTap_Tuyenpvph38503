<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Middleware\CheckRoleAdminMiddleware;
use Illuminate\Support\Facades\Auth;
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
/*Route::get('/admin', function () {
    return view('layouts.admin');
})->name('admin');*/
Route::resource('sanpham', SanPhamController::class);
Route::resource('donhang', DonHangController::class);
Route::resource('binhluan', BinhLuanController::class);
Route::resource('taikhoan', TaiKhoanController::class);


//Auth::routes();
//Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('login', [AuthController::class, 'showLogin']);
Route::post('login', [AuthController::class, 'login'])->name('login');
Route::get('register', [AuthController::class, 'showRegister']);
Route::post('register', [AuthController::class, 'register'])->name('register');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

/*Route::get('/admin', function (){
   return view('layouts.admin');
})->middleware('auth','auth.admin');*/


Route::middleware(['auth','auth.admin'])->prefix('admins')->as('admins.')->group(function (){
    Route::get('/dashboard', function (){
       return view('layouts.admin');
    })->name('dashboard');


});


