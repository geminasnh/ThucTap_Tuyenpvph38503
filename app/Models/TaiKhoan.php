<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class TaiKhoan extends Model
{
    use HasFactory;

    public function getTaiKhoan()
    {
        $tai_khoans = DB::table('tai_khoans')->get();

        return $tai_khoans;
    }

    public function addTaiKhoan($data)
    {
        DB::table('tai_khoans')->insert($data);
    }

    protected $fillable = [
        'anh_dai_dien',
        'ho_ten',
        'so_dien_thoai',
        'gioi_tinh',
        'dia_chi',
        'ngay_sinh',
        'user_id',
        'trang_thai',
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
