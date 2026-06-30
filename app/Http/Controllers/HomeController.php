<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\News;
use App\Services\NewsService;
use Illuminate\View\View;

class HomeController extends Controller
{
    public function __construct(private NewsService $newsService) {}

    public function index(): View
    {
        $heroNews = News::query()->published()->with(['category', 'user'])->latest('published_at')->first();

        $breakingNews = News::query()
            ->published()
            ->with(['category', 'user'])
            ->when($heroNews, fn ($q) => $q->where('id', '!=', $heroNews->id))
            ->latest('published_at')
            ->limit(5)
            ->get();

        $latestNews = $this->newsService->latest(6);
        $trendingNews = $this->newsService->trending(6);

        $categorySections = Category::query()
            ->orderBy('name')
            ->get()
            ->mapWithKeys(fn (Category $category) => [
                $category->slug => $this->newsService->byCategorySlug($category->slug, 4),
            ]);

        return view('public.home', compact(
            'heroNews',
            'breakingNews',
            'latestNews',
            'trendingNews',
            'categorySections'
        ));
    }
}
