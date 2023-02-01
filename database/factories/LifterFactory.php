<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Lifter>
 */
class LifterFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    public function definition()
    {
        return [
            'first_name' => $this->faker->firstName(),
            'last_name' => $this->faker->lastName(),
            'first_name_kana' => $this->faker->firstKanaName(),
            'last_name_kana' => $this->faker->lastKanaName(),
            'gender' => $this->faker->numberBetween(1, 2),
            'category' => $this->faker->numberBetween(1, 5),
            'affiliation_id' => $this->faker->numberBetween(1, 5),
            'weight_class' => $this->faker->numberBetween(1, 20),
            'image_path' => $this->faker->image(storage_path('app/public/fakers'), 640, 480, null, false),
        ];
    }

    public function topLifter()
    {
        return $this->state(function (array $attributes) {
            return [
                'top_post_flag' => 1,
            ];
        });
    }
}
