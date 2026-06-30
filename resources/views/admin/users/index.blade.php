<x-layouts.admin>
    <div class="mb-6 flex items-center justify-between">
        <h1 class="font-display text-3xl text-ink">Users</h1>
        <a href="{{ route('admin.users.create') }}" class="inline-flex h-10 items-center rounded-md bg-primary px-4 text-sm font-medium text-white hover:bg-primary-active">Tambah User</a>
    </div>
    <div class="overflow-hidden rounded-card border border-hairline bg-white">
        <table class="w-full text-sm">
            <thead class="border-b border-hairline bg-surface-soft text-left text-muted">
                <tr><th class="px-4 py-3">Nama</th><th class="px-4 py-3">Email</th><th class="px-4 py-3">Role</th><th class="px-4 py-3 text-right">Aksi</th></tr>
            </thead>
            <tbody>
                @foreach($users as $user)
                    <tr class="border-b border-hairline/60">
                        <td class="px-4 py-3 font-medium">{{ $user->name }}</td>
                        <td class="px-4 py-3 text-muted">{{ $user->email }}</td>
                        <td class="px-4 py-3"><span class="rounded-full bg-surface-card px-2 py-0.5 text-xs">{{ $user->role }}</span></td>
                        <td class="px-4 py-3 text-right">
                            <a href="{{ route('admin.users.edit', $user) }}" class="text-primary">Edit</a>
                            @if(auth()->id() !== $user->id)
                                <form action="{{ route('admin.users.destroy', $user) }}" method="POST" class="inline" onsubmit="return confirm('Hapus user?')">
                                    @csrf @method('DELETE')
                                    <button class="ml-3 text-error">Hapus</button>
                                </form>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="mt-6">{{ $users->links() }}</div>
</x-layouts.admin>
