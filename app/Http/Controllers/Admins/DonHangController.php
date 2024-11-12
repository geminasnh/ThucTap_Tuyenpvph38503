<?php

namespace App\Http\Controllers\Admins;

use App\Http\Controllers\Controller;
use App\Models\DonHang;
use Illuminate\Http\Request;

class DonHangController extends Controller
{
    public $don_hang;

    public function __construct()
    {
        $this->don_hang = new DonHang();
    }

    public function index()
    {
        $title = 'Danh sách đơn hàng';
        $listDonHang = DonHang::query()->get();
        $trangThaiDonHang = DonHang::TRANG_THAI_DON_HANG;
        $type_huy_don_hang = DonHang::HUY_DON_HANG;
        return view("admins.donhangs.index", compact('listDonHang', 'title', 'trangThaiDonHang','type_huy_don_hang'));
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $title = "Chi tiết đơn hàng";
        $donHang = DonHang::query()->findOrFail($id);
        $trangThaiDonHang = DonHang::TRANG_THAI_DON_HANG;
        $trangThaiThanhToan = DonHang::TRANG_THAI_THANH_TOAN;
        return view('admins.donhangs.chitiet',compact('title','donHang','trangThaiDonHang','trangThaiThanhToan'));
    }

    public function update(Request $request, string $id)
    {
        $donHang = DonHang::query()->findOrFail($id);
        $currentTrangThai = $donHang->trang_thai_don_hang;
        $newTrangThai = $request->input('trang_thai_don_hang');
        $trangThai = array_keys(DonHang::TRANG_THAI_DON_HANG);

        if ($currentTrangThai === DonHang::HUY_DON_HANG) {
            return redirect()->route('admins.donhang.index')->with('error', 'Đơn hàng đã bị hủy, không thể thay đôi trạng thái');
        }
        if (array_search($newTrangThai, $trangThai) < array_search($currentTrangThai, $trangThai)) {
            return redirect()->route('admins.donhang.index')->with('error', 'Không thể cập nhật ngược lại trạng thái');
        }

        $donHang->trang_thai_don_hang = $newTrangThai;

        $donHang->save();

        return redirect()->route('admins.donhang.index')->with('thongbao', 'Cập nhật trạng thái thành công');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $donHang = DonHang::query()->findOrFail($id);
        if ($donHang && $donHang->trang_thai_don_hang == DonHang::HUY_DON_HANG){
            $donHang->chiTietDonHang()->delete();
            $donHang->delete();
            return redirect()->back()->with('thongbao', 'Xóa đơn hàng thành công');
        }
        return redirect()->back()->with('error', 'Không thể xóa được đơn hàng');

    }
}
