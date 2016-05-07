<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use App\Task;

class TasksController extends BaseController {

    // Return all tasks that are not completed for the given user
    public function getAllUserOpenTasks(){
        $tasks = Task::where('user_id',Auth::id())->where('state', '!=', 'complete')->get();
        return $this->setStatusCode(200)->makeResponse('Tasks retrieved successfully',$tasks->toArray());
    }

    // Insert a new task into the database
    public function storeTask($client_id, $project_id){
        if (!Input::all()) {
            return $this->setStatusCode(406)->makeResponse('No information provided to create task');
        }

        if (!Input::get('name')) {
            return $this->setStatusCode(406)->makeResponse('The name seems to be empty');
        }

        Input::merge(array('user_id' => Auth::id(), 'client_id' => $client_id, 'project_id' => $project_id));

        Task::create(Input::all());
        $id = \DB::getPdo()->lastInsertId();

        return $this->setStatusCode(200)->makeResponse('Task created successfully', Task::find($id));
    }

    // Update the given task
    public function updateTask($id){
        if (!Task::find($id)) {
            return $this->setStatusCode(400)->makeResponse('Could not find the task');
        }

        if ( Input::get('name') === "") {
            return $this->setStatusCode(406)->makeResponse('The task needs a name');
        }

        $input = Input::all();
        unset($input['_method']);

        Task::find($id)->update($input);
        return $this->setStatusCode(200)->makeResponse('The task has been updated');
    }

    // Remove the given task from the database
    public function removeTask($id){
        if (!Task::find($id)) {
            return $this->setStatusCode(400)->makeResponse('Could not find the task');
        }

        Task::find($id)->delete();
        return $this->setStatusCode(200)->makeResponse('Task deleted successfully');
    }

}