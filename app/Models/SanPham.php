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
        $listProduct = DB::table('san_phams')
            ->orderBy('ngay_nhap','DESC')
            ->get();
        return $listProduct;
    }

    public function addProduct($data)
    {
        DB::table('san_phams')->insert($data);
    }
}
