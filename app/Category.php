<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
	protected $fillable = ['name','slug','parent_id','user_id'];
    function children(){
    	return $this->hasMany('App\Category','parent_id');
    }

    function parent(){
    	return $this->belongsTo('App\Category','parent_id','id');
    }
}
