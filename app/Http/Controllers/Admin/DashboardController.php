<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\News;
use App\Models\Tag;
use Illuminate\View\View;

class DashboardController extends Controller
{
    public function index(): View
    {
        $stats = [
            'total_news' => News::count(),
            'published' => News::where('status', 'published')->count(),
            'draft' => News::where('status', 'draft')->count(),
            'categories' => Category::count(),
            'tags' => Tag::count(),
            'views' => News::sum('views'),
        ];

        $recentNews = News::query()
            ->with(['category', 'user'])
            ->latest()
            ->limit(5)
            ->get();

        $chartLabels = Category::query()->orderBy('name')->pluck('name');
        $chartData = Category::query()
            ->withCount(['news' => fn ($q) => $q->where('status', 'published')])
            ->orderBy('name')
            ->pluck('news_count');

        return view('admin.dashboard', compact('stats', 'recentNews', 'chartLabels', 'chartData'));
    }
}
