<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Form extends Model
{
    use HasFactory;
    protected $table = 'form';
    protected $fillable = ['id', 'id_hoso', 'mahp', 'tenhp', 'nhomhp', 'lydo', 'tu_ngay', 'den_ngay', 'hoc-ky', 'lophp'];
    public function hoso()
    {
        return $this->belongsTo(HoSo::class, 'id_hoso', 'id');
    }
    public function hocphan()
    {
        return $this->hasMany(HocPhan::class, 'form_id');
    }
}
