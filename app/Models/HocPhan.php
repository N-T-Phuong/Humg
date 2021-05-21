<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HocPhan extends Model
{
    use HasFactory;
    protected $table = 'hocphan';
    protected $fillable = ['mahp', 'tenhp', 'nhomhp', 'form_id'];
    public function form()
    {
        return $this->belongsTo(Form::class,'form_id');
    }
}
