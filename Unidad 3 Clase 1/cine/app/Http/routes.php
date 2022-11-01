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

//crear una ruta con presentacion de informacion

Route::get('hola',function(){
    return "hola mundo php";
});

Route::get('hola2/{nombre?}',function($nombre='yerko'){
    return "hola mundo de :".$nombre;
});

//Route::get('peliculas','PeliController@index');
Route::get('peliculas','PeliController');

Route::get('/', 'WelcomeController@index');

Route::get('home', 'HomeController@index');

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);
