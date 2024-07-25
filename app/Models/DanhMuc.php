<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class DanhMuc extends Model
{
    use HasFactory;

    public function index()
    {
        $list = DB::table('danh_mucs')->get();
        return $list;
    }
    public function store($data)
    {
        DB::table('danh_mucs')->insert($data);
    }
    public function xoa($id)
    {
        DB::table('danh_mucs')->where('id', $id)->delete();
    }
    public function find($id)
    {
        return DB::table('danh_mucs')->where('id', $id)->first();
    }
    public function capnhat($id,$data)
    {
        return DB::table('danh_mucs')->where('id', $id)->update($data);
    }

    protected $fillable = [
        'hinh_anh',
        'ten_danh_muc',
        'trang_thai'
    ];
    protected $casts = [
        'trang_thai' => 'boolean'
    ];
    public function sanPhams()
    {
        return $this->hasMany(SanPham::class);
    }
}
