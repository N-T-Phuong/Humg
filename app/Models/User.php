<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasFactory, Notifiable, HasRoles;
    const ROLE = [
        'admin',
        'sinhvien',
        'canbo'
    ];
    protected $table = 'users';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $fillable = [
        'username',
        'name',
        'email',
        'password',
        'phone',
        'ma',
        'khoa',
        'lop',
        'diachi',
        'gioitinh',
        'phongban_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    public function hoso()
    {
        return $this->hasMany('App\Models\HoSo', 'user_id');
    }
    public function phongban()
    {
        return $this->belongsTo('App\Models\DanhMuc', 'phongban_id');
    }
    public function xlhs()
    {
        return $this->hasMany('App\Models\XuLyHoSo', 'user_id');
    }

    public function hosodatiepnhan(): BelongsToMany
    {
        return $this->belongsToMany(
            'App\Models\Hoso',
            'xulyhoso',
            'user_id',
            'hoso_id'
        )->where('trang_thai', '=', 'Tiếp nhận');  // where('trang_thai', '!=', 'Chờ tiếp nhận');
    }

    public function xulyhoso(): HasMany
    {
        return $this->hasMany(
            'App\Models\XuLyHoSo',
        );
    }

    public function vaitro()
    {
        return $this->roles[0];
    }
}
