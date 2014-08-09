<?php

Route::resource('clients', 'UsersController');
Route::resource('clients', 'ClientsController');


Route::get('/', function()
{
	return View::make('index');
});
