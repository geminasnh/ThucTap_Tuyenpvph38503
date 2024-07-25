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

    protected $table = 'san_phams';
    protected $fillable = [
        'ma_sp',
        'hinh_anh',
        'ten_san_pham',
        'so_luong',
        'gia',
        'gia_khuyen_mai',
        'ngay_nhap',
        'mo_ta',
        'danh_muc_id',

    ];

}
