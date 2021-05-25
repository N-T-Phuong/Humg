<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;
use App\Models\User;
use App\Models\Info;
use Buihuycuong\Vnfaker\VNFaker;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        app()[PermissionRegistrar::class]->forgetCachedPermissions();
        Permission::create(['name' => 'show user']);
        Permission::create(['name' => 'edit user']);
        Permission::create(['name' => 'delete user']);
        Permission::create(['name' => 'create user']);
        Permission::create(['name' => 'block user']);
        Permission::create(['name' => 'unblock user']);
        Permission::create(['name' => 'set admin']);
        Permission::create(['name' => 'unset admin']);

        $studentRole = Role::create(['name' => 'sinhvien']);
        $teacherRole = Role::create(['name' => 'canbo']);
        $adminRole = Role::create(['name' => 'admin']);
        $adminRole->givePermissionTo(Permission::all());

        $adminUser = User::create([
            'name' => 'admin',
            'username' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('admin123'),
        ]);
        $adminUser->assignRole($adminRole);

        for ($i = 1; $i++; $i < 100) {
            $teacherUser = User::create([
                'ma' => vnfaker()->numberBetween(1000000000, 9999999999),
                'name' => vnfaker()->fullname(3),
                'email' => vnfaker()->email(['gmail.com', 'teacher.humg.edu.vn']), //'sotatek.vn', 'viettel.vn', 'aecomtech.com', 'teacher.hust.edu.vn', 'sis.hust.edu.vn'
                'phone' => vnfaker()->cityphone(11),
                'username' => vnfaker()->username(),
                'diachi' => vnfaker()->city(),
                'password' => bcrypt('123456'),
                'gioitinh' => vnfaker()->gender()
            ]);
            $teacherUser->assignRole($teacherRole);
        }



        for ($i = 1; $i++; $i < 1000) {
            $studentUser = User::create([
                'ma' => vnfaker()->numberBetween(1000000000, 9999999999),
                'name' => vnfaker()->fullname(3),
                'email' => vnfaker()->email(['gmail.com', 'student.humg.edu.vn']), //, 'yahoo.com', 'outlook.com', 'sotatek.vn', 'viettel.vn', 'aecomtech.com', 'student.hust.edu.vn', 'sis.hust.edu.vn'
                'phone' => vnfaker()->cityphone(11),
                'username' => vnfaker()->username(),
                'diachi' => vnfaker()->city(),
                'password' => bcrypt('123456'),
                'khoa' => vnfaker()->company(),
                'lop' => 'K' . vnfaker()->numberBetween(50, 60),
                'gioitinh' => vnfaker()->gender()
            ]);
            $studentUser->assignRole($studentRole);
        }

/*
        DB::table('users')->insert([
            [
                'ma' => '1621050362',
                'name' => 'sinhvien',
                'username' => 'Nguyễn Thị Phượng',
                'email' => 'phuongtkt.humg@gmail.com',
                'password' => bcrypt('123456'),
                'phone' => '0354630303',
                'khoa' => 'Công nghệ thông tin',
                'lop' => 'Tin học kinh tế K61',
                'diachi' => 'Hà Nội',
            ],
            [
                'ma' => '1621050556',
                'name' => 'sinhvien',
                'username' => 'Tạ Thị Ánh Nguyệt ',
                'email' => '1621050556@student.humg.edu.vn',
                'password' => bcrypt('123456'),
                'phone' => '0326699445',
                'khoa' => 'Công nghệ thông tin',
                'lop' => 'Tin học kinh tế K61',
                'diachi' => 'Hà Nội',
            ],
            [
                'ma' => '1721050372',
                'name' => 'sinhvien',
                'username' => 'Phạm Thị Trà My',
                'email' => '1721050372@student.humg.edu.vn',
                'password' => bcrypt('123456'),
                'phone' => '0962960613',
                'khoa' => 'Công nghệ thông tin',
                'lop' => 'Tin học kinh tế K62',
                'diachi' => 'Hà Nội',
            ],
            [
                'ma' => '1621050886',
                'name' => 'sinhvien',
                'username' =>  'Nguyễn Công Chính',
                'email' => '1621050886@student.humg.edu.vn',
                'password' => bcrypt('123456'),
                'phone' => '0379610510',
                'khoa' => 'Công nghệ thông tin',
                'lop' => 'Tin học kinh tế K61',
                'diachi' => 'Hà Nội',
            ],
            [
                'ma' => '1621050619',
                'name' => 'sinhvien',
                'username' => 'Trần Thị lan',
                'email' => '1621050619@student.humg.edu.vn',
                'password' => bcrypt('123456'),
                'phone' => '0358432015',
                'khoa' => 'Công nghệ thông tin',
                'lop' => 'Tin học kinh tế K61',
                'diachi' => 'Hà Nội',
            ],
            [
                'ma' => '161050546',
                'name' => 'sinhvien',
                'username' =>  'Chu Văn Nam Anh',
                'email' => '161050546@student.humg.edu.vn',
                'password' => bcrypt('123456'),
                'phone' => '0962728598',
                'khoa' => 'Công nghệ thông tin',
                'lop' => 'Tin học kinh tế K61',
                'diachi' => 'Hà Nội',
            ],
        ]);
        */
    }
}
