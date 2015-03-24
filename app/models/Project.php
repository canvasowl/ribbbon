<?php

class Project extends \Eloquent {
	protected $fillable = [];

	public function tasks(){
		return $this->hasMany('Task', 'project_id');
	}

	public function credentials(){
		return $this->hasMany('Credential', 'project_id');
	}

	public function members(){
		return $this->belongsToMany('User');
	}

    public function client(){
        return $this->belongsTo('Client');
    }

    public function uploads(){
        return $this->hasMany('Upload', 'project_id');
    }

	/**
	 * Checks if teh currently Auth user
	 * is the owner of the project.
	 *
	 * @return bool
	 */
	public function isOwner(){

		if($this->user_id != Auth::id()){
			return false;
		}

		return true;
	}


	/**
	 * Checks if the current Auth user
	 * is a member of a given project.
	 *
	 * @return bool
	 */
	public function isMember(){

		$s = DB::table('project_user')->whereProjectId($this->id)->whereUserId(Auth::id())->get();
		if(count($s) == 0){
			return false;
		}

		return true;
	}

}