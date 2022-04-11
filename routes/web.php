<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\StripeController;

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

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();

Route::group(['middleware'=>'localization'],function(){

	// User Access
		    Route::group(['middleware' => 'auth','user_access'], function () {
			Route::get('/my-account', 'App\Http\Controllers\User\UserController@index')->name('user.dashboard');
			Route::get('user-profile', ['as' => 'userprofile.edit', 'uses' => 'App\Http\Controllers\User\ProfileController@edit']);
			Route::put('user-profile', ['as' => 'userprofile.update', 'uses' => 'App\Http\Controllers\User\ProfileController@update']);
			Route::put('userprofile/password', ['as' => 'userprofile.password', 'uses' => 'App\Http\Controllers\User\ProfileController@password']);
			Route::get('user-notifications',[App\Http\Controllers\User\NotificationController::class,'index'])->name('usernotifications.index');
			Route::put('userprofile/password', ['as' => 'userprofile.password', 'uses' => 'App\Http\Controllers\ProfileController@password']);
		});

});

// Admin Acces //
Route::group(['middleware' => ['auth','admin_access']], function () {
	Route::get('/home', 'App\Http\Controllers\Admin\HomeController@index')->name('home');
	// Route::get('profile', ['as' => 'profile.edit', 'uses' => 'App\Http\Controllers\Admin\ProfileController@edit']);
	// Route::put('profile', ['as' => 'profile.update', 'uses' => 'App\Http\Controllers\Admin\ProfileController@update']);
	// Route::put('profile/password', ['as' => 'adminprofile.password', 'uses' => 'App\Http\Controllers\Admin\ProfileController@password']);
	Route::resource('developers','App\Http\Controllers\Admin\DeveloperController');
	Route::resource('projects','App\Http\Controllers\Admin\ProjectController');
	Route::resource('queries','App\Http\Controllers\Admin\QueryController');
	Route::resource('assignlead','App\Http\Controllers\Admin\AssignleadController');
    Route::post('/queriefile' ,[App\Http\Controllers\Admin\QueryController::class ,'fileadd']);
    Route::get('/reassign_projectcreate' ,[App\Http\Controllers\Admin\AssignleadController::class ,'reassign_projectcreate']);
    Route::put('/reassignproject' ,[App\Http\Controllers\Admin\AssignleadController::class ,'reassignproject']);

	// new route
	Route::resource('country','App\Http\Controllers\Admin\CountryController');
	Route::resource('leads','App\Http\Controllers\Admin\leadController');
	Route::post('change-status/{id}',[App\Http\Controllers\Admin\leadController::class,'leadStatusChange']);
	Route::get('/lead-person', 'App\Http\Controllers\Admin\leadController@lead_person_index')->name('lead-person-list');
	Route::get('lead-person-create',[App\Http\Controllers\Admin\leadController::class,'lead_person_create'])->name('lead_person_create');
	Route::post('lead-person-store',[App\Http\Controllers\Admin\leadController::class,'lead_person_store'])->name('lead_person_store');
	Route::post('person-change-status/{id}',[App\Http\Controllers\Admin\leadController::class,'leadpersonStatusChange']);
	Route::get('/lead-source', 'App\Http\Controllers\Admin\leadController@lead_source_index')->name('lead-source-list');
	Route::get('lead_source_create',[App\Http\Controllers\Admin\leadController::class,'lead_source_create'])->name('lead_source_create');
	Route::post('lead-source-store',[App\Http\Controllers\Admin\leadController::class,'lead_source_store'])->name('lead_source_store');
	Route::post('source-change-status/{id}',[App\Http\Controllers\Admin\leadController::class,'leadsourceStatusChange']);
	Route::get('/lead-status', 'App\Http\Controllers\Admin\leadController@lead_status_index')->name('lead-status-list');
	Route::get('lead_status_create',[App\Http\Controllers\Admin\leadController::class,'lead_status_create'])->name('lead_status_create');
	Route::post('lead-status-store',[App\Http\Controllers\Admin\leadController::class,'lead_status_store'])->name('lead_status_store');
	Route::post('status-change-status/{id}',[App\Http\Controllers\Admin\leadController::class,'leadstatusStatusChange']);
	Route::resource('add-users','App\Http\Controllers\Admin\AdduserController');

});



