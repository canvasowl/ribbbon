<?php

class ClientsController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 * GET /clients
	 *
	 * @return Response
	 */
	public function index()
	{	
		$pTitle		= "Clients";

		$id 		= Auth::id();
		$user		= User::find($id);
		$clients 	= $user->clients()->orderBy('created_at', 'desc')->take(5)->get();

		$counter 	= 0;		
		return View::make('clients.index', compact([ 'clients', 'counter', 'pTitle']));
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /clients/create
	 *
	 * @return Response
	 */
	public function create()
	{
		$pTitle		= "Clients";

        $name 		= Input::get('name');
        $user_id 	= Auth::id();

        // Validation
        $validator = Validator::make(
            array('name' =>	$name),
            array('name' => 'required|unique:clients')
        );

        if ($validator->fails())
        {
            return Redirect::back()->withErrors($validator);
        }

        $client         	= new Client;
        $client->name   	= $name;
        $client->user_id 	= $user_id;
        $client->save();

        return Redirect::back()->with('success', $name ." is now a new client.");
	}

	/**
	 * Display the specified resource.
	 * GET /clients/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{		
		$client_id  =   $id;
		$client 	= 	Client::find($id);

		// Bust be refactored as a filter
		if ( $client->user_id != Auth::id() ) {
			return Redirect::to('/hud');
		}

		$projects	=	$client->projects()->get();

		$pTitle		=   $client->name;

		return View::make('clients.show', compact([ 'client', 'projects', 'client_id', 'pTitle' ]));
	}

	/**
	 * Show the form for editing the specified resource.
	 * GET /clients/{id}/edit
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$client 	= 	Client::find($id);
		$pTitle		=   "Edit " . $client->name;

		return View::make('clients.edit', compact([ 'client', 'pTitle' ]));
	}

	/**
	 * Update the specified resource in storage.
	 * PUT /clients/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
       $name 				= 	Input::get('name');
       $point_of_contact	=	Input::get('point_of_contact');
       $phone_number		=	Input::get('phone_number');
       $email				=	Input::get('email');

       // Validation
        $validator = Validator::make(
            array(
            	'name' 				=>	$name,
            	'email'				=>	$email
            	),
            array(
            	'name' 				=> 'required',
            	'email'				=> 'email'
            	)
        );

        if ($validator->fails())
        {
            return Redirect::back()->withErrors($validator);
        }

        $client = Client::find($id);

        $client->name 				= $name;
        $client->point_of_contact 	= $point_of_contact;
        $client->phone_number 		= $phone_number;
        $client->email 				= $email;
        $client->save();

        return Redirect::back()->with('success', $name ." has been updated.");
	}

	/**
	 * Remove the specified resource from storage.
	 * DELETE /clients/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{	
		$pTitle		= "Clients";

		$c_id 		= 	Input::get('id');
		$client 	= 	Client::find($c_id);

		// delete all related tasks and credentials
		foreach ($client->projects as $p) {
					Task::where('project_id', $p->id)->delete();
					Credential::where('project_id', $p->id)->delete();
					$p->members()->detach();
				}		
		
		// delete related projects
		Project::where("client_id", $c_id)->delete(); 
		
		// delete client
		$client->delete();
			
		// ----------------------------------------------------	
		$user		= User::find(Auth::id());
		$clients 	= $user->clients()->orderBy('created_at', 'desc')->get();
		$counter 	= 0;

		return View::make('clients.index', compact([ 'clients','counter','pTitle' ]));
	}

}