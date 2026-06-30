<?php

namespace App\Providers;

use App\Models\Category;
use App\Models\News;
use App\Observers\NewsObserver;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        News::observe(NewsObserver::class);

        View::composer(['components.public.navbar', 'components.public.footer'], function ($view) {
            $categories = Category::query()->orderBy('name')->get();
            $view->with('categories', $categories);
            $view->with('footerCategories', $categories);
        });
    }
}
