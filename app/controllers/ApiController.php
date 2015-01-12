<?php

class ApiController extends \BaseController {

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
	}
}