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

    public function hosodangxuly()
    {
        return $this->hasMany(HoSo::class, 'thutuc_id')
            ->where('trang_thai', 'Đang xử lý');
    }

    public function hosochuaxuly()
    {
        return $this->hasMany(HoSo::class, 'thutuc_id')
            ->where('trang_thai', 'Chờ tiếp nhận');
    }

    public function hosodaxuly()
    {
        return $this->hasMany(HoSo::class, 'thutuc_id')
            ->where('trang_thai', 'Hoàn thành');
    }
    public function hosotiepnhan()
    {
        return $this->hasMany(HoSo::class, 'thutuc_id')
            ->where('trang_thai', 'Tiếp nhận');
    }
    public function hosohuy()
    {
        return $this->hasMany(HoSo::class, 'thutuc_id')
            ->where('trang_thai', 'Hủy hồ sơ');
    }
    public function forms()
    {
        return $this->hasMany('App\Models\Form', 'thutuc_id'); // => $thutuc->id
    }
}
