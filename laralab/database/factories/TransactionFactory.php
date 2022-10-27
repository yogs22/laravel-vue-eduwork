<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class TransactionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'code' => rand(100000, 999999),
            'product' => $this->faker->domainName(),
            'address' => $this->faker->address()
        ];
    }
}
