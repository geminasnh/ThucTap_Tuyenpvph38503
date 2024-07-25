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
        Schema::create('san_phams', function (Blueprint $table) {
            $table->id();
            $table->string('ma_sp',10)->unique();
            $table->string('ten_san_pham');
            $table->string('hinh_anh')->nullable();
            $table->double('gia');
            $table->double('gia_khuyen_mai')->nullable();
            $table->string('mo_ta_ngan')->nullable();
            $table->longText('noi_dung')->nullable();
            $table->unsignedInteger('so_luong');
            $table->unsignedInteger('luot_xem');
            $table->date('ngay_nhap');
            $table->foreignIdFor(\App\Models\DanhMuc::class)->constrained();
            $table->boolean('is_type')->default(true);
            $table->boolean('is_new')->default(true);
            $table->boolean('is_hot')->default(true);
            $table->boolean('is_home')->default(true);
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('san_phams');
    }
};
