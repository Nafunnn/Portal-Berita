<?php

namespace App\Observers;

use App\Models\News;

class NewsObserver
{
    public function creating(News $news): void
    {
        if (empty($news->slug) && $news->title) {
            $news->slug = News::generateUniqueSlug($news->title);
        }

        if ($news->status === 'published' && ! $news->published_at) {
            $news->published_at = now();
        }
    }

    public function updating(News $news): void
    {
        if ($news->isDirty('title') && ! $news->isDirty('slug')) {
            $news->slug = News::generateUniqueSlug($news->title, $news->id);
        }

        if ($news->isDirty('status') && $news->status === 'published' && ! $news->published_at) {
            $news->published_at = now();
        }
    }
}
