<?php

namespace App\Helpers;

use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Project;

/**
 * Class Helpers
 * @package App\Helpers
 */
class Helpers {
	/**
	 * Checks if a given user is the owner a given
	 * project.
	 *
	 * @param $project_id
	 * @param null $user_id
	 * @return bool
	 */
	static function isOwner($project_id, $user_id = null) {

		if($user_id == null){
			$user_id = Auth::id();
		}

		$s = Project::whereId($project_id)->whereUserId($user_id)->get();

		if(count($s) == 0){
			return false;
		}

		return true;
	}

	/**
	 * Get the name of a client by a task id
	 *
	 * @param $task_id
	 * @return mixed
	 */
	static function clientNameByTask($task_id) {

	    $project_id = DB::table('tasks')->where('id', $task_id)->pluck('project_id');
	    $client_id = DB::table('projects')->where('id', $project_id)->pluck('client_id');
	    $client_name = DB::table('clients')->where('id', $client_id)->pluck('name');

	    return $client_name;
	}

	/**
	 * Get the id of a client by a task id
	 *
	 * @param $task_id
	 * @return mixed
	 */
	static function clientIdByTask($task_id) {

	    $project_id = DB::table('tasks')->where('id', $task_id)->pluck('project_id');
	    $client_id = DB::table('projects')->where('id', $project_id)->pluck('client_id');

	    return $client_id;
	}

		/*******************************
			MAIL FUNCTIONS
	********************************/

	/** Sends a follow up email when the user signs up for beta
	 *
	 * @param $email
	 */
	function sendBetaFollowUpMail($email){
		$data = [ 'to' => $email ];

		Mail::send('emails.beta.follow', [ ] , function($message) use ($data) {
			$message->from(getenv('MAIL_FROM'), getenv('MAIL_FROM_NAME'));
			$message->to($data['to'], '')->subject('Invitation request confirmation');
		});
	}

	/** Sends beta invitation **/
	function sendBetaInviteEmail($email){
		$data = [ 'to' 	=> $email ];

		Mail::send('emails.beta.invite', [ ] , function($message) use ($data) {
			$message->from(getenv('MAIL_FROM'), getenv('MAIL_FROM_NAME'));
	        $message->to($data['to'], '' )->subject('Ribbbon invitation');
		});
	}


	/**
	 * Sends a welcome email to the user
	 *
	 *
	 */
	static function sendWelcomeMail() {
		$data = [
				'to' 	=> Auth::user()->email,
				'name' 	=> Auth::user()->full_name
		];

		Mail::send('emails.welcome', [ 'name' => $data['name'] ] , function($message) use ($data){
			$message->from(getenv('MAIL_FROM'), getenv('MAIL_FROM_NAME'));
	        $message->to($data['to'], $data['name'] )->subject('Welcome to Ribbbon');
		});
	}

	/** Sends password changed email **/

	/** Sends account deletion email **/

	/** Sends Project invite email *
	 *
	 * @param $email
	 * @param $project_name
	 * @param $project_url
	 */
	static function sendProjectInviteMail($email, $project_name, $project_url) {
		$data = [ 'to' => $email ];

		Mail::send('emails.projectInvite', [ 'project_url' => $project_url, 'project_name' => $project_name ] , function($message) use ($data) {
			$message->from(getenv('MAIL_FROM'), getenv('MAIL_FROM_NAME'));
			$message->to($data['to'], '')->subject('You have been invited to a new project');
		});
	}
}