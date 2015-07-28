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
//Utility
Route::get('images/{image}', 'ImageController@show');
Route::get('images/{image}/full', 'ImageController@show');
Route::get('images/{image}/limited', 'ImageController@show');
Route::get('test', function () {
    $storagePath = url().'img/seeder/ranks/60px-US-O5_insignia.svg.png';

    //Upload to Cloud
    $image = Cloudder::upload($storagePath);
    return $image;
});

//Actual Routes
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
        Route::get('enlistment/apply/{mos}',['as'=>'enlistments.create','uses'=> 'EnlistmentController@create']);
        Route::get('enlistment/my-application', 'EnlistmentController@show');
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

Route::group(['namespace' => 'Backend',
    'prefix' => 'admin',
    'middleware' => ['auth', 'admin']], function() {

    Route::get('/', function () {
        return view('backend.dashboard');
    });
    Route::get('dashboard', function () {
        return redirect('/admin/');
    });
    Route::resource('users', 'UserController');

    Route::post('enlistments/approve/{id}',['as'=>'admin.enlistments.approve','uses'=>'ApplicationsController@approve']);
    Route::post('enlistments/reject/{id}',['as'=>'admin.enlistments.reject','uses'=>'ApplicationsController@reject']);
    Route::get('enlistments/accepted-apps',['as'=>'admin.enlistments.accepted','uses'=>'ApplicationsController@accepted']);
    Route::get('enlistments/rejected-apps',['as'=>'admin.enlistments.rejected','uses'=>'ApplicationsController@rejected']);
    Route::resource('enlistments', 'ApplicationsController');

    Route::resource('ribbons', 'RibbonsController');
    Route::resource('qualifications', 'QualificationsController');
    Route::resource('schools', 'SchoolsController');
    Route::resource('operations', 'OperationsController');
    Route::resource('ranks', 'RanksController');

});








