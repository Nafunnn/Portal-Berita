@props(['news' => null, 'categories', 'tags', 'mediaItems'])

<div class="grid gap-6 lg:grid-cols-2">
    <div>
        <label class="mb-1 block text-sm font-medium text-ink">Judul *</label>
        <input type="text" name="title" value="{{ old('title', $news?->title) }}" required
            class="w-full rounded-md border border-hairline px-3 py-2 text-sm focus:border-primary focus:outline-none focus:ring-2 focus:ring-primary/15">
        @error('title')<p class="mt-1 text-sm text-error">{{ $message }}</p>@enderror
    </div>
    <div>
        <label class="mb-1 block text-sm font-medium text-ink">Slug</label>
        <input type="text" name="slug" value="{{ old('slug', $news?->slug) }}"
            class="w-full rounded-md border border-hairline px-3 py-2 text-sm focus:border-primary focus:outline-none focus:ring-2 focus:ring-primary/15">
        @error('slug')<p class="mt-1 text-sm text-error">{{ $message }}</p>@enderror
    </div>
    <div>
        <label class="mb-1 block text-sm font-medium text-ink">Kategori *</label>
        <select name="category_id" required class="w-full rounded-md border border-hairline px-3 py-2 text-sm">
            <option value="">Pilih kategori</option>
            @foreach($categories as $category)
                <option value="{{ $category->id }}" @selected(old('category_id', $news?->category_id) == $category->id)>{{ $category->name }}</option>
            @endforeach
        </select>
        @error('category_id')<p class="mt-1 text-sm text-error">{{ $message }}</p>@enderror
    </div>
    <div>
        <label class="mb-1 block text-sm font-medium text-ink">Status *</label>
        <select name="status" required class="w-full rounded-md border border-hairline px-3 py-2 text-sm">
            <option value="draft" @selected(old('status', $news?->status ?? 'draft') === 'draft')>Draft</option>
            <option value="published" @selected(old('status', $news?->status) === 'published')>Published</option>
        </select>
    </div>
    <div>
        <label class="mb-1 block text-sm font-medium text-ink">Published At</label>
        <input type="datetime-local" name="published_at" value="{{ old('published_at', $news?->published_at?->format('Y-m-d\TH:i')) }}"
            class="w-full rounded-md border border-hairline px-3 py-2 text-sm">
    </div>
    <div>
        <label class="mb-1 block text-sm font-medium text-ink">Thumbnail Upload</label>
        <input type="file" name="thumbnail" accept="image/*" class="w-full text-sm">
        @error('thumbnail')<p class="mt-1 text-sm text-error">{{ $message }}</p>@enderror
    </div>
</div>

<div class="mt-6">
    <label class="mb-2 block text-sm font-medium text-ink">Pilih dari Media Library</label>
    <div class="grid grid-cols-4 gap-3 sm:grid-cols-6">
        @foreach($mediaItems as $media)
            <label class="cursor-pointer">
                <input type="radio" name="thumbnail_path" value="{{ $media->path }}" class="peer sr-only" @checked(old('thumbnail_path', $news?->thumbnail) === $media->path)>
                <img src="{{ $media->url() }}" alt="{{ $media->alt ?? $media->filename }}"
                    class="aspect-square rounded-md border-2 border-transparent object-cover peer-checked:border-primary">
            </label>
        @endforeach
    </div>
</div>

<div class="mt-6">
    <label class="mb-2 block text-sm font-medium text-ink">Tags</label>
    <div class="flex flex-wrap gap-3">
        @foreach($tags as $tag)
            <label class="inline-flex items-center gap-2 rounded-md border border-hairline px-3 py-1.5 text-sm">
                <input type="checkbox" name="tags[]" value="{{ $tag->id }}"
                    @checked(in_array($tag->id, old('tags', $news?->tags?->pluck('id')->toArray() ?? [])))>
                {{ $tag->name }}
            </label>
        @endforeach
    </div>
</div>

<div class="mt-6">
    <label class="mb-1 block text-sm font-medium text-ink">Konten *</label>
    <textarea id="content" name="content" rows="12" class="w-full rounded-md border border-hairline">{!! old('content', $news?->content) !!}</textarea>
    @error('content')<p class="mt-1 text-sm text-error">{{ $message }}</p>@enderror
</div>

@push('scripts')
    <script src="https://cdn.ckeditor.com/ckeditor5/41.4.2/classic/ckeditor.js"></script>
    <script>
        ClassicEditor.create(document.querySelector('#content'), {
            toolbar: ['heading', '|', 'bold', 'italic', 'link', 'bulletedList', 'numberedList', 'blockQuote', 'undo', 'redo']
        }).catch(console.error);
    </script>
@endpush
