<?php


class AdminController extends \BaseController {
	/**
	 * Sends beta invite email
	 */
	public function invite(){

		$users = array(
				array( 'email' => 'l.d.berzak@gmail.com'),
				array( 'email' => 'ferrasmel@gmail.com'),
				array( 'email' => 'Goldpitmusic@gmail.com'),
				array( 'email' => 'maringigiadrian@gmail.com'),				
				array( 'email' => 'jefrycruz88@gmail.com') // do not delete
			);

		for ($i=0; $i < count($users) ; $i++) { 
			sendBetaInviteEmail( $users[$i]['email']);
			DB::table('beta')->whereEmail($users[$i]['email'])->update(array('status' => 1));			
		}

		return "All beta invites have been sent";
	}
}