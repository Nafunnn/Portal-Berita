<?php

namespace App\Http\Controllers;

use App\Models\News;
use App\Services\NewsService;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class NewsController extends Controller
{
    public function __construct(private NewsService $newsService) {}

    public function show(Request $request, News $news): View
    {
        if (! $news->isPublished()) {
            throw new NotFoundHttpException();
        }

        $news->load(['category', 'tags', 'user']);

        $sessionKey = 'viewed_news_'.$news->id;
        if (! $request->session()->has($sessionKey)) {
            $news->increment('views');
            $request->session()->put($sessionKey, true);
        }

        $relatedNews = $this->newsService->related($news);

        return view('public.news.show', [
            'news' => $news,
            'relatedNews' => $relatedNews,
            'title' => $news->title.' — '.config('app.name'),
            'metaDescription' => $news->excerpt(160),
        ]);
    }
}
