<?php
// A helpers file



/*******************************
		MAIL FUNCTIONS
********************************/

/** Sends a follow up email when the user signs up for beta */
function sendBetaFollowUpMail($email){
	$data = array('to' => $email);
	
	Mail::send('emails.beta.follow', array(), function($message) use ($data) {
		$message->to($data['to'], '')->subject('Inviation Request Confirmation');
	});
}

/** Sends beta invitation **/
function sendBetaInviteEmail($email, $name){
	$data = array( 
			'to' 	=> $email,
			'name' 	=> $name
			);
	
	Mail::send('emails.beta.invite', array('name' => $name), function($message) use ($data){
    	$message->to($data['to'], $data['name'] )->subject('Ribbbon invitation');
	});		
}

/** Sends a welcome email to the user */
function sendWelcomeMail(){
	$data = array( 
			'to' 	=> Auth::user()->email,
			'name' 	=> Auth::user()->full_name
			);
	
	Mail::send('emails.welcome', array('name' => $data['name'] ), function($message) use ($data){
    	$message->to($data['to'], $data['name'] )->subject('Welcome to Ribbbon');
	});		
}

/** Sends password changed email **/

/** Sends account deletion email **/

