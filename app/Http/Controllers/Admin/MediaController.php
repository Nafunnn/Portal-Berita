<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Media;
use App\Models\News;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class MediaController extends Controller
{
    public function index(): View
    {
        $media = Media::with('user')->latest()->paginate(12);

        return view('admin.media.index', compact('media'));
    }

    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'files' => ['required'],
            'files.*' => ['image', 'max:2048'],
        ]);

        foreach ($request->file('files', []) as $file) {
            $path = $file->store('media', 'public');

            Media::create([
                'user_id' => $request->user()->id,
                'filename' => $file->getClientOriginalName(),
                'path' => $path,
                'mime_type' => $file->getMimeType(),
                'size' => $file->getSize(),
            ]);
        }

        return back()->with('success', 'Media berhasil diunggah.');
    }

    public function destroy(Media $media): RedirectResponse
    {
        $inUse = News::query()->where('thumbnail', $media->path)->exists();

        if ($inUse) {
            return back()->with('error', 'Media masih digunakan sebagai thumbnail berita.');
        }

        Storage::disk('public')->delete($media->path);
        $media->delete();

        return back()->with('success', 'Media berhasil dihapus.');
    }
}
