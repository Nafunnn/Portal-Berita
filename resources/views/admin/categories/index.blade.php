<x-layouts.admin>
    <div class="mb-6 flex items-center justify-between">
        <h1 class="font-display text-3xl text-ink">Categories</h1>
        <a href="{{ route('admin.categories.create') }}" class="inline-flex h-10 items-center rounded-md bg-primary px-4 text-sm font-medium text-white hover:bg-primary-active">Tambah</a>
    </div>
    <div class="overflow-hidden rounded-card border border-hairline bg-white">
        <table class="w-full text-sm">
            <thead class="border-b border-hairline bg-surface-soft text-left text-muted">
                <tr><th class="px-4 py-3">Nama</th><th class="px-4 py-3">Slug</th><th class="px-4 py-3">Berita</th><th class="px-4 py-3 text-right">Aksi</th></tr>
            </thead>
            <tbody>
                @foreach($categories as $category)
                    <tr class="border-b border-hairline/60">
                        <td class="px-4 py-3 font-medium">{{ $category->name }}</td>
                        <td class="px-4 py-3 text-muted">{{ $category->slug }}</td>
                        <td class="px-4 py-3">{{ $category->news_count }}</td>
                        <td class="px-4 py-3 text-right">
                            <a href="{{ route('admin.categories.edit', $category) }}" class="text-primary">Edit</a>
                            <form action="{{ route('admin.categories.destroy', $category) }}" method="POST" class="inline" onsubmit="return confirm('Hapus kategori?')">
                                @csrf @method('DELETE')
                                <button class="ml-3 text-error">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="mt-6">{{ $categories->links() }}</div>
</x-layouts.admin>
