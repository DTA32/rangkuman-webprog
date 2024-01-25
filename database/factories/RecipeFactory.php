<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Recipe>
 */
class RecipeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $imageUrl = [
            "1.png",
            "2.png",
            "3.png",
        ];
        return [
            'title' => $this->faker->sentence(),
            'author_id' => rand(1, 5),
            'category_id' => rand(1, 3),
            'published_date' => $this->faker->dateTimeBetween('-1 year', 'now')->format('Y-m-d'), // '2021-01-01
            'description' => $this->faker->paragraph(),
            'image' => $imageUrl[rand(0, 2)],
        ];
    }
}
