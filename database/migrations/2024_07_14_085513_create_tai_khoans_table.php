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
        Schema::create('tai_khoans', function (Blueprint $table) {
            $table->id();
            $table->string('anh_dai_dien')->nullable();
            $table->string('tai_khoan');
            $table->string('ho_ten');
            $table->string('email')->unique();
            $table->string('so_dien_thoai');
            $table->string('gioi_tinh');
            $table->string('dia_chi');
            $table->date('ngay_sinh');
            $table->string('mat_khau');
            $table->unsignedBigInteger('chuc_vu_id');
            $table->unsignedBigInteger('trang_thai_tai_khoan_id');
            $table->timestamps();

            $table->foreign('trang_thai_tai_khoan_id')->references('id')->on('trang_thai_tai_khoans')->onDelete('cascade');
            $table->foreign('chuc_vu_id')->references('id')->on('chuc_vus')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tai_khoans');
    }
};
