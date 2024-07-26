<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class SanPham extends Model
{
    use HasFactory;

    public function getListProduct()
    {
        $listProduct = DB::table('san_phams')->get();
        return $listProduct;
    }

    public function addProduct($data)
    {
        DB::table('san_phams')->insert($data);
    }

    public function getDetailProduct($id)
    {
        $san_pham = DB::table('san_phams')->where('id', $id)->first();
        return $san_pham;
    }

    public function updateProduct($id, $duLieu)
    {
        DB::table('san_phams')->where('id', $id)->update($duLieu);
    }

    public function deleteProduct($id)
    {
        DB::table('san_phams')->where('id', $id)->delete();
    }

    protected $fillable = [
        'ma_sp',
        'ten_san_pham',
        'hinh_anh',
        'gia',
        'gia_khuyen_mai',
        'mo_ta_ngan',
        'noi_dung',
        'so_luong',
        'luot_xem',
        'ngay_nhap',
        'danh_muc_id',
        'is_type',
        'is_new',
        'is_hot',
        'is_home',
    ];

    protected $casts = [
        'is_type' => 'boolean',
        'is_new' => 'boolean',
        'is_hot' => 'boolean',
        'is_home' => 'boolean',
    ];

    public function danhMuc()
    {
        return $this->belongsTo(DanhMuc::class);
    }

    public function hinhAnhSanPham()
    {
        return $this->hasMany(HinhAnhSanPham::class);
    }

    public function binhLuan()
    {
        return $this->hasMany(BinhLuan::class);
    }
}
