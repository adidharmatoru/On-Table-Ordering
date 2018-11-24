<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',	'transaction',	'amount'
    ];

    public function users(){
        return $this->belongsTo('App\User', 'user_id', 'id');
    }
}
