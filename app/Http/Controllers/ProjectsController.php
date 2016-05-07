<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use App\Project;
use App\Task;
use App\Credential;

class ProjectsController extends BaseController {

	// Returns the given project view
	public function show($id)
	{   	
		$project 		=	Project::find($id);

        // Must be refactored as a filter
		if ( $project->isOwner() == false && $project->isMember() == false ) {
			return Redirect::to('/hud');
		}

		return  View::make('ins/projects/show')->with('pTitle', $project->name);
	}

	//	Return the given project
	public function getProject($id){
		if (!Project::find($id)) {
			return $this->setStatusCode(404)->makeResponse('The project was not found');
		}

		$project = Project::find($id);
		$project->tasks = Task::where('project_id', $id)->get();
		$project->credentials = Credential::where('project_id', $id)->get();

		return $this->setStatusCode(200)->makeResponse('Project was successfully found', $project);
	}

	// Insert the given project into the database
	public function storeProject(){
		if (!Input::all() || strlen(trim(Input::get('name'))) == 0) {
			return $this->setStatusCode(406)->makeResponse('No information provided to create project');
		}

		Input::merge(array('user_id' => Auth::id()));
		Project::create(Input::all());
		$id = \DB::getPdo()->lastInsertId();

		return $this->setStatusCode(200)->makeResponse('Project created successfully', Project::find($id));
	}

	// Update the given project
	public function updateProject($id){
		if ( Input::get('name') === "") {
			return $this->setStatusCode(406)->makeResponse('The project needs a name');
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
	 * Invites a user to the given project.
	 * @return Redirect
	 */
	public function invite($id){
		//		// Validation
		//		$rules = ['email' => 'required|email|exists:users,email'];
		//		$messages = [ 'exists' => 'That email is not currently associated with a user.',];
		//
		//		$validator = Validator::make(Input::all(), $rules, $messages);
		//
		//        if ($validator->fails())
		//		{
		//			return Redirect::back()->withErrors($validator)->withInput();
		//		}
		//
		//		// Get the id of the user being sent the invite
		//		$user_id = DB::table('users')->whereEmail(Input::get('email'))->pluck('id');
		//
		//		if( count(Projectuser::whereUserId($user_id)->whereProjectId($id)->get()) != 0 )
		//		{
		//			$validator->getMessageBag()->add('email', 'A user with that email has already been invited.');
		//			return Redirect::back()->withErrors($validator)->withInput();
		//		}
		//
		//		// Save the relationship between user and project.
		//		$pu				= new Projectuser;
		//		$pu->project_id	=	$id;
		//		$pu->user_id	=	$user_id;
		//		$pu->save();
		//
		//		// Prepare email invitation & send it
		//		$project_name	= Project::find($id)->pluck('name');
		//		$project_url 	= url() . '/projects/'.$id;
		//		sendProjectInviteMail(Input::get('email'), $project_name, $project_url);
		//
		//		return Redirect::back()->with('success', "A new member has been added to this project.");
	}

	/**
	 * @param int $id
	 *
	 * Removes a member from a given project
	 * @return redirect
	 */
	public function remove($id){
		//		$project = Project::find($id);
		//		$project->members()->detach(Input::get('member_id'));
		//
		//		return Redirect::back();
	}

}