<?php

Route::get('/', function()
{
	if( Auth::check() ) {
		return View::make('/hud');		
	}else{
		return View::make('index');	
	}	
});

Route::resource('/users', 'UsersController');
	Route::post('/login', 'UsersController@login');
	Route::get('/logout', 'UsersController@logout');
	Route::post('/register', 'UsersController@register');

Route::resource('clients', 'ClientsController');
Route::resource('projects', 'ProjectsController');
Route::resource('tasks', 'TasksController');

Route::get('/hud', array('as' => 'hud', function(){
	return View::make('hud');
}));
