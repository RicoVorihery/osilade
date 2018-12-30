<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reference extends Model
{
	protected $guarded=[''];

    public function client()
    {
    	return $this->belongsTo('App\Client','id_client');
    }
}
