<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Article>
 */
class ArticleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $title = fake()->sentence;
        $contentStr = '';
        $contents = fake()->paragraphs(4);
        foreach ($contents as $content) {
            $contentStr .= '<p>' . $content . '</p>';
        }

        return [
            'user_id' => '',
            'title' => $title,
            'slug' => Str::slug($title),
            'image' => fake()->imageUrl,
            'article-trixFields' => [
                'content' => $contentStr,
            ],
        ];
    }
}
