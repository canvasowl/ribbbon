<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use Response;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\User;
use App\Client;
use App\Project;
use App\Task;
use App\Credential;

class ClientsController extends BaseController {

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