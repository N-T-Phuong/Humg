<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class XuLyHoSo extends Model
{
    use HasFactory;
    protected $table = 'trangthaixulyhoso';
    protected $primaryKey = 'id';
    protected  $fillable = [
        'id', 'hoso_id', 'canbo_id', 'ngay_chuyen_toi', 'ngay_nhan', 'ngay_tra',
        'thoi_gian_thuc_hien', 'ket_qua_xu_ly', 'trang_thai'
    ];
    public function Hoso()
    {
        return $this->belongsTo(HoSo::class, 'hoso_id', 'id');
    }
}
