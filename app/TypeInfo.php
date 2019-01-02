<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class TypeInfo extends Model
{
	protected $guarded=[''];
    //
    use Searchable;
    
}
