<?php

class HomeController extends BaseController {

	// Depending if the user is signed in or not, return the home page 
	public function index()
	{
		if( Auth::check() ) {
			$pTitle			=	"Hud";

			$latestTasks	=	Task::where('user_id', Auth::id())->where('state','incomplete')->orderBy('created_at', 'desc')->take(5)->take(5)->get();
			$latestProjects	=	Project::where('user_id', Auth::id())->orderBy('created_at', 'desc')->take(5)->take(5)->get();

			return View::make('hud', compact('pTitle', 'latestProjects', 'latestTasks'));
		}else{
			return View::make('index')->with('pTitle', "A project management system for artisans");
		}
	}

	// Return the Hud view
	public function hud()
	{	
		$pTitle			=	"Hud";

		$latestTasks	=	Task::where('user_id', Auth::id())->where('state','incomplete')->orderBy('created_at', 'desc')->take(5)->get();
		$latestProjects	=	Project::where('user_id', Auth::id())->orderBy('created_at', 'desc')->take(5)->get();

		return View::make('hud', compact('pTitle', 'latestProjects', 'latestTasks'));		
	}

}
