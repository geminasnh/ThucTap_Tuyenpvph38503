<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TaiKhoanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Factory::create('vi_VN');
        foreach (range(1,3) as $index){
            DB::table('san_phams')->insert([
                'hinh_anh'=>$faker->word(),
                'ten_san_pham'=>$faker->asciify('SP-****'),
                'so_luong'=>$faker->numberBetween(11,99),
                'gia'=>$faker->numberBetween(50,100),
                'gia_khuyen_mai'=>$faker->numberBetween(10,50),
                'ngay_nhap'=>$faker->date,
                'mo_ta'=>$faker->text(100),
                'danh_muc_id'=>$faker->numberBetween(2,5),
            ]);
        }
    }
}
