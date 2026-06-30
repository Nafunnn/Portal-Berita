<x-layouts.admin>
    <div class="mb-6 flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
        <div>
            <h1 class="font-display text-3xl text-ink">News</h1>
            <p class="text-muted">Kelola berita portal</p>
        </div>
        <a href="{{ route('admin.news.create') }}" class="inline-flex h-10 items-center rounded-md bg-primary px-4 text-sm font-medium text-white hover:bg-primary-active">Tambah Berita</a>
    </div>

    <form method="GET" class="mb-6 flex flex-wrap gap-3">
        <input type="search" name="q" value="{{ request('q') }}" placeholder="Cari judul..."
            class="h-10 rounded-md border border-hairline px-3 text-sm focus:border-primary focus:outline-none focus:ring-2 focus:ring-primary/15">
        <select name="status" class="h-10 rounded-md border border-hairline px-3 text-sm">
            <option value="">Semua status</option>
            <option value="published" @selected(request('status') === 'published')>Published</option>
            <option value="draft" @selected(request('status') === 'draft')>Draft</option>
        </select>
        <button type="submit" class="h-10 rounded-md border border-hairline px-4 text-sm hover:bg-surface-card">Filter</button>
    </form>

    <div class="overflow-hidden rounded-card border border-hairline bg-white">
        <table class="w-full text-left text-sm">
            <thead class="border-b border-hairline bg-surface-soft text-muted">
                <tr>
                    <th class="px-4 py-3">Judul</th>
                    <th class="px-4 py-3">Kategori</th>
                    <th class="px-4 py-3">Status</th>
                    <th class="px-4 py-3">Views</th>
                    <th class="px-4 py-3 text-right">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($news as $item)
                    <tr class="border-b border-hairline/60">
                        <td class="px-4 py-3 font-medium text-ink">{{ Str::limit($item->title, 50) }}</td>
                        <td class="px-4 py-3 text-muted">{{ $item->category?->name }}</td>
                        <td class="px-4 py-3">
                            <span class="rounded-full px-2 py-0.5 text-xs {{ $item->status === 'published' ? 'bg-success/15 text-success' : 'bg-warning/15 text-warning' }}">
                                {{ ucfirst($item->status) }}
                            </span>
                        </td>
                        <td class="px-4 py-3 text-muted">{{ number_format($item->views) }}</td>
                        <td class="px-4 py-3 text-right">
                            <a href="{{ route('admin.news.edit', $item) }}" class="text-primary hover:underline">Edit</a>
                            <form action="{{ route('admin.news.destroy', $item) }}" method="POST" class="inline" onsubmit="return confirm('Hapus berita ini?')">
                                @csrf @method('DELETE')
                                <button type="submit" class="ml-3 text-error hover:underline">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr><td colspan="5" class="px-4 py-8 text-center text-muted">Belum ada berita.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
    <div class="mt-6">{{ $news->links() }}</div>
</x-layouts.admin>
