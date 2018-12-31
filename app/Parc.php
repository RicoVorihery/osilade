<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Parc extends Model
{
	protected $guarded=[''];
    
    public function client()
    {
    	return $this->belongsTo('App\Client','id_client');
    }


    public function typeMateriel()
    {
    	return $this->belongsTo('App\TypeMateriel','id_type_materiel');
    }
}
