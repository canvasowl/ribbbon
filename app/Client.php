<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client extends Model {

	protected $table = 'clients';
	protected $fillable = [];

	/**
	 * Return the related projects for a given client
	 */
	public function projects() {
        return $this->hasMany('App\Project', 'client_id');
    }
}