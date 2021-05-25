<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Form extends Model
{
    use HasFactory;
    protected $table = 'forms';
    protected $fillable = ['id', 'thutuc_id', 'label', 'type','field'];
    // public function hoso()
    // {
    //     return $this->belongsTo(HoSo::class, 'id_hoso', 'id');
    // }
    // public function hocphan()
    // {
    //     return $this->hasMany(HocPhan::class, 'form_id');
    // }
}
