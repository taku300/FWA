<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Result>
 */
class ResultFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    private static int $Number = 1;

    public function definition()
    {
        $date = $this->faker->dateTimeBetween('-1 week', '+1 week');
        return [
            'started_at' => $date->format('Y-m-d'),
            'ended_at' => $date->modify('+1day')->format('Y-m-d'),
            'name' => self::$Number++ . '選手権大会',
            'venue' => $this->faker->city(),
        ];
    }
}
