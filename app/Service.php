<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class Service extends Model
{
    protected $guarded=[''];

    use Searchable;
    
    public function client()
    {
    	return $this->belongsTo('App\Client','id_client');
    }
}
