<?php

use Faker\Factory as Faker;
use Illuminate\Database\Seeder;

class ProjectsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        DB::statement('SET FOREIGN_KEY_CHECKS=0;');

        DB::table('projects')->truncate();

        DB::table('projects')->insert(
            [
                'name'                 => 'First Project',
                'user_id'              => 1,
                'client_id'            => 1,
                ]
        );

        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
