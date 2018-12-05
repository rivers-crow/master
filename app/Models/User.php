<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Model
{
    use  Notifiable;

    protected $table = 'users';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     * 可操作字段
     */
    protected $fillable = [
        'name','phone', 'password', 'email','open_id','phone','type','devid','last_login_time',
        //'service_city','service_zone','ABN','first_name','last_name',
    ];


    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     * 受保护字段
     */
    protected $hidden = [
        'password', 'remember_token', 'type'
    ];


    protected $casts = [
        'created'   => 'date:Y-m-d',
        'updated'   => 'datetime:Y-m-d H:i',
        'jsonData'  => 'array',
        'intSwitch' => 'boolean'
    ];

}
