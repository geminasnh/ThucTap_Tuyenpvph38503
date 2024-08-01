<?php

namespace App\Http\Controllers\Admins;

use App\Http\Controllers\Controller;
use App\Models\ThongTin;
use App\Models\ThongTinCuaHang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ThongTinController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $thongtin = ThongTinCuaHang::paginate(5);
        return view('admins.thongtins.index', compact('thongtin'))->with('i', (request()->input('page',1)-1)*5);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admins.thongtins.them'); 
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if($request->hasFile('logo')){
            $filename = $request->file('logo')->store('uploads/baiviet', 'public');
           }else{
            $filename = null;
           }
           $params = $request->all();
           $params['logo'] = $filename;
           ThongTinCuaHang::create($params);
                // BaiViet::create($request->all());
                return redirect()->route('admins.thongtin.index')->with('thongbao','Thêm sản phẩm thành công');
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
    public function edit(ThongTinCuaHang $thongtin)
    {
        return view('admins.thongtins.capnhat',compact('thongtin'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,string $id)
    {
        $sanPham = ThongTinCuaHang::findOrFail($id);
        if ($request->isMethod('PUT')) {
        if($request->hasFile('logo')){
            if($sanPham->logo){
                Storage::disk('public')->delete($sanPham->logo);
            }
           $params['logo']= $request->file('logo')->store('uploads/baiviet', 'public');
        }else {
            $params['logo'] = $sanPham->logo;
        }
        $sanPham->update($params);
       
        return redirect()->route('admins.thongtin.index')->with('thongbao','Sửa sản phẩm thành công');
    }
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ThongTinCuaHang $thongtin)
    {
        $thongtin->delete();
        return redirect()->route('admins.thongtin.index')->with('thongbao','Xóa tài khoản thành công');
    }
}
