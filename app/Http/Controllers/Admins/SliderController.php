<?php

namespace App\Http\Controllers\Admins;

use App\Http\Controllers\Controller;
use App\Models\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $slider = Slider::paginate(5);
        return view('admins.sliders.index', compact('slider'))->with('i', (request()->input('page',1)-1)*5);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
       return view('admins.sliders.them'); 
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if($request->hasFile('hinh_anh')){
            $filename = $request->file('hinh_anh')->store('uploads/baiviet', 'public');
           }else{
            $filename = null;
           }
           $params = $request->all();
           $params['hinh_anh'] = $filename;
           Slider::create($params);
                // BaiViet::create($request->all());
                return redirect()->route('admins.slider.index')->with('thongbao','Thêm sản phẩm thành công');
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
    public function edit(Slider $slider)
    {
        return view('admins.sliders.capnhat',compact('slider'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Slider $slider)
    {
        if($request->hasFile('hinh_anh')){
            if($slider->hinh_anh){
                Storage::disk('public')->delete($slider->hinh_anh);
            }
           $params['hinh_anh']= $request->file('hinh_anh')->store('uploads/baiviet', 'public');
        }else {
            $params['hinh_anh'] = $slider->hinh_anh;
        }
        $slider->update($params);
     
            return redirect()->route('admins.slider.index')->with('thongbao','Sửa sản phẩm thành công');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Slider $slider)
    {
        $slider->delete();
        return redirect()->route('admins.slider.index')->with('thongbao','Xóa tài khoản thành công');
    }
}
