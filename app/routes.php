<?php

Route::get('/', function()
{
	if( Auth::check() ) {
		return View::make('/hud');		
	}else{
		return View::make('index');	
	}	
});

Route::get('/register', function(){
	return View::make('register');
});

Route::get('/signin', function(){
	return View::make('signin');
});

Route::post('/login', 'UsersController@login');
Route::post('/make', 'UsersController@register');
Route::get('/logout', 'UsersController@logout');
Route::resource('/users', 'UsersController');

// The user needs to be logged in for these routes to work
Route::group(array('before' => 'auth'), function(){	
	Route::resource('clients', 'ClientsController');
	Route::resource('projects', 'ProjectsController');
	Route::resource('tasks', 'TasksController');
	
	Route::get('/hud', array('as' => 'hud', function(){
		return View::make('hud');
	}));

	Route::get('/profile', 'UsersController@index');

});