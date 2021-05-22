<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HoSo extends Model
{
    use HasFactory;
    protected $table = 'hoso';
    protected $primaryKey = 'id';
    protected  $fillable = ['id', 'sv_id', 'phone', 'dia_chi', 'cmnd', 'ngay_cap', 'noi_cap', 'thutuc_id'];
    public  function  sinhvien()
    {
        return $this->belongsTo(SinhVien::class, 'sv_id');
    }
    public  function  thutuc()
    {
        return $this->belongsTo(ThuTuc::class, 'thutuc_id');
    }
    public  function  xulyhoso()
    {
        return $this->hasMany(XuLyHoSo::class, 'hoso_id');
    }
    public function forms()
    {
        return $this->hasOne(Form::class, 'id_hoso');
    }
}
