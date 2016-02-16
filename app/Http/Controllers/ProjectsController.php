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

	/**
	 * Display a listing of the resource.
	 * GET /projects
	 *
	 * @return Response
	 */
	public function index()
	{
		$pTitle		= "Projects";

		$counter 	=	0;
		$user 		=	User::find(Auth::id());
		$projects 	=	$user->projects()->get();
		$inProjects =   $user->inProjects()->orderBy('created_at', 'desc')->take(5)->get();

        if($projects) {
            foreach ($projects as $project) {
                $weight = Project::find($project->id)->tasks()->where('state','!=','complete')->sum('weight');
                $project["weight"] = $weight;
            }
        }

		return View::make('ins/projects/index', compact(['projects','inProjects','counter','pTitle']));
	}

	/**
	 * Display the specified resource.
	 * GET /projects/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{   	
		$project 		=	Project::find($id);

		// Must be refactored as a filter
		if ( $project->isOwner() == false && $project->isMember() == false ) {
			return Redirect::to('/hud');
		}

		$tasks 			=	$project->tasks()->where('state','incomplete')->orderBy("updated_at", "desc")->get();
		$completedTasks	=	$project->tasks()->where('state','complete')->get();
		$taskCount 		=	count($tasks);
		$completedCount =	count($completedTasks);
		$total_weight	=	$project->tasks()->where('state','incomplete')->sum('weight');
		$credentials   	=	$project->credentials;
		$owner_id		=	$project->user_id;
		$members 		= 	$project->members()->get();

		$pTitle 		=	$project->name; 
			
		return  View::make('ins/projects/show', compact(
											[
												'owner_id',
												'project',
												'tasks',
												'completedTasks',
												'taskCount',
												'total_weight',
												'completedCount',
												'members',
												'pTitle'
											]));
	}

	/**
	 * Invites a user to the given project.
	 * @return Redirect
	 */
	public function invite($id){
		// Validation
		$rules = ['email' => 'required|email|exists:users,email'];
		$messages = [ 'exists' => 'That email is not currently associated with a user.',];

		$validator = Validator::make(Input::all(), $rules, $messages);

        if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		// Get the id of the user being sent the invite
		$user_id = DB::table('users')->whereEmail(Input::get('email'))->pluck('id');

		if( count(Projectuser::whereUserId($user_id)->whereProjectId($id)->get()) != 0 )
		{	
			$validator->getMessageBag()->add('email', 'A user with that email has already been invited.');
			return Redirect::back()->withErrors($validator)->withInput();
		}

		// Save the relationship between user and project.
		$pu				= new Projectuser;
		$pu->project_id	=	$id;
		$pu->user_id	=	$user_id;
		$pu->save();

		// Prepare email invitation & send it
		$project_name	= Project::find($id)->pluck('name');
		$project_url 	= url() . '/projects/'.$id;
		sendProjectInviteMail(Input::get('email'), $project_name, $project_url);

		return Redirect::back()->with('success', "A new member has been added to this project.");;
	}

	/**
	 * @param int $id
	 *
	 * Removes a member from a given project
	 * @return redirect
	 */
	public function remove($id){
		$project = Project::find($id);
		$project->members()->detach(Input::get('member_id'));

		return Redirect::back();
	}

	public function credentials($id){
		$project 		=	Project::find($id);

		$total_weight	=	$project->tasks()->where('state','incomplete')->sum('weight');
		$credentials   	=	$project->credentials;
		$owner_id		=	$project->user_id;
		$members 		= 	$project->members()->get();

		$pTitle 		=	$project->name; 
			
		return  View::make('projects.passwords', compact(
											[
												'owner_id',
												'project',
												'total_weight',
												'credentials',
												'members',
												'pTitle'
											]));
	}


    public function files($id){
        $project  = Project::find($id);
        $owner_id =	$project->user_id;
        $total_weight	=	$project->tasks()->where('state','incomplete')->sum('weight');
        $members 		= 	$project->members()->get();

        $pTitle   = $project->name . " files";

        return View::make('projects.files', compact(
                                            [
                                                'project',
                                                'total_weight',
                                                'owner_id',
                                                'members',
                                                'pTitle'
                                            ]));
    }

}