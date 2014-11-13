<?php


class AdminController extends \BaseController {

	/**
	 * Sends beta confirmation emails 
	 */
	public function confirm(){
		$emails = array(
				'punyweblab@gmail.com',
				'jefrycruz88@gmail.com' // do not delete
			);

		for ($i=0; $i < count($emails) ; $i++) { 
			sendBetaFollowUpMail($emails[$i]);
		}

		return "All beta confirmation emails sent";
	}		

	/**
	 * Sends beta invite email
	 */
	public function invite(){

		$users = array(
				array( 'email' => 'punyweblab@gmail.com', 'name' => 'Jefry Cruz' ),
				array( 'email' => 'jefrycruz88@gmail.com', 'name' => 'Jefry Cruz' ) // do not delete
			);

		for ($i=0; $i < count($users) ; $i++) { 
			sendBetaInviteEmail( $users[$i]['email'], $users[$i]['name'] );
		}

		return "All beta invites have been sent";
	}
}