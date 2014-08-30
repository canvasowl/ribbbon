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

		Eloquent::unguard();
		

		for ($i=0; $i < 10 ; $i++) { 
			$projects = [ ["name" => $faker->name] ];
		}


		DB::table('projects')->insert($projects);
	}

}
