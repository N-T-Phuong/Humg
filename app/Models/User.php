<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasFactory, Notifiable, HasRoles;
    protected $table = 'users';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $fillable = [
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

    //    public  function  profile()
    //    {
    //        return $this->hasOne(Profile::class,'user_id','id' );
    //    }

    // public function getStrRole()
    // {
    //     //đảo mảng array_flip đẻ lấy mảng key=>value(string)
    //     $permissionMapping = array_flip(config('permission')); //tìm file per
    //     return $permissionMapping[$this->role];
    // }
}
