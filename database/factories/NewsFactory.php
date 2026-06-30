<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\News;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends Factory<News>
 */
class NewsFactory extends Factory
{
    protected $model = News::class;

    public function definition(): array
    {
        $title = fake()->sentence(6);

        return [
            'category_id' => Category::factory(),
            'user_id' => User::factory(),
            'title' => rtrim($title, '.'),
            'slug' => Str::slug($title).'-'.fake()->unique()->numberBetween(1000, 9999),
            'thumbnail' => null,
            'content' => '<p>'.implode('</p><p>', fake()->paragraphs(5)).'</p>',
            'status' => 'published',
            'views' => fake()->numberBetween(0, 5000),
            'published_at' => fake()->dateTimeBetween('-3 months', 'now'),
        ];
    }

    public function draft(): static
    {
        return $this->state(fn () => [
            'status' => 'draft',
            'published_at' => null,
        ]);
    }

    public function published(): static
    {
        return $this->state(fn () => [
            'status' => 'published',
            'published_at' => fake()->dateTimeBetween('-3 months', 'now'),
        ]);
    }
}
