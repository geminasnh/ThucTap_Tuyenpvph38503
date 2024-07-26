<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('don_hangs', function (Blueprint $table) {
            $table->id();
            $table->string('ma_don_hang')->unique();
            $table->unsignedBigInteger('nguoi_dung_id');
            $table->string('ten_nguoi_nhan');
            $table->string('email_nguoi_nhan');
            $table->string('so_dien_thoai_nguoi_nhan');
            $table->string('dia_chi_nguoi_nhan');
            $table->dateTime('ngay_dat');
            $table->double('tong_tien', 10, 2);
            $table->text('ghi_chu')->nullable();
            $table->unsignedBigInteger('phuong_thuc_thanh_toan_id');
            $table->boolean('trang_thai')->default(true);
            $table->timestamps();

/*            $table->foreign('nguoi_dung_id')->references('id')->on('tai_khoans');
            $table->foreign('phuong_thuc_thanh_toan_id')->references('id')->on('phuong_thuc_thanh_toans');*/

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('don_hangs');
    }
};
