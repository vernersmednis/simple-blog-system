<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Category>
 */
class CategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $name = fake()->unique()->randomElement([
            'Travel',
            'Food',
            'Lifestyle',
            'Health',
            'Fitness',
            'Music',
            'Fashion',
            'Sports',
            'Science',
        ]);

        return [
            'name' => $name,
        ];
    }
}
