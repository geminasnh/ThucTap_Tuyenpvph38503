<?php

namespace App\Http\Controllers\Admins;

use App\Http\Controllers\Controller;
use App\Http\Requests\SanPhamRequest;
use App\Models\BinhLuan;
use App\Models\DanhMuc;
use App\Models\HinhAnhSanPham;
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
        return view('admins.sanphams.them', compact('title', 'listDanhMuc'));
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

        return view('admins.sanphams.view', compact('title', 'chiTietSp', 'listDanhMuc', 'listBinhLuan'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $title = "Sửa sản phẩm";
        $listDanhMuc = DanhMuc::query()->get();
        $chiTietSp = SanPham::findOrFail($id);
        return view('admins.sanphams.capnhat', compact('title', 'chiTietSp', 'listDanhMuc'));
    }

    /**
     * Update the specified resource in storage.
     */
    /*public function update(Request $request, string $id)
    {
        if ($request->isMethod('PUT')) {
            $params = $request->except('_token', '_method');

            //checkbox
            $params['is_new'] = $request->has('is_new') ? 1 : 0;
            $params['is_hot'] = $request->has('is_hot') ? 1 : 0;
            $params['is_home'] = $request->has('is_home') ? 1 : 0;

            $sanPham = SanPham::query()->findOrFail($id);

            //anh dai dien
            if ($request->hasFile('hinh_anh')) {
                if ($sanPham->hinh_anh && Storage::disk('public')->exists($sanPham->hinh_anh)) {
                    Storage::disk('public')->delete($sanPham->hinh_anh);
                }
                $params['hinh_anh'] = $request->file('hinh_anh')->store('uploads/sanphams', 'public');
            } else {
                $params['hinh_anh'] = $sanPham->hinh_anh;
            }

            //album ảnh
            $anhCu = $sanPham->hinhAnhSanPham()->pluck('id')->toArray();
            $arrayCombine = array_combine($anhCu, $anhCu);

            //xu ly xoa khi cap nhat xoa anh
            foreach ($arrayCombine as $key) {
                if (!array_key_exists($key, $request->list_hinh_anh)) {
                    $hinhAnhSanPham = HinhAnhSanPham::query()->find($key);
                    if ($hinhAnhSanPham && Storage::disk('public')->exists($hinhAnhSanPham->hinh_anh)) {
                        Storage::disk('public')->delete($hinhAnhSanPham->hinh_anh);
                        $hinhAnhSanPham->delete();
                    }
                }
            }

            //xu ly khi them hoac sua
            foreach ($request->list_hinh_anh as $key => $image) {
                if (!array_key_exists($key, $arrayCombine)) {
                    if ($request->hasFile("list_hinh_anh.$key")) {
                        //xu ly them hinh anh
                        $path = $image->store('uploads/hinhanhsanpham/id_' . $id, 'public');
                        $sanPham->hinhAnhSanPham()->create([
                            'san_pham_id' => $id,
                            'hinh_anh' => $path,
                        ]);
                    }
                } else if (is_file($image) && $request->hasFile("list_hinh_anh.$key")) {
                    //xu ly update hinh anh
                    $hinhAnhSanPham = HinhAnhSanPham::query()->find($key);
                    if ($hinhAnhSanPham && Storage::disk('public')->exists($hinhAnhSanPham->hinh_anh)) {
                        Storage::disk('public')->delete($hinhAnhSanPham->hinh_anh);
                    }
                    $path = $image->store('uploads/hinhanhsanpham/id_' . $id, 'public');
                    $hinhAnhSanPham->update([
                        'hinh_anh' => $path,
                    ]);
                }
            }
            $sanPham->update($params);
            return redirect()->route('admins.sanpham.index')->with('thongbao', "Cập nhật sản phẩm thành công");
        }
    }*/

    public function update(Request $request, string $id)
    {
        if ($request->isMethod('PUT')) {
            $params = $request->except('_token', '_method');

            // Checkbox values
            $params['is_new'] = $request->has('is_new') ? 1 : 0;
            $params['is_hot'] = $request->has('is_hot') ? 1 : 0;
            $params['is_home'] = $request->has('is_home') ? 1 : 0;

            $sanPham = SanPham::query()->findOrFail($id);

            // avatar image
            if ($request->hasFile('hinh_anh')) {
                if ($sanPham->hinh_anh && Storage::disk('public')->exists($sanPham->hinh_anh)) {
                    Storage::disk('public')->delete($sanPham->hinh_anh);
                }
                $params['hinh_anh'] = $request->file('hinh_anh')->store('uploads/sanphams', 'public');
            } else {
                $params['hinh_anh'] = $sanPham->hinh_anh;
            }

            // album images
            $existingImages = $sanPham->hinhAnhSanPham->pluck('id')->toArray();
            $existingImagesMap = array_combine($existingImages, $existingImages);

            // Delete images
            foreach ($existingImagesMap as $existingImageId) {
                if (!isset($request->list_hinh_anh['id_' . $existingImageId])) {
                    $image = HinhAnhSanPham::find($existingImageId);
                    if ($image && Storage::disk('public')->exists($image->hinh_anh)) {
                        Storage::disk('public')->delete($image->hinh_anh);
                        $image->delete();
                    }
                }
            }

            // Check total images
            $currentImageCount = $sanPham->hinhAnhSanPham()->count();
            $newImageCount = count($request->file('list_hinh_anh') ?? []);
            if ($currentImageCount + $newImageCount > 4) {
                return redirect()->back()->with('error', "Không được thêm quá 4 ảnh sản phẩm");
            }

            // Add or update images
            foreach ($request->list_hinh_anh as $key => $image) {
                $imageId = str_replace('id_', '', $key);
                if (!in_array($imageId, $existingImages)) {
                    if ($request->hasFile("list_hinh_anh.$key")) {
                        $path = $image->store('uploads/hinhanhsanpham/id_' . $id, 'public');
                        $sanPham->hinhAnhSanPham()->create([
                            'san_pham_id' => $id,
                            'hinh_anh' => $path,
                        ]);
                    }
                } else if (is_file($image) && $request->hasFile("list_hinh_anh.$key")) {
                    $existingImage = HinhAnhSanPham::find($imageId);
                    if ($existingImage && Storage::disk('public')->exists($existingImage->hinh_anh)) {
                        Storage::disk('public')->delete($existingImage->hinh_anh);
                    }
                    $path = $image->store('uploads/hinhanhsanpham/id_' . $id, 'public');
                    $existingImage->update([
                        'hinh_anh' => $path,
                    ]);
                }
            }

            $sanPham->update($params);
            return redirect()->route('admins.sanpham.index')->with('thongbao', "Cập nhật sản phẩm thành công");
        }
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $sanPham = SanPham::query()->findOrFail($id);

        if ($sanPham->hinh_anh && Storage::disk('public')->exists($sanPham->hinh_anh)) {
            Storage::disk('public')->delete($sanPham->hinh_anh);
        }

        $sanPham->binhLuan()->delete();
        $sanPham->hinhAnhSanPham()->delete();

        $path = 'uploads/hinhanhsanpham/id_' . $id;
        if (Storage::disk('public')->exists($path)) {
            Storage::disk('public')->deleteDirectory($path);
        }

        $sanPham->delete();
        return redirect()->route('admins.sanpham.index')->with('thongbao', "Xóa sản phẩm thành công");

    }


}
