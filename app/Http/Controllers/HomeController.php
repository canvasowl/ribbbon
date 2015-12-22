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
			$pTitle			=	"Hud";
			$latestTasks	=	Task::where('user_id', Auth::id())->where('state','incomplete')->orderBy('created_at', 'desc')->take(5)->get();

			$aWeekAgo		=	$start = date('Y-m-d 00:00:00',strtotime("-1 week"));
            $latestCompletedTasks = Task::where('user_id', Auth::id())
            							->where('state','complete')
            							->where('updated_at','>',$aWeekAgo)
            							->orderBy('updated_at', 'desc')->take(10)->get();

			$latestProjects	=	Project::where('user_id', Auth::id())->orderBy('created_at', 'desc')->take(5)->get();
			$user 		    =   User::find(Auth::id());
			$inProjects     =   $user->inProjects()->orderBy('created_at', 'desc')->take(5)->get();


			return View::make('ins/hud', compact('pTitle', 'latestProjects', 'latestTasks', 'latestCompletedTasks', 'inProjects'));
		}else{
			return View::make('index')->with('pTitle', "A project management system for artisans");
		}
	}

	/**
	 * Run a general search.
	 * @return  array of objects with the search results.
	 */
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
