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

    /**
     * Get all the clients for the logged in user
     * @return mixed
     */
    public function getAllUserClients($withWeight = false){
		$clients = Client::with('projects')->where('user_id',4)->get();
		
		if (count($clients) === 0) {
            return $this->setStatusCode(400)->makeResponse('Could not find clients');
        }

        // Get each project total weight if needed
        if($withWeight == true){
            if($clients) {
                foreach ($clients as $client) {
                    if($client->projects){
                        foreach($client->projects as $project){
                            $weight = Project::find($project->id)->tasks()->where('state','!=','complete')->sum('weight');
                            $project["weight"] = $weight;
                        }
                    }
                }
            }
        }
        return $this->setStatusCode(200)->makeResponse('Clients retrieved successfully',$clients->toArray());
	}

    /**
     * Insert a new client into the database
     * @return mixed
     */
    public function storeClient(){
		
        if (  strlen(trim(Input::get('name'))) == 0) {
            return $this->setStatusCode(400)->makeResponse('Name field is required');
		}

		Input::merge(array('user_id' => Auth::id()));
		Client::create(Input::all());			
		$id = \DB::getPdo()->lastInsertId();

        return $this->setStatusCode(200)->makeResponse('Client created successfully', Client::find($id));
	}


    /**
     * Update the given client
     * @param $id
     * @return mixed
     */
    public function updateClient($id){
		if (count(Input::all()) <= 1) {
            return $this->setStatusCode(406)->makeResponse('No information provided to update client');
		}

        if( strlen(trim(Input::get('name'))) === 0 ){
            return $this->setStatusCode(406)->makeResponse('The client name is required');
        }

		if (!Client::find($id)) {
            return $this->setStatusCode(404)->makeResponse('Client not found');
		}

		$input = Input::all();
		unset($input['_method']);

		Client::find($id)->update($input);

        return $this->setStatusCode(200)->makeResponse('The client has been updated');
	}

    /**
     * Get a specific client
     * @param $id
     * @return mixed
     */
    public function getClient($id){
		if (!Client::find($id)) {
            return $this->setStatusCode(404)->makeResponse('The client was not found');
		}

        return $this->setStatusCode(200)->makeResponse('Client was successfully found', Client::find($id));
	}

    /**
     * Insert a new project into the database
     * @return mixed
     */
    public function storeProject(){
		if (!Input::all() || strlen(trim(Input::get('name'))) == 0) {
            return $this->setStatusCode(406)->makeResponse('No information provided to create project');
		}

		Input::merge(array('user_id' => Auth::id()));
		Project::create(Input::all());			
		$id = \DB::getPdo()->lastInsertId();

        return $this->setStatusCode(200)->makeResponse('Project created successfully', Project::find($id));
	}

    /**
     * Update the given project
     * @param $id
     * @return mixed
     */
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

    /**
     * Insert a new task into the database
     * @return mixed
     */
    public function storeTask(){
        if (!Input::all()) {
            return $this->setStatusCode(406)->makeResponse('No information provided to create client');
        }

        if (!Input::get('name')) {
            return $this->setStatusCode(406)->makeResponse('The name seems to be empty');
        }

        Input::merge(array('user_id' => Auth::id()));
        Task::create(Input::all());
        $id = \DB::getPdo()->lastInsertId();

        return $this->setStatusCode(200)->makeResponse('Task created successfully', Task::find($id));
    }

    /**
     * Remove a task from the database
     * @param $id
     * @return mixed
     */
    public function removeTask($id){
        if (!Task::find($id)) {
            return $this->setStatusCode(400)->makeResponse('Could not find the task');
        }

        Task::find($id)->delete();
        return $this->setStatusCode(200)->makeResponse('Task deleted successfully');
    }

    /**
     * Update the given task
     * @param $id
     * @return mixed
     */
    public function updateTask($id){
        if (!Task::find($id)) {
            return $this->setStatusCode(400)->makeResponse('Could not find the task');
        }

        if ( Input::get('name') === "") {
            return $this->setStatusCode(406)->makeResponse('The task needs a name');
        }

        if ( Input::get('weight') === "" || Input::get('weight') <= 0) {
            return $this->setStatusCode(406)->makeResponse('The task needs a weight');
        }

        $input = Input::all();
        unset($input['_method']);

        Task::find($id)->update($input);
        return $this->setStatusCode(200)->makeResponse('The task has been updated');
    }

    /**
     * Get all credentials for the given project
     * @param $id
     * @return mixed
     */
    public function getProjectCredentials($id){
        if( count(Credential::where('project_id',$id)->get()) === 0 ){
            if (!Input::get('password')) {
                return $this->setStatusCode(404)->makeResponse('No credentials found for this project');
            }
        }

        return $this->setStatusCode(200)->makeResponse('Found credentials for this project', Credential::where('project_id',$id)->get() );
    }

    /**
     * Insert a new credential into the database
     * @return mixed
     */
    public function storeCredential(){
        if (!Input::all()) {
            return $this->setStatusCode(406)->makeResponse('No information provided to create credential');
        }

        if (!Input::get('name')) {
            return $this->setStatusCode(406)->makeResponse('The name seems to be empty');
        }

        if (!Input::get('username')) {
            return $this->setStatusCode(406)->makeResponse('The username seems to be empty');
        }

        if (!Input::get('password')) {
            return $this->setStatusCode(406)->makeResponse('The password seems to be empty');
        }

        Input::merge(array('user_id' => 4));
        Credential::create(Input::all());
        $id = \DB::getPdo()->lastInsertId();

        return $this->setStatusCode(200)->makeResponse('Credential created successfully', Credential::find($id));
    }

    /**
     * Update the given credential
     * @param $id
     * @return mixed
     */
    public function updateCredential($id){
        if (!Credential::find($id)) {
            return $this->setStatusCode(400)->makeResponse('Could not find the credential');
        }

        if ( Input::get('name') === "") {
            return $this->setStatusCode(406)->makeResponse('The credential needs a name');
        }

        if ( Input::get('username') === "") {
            return $this->setStatusCode(406)->makeResponse('The credential needs a username');
        }

        if ( Input::get('password') === "") {
            return $this->setStatusCode(406)->makeResponse('The credential needs a password');
        }

        $input = Input::all();
        unset($input['_method']);

        Credential::find($id)->update($input);
        return $this->setStatusCode(200)->makeResponse('The credential has been updated');
    }

    /**
     * Remove the given credential from the database
     * @param $id
     * @return mixed
     */
    public function removeCredential($id){
        if (!Credential::find($id)) {
            return $this->setStatusCode(400)->makeResponse('Could not find the credentials');
        }

        Credential::find($id)->delete();
        return $this->setStatusCode(200)->makeResponse('Credentials deleted successfully');
    }
}