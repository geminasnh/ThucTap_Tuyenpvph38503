<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ThongTinCuaHang extends Model
{
    use HasFactory;
  
    protected $fillable = [
        'email',
        'phone_number',
        'logo',
        'address',
       
    ];
}
