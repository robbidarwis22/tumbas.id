<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    function user(){
    	return $this->belongsTo('App\User');
    }

    protected $casts = [
    	'ekspedisi' => 'array',
    ];
}
