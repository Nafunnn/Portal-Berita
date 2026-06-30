<x-layouts.admin>
    <h1 class="mb-6 font-display text-3xl text-ink">Tambah User</h1>
    <form action="{{ route('admin.users.store') }}" method="POST" class="max-w-lg rounded-card border border-hairline bg-white p-6">
        @csrf
        <div class="mb-4">
            <label class="mb-1 block text-sm font-medium">Nama *</label>
            <input type="text" name="name" value="{{ old('name') }}" required class="w-full rounded-md border border-hairline px-3 py-2 text-sm">
        </div>
        <div class="mb-4">
            <label class="mb-1 block text-sm font-medium">Email *</label>
            <input type="email" name="email" value="{{ old('email') }}" required class="w-full rounded-md border border-hairline px-3 py-2 text-sm">
        </div>
        <div class="mb-4">
            <label class="mb-1 block text-sm font-medium">Password *</label>
            <input type="password" name="password" required class="w-full rounded-md border border-hairline px-3 py-2 text-sm">
        </div>
        <div class="mb-4">
            <label class="mb-1 block text-sm font-medium">Konfirmasi Password *</label>
            <input type="password" name="password_confirmation" required class="w-full rounded-md border border-hairline px-3 py-2 text-sm">
        </div>
        <div class="mb-6">
            <label class="mb-1 block text-sm font-medium">Role *</label>
            <select name="role" class="w-full rounded-md border border-hairline px-3 py-2 text-sm">
                <option value="editor">Editor</option>
                <option value="admin">Admin</option>
            </select>
        </div>
        <button type="submit" class="h-10 rounded-md bg-primary px-5 text-sm font-medium text-white">Simpan</button>
    </form>
</x-layouts.admin>
