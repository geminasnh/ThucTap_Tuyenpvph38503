<?php

namespace App\Http\Controllers;

use App\Models\DanhMuc;
use App\Models\SanPham;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function detailProduct(string $id)
    {
        $sanPham = SanPham::with('danhMuc')->findOrFail($id);
        $listSanPham = SanPham::with('danhMuc')->get();

        return view('clients.sanphams.detail-product',compact('sanPham','listSanPham'));
    }
}
