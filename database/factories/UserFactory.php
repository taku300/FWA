<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name(),
            'email' => $this->faker->unique()->safeEmail(),
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token' => Str::random(10),
            'role' => 3,
            'affiliation_id' => $this->faker->numberBetween(1, 5),
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     *
     * @return static
     */
    public function unverified()
    {
        return $this->state(fn (array $attributes) => [
            'email_verified_at' => null,
        ]);
    }

    public function system_admin()
    {
        return $this->state(function (array $attributes) {
            return [
                'name' => '福田　匠磨',
                'email' => 'fukuda.takuma695@mail.kyutech.jp',                'role' => 0,
                'affiliation_id' => 1,
            ];
        });
    }

    public function admin()
    {
        return $this->state(function (array $attributes) {
            return [
                'name' => ' 福岡県ウエイトリフティング協会',
                'email' => 'fukuokaweight@gmail.com',
                'role' => 1,
                'affiliation_id' => 2,
            ];
        });
    }
}
