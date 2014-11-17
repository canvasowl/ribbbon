<?php

class Project extends \Eloquent {
	protected $fillable = [];

	public function tasks(){
		return $this->hasMany('Task', 'project_id');
	}

	public function credentials(){
		return $this->hasMany('Credential', 'project_id');
	}
}