<?php

Route::get('/', function()
{
	return View::make('index');
});

Route::resource('users', 'UsersController');
	Route::post('login', 'UsersController@login');
	Route::post('register', 'UsersController@register');

Route::resource('clients', 'ClientsController');


Route::get('/hud', array('as' => 'hud', function(){
	return View::make('hud');
}));
