<x-layouts.admin>
    <h1 class="mb-6 font-display text-3xl text-ink">Edit User</h1>
    <form action="{{ route('admin.users.update', $user) }}" method="POST" class="max-w-lg rounded-card border border-hairline bg-white p-6">
        @csrf @method('PUT')
        <div class="mb-4">
            <label class="mb-1 block text-sm font-medium">Nama *</label>
            <input type="text" name="name" value="{{ old('name', $user->name) }}" required class="w-full rounded-md border border-hairline px-3 py-2 text-sm">
        </div>
        <div class="mb-4">
            <label class="mb-1 block text-sm font-medium">Email *</label>
            <input type="email" name="email" value="{{ old('email', $user->email) }}" required class="w-full rounded-md border border-hairline px-3 py-2 text-sm">
        </div>
        <div class="mb-4">
            <label class="mb-1 block text-sm font-medium">Password baru</label>
            <input type="password" name="password" class="w-full rounded-md border border-hairline px-3 py-2 text-sm">
            <p class="mt-1 text-xs text-muted">Kosongkan jika tidak ingin mengubah password</p>
        </div>
        <div class="mb-4">
            <label class="mb-1 block text-sm font-medium">Konfirmasi Password</label>
            <input type="password" name="password_confirmation" class="w-full rounded-md border border-hairline px-3 py-2 text-sm">
        </div>
        <div class="mb-6">
            <label class="mb-1 block text-sm font-medium">Role *</label>
            <select name="role" class="w-full rounded-md border border-hairline px-3 py-2 text-sm">
                <option value="editor" @selected($user->role === 'editor')>Editor</option>
                <option value="admin" @selected($user->role === 'admin')>Admin</option>
            </select>
        </div>
        <button type="submit" class="h-10 rounded-md bg-primary px-5 text-sm font-medium text-white">Perbarui</button>
    </form>
</x-layouts.admin>
