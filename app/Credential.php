<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Credential extends Model {
	protected $fillable = [
        'user_id',
        'project_id',
        'name',
        'type',
        'hostname',
        'username',
        'password',
        'port'
    ];

    protected $hidden = ['created_at','updated_at'];
}