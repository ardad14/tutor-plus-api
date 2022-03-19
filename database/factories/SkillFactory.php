<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class SkillFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->slug(),
            'level' => $this->faker->randomElement(['junior', 'middle', 'senior']),
            'description' => $this->faker->text(100)
        ];
    }
}
