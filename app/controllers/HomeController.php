<?php

class HomeController extends BaseController {

	public function index()
	{
		if( Auth::check() ) {
			return View::make('/hud')->with('pTitle', "Your Hud");	
		}else{
			return View::make('index')->with('pTitle', "Project Management For System Artisans");
		}
	}
}
