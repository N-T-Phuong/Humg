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
        'id', 'hoso_id', 'user_id', 'tg_thuc', 'phong_ban_xu_ly', 'noi_dung_xu_ly', 'trang_thai'
    ];
    public function hoso()
    {
        return $this->belongsTo(HoSo::class, 'hoso_id');
    }
    public function user()
    {
        return $this->belongsTo('App\Models\User', 'user_id');
    }
}
