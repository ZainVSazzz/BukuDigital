<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Book>
 */
class BookFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $title = fake()->sentence;
        return [
            'category_id' => '',
            'image' => fake()->imageUrl,
            'title' => $title,
            'slug' => Str::slug($title),
            'description' => fake()->text,
            'author' => fake()->name,
            'price' => rand(20000, 150000),
            'file_path' => fake()->filePath(),
        ];
    }
}
