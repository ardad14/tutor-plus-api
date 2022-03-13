<?php

namespace Database\Factories;

use App\Models\Announcement;
use Illuminate\Database\Eloquent\Factories\Factory;

class AnnouncementFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Announcement::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->jobTitle(),
            'description' => $this->faker->realText(40),
            'price' => $this->faker->randomNumber(3),
            'duration' => $this->faker->randomNumber(3),
            'schedule' => json_encode([
                $this->faker->dayOfWeek() => $this->faker->time('H:m')
            ])
        ];
    }
}
