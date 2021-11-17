<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ClientPlacesFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'client_id' => $this->faker->numberBetween(1, 150),
            'place_id' => $this->faker->numberBetween(33, 42),
            'spend_money' => $this->faker->numberBetween(80, 10000),
            'created_at' => $this->faker->dateTime()
        ];
    }
}
