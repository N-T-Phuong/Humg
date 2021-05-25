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
        'id', 'hoso_code', 'user_id', 'ngay_chuyen_toi', 'ngay_tiep_nhan', 'ngay_hen_tra', 'phong_ban_xu_ly',
        'noi_dung_xu_ly', 'trang_thai'
    ];
    public function Hoso()
    {
        return $this->belongsTo(HoSo::class, 'hoso_code');
    }
}
