<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class BinhLuan extends Model
{
    use HasFactory;

    public function getListBinhLuan()
    {
        $listBinhLuan = DB::table('binh_luans')->get();
        return $listBinhLuan;
        //dd();
    }

    protected $fillable = [
        'noi_dung',
        'thoi_gian',
        'san_pham_id',
        'user_id',
        'trang_thai',
    ];

    public function sanPham()
    {
        return $this->belongsTo(SanPham::class);
    }
    public function nguoiDung()
    {
        return $this->belongsTo(User::class);
    }

}
