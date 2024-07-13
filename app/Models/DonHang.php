<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class DonHang extends Model
{
    use HasFactory;
    public function getListDonHang()
    {
        $listDonHang = DB::table('don_hangs')->get();
        return $listDonHang;
    }
}
