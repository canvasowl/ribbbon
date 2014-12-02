<?php

class HomeController extends BaseController {

	// Depending if the user is signed in or not, return the home page 
	public function index()
	{
		if( Auth::check() ) {
			return View::make('/hud')->with('pTitle', "Your Hud");	
		}else{
			return View::make('index')->with('pTitle', "Project Management For System Artisans");
		}
	}

	// Return the Hud view
	public function hud()
	{	
		$pTitle	=	"Hud";

		return View::make('hud', compact('pTitle'));		
	}

}
