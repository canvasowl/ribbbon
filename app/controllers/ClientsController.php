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
		$clients = Client::all();
		$counter = 0;

		return View::make('clients.index')->with('clients', $clients)->with('counter', $counter);
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /clients/create
	 *
	 * @return Response
	 */
	public function create()
	{
        $name = Input::get('name');

        // Validation
        $validator = Validator::make(
            array('name' =>	$name),
            array('name' => 'required|unique:clients')
        );

        if ($validator->fails())
        {
            return Redirect::back()->withErrors($validator);
        }

        $client         = new Client;
        $client->name   = $name;
        $client->save();

        return Redirect::back()->with('success', $name ." is now a new client.");
	}


	/**
	 * Store a newly created resource in storage.
	 * POST /clients
	 *
	 * @return Response
	 */
	public function store()
	{
		//
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
		$client = Client::find($id);


		return View::make('clients.show')->with('client', $client);
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
		//
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
		//
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
		//
	}

}