<x-layouts.admin>
    <div class="mb-6">
        <h1 class="font-display text-3xl text-ink">Tambah Berita</h1>
    </div>

    <form action="{{ route('admin.news.store') }}" method="POST" enctype="multipart/form-data" class="rounded-card border border-hairline bg-white p-6">
        @csrf
        @include('admin.news._form', ['categories' => $categories, 'tags' => $tags, 'mediaItems' => $mediaItems])
        <div class="mt-8 flex gap-3">
            <button type="submit" class="h-10 rounded-md bg-primary px-5 text-sm font-medium text-white hover:bg-primary-active">Simpan</button>
            <a href="{{ route('admin.news.index') }}" class="inline-flex h-10 items-center rounded-md border border-hairline px-5 text-sm hover:bg-surface-card">Batal</a>
        </div>
    </form>
</x-layouts.admin>
