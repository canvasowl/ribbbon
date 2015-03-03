<?php

class File extends \Eloquent {
	protected $fillable = [];

    public function user(){
        return $this->belongsTo('User');
    }

    public function project(){
        return $this->belongsTo('Project');
    }

}