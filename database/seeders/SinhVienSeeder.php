<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SinhVienSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('sinhvien')->insert([
            [
                'user_id' => 2,
//                'tenSV' => 'Nguyễn Thị Phượng',
//                'maSV' => '1621050362',
                'khoa' => 'Công nghệ thông tin',
                'lop' => 'Tin học kinh tế',
//                'phone' => '0354630303',
//                'diachi' => 'Hà Nội',
            ],
            [
                'user_id' => 4,
//                'tenSV' => 'Phạm Thị Trà My',
//                'maSV' => '1621050372',
                'khoa' => 'Công nghệ thông tin',
                'lop' => 'Tin học kinh tế',
//                'phone' => '0962960613',
//                'diachi' => 'Hà Nội',
            ],
        ]);
    }
}
