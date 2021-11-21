<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class UserPlacesFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => $this->faker->numberBetween(1, 10),
            'place_id' => $this->faker->numberBetween(1, 10),
            'role' => $this->faker->randomElement(['admin', 'manager', 'worker']),
            'created_at' => $this->faker->dateTimeThisYear(),
        ];
    }
}
