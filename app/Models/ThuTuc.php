<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ThuTuc extends Model
{
    use HasFactory;
    protected $table = 'thutuc';
    protected $primaryKey = 'id';
    protected $fillable = ['id', 'maTT', 'tenTT', 'danhmuc_id', 'mota', 'tg_giai_quyet'];
    public function danhmuc()
    {
        return $this->belongsTo(DanhMuc::class, 'danhmuc_id');
    }
    public function hoso()
    {
        return $this->hasMany(HoSo::class, 'thutuc_id');
    }
}
