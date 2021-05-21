<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SinhVien extends Model
{
    use HasFactory;
    protected $table = 'sinhvien';
    protected $primaryKey = 'id';
    protected $fillable = ['id', 'maSV', 'tenSV', 'khoa', 'lop', 'phone', 'diachi'];
    public function Hoso()
    {
        return $this->hasMany(HoSo::class,'sv_id','id');
    }
}
