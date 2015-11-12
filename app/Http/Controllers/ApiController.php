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

	private $statusCode = 200;

    /**
     * @return int
     */
    public function getStatusCode()
    {
        return $this->statusCode;
    }

    /**
     * @param $statusCode
     * @return $this
     */
    public function setStatusCode($statusCode)
    {
        $this->statusCode = $statusCode;

        return $this;
    }

    /**
     * @param $message
     * @param null $data
     * @return mixed
     */
    public function makeResponse($message, $data = null)
    {
        return Response::json([
            'status_code' => $this->getStatusCode(),
            'message' => $message,
            'data' => $data
        ], $this->getStatusCode());
    }

    /**
     * @param $key
     * @return string or Int
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
		$clients = Client::where('user_id',4)->get();
		
		if (count($clients) === 0) {
            return $this->setStatusCode(400)->makeResponse('Could not find clients');
        }
        return $this->setStatusCode(200)->makeResponse('Clients retrieved successfully',$clients->toArray());
	}

	// CLIENT - create a new client
	public function storeClient(){		
		if (!Input::all()) {
            return $this->setStatusCode(406)->makeResponse('No information provided to create client');
		}

		Input::merge(array('user_id' => Auth::id()));
		Client::create(Input::all());			
		$id = \DB::getPdo()->lastInsertId();

        return $this->setStatusCode(200)->makeResponse('Client created successfully', Client::find($id));
	}

	// CLIENT - update a specific client
	public function updateClient($id){
		if (count(Input::all()) <= 1) {
            return $this->setStatusCode(406)->makeResponse('No information provided to update client');
		}

		if (!Client::find($id)) {
            return $this->setStatusCode(404)->makeResponse('Client not found');
		}

		$input = Input::all();
		unset($input['_method']);

		Client::find($id)->update($input);

        return $this->setStatusCode(200)->makeResponse('The client has been updated');
	}

	// CLIENT - get a specific client 
	public function getClient($id){
		if (!Client::find($id)) {
            return $this->setStatusCode(404)->makeResponse('The client was not found');
		}

        return $this->setStatusCode(200)->makeResponse('Client was successfully found', Client::find($id));
	}

	// PROJECT - store a new project
	public function storeProject(){
		if (!Input::all()) {
            return $this->setStatusCode(406)->makeResponse('No information provided to create project');
		}

		Input::merge(array('user_id' => 1));
		Project::create(Input::all());			
		$id = \DB::getPdo()->lastInsertId();

        return $this->setStatusCode(200)->makeResponse('Project created successfully', Project::find($id));
	}

	// PROJECT - update project
	public function updateProject($id){
		if (count(Input::all()) <= 1) {
            return $this->setStatusCode(406)->makeResponse('No information provided to update project');
		}

		if (!Project::find($id)) {
            return $this->setStatusCode(404)->makeResponse('Project not found');
		}

		$input = Input::all();
		unset($input['_method']);

		Project::find($id)->update($input);

        return $this->setStatusCode(200)->makeResponse('The project has been updated');
	}

}