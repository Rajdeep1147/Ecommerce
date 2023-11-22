<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Admin>
 */
class AdminFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
         return [
            'name' => fake()->name(),
            'email' => fake()->unique()->safeEmail(),
            'status' => fake()->randomElement(['active', 'deactive']),
            'phone' => fake()->phoneNumber,
            'email_verified_at' => now(),
            'password' => bcrypt('123456'), // password
            'remember_token' => Str::random(10),
        ];
    }
}
