<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ $title ?? 'Admin' }} — {{ config('app.name') }}</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:wght@400;500&family=Inter:wght@400;500;600&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @stack('styles')
</head>
<body class="min-h-screen bg-canvas font-sans antialiased" x-data="{ sidebarOpen: false }">
    <div class="flex min-h-screen">
        <aside class="fixed inset-y-0 left-0 z-40 w-64 -translate-x-full border-r border-hairline bg-white transition-transform lg:static lg:translate-x-0"
            :class="{ 'translate-x-0': sidebarOpen }">
            <div class="flex h-16 items-center border-b border-hairline px-6">
                <a href="{{ route('admin.dashboard') }}" class="font-display text-xl text-ink">
                    Tech<span class="text-primary">News</span>
                    <span class="block text-xs font-sans font-normal text-muted">Admin Panel</span>
                </a>
            </div>
            <nav class="space-y-1 p-4">
                <x-admin.nav-link :href="route('admin.dashboard')" :active="request()->routeIs('admin.dashboard')">Dashboard</x-admin.nav-link>
                <x-admin.nav-link :href="route('admin.news.index')" :active="request()->routeIs('admin.news.*')">News</x-admin.nav-link>
                <x-admin.nav-link :href="route('admin.categories.index')" :active="request()->routeIs('admin.categories.*')">Categories</x-admin.nav-link>
                <x-admin.nav-link :href="route('admin.tags.index')" :active="request()->routeIs('admin.tags.*')">Tags</x-admin.nav-link>
                <x-admin.nav-link :href="route('admin.media.index')" :active="request()->routeIs('admin.media.*')">Media</x-admin.nav-link>
                @if(auth()->user()->isAdmin())
                    <x-admin.nav-link :href="route('admin.users.index')" :active="request()->routeIs('admin.users.*')">Users</x-admin.nav-link>
                @endif
                <x-admin.nav-link :href="route('profile.edit')" :active="request()->routeIs('profile.*')">Profile</x-admin.nav-link>
            </nav>
        </aside>

        <div class="flex flex-1 flex-col lg:ml-0">
            <header class="sticky top-0 z-30 flex h-16 items-center justify-between border-b border-hairline bg-canvas px-4 lg:px-8">
                <button type="button" class="rounded-md p-2 text-ink lg:hidden" @click="sidebarOpen = !sidebarOpen">
                    <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/></svg>
                </button>
                <div class="flex items-center gap-4">
                    <a href="{{ route('home') }}" target="_blank" class="text-sm text-muted hover:text-primary">Lihat Website</a>
                    <span class="text-sm text-body">{{ auth()->user()->name }}</span>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="text-sm text-muted hover:text-error">Logout</button>
                    </form>
                </div>
            </header>

            <main class="flex-1 p-4 lg:p-8">
                @if(session('success'))
                    <div class="mb-4 rounded-md border border-success/30 bg-success/10 px-4 py-3 text-sm text-success">{{ session('success') }}</div>
                @endif
                @if(session('error'))
                    <div class="mb-4 rounded-md border border-error/30 bg-error/10 px-4 py-3 text-sm text-error">{{ session('error') }}</div>
                @endif
                {{ $slot }}
            </main>
        </div>
    </div>
    @stack('scripts')
</body>
</html>
