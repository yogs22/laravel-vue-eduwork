<?php

namespace Database\Seeders;

use App\Models\User;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        for($i = 0; $i < 20; $i++){
            $user = new User();
            $user->name = $faker->name;
            $user->email = $faker->email;
            $user->password = $faker->password;
            $user->member_id = rand(1,10);
            $user->save();
        }
    }
}
