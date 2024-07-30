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
        $danhMucId = $sanPham->danhMuc->id;
        $listSanPham = SanPham::with('danhMuc')->where('danh_muc_id',$danhMucId)->where('id','!=',$id)->paginate(4);
        $listBinhLuan = $sanPham->binhLuan;
        $tongBinhLuan = $listBinhLuan->count();

        return view('clients.sanphams.detail-product',compact('sanPham','listSanPham','listBinhLuan','tongBinhLuan'));
    }
}
