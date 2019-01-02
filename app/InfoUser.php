<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class InfoUser extends Model
{
    protected $guarded=[''];
    
    use Searchable;

    public function client()
    {
    	return $this->belongsTo('App\Client','id_client');
    }


    public function typeInfo()
    {
    	return $this->belongsTo('App\TypeInfo','id_type_info');
    }
}
