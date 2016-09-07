<?php

Route::get('/', 'HomeController@index');
Route::get('register', function () {
    return View::make('register')->with('pTitle', 'Register');
});
Route::get('login', function () {
    return View::make('login')->with('pTitle', 'Login');
});
Route::get('faq', function () {
    return View::make('faq')->with('pTitle', 'FAQ');
});

//----------------- User routes
Route::resource('users', 'UsersController', ['only' => ['show']]);
Route::post('login', 'UsersController@login');
Route::post('make', 'UsersController@register');
Route::get('logout', 'UsersController@logout');
Route::post('resetPassword/{id}', 'UsersController@resetPassword');

//----------------- Auth routes
Route::group(['before' => 'auth'], function () {
    Route::get('hud', 'HomeController@index');
    Route::get('search', 'HomeController@search');
    Route::get('profile', 'UsersController@index');
    Route::get('clients', 'ClientsController@index');
    Route::delete('clients/{id}', 'ClientsController@destroy');
    Route::resource('projects', 'ProjectsController', ['only' => ['show']]);


//	Route::delete('projects/{id}/remove', array('uses' => 'ProjectsController@remove', 'as' => 'projects.remove') );
//    Route::get('projects/{id}/files', array('uses' => 'ProjectsController@files', 'as' => 'projects.files' ));
//    Route::post('projects/{id}/files', array('uses' => 'FilesController@store', 'as' => 'files.store' ));
//    Route::delete('projects/{id}/files', array('uses' => 'FilesController@destroy', 'as' => 'files.remove' ));
});

//----------------- API routes
Route::group(['prefix' => '/api/'], function () {
    // USER
    Route::get('user', 'UsersController@getUser');
    Route::post('user/{id}', 'UsersController@updateUser');
    Route::delete('user/', 'UsersController@deleteUser');

    // CLIENT
    Route::get('clients/{withWeight?}', 'ClientsController@getAllUserClients');
    Route::put('clients/{id}', 'ClientsController@updateClient');
    Route::post('clients', 'ClientsController@storeClient');
    Route::delete('clients/{id}', 'ClientsController@removeClient');

    // PROJECT
    Route::get('projects/', 'ProjectsController@getAllUserProjects');
    Route::get('projects/shared', 'ProjectsController@getAllMemberProjects');
    Route::get('projects/{id}', 'ProjectsController@getProject');
    Route::get('projects/{id}/owner', 'ProjectsController@getOwner');
    Route::get('projects/{id}/members', 'ProjectsController@getMembers');
    Route::post('projects', 'ProjectsController@storeProject');
    Route::put('projects/{id}', 'ProjectsController@updateProject');
    Route::post('projects/{id}/{email}/invite', 'ProjectsController@invite');
    Route::delete('projects/{id}/{member_id}/remove', 'ProjectsController@removeMember');

    // TASK
    Route::get('tasks', 'TasksController@getAllUserOpenTasks');
    Route::post('tasks/{client_id}/{project_id}', 'TasksController@storeTask');
    Route::delete('tasks/{id}', 'TasksController@removeTask');
    Route::put('tasks/{id}', 'TasksController@updateTask');

    // CREDENTIALS
    Route::get('credentials/{id}', 'CredentialsController@getProjectCredentials');
    Route::post('credentials', 'CredentialsController@storeCredential');
    Route::put('credentials/{id}', 'CredentialsController@updateCredential');
    Route::delete('credentials/{id}', 'CredentialsController@removeCredential');
});

//----------------- Admin routes
