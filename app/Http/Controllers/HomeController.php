<?php

namespace App\Http\Controllers;

use App\Models\DanhMuc;
use App\Models\SanPham;
use App\Models\Slider;
use App\Models\ThongTinCuaHang;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $listSanPham = SanPham::with('danhMuc')->take(8)->get();
        $listSlider = Slider::all();
        $sanPhamYeuThich = SanPham::orderBy('luot_xem', 'desc')->paginate(4);
        return view('clients.home',compact('listSlider','listSanPham','sanPhamYeuThich'));
    }
    public function thongTin()
    {
        // Lấy thông tin cửa hàng (chỉ lấy bản ghi đầu tiên)
        $thongTin = ThongTinCuaHang::first();  
    
        // Lấy tất cả danh mục
        $danhMucs = DanhMuc::all();  
    
        // Trả về view và truyền dữ liệu
        return view('admins.thongtins.index', compact('thongTin', 'danhMucs'));
    }
}
