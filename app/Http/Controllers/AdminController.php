<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;

use App\User;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\View;

class AdminController extends BaseController {

    /**
     * Takes you to the admin page of the app
     * @return mixed
     */
    public function index(){
        if( Auth::user()->email != env('ADMIN_EMAIL') ){
            return Redirect::back();
        }

        $users = User::all();
        $n = count($users);
        return View::make('admin/index')->with('pTitle', 'Admin')->with('users', $users)->with('n', $n);
    }

}