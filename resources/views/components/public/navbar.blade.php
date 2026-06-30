<nav class="sticky top-0 z-50 border-b border-hairline bg-canvas" x-data="{ open: false }">
    <div class="mx-auto flex h-16 max-w-content items-center justify-between px-4 sm:px-6 lg:px-8">
        <a href="{{ route('home') }}" class="font-display text-2xl tracking-tight text-ink">
            Tech<span class="text-primary">News</span>
        </a>

        <div class="hidden items-center gap-6 md:flex">
            @foreach($categories ?? [] as $category)
                <a href="{{ route('category.show', $category) }}" class="text-sm font-medium text-muted transition hover:text-ink">
                    {{ $category->name }}
                </a>
            @endforeach
            <a href="{{ route('about') }}" class="text-sm font-medium text-muted transition hover:text-ink">About</a>
        </div>

        <div class="hidden items-center gap-3 md:flex">
            <form action="{{ route('search') }}" method="GET" class="relative">
                <input type="search" name="q" value="{{ request('q') }}"
                    placeholder="Cari berita..."
                    class="h-10 w-48 rounded-md border border-hairline bg-canvas px-3 text-sm text-ink placeholder:text-muted-soft focus:border-primary focus:outline-none focus:ring-2 focus:ring-primary/15 lg:w-56">
            </form>
            @auth
                @if(auth()->user()->isEditor())
                    <a href="{{ route('admin.dashboard') }}" class="rounded-md bg-primary px-4 py-2 text-sm font-medium text-white hover:bg-primary-active">Admin</a>
                @endif
            @else
                <a href="{{ route('login') }}" class="text-sm font-medium text-ink hover:text-primary">Sign in</a>
            @endauth
        </div>

        <button type="button" class="rounded-md p-2 text-ink md:hidden" @click="open = !open" aria-label="Menu">
            <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/></svg>
        </button>
    </div>

    <div class="border-t border-hairline bg-canvas px-4 py-4 md:hidden" x-show="open" x-cloak>
        <form action="{{ route('search') }}" method="GET" class="mb-4">
            <input type="search" name="q" value="{{ request('q') }}" placeholder="Cari berita..."
                class="h-10 w-full rounded-md border border-hairline bg-canvas px-3 text-sm focus:border-primary focus:outline-none focus:ring-2 focus:ring-primary/15">
        </form>
        <div class="flex flex-col gap-2">
            @foreach($categories ?? [] as $category)
                <a href="{{ route('category.show', $category) }}" class="rounded-md px-3 py-2 text-sm font-medium text-body hover:bg-surface-card">{{ $category->name }}</a>
            @endforeach
            <a href="{{ route('about') }}" class="rounded-md px-3 py-2 text-sm font-medium text-body hover:bg-surface-card">About</a>
            @guest
                <a href="{{ route('login') }}" class="rounded-md px-3 py-2 text-sm font-medium text-primary">Sign in</a>
            @endguest
        </div>
    </div>
</nav>
