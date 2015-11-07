<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client extends Model {

	protected $table = 'clients';
	protected $hidden = ['created_at','updated_at'];
	protected $fillable = [
		'user_id',
		'name',
		'phone_number',
		'point_of_contact',
		'email'
	];

	/**
	 * Return the related projects for a given client
	 */
	public function projects() {
        return $this->hasMany('App\Project', 'client_id');
    }
}