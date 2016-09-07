<?php

namespace App\Helpers;

use App\Project;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

/**
 * Class Helpers.
 */
class Helpers
{
    // Return the image logo path
    public static function logoUrl()
    {
        return asset('assets/img/logo.png');
    }

    // Checks if the given user is the owner of the project
    public static function isOwner($project_id, $user_id = null)
    {
        if ($user_id == null) {
            $user_id = Auth::id();
        }

        $s = Project::whereId($project_id)->whereUserId($user_id)->get();

        if (count($s) == 0) {
            return false;
        }

        return true;
    }

    /*******************************
            MAIL FUNCTIONS
    ********************************/

    // Send the welcome email to the user
    public static function sendWelcomeMail()
    {
        $data = [
                'to'      => Auth::user()->email,
                'name'    => Auth::user()->full_name,
        ];

        Mail::send('emails.welcome', ['name' => $data['name']], function ($message) use ($data) {
            $message->from(getenv('MAIL_FROM'), getenv('MAIL_FROM_NAME'));
            $message->to($data['to'], $data['name'])->subject('Welcome to Ribbbon');
        });
    }

    /** Sends password changed email **/

    /** Sends account deletion email **/

    // Send project invite email
    public static function sendProjectInviteMail($email, $project_name, $project_url)
    {
        $data = ['to' => $email];

        Mail::send('emails.projectInvite', ['project_url' => $project_url, 'project_name' => $project_name], function ($message) use ($data) {
            $message->from(getenv('MAIL_FROM'), getenv('MAIL_FROM_NAME'));
            $message->to($data['to'], '')->subject('You have been invited to a new project');
        });
    }
}
