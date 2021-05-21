<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DanhMucSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('danhmuc')->insert([
            [
                'maDM' => 'ĐTĐH',
                'tenDM' => 'Phòng đào tạo đại học',
                'mota' => 'Xây dựng chương trình đào tạo đại học, sau đại học,quản lý thông tin sinh viên, xử lý thông tin học phần... ',
            ],
            [
                'maDM' => 'CTSV',
                'tenDM' => 'Phòng công tác sinh viên',
                'mota' => 'Quy chế, quyết định xử phạt và khen thưởng. ',
            ],
        ]);
    }
}
