<?php

class Project extends \Eloquent {
	protected $fillable = [];

	public function tasks(){
		return $this->hasMany('Task', 'project_id');
	}
}