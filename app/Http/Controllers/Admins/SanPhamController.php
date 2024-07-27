<?php

namespace App\Http\Controllers\Admins;

use App\Http\Controllers\Controller;
use App\Http\Requests\SanPhamRequest;
use App\Models\BinhLuan;
use App\Models\DanhMuc;
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
        /*$listProduct = $this->san_pham->getListProduct();*/
        $listProduct = SanPham::orderByDesc('is_type')->get();
        return view('admins.sanphams.index', compact('listProduct', 'title'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title = "Thêm sản phẩm";
        $listDanhMuc = DanhMuc::query()->get();
        return view('admins.sanphams.them', compact('title','listDanhMuc'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(SanPhamRequest $request)
    {
        if ($request->isMethod('POST')) {
            $params = $request->except('_token');

            //checkbox
            $params['is_new'] = $request->has('is_new') ? 1 : 0;
            $params['is_hot'] = $request->has('is_hot') ? 1 : 0;
            $params['is_home'] = $request->has('is_home') ? 1 : 0;

            if ($request->hasFile('hinh_anh')) {
                $params['hinh_anh'] = $request->file('hinh_anh')->store('uploads/sanphams', 'public');
            } else {
                $params['hinh_anh'] = null;
            }


            //them san pham
            $duLieu = SanPham::query()->create($params);

            //id sanpham
            $duLieuId = $duLieu->id;

            //them album
            if ($request->hasFile('list_hinh_anh')) {
                foreach ($request->file('list_hinh_anh') as $img) {
                    if ($img) {
                        $path = $img->store('uploads/hinhanhsanpham/id_' . $duLieuId, 'public');
                        $duLieu->hinhAnhSanPham()->create([
                            'san_pham_id' => $duLieuId,
                            'hinh_anh' => $path,
                        ]);
                    }
                }
            }

            return redirect()->route('admins.sanpham.index')->with('thongbao', "Thêm sản phẩm thành công");
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $title = "Xem sản phẩm";
        $listDanhMuc = DanhMuc::query()->get();
        $chiTietSp = SanPham::findOrFail($id);
        $listBinhLuan = BinhLuan::with('nguoiDung')->where('san_pham_id', $id)->get();

        return view('admins.sanphams.view',compact('title','chiTietSp','listDanhMuc','listBinhLuan'));
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
        $sanPham = SanPham::query()->findOrFail($id);

        $sanPham->binhLuan()->delete();

        if ($sanPham->hinh_anh && Storage::disk('public')->exists($sanPham->hinh_anh)){
            Storage::disk('public')->delete($sanPham->hinh_anh);
        }

        $sanPham->hinhAnhSanPham()->delete();

        $path = 'uploads/hinhanhsanpham/id_' . $id;
        if (Storage::disk('public')->exists($path)){
            Storage::disk('public')->deleteDirectory($path);
        }

        $sanPham->delete();

        return redirect()->route('admins.sanpham.index')->with('thongBao', 'Xóa sản phẩm thành công');

    }


}
