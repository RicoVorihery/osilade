<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class Parc extends Model
{
	protected $guarded=[''];
    
    use Searchable;
    
    public function client()
    {
    	return $this->belongsTo('App\Client','id_client');
    }


    public function typeMateriel()
    {
    	return $this->belongsTo('App\TypeMateriel','id_type_materiel');
    }
}
