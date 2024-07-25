<?php

namespace App\Http\Controllers\Admins;

use App\Http\Controllers\Controller;
use App\Models\DanhMuc;
use Illuminate\Http\Request;

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
        return view("admins.danhmuc.index", compact('data', 'title'));
    }
    public function create()
    {
        $title = 'trang thêm  danh mục';

        return view('admins.danhmuc.create', compact('title'));
    }
    public function store(Request $request)
    {
        $data = [
            'ten_danh_muc' => $request->input('ten_danh_muc')
        ];
        $this->danhmuc->store($data);
        return redirect()->route('danhmuc.index');
    }
    public function destroy($id){
        $this->danhmuc->xoa($id);
        return redirect()->route('danhmuc.index');
    }
    public function edit($id){
        $edit=$this->danhmuc->find($id);
        $title = 'trang sửa  danh mục';
        return view("admins.danhmuc.edit",compact('edit','title'));
    }
    public function update($id,Request $request){
        $data = [
            'ten_danh_muc' => $request->input('ten_danh_muc')
        ];
        $this->danhmuc->capnhat($id,$data);
        return redirect()->route('danhmuc.index');
    }

}
