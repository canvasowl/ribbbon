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

}