<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;

class ClientsTableSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();

        DB::statement('SET FOREIGN_KEY_CHECKS=0;');

        DB::table('clients')->truncate();
        DB::table('clients')->insert(
            [
                'name'                 => $faker->name,
                'user_id'              => 1,
                'phone_number'         => '1-55-555-555',
                'point_of_contact'     => $faker->name,
                'email'                => 'test@test.com',
                ]
        );

        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
