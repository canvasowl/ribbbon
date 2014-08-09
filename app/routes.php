<?php

Route::resource('users', 'UsersController');
	Route::post('login', 'UsersController@login');

Route::resource('clients', 'ClientsController');


Route::get('/', function()
{
	return View::make('index');
});
