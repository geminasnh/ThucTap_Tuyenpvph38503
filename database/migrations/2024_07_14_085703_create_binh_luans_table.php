<?php

use App\Models\SanPham;
use App\Models\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('binh_luans', function (Blueprint $table) {
            $table->id();
            $table->text('noi_dung');
            $table->dateTime('thoi_gian');
            $table->foreignIdFor(SanPham::class)->constrained();
            $table->foreignIdFor(User::class)->constrained();
            $table->boolean('trang_thai')->default(true);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('binh_luans');
    }
};
