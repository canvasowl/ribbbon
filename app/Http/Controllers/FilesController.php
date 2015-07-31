<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Auth;
use App\Upload;

class FilesController extends BaseController {

    /**
     * Upload the file and store
     * the file path in the DB.
     */
	public function store()
	{
        // Rules
        $rules	= array('name' => 'required', 'file' => 'required|max:20000');
        $messages = array('max' => 'Please make sure the file size is not larger then 20MB');

        // Create validation
        $validator = Validator::make( Input::all(), $rules, $messages);

        if ( $validator->fails() ) {
            return Redirect::back()->withErrors($validator)->withInput();
        }

        $directory = "uploads/files/";

        // Before anything let's make sure a file was uploaded
        if ( Input::hasFile('file') && Request::file('file')->isValid() )
        {

            $current_file = Input::file('file');
            $filename = Auth::id() .'_'. $current_file->getClientOriginalName();
            $current_file->move($directory, $filename);

            $file = new Upload;
            $file->user_id = Auth::id();
            $file->project_id = Input::get('project_id');
            $file->name = Input::get('name');
            $file->path = $directory.$filename;
            $file->save();

            return Redirect::back();
        }

        $upload = new Upload;
        $upload->user_id = Auth::id();
        $upload->project_id = Input::get('project_id');
        $upload->name = Input::get('name');
        $upload->path = $directory.$filename;
        $upload->save();

        return Redirect::back();
	}

    /**
     * Delete the given file
     */
	public function destroy($id)
	{
		//
	}

}