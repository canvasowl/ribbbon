<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model {
	protected $fillable = [
        'name',
        'weight',
        'user_id',
        'project_id',
        'state',
        'priority',
        'description'
    ];

    protected  $hidden = [
        "created_at",
        "updated_at",
    ];

    /**
     * Relationship to project
     */
    public function project(){
        return $this->belongsTo('App\Project', 'project_id');
    }
}

