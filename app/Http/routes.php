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

Route::group(['namespace' => 'Frontend'], function()
{
    Route::get('/', function () {
        return view('frontend.home');
    });
    Route::get('/home', function () {
        return redirect('/');
    });

    Route::group(['middleware' => 'auth'], function()
    {
        //Enlistment
        Route::get('enlistment', 'EnlistmentController@index');
        Route::get('enlistment/apply/{mos}', 'EnlistmentController@create');
        Route::get('enlistment/my-application', 'EnlistmentController@show');
        Route::get('enlistment/view/{id}', 'EnlistmentController@showApp');
        Route::post('enlistment/store', 'EnlistmentController@store');
        Route::get('enlistment/success', 'EnlistmentController@success');
    });

    // Authentication routes...
    Route::get('login', 'Auth\AuthController@getLogin');
    Route::get('logout', 'Auth\AuthController@getLogout');
    Route::get('auth/login', 'Auth\AuthController@getLogin');
    Route::get('auth/validate', 'Auth\AuthController@validateLogin');
    Route::get('auth/logout', 'Auth\AuthController@getLogout');

    // Registration routes...
    Route::get('auth/register', 'Auth\AuthController@getLogin');
    Route::post('auth/register', 'Auth\AuthController@postRegister');


});

Route::group(['namespace' => 'Backend'], function()
{
});








