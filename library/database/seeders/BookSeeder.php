<?php

namespace Database\Seeders;

use App\Models\Book;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        for($i=0;$i < 30;$i++){
            $catalog = new Book;

            $catalog->isbn = $faker->randomNumber(9);
            $catalog->title = $faker->name;
            $catalog->year = rand(2011,2022);
            // foreign key
            $catalog->publisher_id = rand(1,20);
            $catalog->author_id = rand(1,20);
            $catalog->catalog_id = rand(1,4);
            // foreign key end
            $catalog->qty = rand(5,100);
            $catalog->price = rand(10000,100000);

            $catalog->save();
        };
    }
}