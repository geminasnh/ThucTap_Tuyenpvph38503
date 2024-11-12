<?php

namespace App\Http\Controllers;

use App\Models\DanhMuc;
use App\Models\SanPham;
use App\Models\ThongTinCuaHang;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(){
        $products = SanPham::all();
        return view('clients.product',compact('products'));
    }
    public function detailProduct(string $id)
    {
        $sanPham = SanPham::with('danhMuc')->findOrFail($id);
        $sanPham->increment('luot_xem');
        $danhMucId = $sanPham->danhMuc->id;
        $listSanPham = SanPham::with('danhMuc')->where('danh_muc_id',$danhMucId)->where('id','!=',$id)->paginate(4);
        $listBinhLuan = $sanPham->binhLuan;
        $tongBinhLuan = $listBinhLuan->count();

        return view('clients.sanphams.detail-product',compact('sanPham','listSanPham','listBinhLuan','tongBinhLuan'));
    }
    public function search(Request $request)
    {
        $query = $request->input('query');
        $sanPhams = SanPham::where('ten_san_pham', 'LIKE', "%{$query}%")->paginate(10);

        return view('clients.search', compact('sanPhams', 'query'));
    }
}
