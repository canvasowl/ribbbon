<?php

class File extends \Eloquent {
	protected $fillable = [];

    // validation rules for files store form
    public static $rules = [
        'name' => 'required',
        'file' => 'required|max:20000|',
    ];


    public function user(){
        return $this->belongsTo('User');
    }

    public function project(){
        return $this->belongsTo('Project');
    }

}