<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',        // ID người dùng thực hiện thanh toán (nullable)
        'payment_id',     // ID thanh toán từ PayPal
        'transaction_id', // ID giao dịch từ PayPal (nullable)
        'amount',         // Số tiền thanh toán
        'currency',       // Loại tiền tệ (ví dụ: USD, VND)
        'status',         // Trạng thái thanh toán (ví dụ: pending, completed, failed)
    ];
}
