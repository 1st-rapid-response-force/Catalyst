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
    Route::get('', function () {
        return redirect('/');
    });


    Route::get('cac/{steam_id}', 'VPFController@buildCACCard');
    Route::get('avatar/{steam_id}', 'VPFController@buildAvatar');
    Route::get('squad-xml', 'PagesController@squadXML');
    Route::get('infil', 'PagesController@getInfil');

    Route::get('/', 'PagesController@index');
    Route::get('about', 'PagesController@about');
    Route::get('servers', 'PagesController@servers');
    Route::get('structure-assignments', 'PagesController@structureAndAssignments');
    Route::get('faq', 'PagesController@faq');
    Route::get('apply', 'PagesController@apply');
    Route::get('contact-us', 'PagesController@contact');
    Route::get('modpack', 'PagesController@modpack');
    Route::get('policies/disciplinary', 'PagesController@disciplinary');


    Route::post('stripe/webhook', '\Laravel\Cashier\WebhookController@handleWebhook');

    Route::get('/roster/{id}', 'VPFController@publicView');

    // API
    Route::get('api/loadout/{steam_id}', 'APIController@getLoadout');
    Route::get('api/qualifications/{steam_id}', 'APIController@getQualifications');
    Route::get('api/vpf/validate/{steam_id}', 'APIController@getIsMember');
    Route::post('api/training/ranges', 'APIController@postQualification');

    Route::group(['middleware' => 'auth'], function()
    {
        //Enlistment
        Route::get('enlistment', 'EnlistmentController@index');
        Route::get('enlistment/apply/{mos}',['as'=>'enlistments.create','uses'=> 'EnlistmentController@create']);
        Route::get('enlistment/my-application', 'EnlistmentController@show');
        Route::post('enlistment/store', 'EnlistmentController@store');
        Route::get('enlistment/success', 'EnlistmentController@success');
    });

    // Used to report in My Squad
    Route::group(['middleware' => ['auth','member']], function()
    {
        Route::get('/my-squad', ['as' => 'squad', 'uses' => 'mySquadController@index']);
        Route::post('/my-squad/reportin', ['as' => 'squad.reportin.create', 'uses' => 'mySquadController@reportIn']);
    });

    //Report in Check
    Route::group(['middleware' => ['auth','member','reportin']], function()
    {
        //Member only section

        //VPF
        Route::get('/virtual-personnel-file',['as' => 'vpf', 'uses' => 'VPFController@index']);
            Route::get('/virtual-personnel-file/faces',['as' => 'vpf.faces', 'uses' => 'VPFController@showFaces']);
            Route::post('/virtual-personnel-file/faces',['as' => 'vpf.faces.update', 'uses' => 'VPFController@saveFace']);
            Route::get('/virtual-personnel-file/donations',['as' => 'vpf.donate', 'uses' => 'VPFController@showDonation']);
            Route::get('/virtual-personnel-file/donation/cancel',['as' => 'vpf.donation.cancel', 'uses' => 'VPFController@showDonationCancel']);
            Route::post('/virtual-personnel-file/donations/cancel',['as' => 'vpf.donate.cancel.confirm', 'uses' => 'VPFController@cancelPlan']);
            Route::post('/virtual-personnel-file/donations/plan1/{vpf_id}',['as' => 'vpf.donate.plan1', 'uses' => 'VPFController@processPlan1']);
            Route::post('/virtual-personnel-file/donations/plan2/{vpf_id}',['as' => 'vpf.donate.plan2', 'uses' => 'VPFController@processPlan2']);
            Route::post('/virtual-personnel-file/donations/plan3/{vpf_id}',['as' => 'vpf.donate.plan3', 'uses' => 'VPFController@processPlan3']);
            Route::post('/virtual-personnel-file/donations/plan4/{vpf_id}',['as' => 'vpf.donate.plan4', 'uses' => 'VPFController@processPlan4']);

            Route::get('/virtual-personnel-file/teamspeak',['as' => 'vpf.teamspeak', 'uses' => 'VPFController@showTeamspeak']);
            Route::post('/virtual-personnel-file/teamspeak',['as' => 'vpf.teamspeak.store', 'uses' => 'VPFController@saveTeamspeak']);
            Route::delete('/virtual-personnel-file/teamspeak/{id}',['as' => 'vpf.teamspeak.delete', 'uses' => 'VPFController@deleteTeamspeak']);
            Route::get('/forms/show/{type}/{id}',['as'=>'vpf.forms.show','uses'=>'FormsController@show']);
            Route::get('/forms/create/{type}',['as'=>'vpf.forms.create','uses'=>'FormsController@create']);
            Route::post('/forms/create/{type}',['as'=>'vpf.forms.store','uses'=>'FormsController@store']);

        //My Inbox
        Route::get('/my-inbox', ['as' => 'inbox', 'uses' => 'myInboxController@index']);
            Route::get('/my-inbox/create', ['as' => 'inbox.create', 'uses' => 'myInboxController@create']);
            Route::post('/my-inbox', ['as' => 'inbox.store', 'uses' => 'myInboxController@store']);
            Route::get('/my-inbox/{id}', ['as' => 'inbox.show', 'uses' => 'myInboxController@show']);
            Route::put('/my-inbox/{id}', ['as' => 'inbox.update', 'uses' => 'myInboxController@update']);
            Route::post('/my-inbox/delete', ['as' => 'inbox.removeThreads', 'uses' => 'myInboxController@deleteInboxThreads']);
            Route::get('/my-inbox/edit-message/{id}', ['as' => 'inbox.edit.message', 'uses' => 'myInboxController@editMessage']);
            Route::put('/my-inbox/edit-message/{id}', ['as' => 'inbox.edit.message.update', 'uses' => 'myInboxController@editMessageSave']);

        //My Squad
            Route::get('/my-squad/unit-announcement/{id}', ['as' => 'squad.announcement.view', 'uses' => 'mySquadController@viewAnnouncement']);
            Route::get('/my-squad/message/{id}/edit', ['as' => 'squad.chatter.edit', 'uses' => 'mySquadController@editChatter']);
            Route::put('/my-squad/message/{id}', ['as' => 'squad.chatter.update', 'uses' => 'mySquadController@updateChatter']);
            Route::post('/my-squad/message', ['as' => 'squad.chatter.create', 'uses' => 'mySquadController@addChatter']);
            Route::get('/my-squad/announcement/', ['as' => 'squad.announcement.index', 'uses' => 'mySquadController@indexSquadAnnouncement']);
            Route::post('/my-squad/announcement', ['as' => 'squad.announcement.create', 'uses' => 'mySquadController@addSquadAnnouncement']);
            Route::get('/my-squad/announcement/{id}/edit', ['as' => 'squad.announcement.edit', 'uses' => 'mySquadController@editSquadAnnouncement']);
            Route::put('/my-squad/announcement/{id}', ['as' => 'squad.announcement.update', 'uses' => 'mySquadController@updateSquadAnnouncement']);
            Route::post('/my-squad/oncall/add', ['as' => 'squad.oncall.create', 'uses' => 'mySquadController@onCallAdd']);
            Route::post('/my-squad/oncall/remove', ['as' => 'squad.oncall.disable', 'uses' => 'mySquadController@onCallDisable']);
            Route::post('/my-squad/oncall/request', ['as' => 'squad.oncall.request', 'uses' => 'mySquadController@onCallAssistance']);


        //My Training Center
        Route::get('/my-training', ['as' => 'training', 'uses' => 'myTrainingController@index']);
        Route::get('/my-training/instructor', ['as' => 'training.instructor', 'uses' => 'myTrainingController@instructor']);
        Route::get('/my-training/instructor/{date_id}/complete', ['as' => 'training.instructor.class.complete', 'uses' => 'myTrainingController@completeClass']);
        Route::post('/my-training/instructor/{date_id}/complete', ['as' => 'training.instructor.class.complete.post', 'uses' => 'myTrainingController@completePostClass']);
        Route::get('/my-training/instructor/{date_id}/cancel', ['as' => 'training.instructor.class.cancel', 'uses' => 'myTrainingController@cancelClass']);
        Route::post('/my-training/instructor/{date_id}/cancel', ['as' => 'training.instructor.class.cancel.post', 'uses' => 'myTrainingController@postCancelClass']);
            Route::get('/my-training/{id}', ['as' => 'training.show', 'uses' => 'myTrainingController@show']);
            Route::get('/my-training/{id}/sections/{section_id}', ['as' => 'training.section.show', 'uses' => 'myTrainingController@showSection']);
            Route::post('/my-training/enroll/{id}', ['as' => 'training.enroll', 'uses' => 'myTrainingController@enrollClass']);
            Route::put('/my-training/enroll/{id}', ['as' => 'training.date.signup', 'uses' => 'myTrainingController@signupDate']);
            Route::delete('/my-training/date/{id}', ['as' => 'training.date.destroy', 'uses' => 'myTrainingController@cancelDate']);

        //My Loadout
        Route::get('/my-loadout', ['as' => 'loadout', 'uses' => 'myLoadoutController@index']);
        Route::put('/my-loadout', ['as' => 'loadout.save', 'uses' => 'myLoadoutController@saveLoadout']);


        //Auto-Complete
        Route::get('autocomplete/users', 'AutoCompleteController@getUsers');
        Route::get('autocomplete/vpf', 'AutoCompleteController@getVPFs');

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

    Route::get('/',['as'=>'dashboard','uses'=>'AdminController@index']);
    Route::get('dashboard', function () {
        return redirect('/admin/');
    });

    Route::post('events/add-event',['as'=>'admin.events.postAddEvent','uses'=>'EventController@store']);
    Route::resource('users', 'UserController');

    // Enlistments
    Route::post('enlistments/approve/{id}',['as'=>'admin.enlistments.approve','uses'=>'ApplicationsController@approve']);
    Route::post('enlistments/reject/{id}',['as'=>'admin.enlistments.reject','uses'=>'ApplicationsController@reject']);
    Route::get('enlistments/accepted-apps',['as'=>'admin.enlistments.accepted','uses'=>'ApplicationsController@accepted']);
    Route::get('enlistments/rejected-apps',['as'=>'admin.enlistments.rejected','uses'=>'ApplicationsController@rejected']);
    Route::resource('enlistments', 'ApplicationsController');



    Route::resource('ribbons', 'RibbonsController');
    Route::resource('qualifications', 'QualificationsController');

    // Form Manager
    Route::get('forms/',['as'=>'admin.forms.index','uses'=>'FormsController@index']);
    Route::get('forms/all/',['as'=>'admin.forms.all','uses'=>'FormsController@all']);
    Route::get('forms/edit/{vpf_id}/{type}/{id}',['as'=>'admin.forms.edit','uses'=>'FormsController@edit']);
    Route::get('forms/edit/{vpf_id}/{type}/{id}/complete',['as'=>'admin.forms.school-completion.complete','uses'=>'FormsController@getSchoolComplete']);
    Route::post('forms/edit/{vpf_id}/{type}/{id}/complete',['as'=>'admin.forms.school-completion.complete.post','uses'=>'FormsController@postSchoolComplete']);
    Route::post('forms/edit/{vpf_id}/{type}/{id}',['as'=>'admin.forms.edit','uses'=>'FormsController@process']);
    Route::delete('forms/delete/{type}/{id}',['as'=>'admin.forms.destroy','uses'=>'FormsController@index']);


    // Schools
    Route::get('schools/{id}/section/new/',['as'=>'admin.schools.section.add','uses'=>'SchoolsController@addSection']);
    Route::get('schools/{id}/section/{section_id}',['as'=>'admin.schools.section.show','uses'=>'SchoolsController@showSection']);
    Route::get('schools/{id}/section/edit/{section_id}',['as'=>'admin.schools.section.edit','uses'=>'SchoolsController@editSection']);
    Route::put('schools/{id}/section/edit/{section_id}',['as'=>'admin.schools.section.update','uses'=>'SchoolsController@updateSection']);
    Route::delete('schools/{id}/section/delete/{section_id}',['as'=>'admin.schools.section.delete','uses'=>'SchoolsController@deleteSection']);
    Route::post('schools/{id}/section/new/',['as'=>'admin.schools.section.store','uses'=>'SchoolsController@storeSection']);
    Route::get('schools/time-date/{id}',['as'=>'admin.schools.timeDate.index','uses'=>'SchoolsController@indexTimeDate']);
    Route::get('schools/time-date/{id}/{event_id}',['as'=>'admin.schools.timeDate.edit','uses'=>'SchoolsController@editTimeDate']);
    Route::post('schools/time-date/{id}/{event_id}',['as'=>'admin.schools.timeDate.post','uses'=>'SchoolsController@postTimeDate']);
    Route::post('schools/time-date/{id}',['as'=>'admin.schools.timeDate.add','uses'=>'SchoolsController@addTimeDate']);
    Route::delete('schools/time-date/{school_id}/{id}',['as'=>'admin.schools.timeDate.delete','uses'=>'SchoolsController@deleteTimeDate']);\
    Route::resource('schools', 'SchoolsController');

    // Virtual Personnel File
    Route::get('vpf/{vpf_id}/promote',['as'=>'admin.vpf.promote','uses'=>'VPFController@showPromoteUser']);
    Route::post('vpf/{vpf_id}/promote',['as'=>'admin.vpf.promote.store','uses'=>'VPFController@PromoteUser']);
    Route::get('vpf/{vpf_id}/reassign',['as'=>'admin.vpf.reassign','uses'=>'VPFController@showReassignMember']);
    Route::post('vpf/{vpf_id}/reassign',['as'=>'admin.vpf.reassign.store','uses'=>'VPFController@reassignMember']);
    Route::get('vpf/{vpf_id}/discharge',['as'=>'admin.vpf.discharge','uses'=>'VPFController@showDischargeMember']);
    Route::post('vpf/{vpf_id}/discharge',['as'=>'admin.vpf.discharge.store','uses'=>'VPFController@dischargeMember']);
    Route::get('vpf/{vpf_id}/forms/{type}',['as'=>'admin.forms.new','uses'=>'FormsController@newForm']);
    Route::post('vpf/{vpf_id}/forms/{type}',['as'=>'admin.forms.store','uses'=>'FormsController@storeForm']);
    Route::delete('vpf/{vpf_id}/delete/service-history/{id}',['as'=>'admin.vpf.delete.serviceHistory','uses'=>'VPFController@destroyServiceHistory']);
    Route::delete('vpf/{vpf_id}/delete/form/{type}/{id}',['as'=>'admin.vpf.delete.form','uses'=>'FormsController@destroyForm']);
    Route::delete('vpf/{vpf_id}/delete/qualification/{id}',['as'=>'admin.vpf.delete.qualification','uses'=>'VPFController@destroyQualification']);
    Route::delete('vpf/{vpf_id}/delete/operations/{id}',['as'=>'admin.vpf.delete.operations','uses'=>'VPFController@destroyOperation']);
    Route::delete('vpf/{vpf_id}/delete/schools/{id}',['as'=>'admin.vpf.delete.school','uses'=>'VPFController@destroySchool']);
    Route::resource('vpf', 'VPFController');

    //Groups
    Route::get('groups/{group_id}/mysquad',['as'=>'admin.groups.mysquad','uses'=>'GroupController@mySquad']);
    Route::post('groups/{group_id}/mysquad/chatter',['as'=>'admin.groups.chatter.create','uses'=>'GroupController@addChatter']);
    Route::post('groups/{group_id}/mysquad/squadannouce',['as'=>'admin.groups.squadannouce.create','uses'=>'GroupController@addSquadAnnoucement']);

    //On Call
    Route::get('oncall/members',['as'=>'admin.oncall.indexMembers','uses'=>'OncallController@indexMembers']);



    //PERSTAT
    Route::post('perstat/email/{id}',['as'=>'admin.perstat.email','uses'=>'PerstatController@emailAllPending']);
    Route::resource('perstat', 'PerstatController');

    Route::resource('infil', 'InfilController');
    Route::resource('operations', 'OperationsController');
    Route::resource('announcements', 'AnnouncementController');
    Route::resource('ranks', 'RanksController');
    Route::resource('loadouts', 'LoadoutsController');
    Route::resource('assignments', 'AssignmentController');
    Route::resource('teamspeak', 'TeamspeakController');
    Route::resource('oncall', 'OncallController');
    Route::resource('prism', 'PrismController');
    Route::resource('groups', 'GroupController');


    Route::get('autocomplete/courses', 'AutoCompleteController@getCourses');

});








