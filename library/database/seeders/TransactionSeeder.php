<?php

namespace Database\Seeders;

use App\Models\Transaction;
use Faker\Factory as Faker;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TransactionSeeder extends Seeder
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
            $transaction = New Transaction;

            $transaction->member_id = rand(1,20);
            $transaction->date_start = $faker->dateTime();
            $transaction->date_end = $faker->dateTime();
            
            $transaction->save();
        }
        //
    }
}
