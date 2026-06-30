<?php

namespace App\Http\Controllers;

use App\Models\News;
use App\Models\Tag;
use Illuminate\View\View;

class TagController extends Controller
{
    public function show(Tag $tag): View
    {
        $news = News::query()
            ->published()
            ->with(['category', 'user'])
            ->whereHas('tags', fn ($q) => $q->where('tags.id', $tag->id))
            ->latest('published_at')
            ->paginate(10);

        return view('public.tag.show', compact('tag', 'news'));
    }
}
