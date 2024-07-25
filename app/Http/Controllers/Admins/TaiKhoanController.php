<?php

namespace App\Http\Controllers\Admins;

use App\Http\Controllers\Controller;
use App\Http\Requests\TaiKhoanRequest;
use App\Models\TaiKhoan;
use Illuminate\Http\Request;


class TaiKhoanController extends Controller
{

    public $tai_khoans;
    public function __construct(){
        $this->tai_khoans = new TaiKhoan();
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = "Danh sách tài khoản";
        $listTaiKhoan = $this->tai_khoans->getTaiKhoan();

        return view('admins.taikhoans.index', compact('listTaiKhoan','title'));
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title = "Thêm tài khoản";
        return view('admins.taikhoans.them', compact('title'));
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TaiKhoanRequest $request)
    {
        if($request->hasFile('anh_dai_dien')){
            $filename = $request->file('anh_dai_dien')->store('uploads/baiviet', 'public');
           }else{
            $filename = null;
           }
           $params = $request->all();
           $params['anh_dai_dien'] = $filename;
           TaiKhoan::create($params);
            return redirect()->route('taikhoan.index')->with('thongbao', "Thêm tài khoản thành công");
        
        
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
    public function edit(TaiKhoan $taikhoan)
    {
        view('admins.taikhoans.capnhat', compact('taikhoan'));
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
