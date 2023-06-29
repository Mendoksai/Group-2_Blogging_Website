<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => fake()->randomDigit(),
            'first_name' => fake()->firstName(),
            'last_name' => fake()->lastName(),
            'account_role' => fake()->randomElement(['Student', 'Instructor']),
            'degree_name' => fake()->randomElement(['bsit', 'beed', 'BSHM', 'BSBA']),
            'title' => fake()->sentence($nbWords = 6, $variableNbWords = true) ,
            'content' => fake()->text($maxNbChars = 1700),
            'created_at' => fake()->dateTime('2023-06-22 14:58:39')
        ];
    }
}
