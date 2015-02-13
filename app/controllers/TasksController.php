<?php

class TasksController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 * GET /tasks
	 *
	 * @return Response
	 */
	public function index()
	{
		$pTitle		=	"Tasks";

		$user 		= 	User::find(Auth::id());		
		$tasks 		= 	$user->tasks()->whereState("incomplete")->get();
		$counter	=	0;

		return View::make('tasks.index', compact(['tasks','counter','pTitle']));
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /tasks/create
	 *
	 * @return Response
	 */
	public function create()
	{	
		// Rules
		$rules	= array(
				'weight' 	=> 'integer|between:1,5',
				'name' => 'required'
		);

		// Custom messages
		$messages = array(		
		    	'between' => 'The :attribute must be between :min - :max.',
		    	'integer' => ':attribute must be a number'		     
		);

		// Create validation 
		$validator = Validator::make( Input::all(), $rules, $messages );

		// Check validation
		if ( $validator->fails() ) 
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		// Insert the task to database
		$task 				= new Task;
		$task->project_id 	= Input::get('projectId');
		$task->user_id 		= Auth::id();
		$task->name 		= Input::get('name');
		$task->weight		= Input::get('weight');
		if (!Input::get('weight')) {
			$task->weight		= 1;
		}		
		$task->state		= "incomplete";
		$task->save();

		// Increase the users overall task count
		$user = User::find(Auth::id());
		$user->tasks_created = $user->tasks_created + 1;
		$user->save(); 

		return Redirect::back()->with('success', Input::get('name') ." has been created.");
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /tasks
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}

	/**
	 * Display the specified resource.
	 * GET /tasks/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 * GET /tasks/{id}/edit
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 * PUT /tasks/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
			$task = Task::find(Input::get('task'));
			$user = User::find(Auth::id());

			if ($task->state == 'complete') {
				$task->state = 'incomplete';
				$task->save();

				$user->tasks_completed = $user->tasks_completed - 1;
				$user->save();				
			}else{
				$task->state = 'complete';
				$task->save();

				$user->tasks_completed = $user->tasks_completed + 1;
				$user->save();								
			}

			return Redirect::back();
	}

	/**
	 * Remove the specified resource from storage.
	 * DELETE /tasks/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$task = Task::find(Input::get('id'));
		$task->delete();

		return Redirect::back();
	}

}