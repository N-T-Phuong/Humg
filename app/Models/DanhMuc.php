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
        return $this->hasMany(ThuTuc::class, 'danhmuc_id', 'id');
    }
}
