<?php

use App\Models\Category;
use App\Models\News;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

it('homepage returns successful response', function () {
    $this->get(route('home'))->assertOk();
});

it('published news detail is accessible by slug', function () {
    $user = User::factory()->create(['role' => 'editor']);
    $category = Category::factory()->create();

    $news = News::factory()->published()->create([
        'user_id' => $user->id,
        'category_id' => $category->id,
        'slug' => 'nvidia-launches-rtx-6090',
    ]);

    $this->get(route('news.show', $news))->assertOk()->assertSee($news->title);
});

it('draft news returns 404 on public site', function () {
    $user = User::factory()->create(['role' => 'editor']);
    $category = Category::factory()->create();

    $news = News::factory()->draft()->create([
        'user_id' => $user->id,
        'category_id' => $category->id,
        'slug' => 'draft-article-secret',
    ]);

    $this->get(route('news.show', $news))->assertNotFound();
});

it('admin routes redirect guest to login', function () {
    $this->get(route('admin.dashboard'))->assertRedirect(route('login'));
});

it('news store validation fails without title', function () {
    $admin = User::factory()->create(['role' => 'admin']);
    $category = Category::factory()->create();

    $this->actingAs($admin)
        ->post(route('admin.news.store'), [
            'category_id' => $category->id,
            'content' => '<p>Test content</p>',
            'status' => 'draft',
        ])
        ->assertSessionHasErrors('title');
});
