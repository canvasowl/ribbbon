<?php


class AdminController extends \BaseController {
	
	/**
	 * Sends beta invite email
	 */
	public function invite(){

        return "Do nothing. no invites sent";

		// Get the emails to invite
//		$users 		=	Beta::whereStatus(0)->lists('email');
//		// At this email always for testing
//		$users[]	=	"jefrycruz88@gmail.com";

		// Set the all statuses to 0
//		Beta::whereStatus(0)->update(array('status' => 1));

		// Send the emails to all the users that have not been invited yet
//		for ($i=0; $i < count($users) ; $i++) {
//			sendBetaInviteEmail( $users[$i]);
//			echo $users[$i] . "<br>";
//		}
//
//		return "All the emails above have been sent a beta invite.";
	}
}