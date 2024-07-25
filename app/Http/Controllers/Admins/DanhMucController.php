<?php

namespace App\Http\Controllers\Admins;

use App\Http\Controllers\Controller;
use App\Http\Requests\DanhMucRequest;
use App\Models\DanhMuc;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DanhMucController extends Controller
{
    protected $danhmuc = '';

    public function __construct()
    {
        $this->danhmuc = new DanhMuc();
    }

    public function index()
    {
        $data = $this->danhmuc->index();
        $title = 'trang danh mục';
        return view("admins.danhmucs.index", compact('data', 'title'));
    }

    public function create()
    {
        $title = 'trang thêm  danh mục';

        return view('admins.danhmucs.create', compact('title'));
    }

    public function store(DanhMucRequest $request)
    {
        if ($request->isMethod('POST')) {
            $params = $request->except('_token');
            if ($request->hasFile('hinh_anh')) {
                $filePath = $request->file('hinh_anh')->store('uploads/danhmucs', 'public');
            } else {
                $filePath = null;
            }
            $params['hinh_anh'] = $filePath;
            DanhMuc::create($params);
            return redirect()->route('admins.danhmuc.index')->with('success', 'Thêm danh mục thành công');
        }

    }

    public function destroy($id)
    {
        $danhMuc = DanhMuc::findOrFail($id);
        $danhMuc->delete();
        if ($danhMuc->hinh_anh && Storage::disk('public')->exists($danhMuc->hinh_anh)){
            Storage::disk('public')->delete($danhMuc->hinh_anh);
        }
        return redirect()->route('admins.danhmuc.index');
    }

    public function edit($id)
    {
        $edit = $this->danhmuc->find($id);
        $title = 'trang sửa danh mục';
        return view("admins.danhmucs.edit", compact('edit', 'title'));
    }

    public function update($id, Request $request)
    {
        if ($request->isMethod('PUT')) {
            $params = $request->except('_token','_method');
            $danhMuc = DanhMuc::findOrFail($id);
            if ($request->hasFile('hinh_anh')) {
                if ($danhMuc->hinh_anh && Storage::disk('public')->exists($danhMuc->hinh_anh)){
                    Storage::disk('public')->delete($danhMuc->hinh_anh);
                }
                $filePath = $request->file('hinh_anh')->store('uploads/danhmucs', 'public');
            } else {
                $filePath = $danhMuc->hinh_anh;
            }
            $danhMuc->update($params);
            return redirect()->route('admins.danhmuc.index')->with('success', 'Cập nhật danh mục thành công');
        }
    }

}
