<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable 
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','type'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    public static function validateRules(){
        return[
            'name'=>'required|string|max:255|min:3|unique:name',
            'email'=>'required|email',
            'password'=>'required|password',
        ];
    }
    public function message(){
        return[
            'required.name'=>"الحقل :attribute مطلوب",
            'required.email'=>"الحقل :attribute مطلوب",
            'required.password'=>"الحقل :attribute مطلوب",
            
        ];
     }
    

}
