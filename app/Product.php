<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['slug','photo','name','description','stock','price','category_id','user_id','weight'];

    function user(){
    	return $this->belongsTo('App\User');
    }
}
