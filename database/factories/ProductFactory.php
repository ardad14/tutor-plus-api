<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->company(),
            'purchase' => $this->faker->numberBetween(20, 500),
            'price' => $this->faker->numberBetween(500, 1000),
            'available_amount' => $this->faker->numberBetween(10, 100),
            'sold' => $this->faker->numberBetween(10, 100),
            'place_id' => $this->faker->numberBetween(1, 10),
        ];
    }
}
