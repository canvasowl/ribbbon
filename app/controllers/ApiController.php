<?php

class ApiController extends \BaseController {

	/**
	 * Get the id of the Auth user
	 * @param  [int] $key the api key
	 * @return [int]      An id
	 */
	public function authId($key){
		
		// Validate the api key
		if ($key != 0000000000) {
			return "Api key is incorrect";		
		}			

		return Auth::id();
	}

	/**
	 * Get all tasks from a user
	 * @param  [int] $key  		[the api key]
	 * @param  [int] $id   		[the id of the user]
	 * @return [json object]    [tasks]
	 */
	public function tasks($key, $id){
		
		// Validate the api key
		if ($key != 0000000000) {
			return "Api key is incorrect";		
		}		
		
		$user = User::find($id);

		return $user->tasks;
	}

	/**
	 * Get all incomplete tasks for a given user
	 * @param  [int] $key  [the api key]
	 * @param  [int] $id   [the user id]
	 * @return [type]      [incomplete tasks] 
	 */
	public function incompleteTasks($key, $id){
		// Validate the api key
		if ($key != 0000000000) {
			return "Api key is incorrect";		
		}		
		
		$user = User::find($id);

		return 	$user->tasks()->whereState('incomplete')->get();	
	}


	/**
	 * Get all complete tasks for a given user
	 * @param  [int] $key  [the api key]
	 * @param  [int] $id   [the user id]
	 * @return [type]      [complete tasks] 
	 */
	public function complete($key, $id){
		// Validate the api key
		if ($key != 0000000000) {
			return "Api key is incorrect";		
		}		
		
		$user = User::find($id);

		return 	$user->tasks()->whereState('complete')->get();		
	}
	
}