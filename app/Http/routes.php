<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

/*
|--------------------------------------------------------------------------
| defaut route
|--------------------------------------------------------------------------
|
| Route::get('/', function () {
| 	return view('welcome');
| });
*/

Route::get('/', function () {
	return Redirect::to('/login');
});

Route::group(['prefix'=>'login'], function(){
	Route::get('/', 'LoginController@form');
	Route::post('signin', 'LoginController@signin');
	Route::get('signout', 'LoginController@signout');
});

Route::group(['prefix'=>'log'], function(){
	Route::get('/', 'LogController@main');
});

Route::group(['prefix'=>'manager'], function(){
	Route::get('/', 'ManagerController@main');
	Route::post('create', 'ManagerController@create');
	Route::post('update/{id}', 'ManagerController@update');
	Route::get('edit/{id}', 'ManagerController@edit');
	Route::get('delete/{id}', 'ManagerController@delete');
});
