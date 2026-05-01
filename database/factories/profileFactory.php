<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\profile>
 */
class profileFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [

            'user_id' => User::inRandomOrder()->first()->id,
            'job_title' => fake()->sentence,
            'bio' => fake()->paragraph,
            'cv_url' => fake()->sentence,
            'social_links' => fake()->sentence,
            'social_links2' => fake()->sentence,
            'phone' => fake()->numberBetween(1, 7),
        ];
    }
}
