<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BaseController extends Controller
{
    protected $currentUser;


    function __construct()
    {
    	$this->middleware(function($request,$next){
    		$this->currentUser = Auth::user();
    		
    		return $next($request);
    	});
    }
}
