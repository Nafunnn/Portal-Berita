<?php

namespace App\Services;

use App\Models\News;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;

class NewsService
{
    public function search(string $query): LengthAwarePaginator
    {
        return News::query()
            ->published()
            ->with(['category', 'tags', 'user'])
            ->where(function (Builder $q) use ($query) {
                $q->where('title', 'like', "%{$query}%")
                    ->orWhere('content', 'like', "%{$query}%")
                    ->orWhereHas('tags', fn (Builder $tagQ) => $tagQ->where('name', 'like', "%{$query}%"))
                    ->orWhereHas('category', fn (Builder $catQ) => $catQ->where('name', 'like', "%{$query}%"));
            })
            ->latest('published_at')
            ->paginate(10)
            ->withQueryString();
    }

    public function related(News $news, int $limit = 4): Collection
    {
        return News::query()
            ->published()
            ->with(['category', 'user'])
            ->where('category_id', $news->category_id)
            ->where('id', '!=', $news->id)
            ->latest('published_at')
            ->limit($limit)
            ->get();
    }

    public function trending(int $limit = 6): Collection
    {
        return News::query()
            ->published()
            ->with(['category', 'user'])
            ->orderByDesc('views')
            ->limit($limit)
            ->get();
    }

    public function latest(int $limit = 6): Collection
    {
        return News::query()
            ->published()
            ->with(['category', 'user'])
            ->latest('published_at')
            ->limit($limit)
            ->get();
    }

    public function byCategorySlug(string $slug, int $limit = 4): Collection
    {
        return News::query()
            ->published()
            ->with(['category', 'user'])
            ->whereHas('category', fn (Builder $q) => $q->where('slug', $slug))
            ->latest('published_at')
            ->limit($limit)
            ->get();
    }
}
