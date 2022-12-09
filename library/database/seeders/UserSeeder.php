<?php

namespace Database\Seeders;

use App\Models\User;
use Faker\Factory as Faker;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class Userseeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        for ($i=0; $i < 20; $i++) { 
            $user = New User;

            $user->name = $faker->name;
            $user->email = $faker->email;
            $user->email_verified_at = now();
            $user->password = $faker->password;
            $user->member_id = rand(1, 20);

            $user->save();
        }
        //
    }
}
