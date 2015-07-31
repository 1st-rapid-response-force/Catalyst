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
Route::get('images/{image}/small', 'ImageController@showSmall');






//Actual Routes
Route::group(['namespace' => 'Frontend'], function()
{

    Route::get('/home', function () {
        return redirect('/');
    });
    Route::get('/test', function () {

    });



    Route::get('cac/{steam_id}', 'VPFController@buildCACCard');
    Route::get('avatar/{steam_id}', 'VPFController@buildAvatar');

    Route::get('/', 'PagesController@index');
    Route::get('about', 'PagesController@about');
    Route::get('servers', 'PagesController@servers');
    Route::get('structure-assignments', 'PagesController@structureAndAssignments');
    Route::get('faq', 'PagesController@faq');
    Route::get('contact-us', 'PagesController@contact');

    Route::group(['middleware' => 'auth'], function()
    {
        //Enlistment
        Route::get('enlistment', 'EnlistmentController@index');
        Route::get('enlistment/apply/{mos}',['as'=>'enlistments.create','uses'=> 'EnlistmentController@create']);
        Route::get('enlistment/my-application', 'EnlistmentController@show');
        Route::post('enlistment/store', 'EnlistmentController@store');
        Route::get('enlistment/success', 'EnlistmentController@success');
    });

    Route::group(['middleware' => ['auth','member']], function()
    {
        //Member only section
        Route::get('/virtual-personnel-file',['as' => 'vpf', 'uses' => 'VPFController@index']);
        Route::get('/virtual-personnel-file/faces',['as' => 'vpf.faces', 'uses' => 'VPFController@showFaces']);
        Route::post('/virtual-personnel-file/faces',['as' => 'vpf.faces.update', 'uses' => 'VPFController@saveFace']);

        //MyInbox
        Route::get('/my-inbox', ['as' => 'inbox', 'uses' => 'myInboxController@index']);
        Route::get('/my-inbox/create', ['as' => 'inbox.create', 'uses' => 'myInboxController@create']);
        Route::post('/my-inbox', ['as' => 'inbox.store', 'uses' => 'myInboxController@store']);
        Route::get('/my-inbox/{id}', ['as' => 'inbox.show', 'uses' => 'myInboxController@show']);
        Route::put('/my-inbox/{id}', ['as' => 'inbox.update', 'uses' => 'myInboxController@update']);
        Route::post('/my-inbox/delete', ['as' => 'inbox.removeThreads', 'uses' => 'myInboxController@deleteInboxThreads']);
        Route::get('/my-inbox/edit-message/{id}', ['as' => 'inbox.edit.message', 'uses' => 'myInboxController@editMessage']);
        Route::put('/my-inbox/edit-message/{id}', ['as' => 'inbox.edit.message.update', 'uses' => 'myInboxController@editMessageSave']);

        //Auto-Complete
        Route::get('autocomplete/users', 'AutoCompleteController@getUsers');


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








