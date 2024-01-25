<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Author;
use App\Models\Category;
use App\Models\Recipe;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // for($i = 0; $i < 3; $i++) {
        //     $category = Category::factory()->create();
        // }
        $categories = [
            [
                'name' => 'Sarapan'
            ],
            [
                'name' => 'Makan Siang'
            ],
            [
                'name' => 'Makan Malam'
            ]
        ];
        Category::insert($categories);
        for($i = 0; $i < 5; $i++) {
            $author = Author::factory()->create();
        }
        for($i = 0; $i < 10; $i++) {
            $recipe = Recipe::factory()->create();
        }
        $user = User::factory()->create();
    }
}
