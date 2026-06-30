<?php

namespace App\Http\Controllers;

use App\Services\NewsService;
use Illuminate\Http\Request;
use Illuminate\View\View;

class SearchController extends Controller
{
    public function __construct(private NewsService $newsService) {}

    public function index(Request $request): View
    {
        $query = trim((string) $request->get('q', ''));
        $news = $query !== ''
            ? $this->newsService->search($query)
            : null;

        return view('public.search', compact('query', 'news'));
    }
}
