<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class XuLyHoSo extends Model
{
    use HasFactory;
    protected $table = 'xulyhoso';
    protected $primaryKey = 'id';
    protected  $fillable = [
        'id', 'hoso_id', 'user_id',  'ngay_tiep_nhan', 'thoi_gian_thưc', 'phong_ban_xu_ly',
        'noi_dung_xu_ly', 'trang_thai'
    ];
    public function hoso()
    {
        return $this->belongsTo(HoSo::class, 'hoso_id', 'id');
    }
    public function danhmuc()
    {
        return $this->belongsTo(DanhMuc::class, 'phong_ban_xu_ly');
    }
}
