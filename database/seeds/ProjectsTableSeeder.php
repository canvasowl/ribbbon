<?php
use Faker\Factory as Faker;

class ProjectsTableSeeder extends Seeder {


	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		$faker = Faker::create();

		DB::table('projects')->truncate();
		
		DB::table('projects')->insert(
		    array(
		    	'name' 				=>	"First Project",
		    	'user_id' 			=> 	1, 
		    	'client_id'			=>	1,
		    	)
		);
	}

}
