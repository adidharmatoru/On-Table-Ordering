<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
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
        'name', 'email', 'password', 'balance', 'phone_num', 'address', 'admin'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function fname(){
        $words = explode(" ", trim($this->name) );
        return strtoupper($words[0]);
    }

    public function balance(){
        return number_format($this->balance);
    }

    public function rates(){
        return $this->hasMany('App\Rate', 'user_id', 'id');
    }
}
