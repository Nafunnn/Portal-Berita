<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\News;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class NewsSeeder extends Seeder
{
    public function run(): void
    {
        $admin = User::query()->where('email', 'admin@technews.test')->first();
        $editor = User::query()->where('email', 'editor@technews.test')->first();

        if (! $admin || ! $editor) {
            return;
        }

        $tags = Tag::factory()->count(15)->create();
        $categories = Category::all();
        $authors = [$admin, $editor];

        foreach ($categories as $category) {
            News::factory()
                ->count(8)
                ->published()
                ->create([
                    'category_id' => $category->id,
                    'user_id' => fake()->randomElement($authors)->id,
                    'thumbnail' => 'news/placeholder.png',
                ])
                ->each(function (News $news) use ($tags) {
                    $news->tags()->attach(
                        $tags->random(fake()->numberBetween(2, 4))->pluck('id')
                    );
                });
        }

        News::factory()
            ->count(5)
            ->draft()
            ->create([
                'user_id' => $editor->id,
                'category_id' => $categories->random()->id,
            ])
            ->each(function (News $news) use ($tags) {
                $news->tags()->attach($tags->random(2)->pluck('id'));
            });
    }
}
