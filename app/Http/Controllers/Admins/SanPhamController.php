<?php

namespace App\Http\Controllers\Admins;

use App\Http\Controllers\Controller;
use App\Http\Requests\SanPhamRequest;
use App\Models\SanPham;
use Illuminate\Http\Request;
use Illuminate\Session\Store;
use Illuminate\Support\Facades\Storage;

class SanPhamController extends Controller
{
    public $san_pham;

    public function __construct()
    {
        $this->san_pham = new SanPham();
    }

    public function index()
    {
        $title = "Danh sách sản phẩm";
        $listProduct = $this->san_pham->getListProduct();
        return view('admins.sanphams.index', compact('listProduct', 'title'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title = "Thêm sản phẩm";
        return view('admins.sanphams.them', compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(SanPhamRequest $request)
    {
        if ($request->isMethod('POST')) {
            $duLieu = $request->except('_token');
            if ($request->hasFile('hinh_anh')) {
                $imgPath = $request->file('hinh_anh')->store('uploads/sanphams', 'public');
            } else {
                $imgPath = null;
            }
            $duLieu['hinh_anh'] = $imgPath;
            $this->san_pham->addProduct($duLieu);
            return redirect()->route('sanpham.index')->with('thongbao', "Thêm sản phẩm thành công");
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $title = "Sửa sản phẩm";
        $chiTietSp = $this->san_pham->getDetailProduct($id);
        return view('admins.sanphams.capnhat',compact('title','chiTietSp'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        if ($request->isMethod('PUT')) {
            //dd($request->all());
            $params = $request->except('_token', '_method');

            $sanPham = SanPham::findOrFail($id);
            if ($request->hasFile('hinh_anh')) {
                Storage::disk('public')->delete($sanPham->hinh_anh);
                $params['hinh_anh'] = $request->file('hinh_anh')->store('uploads/sanphams', 'public');
            }else{
                $params['hinh_anh'] = $sanPham->hinh_anh;
            }

            $this->san_pham->updateProduct($id, $params);
            return redirect()->route('sanpham.index')->with('thongbao', "Sửa sản phẩm thành công");
        }

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, string $id)
    {
        if ($request->isMethod('DELETE')){
            $sanPham = $this->san_pham->getDetailProduct($id);
            if ($sanPham) {
                $this->san_pham->deleteProduct($id);
                if ($sanPham->hinh_anh && Storage::disk('public')->exists($sanPham->hinh_anh)) {
                    Storage::disk('public')->delete($sanPham->hinh_anh);
                }
                return redirect()->route('sanpham.index')->with('thongbao', "Xoas sản phẩm thành công");
            }
        }
    }


}
