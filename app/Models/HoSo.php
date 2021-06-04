<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HoSo extends Model
{
    use HasFactory;
    protected $table = 'hoso';
    protected $primaryKey = 'id';
    protected  $fillable = ['id','hoso_code', 'user_id', 'phone', 'dia_chi', 'ngay_nhan', 'ngay_hen_tra', 'thutuc_id'];

    public  function  thutuc()
    {
        return $this->belongsTo(ThuTuc::class, 'thutuc_id');
    }
    public  function  user()
    {
        return $this->belongsTo(User::class, 'user_id','id');
    }
    public  function  xlhs()
    {
        return $this->hasMany(XuLyHoSo::class, 'hoso_id');
    }
    public function formTypes()
    {
        return $this->hasMany('App\Models\FormType', 'hoso_id');
    }
     const STATUS_DONE = 'Tiếp nhận';
     const STATUS_DONE1 = 'Đang xử lý';
     const STATUS_DONE2 = 'Hoàn thành';
     const STATUS_DEFAULT  = 'Chờ tiếp nhận';
}
