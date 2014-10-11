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
		$projects 	= 	Project::all();
		$counter 	=	0;

		return View::make('projects.index')->with('projects', $projects)->with('counter', $counter);
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
		$project->save();

		return Redirect::back()->with('success', Input::get('name') ." has been created.");;
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
		$tasks 			=	$project->tasks()->where('state','incomplete')->orderBy("updated_at", "desc")->get();
		$completedTasks	=	$project->tasks()->where('state','complete')->get();
		$taskCount 		=	count($tasks);
		$completedCount =	count($completedTasks);		
		$total_weight	=	$project->tasks()->where('state','incomplete')->sum('weight');
			
		return  View::make('projects.show')->with('project', $project)->with('tasks', $tasks)->with('completedTasks', $completedTasks)->with('taskCount', $taskCount)->with("id",$project)->with('total_weight', $total_weight )->with("completedCount", $completedCount);
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
		$project = Project::find($id);

		return View::make('projects.edit')->with('project', $project);
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
		$name		= Input::get("name");

       // Validation
        $validator = Validator::make(
            array(
            	'name' 				=>	$name
            	),
            array(
            	'name' 				=> 'required'
            	)
        );

        if ($validator->fails())
        {
            return Redirect::back()->withErrors($validator);
        }

		$project->name = $name;
		$project->save();

		return Redirect::back()->with('success', "The project " .$name. " has been updated.");

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
			
	}

}