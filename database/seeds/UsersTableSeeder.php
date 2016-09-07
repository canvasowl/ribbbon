<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();

        DB::statement('SET FOREIGN_KEY_CHECKS=0;');

        DB::table('users')->truncate();
        DB::table('users')->insert(
            [
                'full_name'           => $faker->name,
                'email'               => 'test@ribbbon.com',
                'password'            => Hash::make('secret'),
                'tasks_created'       => 1,
                ]
        );

        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
