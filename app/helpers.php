<?php
// A helpers file
/*******************************
		MAIL FUNCTIONS
********************************/

/** Sends a follow up email when the user signs up for beta */
function sendBetaFollowUpMail($email){
	$data = array('to' => $email);
	
	Mail::send('emails.beta.follow', array(), function($message) use ($data) {
		$message->to($data['to'], '')->subject('Invitation request confirmation');
	});
}

/** Sends beta invitation **/
function sendBetaInviteEmail($email){
	$data = array( 'to' 	=> $email );
	
	Mail::send('emails.beta.invite', array(), function($message) use ($data){
    	$message->to($data['to'], '' )->subject('Ribbbon invitation');
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

/** Sends Project invite email **/
function sendProjectInviteMail($email,$project_name, $project_url){
	$data = array('to' => $email);

	Mail::send('emails.projectInvite', array('project_url' => $project_url, 'project_name' => $project_name), function($message) use ($data) {
		$message->to($data['to'], '')->subject('You have been invited to a new project');
	});
}