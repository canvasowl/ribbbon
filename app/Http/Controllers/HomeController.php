<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use App\Task;
use App\Project;
use App\User;
use Illuminate\Support\Facades\Input;
use App\Client;

class HomeController extends BaseController {

	// Depending if the user is signed in or not, return the home page 
	public function index(){
		if( Auth::check() ) {
			return View::make('ins/hud')->with('pTitle', "Hud");
		}else{
			return View::make('index')->with('pTitle', "A project management system for artisans");
		}
	}

	// Search for, clients, projects, and tasks
	public function search(){
		$q = Input::get("q");

        // redirect user back if nothing was typed
        if ( empty(trim($q)) ){
            return Redirect::back();
        }

		$clients = Client::where('name', 'like', '%'.$q.'%')->whereUserId(Auth::id())->get();
		$projects = Project::where('name', 'like', '%'.$q.'%')->whereUserId(Auth::id())->get();
		$tasks = Task::where('name', 'like', '%'.$q.'%')->whereUserId(Auth::id())->get();
		$pTitle = "Search Results";

		return View::make('ins/search', compact('q','clients','projects','tasks','pTitle'));
	}
}
