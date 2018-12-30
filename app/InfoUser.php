<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class InfoUser extends Model
{
    protected $guarded=[''];
    
    public function client()
    {
    	return $this->belongsTo('App\Client','id_client');
    }


    public function typeInfo()
    {
    	return $this->belongsTo('App\TypeInfo','id_type_info');
    }
}
