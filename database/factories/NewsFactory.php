<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\News>
 */
class NewsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'category' => $this->faker->numberBetween(1, 2),
            'noticed_at' => $this->faker->dateTimeBetween('-1 year', 'now'),
            'title' => $this->faker->prefecture() . '選手権大会が開催されます。',
            // 'note' => $this->faker->realText(20),
        ];
    }
}
