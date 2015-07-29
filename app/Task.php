<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model {
	protected $fillable = [];

    /**
     * Relationship to project
     */
    public function project(){
        return $this->belongsTo('App\Project', 'project_id');
    }
}

