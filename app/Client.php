<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
	protected $guarded=[''];


	public function references()
    {
        return $this->hasMany('App\Reference','id_client');
    }
}
