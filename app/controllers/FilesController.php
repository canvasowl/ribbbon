<?php

class FilesController extends \BaseController {

    /**
     * Upload the file and store
     * the file path in the DB.
     */
	public function store()
	{
        $directory = "uploads/files/";

        // Before anything let's make sure a file was uploaded
        if ( Input::hasFile('file') && Request::file('file')->isValid() )
        {
            $file = Input::file('file');
            $filename = Auth::id() .'_'. $file->getClientOriginalName();
            $file->move($directory, $filename);
        }
	}

    /**
     * Delete the given file
     */
	public function destroy($id)
	{
		//
	}

}