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
    }
}
