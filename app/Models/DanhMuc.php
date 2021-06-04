<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DanhMuc extends Model
{
    use HasFactory;
    protected $table = 'danhmuc';
    public  function thutuc()
    {
        return $this->hasMany(ThuTuc::class, 'danhmuc_id');
    }
    public  function user()
    {
        return $this->hasMany(User::class, 'phongban_id');
    }
    public  function xlhs()
    {
        return $this->hasMany(XuLyHoSo::class, 'phong_ban_xu_ly', 'id');
    }
}
