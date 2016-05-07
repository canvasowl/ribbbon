<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\User;
use App\Client;
use App\Project;
use App\Task;
use App\Credential;

class ApiController extends BaseController {

    /**
     * Get the current logged in user
     * @return mixed
     */
    public function getUser(){
        $user = User::find(Auth::id());
        return $user;
    }

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

    /**
     * Delete the given user
     * @param $id
     * @return mixed
     */
    public function deleteUser()
    {
        // Delete everything related to the user
        Task::where('user_id', Auth::id())->delete();
        Credential::where('user_id', Auth::id())->delete();
        Project::where('user_id', Auth::id())->delete();
        Client::where('user_id', Auth::id())->delete();
        User::where('id', Auth::id())->delete();
    }

    /**
     * Get all the clients for the logged in user
     * @return mixed
     */
    public function getAllUserClients($withWeight = false){
		$clients = Client::with('projects')->where('user_id',Auth::id())->get();
		
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
    public function getAllUserProjects(){
        $projects = Project::where('user_id',Auth::id())->get();

        if($projects) {
            foreach ($projects as $project) {
                $completedWeight = Project::find($project->id)->tasks()->where('state','=','complete')->sum('weight');
                $totalWeight = Project::find($project->id)->tasks()->sum('weight');

                $project["completedWeight"] = $completedWeight;
                $project["totalWeight"] = $totalWeight;
            }
        }

        return $this->setStatusCode(200)->makeResponse('Projects retrieved successfully',$projects->toArray());
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
     * Remove a client from the database
     * @param $id
     * @return mixed
     */
    public function removeClient($id){
        if (!Client::find($id)) {
            return $this->setStatusCode(400)->makeResponse('Could not find the client');
        }

        $client 	= 	Client::find($id);

        // delete all related tasks and credentials
        foreach ($client->projects as $p) {
            Task::where('project_id', $p->id)->delete();
            Credential::where('project_id', $p->id)->delete();
            $p->members()->detach();
        }

        // delete projects
        Project::where("client_id", $id)->delete();
        $client->delete();
        return $this->setStatusCode(200)->makeResponse('Client deleted successfully');
    }

}