<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
                'ma' => '',
                'name' => 'admin',
                'email' => 'admin@gmail.com',
                'password' => bcrypt('admin123'),
                'phone' => '',
//                'khoa' => '',
//                'lop' => '',
                'diachi' => '',
            ],
            [
                'ma' => '1621050362',
                'name' => 'Nguyễn Thị Phượng',
                'email' => 'phuongtkt.humg@gmail.com',
                'password' => bcrypt('123456'),
                'phone' => '0354630303',
//                'khoa' => 'Công nghệ thông tin',
//                'lop' => 'Tin học kinh tế K61',
                'diachi' => 'Hà Nội',
            ],
            [
                'ma' => '1621050556',
                'name' => 'Tạ Thị Ánh Nguyệt ',
                'email' => '1621050556@student.humg.edu.vn',
                'password' => bcrypt('123456'),
                'phone' => '0326699445',
//                'khoa' => 'Công nghệ thông tin',
//                'lop' => 'Tin học kinh tế K61',
                'diachi' => 'Hà Nội',
            ],
            [
                'ma' => '1721050372',
                'name' => 'Phạm Thị Trà My',
                'email' => '1721050372@student.humg.edu.vn',
                'password' => bcrypt('123456'),
                'phone' => '0962960613',
//                'khoa' => 'Công nghệ thông tin',
//                'lop' => 'Tin học kinh tế K62',
                'diachi' => 'Hà Nội',
            ],
            [
                'ma' => '1621050886',
                'name' => 'Nguyễn Công Chính',
                'email' => '1621050886@student.humg.edu.vn',
                'password' => bcrypt('123456'),
                'phone' => '0379610510',
//                'khoa' => 'Công nghệ thông tin',
//                'lop' => 'Tin học kinh tế K61',
                'diachi' => 'Hà Nội',
            ],
            [
                'ma' => '1621050619',
                'name' => 'Trần Thị lan',
                'email' => '1621050619@student.humg.edu.vn',
                'password' => bcrypt('123456'),
                'phone' => '0358432015',
//                'khoa' => 'Công nghệ thông tin',
//                'lop' => 'Tin học kinh tế K61',
                'diachi' => 'Hà Nội',
            ],
            [
                'ma' => '161050546',
                'name' => 'Chu Văn Nam Anh',
                'email' => '161050546@student.humg.edu.vn',
                'password' => bcrypt('123456'),
                'phone' => '0962728598',
//                'khoa' => 'Công nghệ thông tin',
//                'lop' => 'Tin học kinh tế K61',
                'diachi' => 'Hà Nội',
            ],
            [
                'ma'   => 'HUMG-00001',
                'name' => 'Dương Thị Hiền Thanh',
                'email' => 'dtht@humg.edu.vn',
                'password' => bcrypt('123456'),
                'diachi' => 'Hà Nội',
//                'khoa' =>'',
//                'lop' => '',
                'phone' => '',
            ],
        ]);
    }
}
