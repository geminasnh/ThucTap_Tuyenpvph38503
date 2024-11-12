<?php

namespace App\Providers;

use App\Models\DanhMuc;
use App\Models\ThongTinCuaHang;
use Illuminate\Support\ServiceProvider;
use View;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        
        $thongTin = ThongTinCuaHang::all();
    $danhMucs = DanhMuc::all();
   
    View::share('thongTin', $thongTin);  // Chia sẻ biến thongTin
    View::share('danhMucs', $danhMucs);  
    }
}
