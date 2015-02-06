<?php

Route::get('/', 'HomeController@index');
Route::get('register', function(){ return View::make('register')->with('pTitle', "Register"); });
Route::get('signin', function(){ return View::make('signin')->with('pTitle', "Login"); });
Route::get('beta', function(){ return View::make('beta')->with('pTitle', "Beta email request"); });
Route::get('about', function(){ return View::make('about')->with('pTitle', "About Ribbbon"); });
Route::get('faq', function(){ return View::make('faq')->with('pTitle', "FAQ"); });

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
	Route::get('invite','AdminController@invite');
});

//----------------- Auth routes
Route::group(array('before' => 'auth'), function()
{	
	Route::resource('clients', 'ClientsController');

	Route::resource('projects', 'ProjectsController');	
	Route::post('projects/{id}/invite', array('uses' => 'ProjectsController@invite', 'as' => 'projects.invite' ));
	Route::delete('projects/{id}/remove', array('uses' => 'ProjectsController@remove', 'as' => 'projects.remove') );
	Route::get('projects/{id}/credentials', array('uses' => 'ProjectsController@credentials', 'as' => 'projects.credentials' ));
	Route::get('projects/{id}/manage', array('uses' => 'ProjectsController@edit', 'as' => 'projects.edit' ));


	Route::resource('credentials', 'CredentialsController');
	Route::resource('tasks', 'TasksController');
	Route::get('hud', 'HomeController@index');
	Route::get('search', 'HomeController@search');
	Route::get('profile', 'UsersController@index');
});


//----------------- API routes
Route::get('/api/{key}/authId', 'ApiController@authId');
Route::get('/api/{key}/{id}/tasks', 'ApiController@tasks');
Route::get('/api/{key}/{id}/tasks/incomplete', 'ApiController@incompleteTasks');
Route::get('/api/{key}/{id}/tasks/complete', 'ApiController@complete');


//-----------------
//-----------------
//-----------------
//----------------- TEST routes
Route::group(array('before' => 'admin'), function()
{	
	// Send test emails
	Route::get('/testEmails',function(){
		sendBetaFollowUpMail('jefrycruz88@gmail.com');
		sendBetaInviteEmail('jefrycruz88@gmail.com');
		sendWelcomeMail();

		return "All test emails sent";
	});	


	Route::get('pivot', function(){
		return Project::find(1)->users;
	});
	
});