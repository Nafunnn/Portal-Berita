<x-layouts.admin>
    <h1 class="mb-6 font-display text-3xl text-ink">Tambah Kategori</h1>
    <form action="{{ route('admin.categories.store') }}" method="POST" class="max-w-lg rounded-card border border-hairline bg-white p-6">
        @csrf
        <div class="mb-4">
            <label class="mb-1 block text-sm font-medium">Nama *</label>
            <input type="text" name="name" value="{{ old('name') }}" required class="w-full rounded-md border border-hairline px-3 py-2 text-sm">
            @error('name')<p class="mt-1 text-sm text-error">{{ $message }}</p>@enderror
        </div>
        <div class="mb-6">
            <label class="mb-1 block text-sm font-medium">Slug</label>
            <input type="text" name="slug" value="{{ old('slug') }}" class="w-full rounded-md border border-hairline px-3 py-2 text-sm">
        </div>
        <button type="submit" class="h-10 rounded-md bg-primary px-5 text-sm font-medium text-white">Simpan</button>
    </form>
</x-layouts.admin>
