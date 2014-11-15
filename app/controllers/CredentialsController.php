<?php

class CredentialsController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 * GET /credentials
	 *
	 * @return Response
	 */
	public function index()
	{
		//
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /credentials/create
	 *
	 * @return Response
	 */
	public function create()
	{	
		$rules = array(
				'name' 		=> 'required',
				'username' 	=> 'required',
				'password' 	=> 'required'
			);

		$validator = Validator::make($data = Input::all(), $rules);

		if ($validator->fails()) {
			return Redirect::back()->withErrors($validator)->withInput();
		}

		$credential = new Credential;

		if (Input::get('type') == "server") {
			$credential->user_id 		= Auth::id();
			$credential->project_id 	= Input::get('project_id');
			$credential->type 			= true;
			$credential->name 			= Input::get('name');
			$credential->hostname 		= Input::get('hostname');
			$credential->username 		= Input::get('username');
			$credential->password 		= Input::get('password');
			$credential->port 	= Input::get('port');			
			$credential->save();
		}else{

		}
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /credentials
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}

	/**
	 * Display the specified resource.
	 * GET /credentials/{id}
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
	 * GET /credentials/{id}/edit
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
	 * PUT /credentials/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 * DELETE /credentials/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}