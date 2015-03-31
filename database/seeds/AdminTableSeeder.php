<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class AdminTableSeeder extends Seeder{

    public function run()
    {
        $faker = Faker::create('es_VE');

        $id=\DB::table('users')->insertGetId(array(
            'first_name'    => 'Duilio',
            'last_name'     => 'Palacios',
            'email'         => 'i@duilio.me',
            'password'      => \Hash::make('secret'),
            'type'          => 'Admin'
        ));
        \DB::table('user_profiles')->insert(array(
            'website'   => 'http://url.com/',
            'twitter'   => '@duilio',
            'birthdate' => $faker->dateTimeBetween('-45 years','-15 years'),
            'user_id'   => $id
        ));
    }

}