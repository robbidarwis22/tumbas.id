<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        // 'name', 'email', 'photo', 'password', 'username', 'address', 'phone', 'gender','birthday','role'
        'name', 'email', 'password', 'username', 'address', 'phone', 'gender','birthday','role','status'
    ];
    // protected $guard = [''];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    function product(){
        return $this->hasMany('App\Product');
    }
}
