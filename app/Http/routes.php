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


//Frontend
Route::get('/', function () {
    return view('frontend.home');
});
Route::get('/home', function () {
    return view('frontend.home');
});

Route::get('enlistment', 'EnlistmentController@index');

// Authentication routes...
Route::get('auth/login', 'Auth\AuthController@getLogin');
Route::get('auth/validate', 'Auth\AuthController@validateLogin');
Route::get('auth/logout', 'Auth\AuthController@getLogout');

// Registration routes...
Route::get('auth/register', 'Auth\AuthController@getLogin');
Route::post('auth/register', 'Auth\AuthController@postRegister');

//Backend

