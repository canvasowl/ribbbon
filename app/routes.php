<?php

Route::get('/', function()
{
	if( Auth::check() ) {
		return View::make('/hud');		
	}else{
		return View::make('index');	
	}	
});

Route::get('register', function(){ return View::make('register'); });
Route::get('signin', function(){ return View::make('signin'); });
Route::get('learn', function(){ return View::make('learn'); });

//----------------- User routes
Route::resource('users', 'UsersController');
Route::post('login', 'UsersController@login');
Route::post('make', 'UsersController@register');
Route::get('logout', 'UsersController@logout');
Route::post('request', 'UsersController@request');
Route::post('resetPassword/{id}','UsersController@resetPassword');

//----------------- Admin routes
Route::group(array('before' => 'admin'), function()
{	
	Route::get('confirm','AdminController@confirm');
	Route::get('invite','AdminController@invite');
});

//----------------- Auth routes
Route::group(array('before' => 'auth'), function()
{	
	Route::resource('clients', 'ClientsController');
	Route::resource('projects', 'ProjectsController');
	Route::resource('tasks', 'TasksController');
	
	Route::get('hud', array('as' => 'hud', function(){
		return View::make('hud');
	}));

	Route::get('profile', 'UsersController@index');
});

// Route::get('mail',function(){			
// 	sendBetaFollowUpMail("jefrycruz88@gmail.com");
// 	return "mail sent";
// });