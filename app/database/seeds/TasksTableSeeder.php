<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class TasksTableSeeder extends Seeder {

	public function run()
	{
		$faker = Faker::create();

		DB::table('tasks')->truncate();		
		DB::table('tasks')->insert(
		    array(
		    	'user_id' 			=>	1,
		    	'project_id' 		=>	1, 
		    	'name'				=>	"First Task",
		    	'state' 			=> 	"incomplete",
		    	'weight'			=>	2,
		    	)
		);
	}
}