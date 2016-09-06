<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;

class TasksTableSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();

        DB::statement('SET FOREIGN_KEY_CHECKS=0;');

        DB::table('tasks')->truncate();
        DB::table('tasks')->insert(
            [
                'user_id'             => 1,
                'project_id'          => 1,
                'name'                => 'First Task',
                'state'               => 'incomplete',
                'weight'              => 2,
                ]
        );

        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
