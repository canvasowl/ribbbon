<?php

Route::resource('clients', 'ClientsController');

Route::get('/', function()
{
	return View::make('index');
});
