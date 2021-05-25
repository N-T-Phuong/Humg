<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FormType extends Model
{
    use HasFactory;
    protected $table='form_types';
    protected $primaryKey = 'id';
    protected $fillable = ['id', 'hoso_id', 'field', 'value'];
}
