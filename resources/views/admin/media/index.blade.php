<x-layouts.admin>
    <div class="mb-6">
        <h1 class="font-display text-3xl text-ink">Media Library</h1>
        <p class="text-muted">Upload dan kelola gambar untuk thumbnail berita</p>
    </div>

    <form action="{{ route('admin.media.store') }}" method="POST" enctype="multipart/form-data" class="mb-8 rounded-card border border-hairline bg-white p-6">
        @csrf
        <label class="mb-2 block text-sm font-medium">Upload gambar (max 2MB, jpeg/png/webp)</label>
        <input type="file" name="files[]" multiple accept="image/*" class="mb-4 w-full text-sm">
        <button type="submit" class="h-10 rounded-md bg-primary px-5 text-sm font-medium text-white hover:bg-primary-active">Upload</button>
    </form>

    <div class="grid grid-cols-2 gap-4 sm:grid-cols-3 lg:grid-cols-4">
        @forelse($media as $item)
            <div class="overflow-hidden rounded-card border border-hairline bg-white">
                <img src="{{ $item->url() }}" alt="{{ $item->alt ?? $item->filename }}" class="aspect-square w-full object-cover">
                <div class="p-3">
                    <p class="truncate text-xs text-muted">{{ $item->filename }}</p>
                    <p class="mt-1 truncate text-xs text-muted-soft">{{ $item->path }}</p>
                    <button type="button" onclick="navigator.clipboard.writeText('{{ $item->path }}')" class="mt-2 text-xs text-primary hover:underline">Copy path</button>
                    <form action="{{ route('admin.media.destroy', $item) }}" method="POST" class="mt-2" onsubmit="return confirm('Hapus media?')">
                        @csrf @method('DELETE')
                        <button type="submit" class="text-xs text-error hover:underline">Hapus</button>
                    </form>
                </div>
            </div>
        @empty
            <p class="col-span-full text-muted">Belum ada media. Upload gambar pertama Anda.</p>
        @endforelse
    </div>
    <div class="mt-6">{{ $media->links() }}</div>
</x-layouts.admin>
