<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Http\Requests;
use Response;
use App\User;
use App\Client;
use App\Project;
use App\Task;
use App\Credential;

class ApiController extends BaseController {

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

	// CLIENT - Get all clients for the logged in user
	public function getAllUserClients(){
		$clients = Client::where('user_id',Auth::id())->get();
		
		if (count($clients) === 0) {			
			return Response::json([
				'status' => 'error',
				'message' => 'No clients found'
			],404);
		}

		return Response::json([
				'status' => 'ok',
				'message' => 'Clients retrived successfully',
				'data' => $clients->toArray()
			],200);
	}

	// CLIENT - create a new client
	public function storeClient(){		
		if (!Input::all()) {
			return Response::json([
				'status' => 'error',
				'message' => 'No information provided to create client'
			],406);			
		}

		Input::merge(array('user_id' => Auth::id()));
		Client::create(Input::all());			
		$id = \DB::getPdo()->lastInsertId();

	    return Response::json([
			'status' => 'ok',
			'message' => 'Client created successfully',
			'data' => Client::find($id)
		],200);			
	}

	// CLIENT - update a specific client
	public function updateClient($id){
		if (count(Input::all()) <= 1) {
			return Response::json([
				'status' => 'error',
				'message' => 'No information provided to update client'
			],406);			
		}

		if (!Client::find($id)) {
			return Response::json([
				'status' => 'error',
				'message' => 'Client not found'
			],404);
		}

		$input = Input::all();
		unset($input['_method']);

		Client::find($id)->update($input);
		
		return Response::json([
			'status' => 'ok',
			'message' => 'The client has been updated'
		],200);
	}

	// CLIENT - get a specific client 
	public function getClient($id){
		if (!Client::find($id)) {
			return Response::json([
				'status' => 'error',
				'message' => 'The client was not found'
			],404);			
		}
	    return Response::json([
			'status' => 'ok',
			'message' => 'Client was successfully found',
			'data' => Client::find($id)
		],200);		
	}
	
}