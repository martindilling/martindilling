<?php

use Faker\Factory as Faker;
use Illuminate\Support\Facades\Hash;
use MDH\Entities\User;

class UsersTableSeeder extends Seeder {

    public function run()
    {
        $faker = Faker::create();

        foreach(range(1, 10) as $index)
        {
            User::create([
                'admin'    => $index == 1 ? true : $faker->boolean($chanceOfTrue = 15),
                'active'   => $index == 1 ? true : $faker->boolean($chanceOfTrue = 75),
                'name'     => $index == 1 ? 'Martin Dilling-Hansen' : $faker->name(),
                'email'    => $index == 1 ? 'martindilling@gmail.com' : $faker->email(),
                'password' => Hash::make('password'),
            ]);
        }
    }

}
