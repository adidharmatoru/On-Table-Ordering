<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'cat_id','brand_id','title','price','description','image','keyword', 'special'
    ];

    public function carts(){
        return $this->hasMany('App\Cart', 'product_id', 'id');
    }

    public function rates(){
        return $this->hasMany('App\Rate', 'user_id', 'id');
    }

    public function categories(){
        return $this->belongsTo('App\Categories', 'cat_id', 'id');
    }
}
