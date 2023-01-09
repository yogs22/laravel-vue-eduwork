<?php

namespace Database\Seeders;

use App\Models\TransactionDetail;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;

class TransactionDetailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        for($i = 0; $i < 100; $i++){
            $transaction = new TransactionDetail();
            $transaction->transaction_id = rand(1,20);
            $transaction->book_id = rand(3,22);
            $transaction->qty = rand(1,5);
            $transaction->save();
        }
    }
}
