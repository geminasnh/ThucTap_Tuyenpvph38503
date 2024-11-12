<?php

namespace App\Http\Controllers;

use App\Models\DanhMuc;
use App\Models\SanPham;
use App\Models\ThongTinCuaHang;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function show($id)
    {
        $danhMuc = DanhMuc::findOrFail($id);

        $sanPhams = SanPham::where('danh_muc_id', $id)->paginate(10);
        $thongTin = ThongTinCuaHang::first();
        $danhMucs = DanhMuc::all();
        return view('clients.category', compact('danhMuc', 'sanPhams','thongTin','danhMucs'));
    }
}
