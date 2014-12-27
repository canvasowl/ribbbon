<?php

class ProjectsController extends \BaseController {

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
		
		return View::make('projects.index', compact(['projects','counter','pTitle']));
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /projects/create
	 *
	 * @return Response
	 */
	public function create()
	{	
		// Rules
		$rules	= array('name' => 'required',);

		// Create validation 
		$validator = Validator::make( Input::all(), $rules);

		if ( $validator->fails() ) {
			return Redirect::back()->withErrors($validator)->withInput();
		}
		
		$project 			=	new Project;
		$project->name 		=	Input::get('name');
		$project->client_id =	Input::get('client_id');
		$project->user_id	=	Auth::id();
		$project->save();

		return Redirect::back()->with('success', Input::get('name') ." has been created.");
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /projects
	 *
	 * @return Response
	 */
	public function store()
	{
		//
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
		if ( $project->user_id != Auth::id() ) {
			return Redirect::to('/hud');
		}

		// If project has members, lets get them
		if( Projectuser::whereProjectId($id) ){
			$members = $project->members()->get();
		}else{
			$members = false;
		}

		$tasks 			=	$project->tasks()->where('state','incomplete')->orderBy("updated_at", "desc")->get();
		$completedTasks	=	$project->tasks()->where('state','complete')->get();
		$taskCount 		=	count($tasks);
		$completedCount =	count($completedTasks);		
		$total_weight	=	$project->tasks()->where('state','incomplete')->sum('weight');
		$credentials   	=	$project->credentials;
		$owner_id		=	$project->user_id;

		$pTitle 		=	$project->name; 
			
		return  View::make('projects.show', compact(
											[
												'owner_id',
												'project',
												'tasks',
												'completedTasks',
												'taskCount',
												'total_weight',
												'completedCount',
												'credentials',
												'members',
												'pTitle'
											]));
	}

	/**
	 * Show the form for editing the specified resource.
	 * GET /projects/{id}/edit
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$project 	= 	Project::find($id);
		$pTitle 	=	"Edit " . $project->name;

		// $tasks 			=	$project->tasks()->where('state','incomplete')->orderBy("updated_at", "desc")->get();
		// $completedTasks	=	$project->tasks()->where('state','complete')->get();
		// $taskCount 		=	count($tasks);
		// $completedCount =	count($completedTasks);		
		$total_weight	=	$project->tasks()->where('state','incomplete')->sum('weight');
		// $credentials   	=	$project->credentials;
		$owner_id		=	$project->user_id;

		// If project has members, lets get them
		if( Projectuser::whereProjectId($id) ){
			$members = $project->members()->get();
		}else{
			$members = false;
		}		

		return View::make('projects.edit', compact(['project','pTitle','owner_id','total_weight','members']));
	}

	/**
	 * Update the specified resource in storage.
	 * PUT /projects/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$project 	= Project::find($id);

       // Validation
        $validator = Validator::make(
            array(
            	'name' 				=>	Input::get("name"),
            	'github'			=>	Input::get("github"),
            	'production'		=>	Input::get("production"),
            	'stage'				=>	Input::get("stage"),
            	'dev'				=>	Input::get("dev")
            	),
            array(
            	'name' 				=> 'required',
            	'github'			=> 'url',
            	'production'		=> 'url',
            	'stage'				=> 'url',
            	'dev'				=> 'url'
            	)
        );

        if ($validator->fails())
        {
            return Redirect::back()->withErrors($validator)->withInput();
        }

		$project->name 			= Input::get('name');
		$project->github 		= Input::get('github');
		$project->production 	= Input::get('production');
		$project->stage 		= Input::get('stage');
		$project->dev 			= Input::get('dev');
		$project->save();

		return Redirect::back()->with('success', "The project " .Input::get('name'). " has been updated.");

	}

	/**
	 * Remove the specified resource from storage.
	 * DELETE /projects/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$pTitle		=	"Projects";

		$project 	= 	Project::find(Input::get("id"));

		// delete everything associated with project
		Task::where('project_id',Input::get("id"))->delete();		
		Credential::where('project_id',Input::get("id"))->delete();

		// delete the project
		$project->delete();
		
		$counter 	=	0;
		$user 		=	User::find(Auth::id());
		$projects 	=	$user->projects()->get();
		
		return View::make('projects.index',compact(['projects','counter','pTitle']));		
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

		    // return Response::json(array(
		    //     'success' => false,
		    //     'errors' => $validator->getMessageBag()->toArray()

		    // )); 			
			return Redirect::back()->withErrors($validator)->withInput();			
		}

		// Get the id of the user being sent the invite
		$user_id = DB::table('users')->whereEmail(Input::get('email'))->pluck('id');

		if( count(Projectuser::whereUserId($user_id)->whereProjectId($id)->get()) != 0 )
		{	
			$validator->getMessageBag()->add('email', 'A user with that email has already been invited.');
		    
		    // return Response::json(array(
		    //     'success' => false,
		    //     'errors' => $validator->getMessageBag()->toArray()
		    // )); 									
			return Redirect::back()->withErrors($validator)->withInput();
		}

		$pu				= new Projectuser;
		$pu->project_id	=	$id;
		$pu->user_id	=	$user_id;
		$pu->save();

		return Redirect::back();

	    // return Response::json(array(
	    //     'success' => true,
	    //     'success' => User::find($user_id)->full_name .' has been added to this project.'
	    // )); 
	}

	public function credentials($id){
		$project 		=	Project::find($id);

		// Must be refactored as a filter
		if ( $project->user_id != Auth::id() ) {
			return Redirect::to('/hud');
		}

		$total_weight	=	$project->tasks()->where('state','incomplete')->sum('weight');
		$credentials   	=	$project->credentials;
		$owner_id		=	$project->user_id;

		$pTitle 		=	$project->name; 
			
		return  View::make('projects.passwords', compact(
											[
												'owner_id',
												'project',
												'total_weight',
												'credentials',
												'pTitle'
											]));
	}

}