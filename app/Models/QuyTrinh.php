<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QuyTrinh extends Model
{
    use HasFactory;
    protected  $table = 'quytrinh';
    protected  $primaryKey = 'id';
    protected $fillable = ['id', 'maQT', 'tenQT', 'id_thutuc', 'bieu_mau', 'trang_thai'];
    public function thutuc()
    {
        return $this->belongsTo(ThuTuc::class, 'id_thutuc', 'id');
    }
}
