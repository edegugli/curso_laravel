<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class UserTableSeeder extends Seeder{

    public function run()
    {
        $faker = Faker::create('es_VE');

        for ($i=0; $i < 30; $i++) {
            $id=\DB::table('users')->insertGetId(array(
                'first_name'    => $faker->firstName,
                'last_name'     => $faker->lastName,
                'email'         => $faker->unique()->email,
                'password'      => \Hash::make('secret'),
                'type'          => 'user'
            ));
            \DB::table('user_profiles')->insert(array(
                'bio'       => $faker->paragraph(rand(2,5)),
                'website'   => $faker->url,
                'twitter'   => '@'.$faker->userName,
                'birthdate' => $faker->dateTimeBetween('-45 years','-15 years'),
                'user_id'   => $id
            ));

        }
    }

}