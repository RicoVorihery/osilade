<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/', 'HomeController@index');
Route::get('/storeTest','HomeController@storeTest');


Route::group(['middleware'=>['auth','web']], function(){
	
	//CRUD CLIENT
	Route::resource('clients','ClientController');

	//CRUD REFERENCE
	Route::resource('references','ReferenceController');

	//RECHERCHE
	Route::get('recherche', 'SearchController@index');
	Route::get('search/find/{keyword}/{idClient}','SearchController@find');
	

	//AJAX 
	Route::get('references/getReferencesByIdClient/{id_client}',
		'ReferenceController@getReferencesByIdClient');
	
	Route::get('references/getReferenceById/{id}','ReferenceController@getReferenceById');

	Route::get('references/deleteReferenceFile/{id}/{file}/{number}','ReferenceController@deleteReferenceFile');

	//SETTINGS
	Route::resource('parametres','SettingController',['except' => ['create', 'store','show']]);

	//RESTRICTION
	Route::get('settings/restriction', function(){
		return view('settings.restriction');
	});
	
	//CRUD TYPES
	Route::resource('parametres/type-materiels','TypeMaterielController');
	Route::resource('parametres/type-infos','TypeInfoController');
	Route::resource('parametres/type-services','TypeServiceController');

	//CRUD PARC
	Route::resource('parcs','ParcController');
	Route::get('parcs/getParcsByIdClient/{id_client}','ParcController@getParcsByIdClient');

	//CRUD INFO USER
	Route::resource('info-users','InfoUserController');
	Route::get('info-users/getInfoUsersByIdClient/{id_client}','InfoUserController@getInfoUsersByIdClient');

	//CRUD SERVICE
	Route::resource('services','ServiceController');
	Route::get('services/getServicesByIdClient/{id_client}','ServiceController@getServicesByIdClient');

});

	Auth::routes();
