<?php
// A helpers file



/*******************************
		MAIL FUNCTIONS
********************************/

/** Sends a welcome email to the user */
function sendWelcomeMail(){
	$data = array( 'to' => Auth::user()->email);
	
	Mail::send('emails.welcome', array(), function($message) use ($data){
    	$message->to($data['to'], 'Full Name')->subject('Welcome to Ribbbon');
	});		
}

/** Sends the beta register email */
// function sendBetaRegisterMail($to = "jefrycruz88@gmail.com"){ }
