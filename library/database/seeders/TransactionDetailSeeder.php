<?php

namespace Database\Seeders;

use App\Models\TransactionDetail;
use Faker\Factory as Faker;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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

        for ($i=0; $i < 20; $i++) { 
            $transactionDetail = New TransactionDetail;

            $transactionDetail->transaction_id = rand(1,20);
            $transactionDetail->book_id = rand(1,20);
            $transactionDetail->qty = rand(5,20);
            
            $transactionDetail->save();
        }
        //
    }
}
