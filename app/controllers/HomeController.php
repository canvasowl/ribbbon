<?php

class HomeController extends BaseController {

	// Depending if the user is signed in or not, return the home page 
	public function index()
	{
		if( Auth::check() ) {
			$pTitle			=	"Hud";

			$latestTasks	=	Task::where('user_id', Auth::id())->where('state','incomplete')->take(5)->get();
			$latestProjects	=	Project::where('user_id', Auth::id())->take(5)->get();

			return View::make('hud', compact('pTitle', 'latestProjects', 'latestTasks'));
		}else{
			return View::make('index')->with('pTitle', "Project Management For System Artisans");
		}
	}

	// Return the Hud view
	public function hud()
	{	
		$pTitle			=	"Hud";

		$latestTasks	=	Task::where('user_id', Auth::id())->where('state','incomplete')->take(5)->get();
		$latestProjects	=	Project::where('user_id', Auth::id())->take(5)->get();

		return View::make('hud', compact('pTitle', 'latestProjects', 'latestTasks'));		
	}

}
