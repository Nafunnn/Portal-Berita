<x-layouts.admin>
    <div class="mb-6 flex items-center justify-between">
        <h1 class="font-display text-3xl text-ink">Tags</h1>
        <a href="{{ route('admin.tags.create') }}" class="inline-flex h-10 items-center rounded-md bg-primary px-4 text-sm font-medium text-white hover:bg-primary-active">Tambah</a>
    </div>
    <div class="overflow-hidden rounded-card border border-hairline bg-white">
        <table class="w-full text-sm">
            <thead class="border-b border-hairline bg-surface-soft text-left text-muted">
                <tr><th class="px-4 py-3">Nama</th><th class="px-4 py-3">Slug</th><th class="px-4 py-3">Berita</th><th class="px-4 py-3 text-right">Aksi</th></tr>
            </thead>
            <tbody>
                @foreach($tags as $tag)
                    <tr class="border-b border-hairline/60">
                        <td class="px-4 py-3 font-medium">{{ $tag->name }}</td>
                        <td class="px-4 py-3 text-muted">{{ $tag->slug }}</td>
                        <td class="px-4 py-3">{{ $tag->news_count }}</td>
                        <td class="px-4 py-3 text-right">
                            <a href="{{ route('admin.tags.edit', $tag) }}" class="text-primary">Edit</a>
                            <form action="{{ route('admin.tags.destroy', $tag) }}" method="POST" class="inline" onsubmit="return confirm('Hapus tag?')">
                                @csrf @method('DELETE')
                                <button class="ml-3 text-error">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="mt-6">{{ $tags->links() }}</div>
</x-layouts.admin>
