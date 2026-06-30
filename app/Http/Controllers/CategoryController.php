<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\News;
use Illuminate\View\View;

class CategoryController extends Controller
{
    public function show(Category $category): View
    {
        $news = News::query()
            ->published()
            ->with(['category', 'user'])
            ->where('category_id', $category->id)
            ->latest('published_at')
            ->paginate(10);

        return view('public.category.show', compact('category', 'news'));
    }
}
