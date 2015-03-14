<?php

class Task extends \Eloquent {
	protected $fillable = [];

    public function project(){
        return $this->belongsTo('Project', 'project_id');
    }
}

