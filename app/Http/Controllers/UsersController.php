<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
use App\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use App\Helpers\Helpers;
use Illuminate\Support\Facades\View;
use App\Client;
use App\Project;
use App\Task;
use App\Credential;

class UsersController extends BaseController {

	// Go to user settings page
	public function index()
	{
		return View::make('ins/settings')->with('pTitle', Auth::user()->full_name);
	}

	// Logout the user
	public function logout(){
		Auth::logout();
		return Redirect::to('/');
	}

	// Login the user
	public function login()
	{				
		$email 		=	Input::get('email');
		$password	=	Input::get('password');

		// lets validate the users input
		$validator = Validator::make(
			array(
					'email' 	=>	$email,
					'password' 	=> 	$password
			),
			array(
					'email'		=> 	'required|email',
					'password'	=>	'required'
			)
		);

		if ($validator->fails()){
		    return Redirect::back()->withErrors($validator)->withInput();
		}else{
			if( Auth::attempt(array('email' => $email, 'password' => $password)) ){				
				return Redirect::to('hud');
			}else{				
				$validator->getMessageBag()->add('input', 'Incorrect email or password');
				return Redirect::back()->withErrors($validator)->withInput();;
			}			
		}
	}	

	// Register the user and start a new session
	public function register()
	{	
		$fullName	=	Input::get('fullName');
		$email 		=	Input::get('email');
		$password	=	Input::get('password');	

		// lets validate the users input
		$validator = Validator::make(
			array(
					'fullName' 	=> 	$fullName,
					'email' 	=>	$email,
					'password' 	=> 	$password
			),
			array(
					'fullName' 	=> 	'required',
					'email'		=> 	'required|email|unique:users',
					'password'	=>	'required|min:8'
			)
		);

		if ($validator->fails()){
		    return Redirect::back()->withErrors($validator)->withInput();
		}

		$user 				=	new User;
		$user->full_name 	=	$fullName;
		$user->email 		=	$email;
		$user->password 	=	Hash::make($password);

		$user->save();	

		if ( Auth::attempt(array('email' => $email, 'password' => $password)) ) {
			Helpers::sendWelcomeMail();
			return Redirect::to('hud');
		}

		return Redirect::back()->withErrors($validator);
	}	

	// Reset the user password
	public function resetPassword($id)
	{		
		// ----------------------------------------
		$user = User::find(Auth::id());
		$created = $user->tasks_created;
		$completed = $user->tasks_completed;

		if ($created == "") {
			$created = 0;
		}

		if ($completed == "") {
			$completed = 0;
		}
		// ----------------------------------------

		$current_pwd	=	Input::get('current_pwd');
		$new_pwd		=	Input::get('new_pwd');

		// lets validate the users input
		$validator = Validator::make(
			array(
					'current_pwd' 	=>	$current_pwd,
					'new_pwd' 		=> 	$new_pwd
			),
			array(
					'current_pwd'	=> 	'required',
					'new_pwd'		=>	'required'
			)
		);

		if ($validator->fails()){
		    return Redirect::back()->withErrors($validator)->with('user', $user)->with('created', $created)->with('completed', $completed);
		}

		if ( !Auth::validate(array('email' => $user->email, 'password' => $current_pwd)) ) {
			$validator->getMessageBag()->add('password', 'That password is incorrect');
			return Redirect::back()->withErrors($validator)->with('user', $user)->with('created', $created)->with('completed', $completed);	
		}

		// Store the new password and redirect;
		$user->password = Hash::make($new_pwd);
		$user->save();

		return Redirect::back()
								->with('user', $user)
								->with('created', $created)->with('completed', $completed)
								->with('success', "Your password has been updated!");

	}

    // Get the current user
    public function getUser(){
        $user = User::find(Auth::id());
        return $user;
    }
    // Update the given user
    public function updateUser($id){
        if (strlen(trim(Input::get('email'))) === 0) {
            return $this->setStatusCode(200)->makeResponse('You need to provide an email.');
        }

        if( strlen(trim(Input::get('full_name'))) === 0 ){
            return $this->setStatusCode(200)->makeResponse('You have a name, no?');
        }

        if (!User::find(Auth::id())) {
            return $this->setStatusCode(404)->makeResponse('User not found');
        }

        $input = Input::all();
        unset($input['_method']);

        User::find(Auth::id())->update($input);

        return $this->setStatusCode(200)->makeResponse('Your changes have been saved');
    }

    // Delete the users account
    public function deleteUser()
    {
        Task::where('user_id', Auth::id())->delete();
        Credential::where('user_id', Auth::id())->delete();
        Project::where('user_id', Auth::id())->delete();
        Client::where('user_id', Auth::id())->delete();
        User::where('id', Auth::id())->delete();
    }

}