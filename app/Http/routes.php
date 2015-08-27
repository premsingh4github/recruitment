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

Route::get('/', 'HomeController@index');

Route::get('home', 'HomeController@index');
Route::group(['middleware'=>'auth'],function(){
Route::group(['middleware' => 'App\Http\Middleware\BlockMiddleware'], function()
{

Route::group(['middleware' => 'App\Http\Middleware\AdminMiddleware'], function()
{
   Route::resource('member','MemberController');
	Route::get('profile/{id}','MemberController@profile');
	Route::get('profile_edit/{id}','MemberController@profile_edit');
	// Route::resource('notification_and_email','MemberController@get_notification_and_email');
	Route::resource('setting','SettingController');
	Route::resource('country','CountryController');
	Route::resource('country/create','CountryController@create');
	Route::resource('identification','IdentificationController');
	Route::resource('identification/create','IdentificationController@create');
	Route::resource('industry','industryController');
	Route::resource('industry/create','IndustryController@create');
	Route::resource('position','PositionController');
	Route::resource('position/create','PositionController@create');
	Route::resource('currency','CurrencyController');
	Route::resource('currency/create','CurrencyController@create');
	Route::resource('qualification','QualificationController');
	Route::resource('qualification/create','QualificationController@create');
	Route::resource('fieldofstudy','FieldofstudyController');
	Route::resource('fieldofstudy/create','FieldofstudyController@create');
	Route::get('member_block/{id}','MemberController@block');
	Route::get('switchuser/{sid}','MemberController@switchuser');

});

	Route::resource('notification','NotificationController');
	Route::resource('agent','AgentController');
	Route::resource('employer','EmployerController');
	Route::resource('approval_view','AgentController@approval_view');
	Route::resource('demand_view','AgentController@demand_view');
	Route::resource('demand_delete','AgentController@demand_delete');
	Route::resource('demand_view_detail','AgentController@demand_view_detail');
	Route::resource('notification_email_view','AgentController@notification_email_view');
	Route::post('approval/create','ApprovalController@create');
	Route::resource('resume','ResumeController');
	Route::get('resume_preview/{id}','ResumeController@resume_preview');
	Route::resource('email','AgentController@notification_email_view');
	Route::resource('approval','ApprovalController');	
	Route::resource('demand','DemandController');
	Route::resource('password','PasswordController');
	
	Route::get('adminemail','NotificationController@index');
	Route::get('empdemand','AgentController@demand_view');
	Route::get('dem','DemandController@index');
	Route::get('members','MemberController@index');
	Route::resource('report','HistoryController');
	Route::post('report/create','HistoryController@create');
});
});

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);

