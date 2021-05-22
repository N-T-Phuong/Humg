<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CanBo extends Model
{
    use HasFactory;
    protected $table = 'canbo';
    protected $primaryKey = 'id';
    protected  $fillable = ['id', 'ma_CB', 'ten_CB', 'danhmuc_id'];
    public function xulyhoso()
    {
        return $this->hasMany(XuLyHoSo::class, 'canbo_id', 'id');
    }
    public  function danhmuc()
    {
        return $this->belongsTo(DanhMuc::class, 'danhmuc_id', 'id');
    }
}
