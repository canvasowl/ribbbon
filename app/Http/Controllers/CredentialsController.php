<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use App\Credential;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Response;


class CredentialsController extends BaseController {

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
				'password' 	=> 'required',
				'type'		=> 'required'
			);

		$validator = Validator::make($data = Input::all(), $rules);

		if ($validator->fails()) {
			return Redirect::back()->withErrors($validator)->withInput();
		}

		$credential 				= new Credential;
		$credential->user_id 		= Auth::id();
		$credential->project_id 	= Input::get('project_id');
		$credential->name 			= Input::get('name');
		$credential->username 		= Input::get('username');
		$credential->password 		= Input::get('password');		

		if (Input::get('type') == "server") {						
			$credential->type 		= true;			
			$credential->hostname 	= Input::get('hostname');
			$credential->port 		= Input::get('port');			
			
		}else{
			$credential->type 		= false;	
			$credential->hostname 	= "";
			$credential->port 		= "";
		}
		$credential->save();
		return  Redirect::back();						
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
		// TODO: refactor into a provider?
		if(Credential::find($id) != null) {
			Credential::find($id)->delete();
			return Response::json(array('code' => 200, 'message' => 'ok'),200);
		}

		return Response::json(array('code' => 401, 'message' => 'the requested resource was not found'),401);
	}

}