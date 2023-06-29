<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

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
    public function definition(): array
    {
        $degre = ['BSIT','BSBA','BSED'];
        //$role = ['Student','Instructor'];
        $randomNumber = fake()->numberBetween(1000, 9999);
        return [
            'first_name' => fake()->name,
            'last_name' => fake()->name,
            'email' => fake()->email,
            'student_instructor_id' => '21-AC-'.$randomNumber,
            'account_role' => 'Instructor',
            'degree_name' => fake()->randomElement($degre),
            'profile_picture' => 'imgs/profile_pic_ko.jpg',
            'password' => fake()->password,
        ];
    }
}
