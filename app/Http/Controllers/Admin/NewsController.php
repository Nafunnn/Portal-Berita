<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreNewsRequest;
use App\Http\Requests\UpdateNewsRequest;
use App\Models\Category;
use App\Models\Media;
use App\Models\News;
use App\Models\Tag;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class NewsController extends Controller
{
    public function index(Request $request): View
    {
        $news = News::query()
            ->with(['category', 'user'])
            ->when($request->filled('status'), fn ($q) => $q->where('status', $request->status))
            ->when($request->filled('q'), fn ($q) => $q->where('title', 'like', '%'.$request->q.'%'))
            ->latest()
            ->paginate(10)
            ->withQueryString();

        return view('admin.news.index', compact('news'));
    }

    public function create(): View
    {
        return view('admin.news.create', [
            'categories' => Category::orderBy('name')->get(),
            'tags' => Tag::orderBy('name')->get(),
            'mediaItems' => Media::latest()->limit(20)->get(),
        ]);
    }

    public function store(StoreNewsRequest $request): RedirectResponse
    {
        $data = $request->validated();
        $data['user_id'] = $request->user()->id;
        $data['slug'] = $data['slug'] ?? News::generateUniqueSlug($data['title']);
        $data['thumbnail'] = $this->resolveThumbnail($request, $data);

        unset($data['tags'], $data['thumbnail_path']);

        if ($data['status'] === 'published' && empty($data['published_at'])) {
            $data['published_at'] = now();
        }

        $news = News::create($data);
        $news->tags()->sync($request->input('tags', []));

        return redirect()->route('admin.news.index')->with('success', 'Berita berhasil dibuat.');
    }

    public function edit(News $news): View
    {
        $news->load('tags');

        return view('admin.news.edit', [
            'news' => $news,
            'categories' => Category::orderBy('name')->get(),
            'tags' => Tag::orderBy('name')->get(),
            'mediaItems' => Media::latest()->limit(20)->get(),
        ]);
    }

    public function update(UpdateNewsRequest $request, News $news): RedirectResponse
    {
        $data = $request->validated();

        if (! empty($data['slug'])) {
            $data['slug'] = News::generateUniqueSlug($data['slug'], $news->id);
        } else {
            unset($data['slug']);
        }

        $thumbnail = $this->resolveThumbnail($request, $data, $news->thumbnail);
        if ($thumbnail !== null) {
            if ($news->thumbnail && $news->thumbnail !== $thumbnail && ! str_starts_with($news->thumbnail, 'http')) {
                Storage::disk('public')->delete($news->thumbnail);
            }
            $data['thumbnail'] = $thumbnail;
        } else {
            unset($data['thumbnail']);
        }

        unset($data['tags'], $data['thumbnail_path']);

        if ($data['status'] === 'published' && empty($data['published_at']) && ! $news->published_at) {
            $data['published_at'] = now();
        }

        $news->update($data);
        $news->tags()->sync($request->input('tags', []));

        return redirect()->route('admin.news.index')->with('success', 'Berita berhasil diperbarui.');
    }

    public function destroy(News $news): RedirectResponse
    {
        if ($news->thumbnail && ! str_starts_with($news->thumbnail, 'http')) {
            Storage::disk('public')->delete($news->thumbnail);
        }

        $news->delete();

        return redirect()->route('admin.news.index')->with('success', 'Berita berhasil dihapus.');
    }

    private function resolveThumbnail(Request $request, array $data, ?string $current = null): ?string
    {
        if ($request->hasFile('thumbnail')) {
            return $request->file('thumbnail')->store('news', 'public');
        }

        if (! empty($data['thumbnail_path'])) {
            return $data['thumbnail_path'];
        }

        return $current;
    }
}
