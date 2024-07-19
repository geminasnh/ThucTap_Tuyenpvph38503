<?php

namespace App\Http\Controllers\Admins;

use App\Http\Controllers\Controller;
use App\Http\Requests\SanPhamRequest;
use App\Models\SanPham;
use Illuminate\Http\Request;

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
            $data = $request->except('_token');
            if ($request->hasFile('hinh_anh')) {
                $imgPath = $request->file('hinh_anh')->store('uploads/sanphams', 'public');
            } else {
                $imgPath = null;
            }
            $data['hinh_anh'] = $imgPath;
            $this->san_pham->addProduct($data);
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
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
