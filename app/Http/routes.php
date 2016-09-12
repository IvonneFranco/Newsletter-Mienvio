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

Route::get('/',['uses'=>'HomeController@index',
    'as'=>'home']);

Route::get('login',[
    'uses'=>'UsuarioController@getLogin',
    'as'=>'login']);

Route::post('login','UsuarioController@postLogin');
Route::get('auth/logout', 'UsuarioController@getLogout');

Route::get('register',[
    'uses'=>'UsuarioController@getRegister',
    'as'=>'register']);
Route::post('register','UsuarioController@store');



 Route::group(['middleware'=>'crearRol:admin'],function(){
     Route::get('cliente','Boletin_Controller@index');
    });





