<x-layouts.public>
    <section class="border-b border-hairline bg-canvas py-12 md:py-section">
        <div class="mx-auto max-w-content px-4 sm:px-6 lg:px-8">
            @if($heroNews)
                <div class="grid items-center gap-10 lg:grid-cols-2">
                    <div>
                        <x-badge-category :category="$heroNews->category" class="mb-4" />
                        <h1 class="font-display text-4xl leading-tight tracking-tight text-ink md:text-5xl lg:text-6xl">
                            <a href="{{ route('news.show', $heroNews) }}" class="hover:text-primary">{{ $heroNews->title }}</a>
                        </h1>
                        <p class="mt-4 max-w-xl text-body">{{ $heroNews->excerpt(200) }}</p>
                        <div class="mt-6 flex items-center gap-3 text-sm text-muted">
                            <span>{{ $heroNews->user?->name }}</span>
                            <span>&middot;</span>
                            <time>{{ $heroNews->published_at?->format('d M Y') }}</time>
                        </div>
                        <a href="{{ route('news.show', $heroNews) }}" class="mt-8 inline-flex h-10 items-center rounded-md bg-primary px-5 text-sm font-medium text-white hover:bg-primary-active">
                            Baca Selengkapnya
                        </a>
                    </div>
                    <a href="{{ route('news.show', $heroNews) }}" class="block overflow-hidden rounded-xl">
                        @if($heroNews->thumbnailUrl())
                            <img src="{{ $heroNews->thumbnailUrl() }}" alt="{{ $heroNews->title }}" class="aspect-[16/10] w-full object-cover" loading="eager">
                        @endif
                    </a>
                </div>
            @else
                <p class="text-center text-muted">Belum ada berita. Login ke admin untuk mempublish berita pertama.</p>
            @endif
        </div>
    </section>

    @if($breakingNews->isNotEmpty())
        <section class="border-b border-hairline bg-surface-soft py-8">
            <div class="mx-auto max-w-content px-4 sm:px-6 lg:px-8">
                <p class="mb-4 text-xs font-medium uppercase tracking-widest text-primary">Breaking News</p>
                <div class="flex gap-4 overflow-x-auto pb-2">
                    @foreach($breakingNews as $item)
                        <a href="{{ route('news.show', $item) }}" class="min-w-[260px] flex-shrink-0 rounded-card bg-canvas p-4 transition hover:shadow-sm">
                            <p class="text-xs text-muted">{{ $item->category?->name }}</p>
                            <p class="mt-1 font-display text-lg leading-snug text-ink">{{ $item->title }}</p>
                        </a>
                    @endforeach
                </div>
            </div>
        </section>
    @endif

    <section class="py-12 md:py-section">
        <div class="mx-auto max-w-content px-4 sm:px-6 lg:px-8">
            <x-section-heading title="Latest News" subtitle="Terbaru" :link="route('search')" />
            <div class="grid gap-6 sm:grid-cols-2 lg:grid-cols-3">
                @foreach($latestNews as $item)
                    <x-news-card :news="$item" />
                @endforeach
            </div>
        </div>
    </section>

    <section class="bg-surface-card py-12 md:py-section">
        <div class="mx-auto max-w-content px-4 sm:px-6 lg:px-8">
            <x-section-heading title="Trending News" subtitle="Populer" />
            <div class="grid gap-6 sm:grid-cols-2 lg:grid-cols-3">
                @foreach($trendingNews as $item)
                    <x-news-card :news="$item" />
                @endforeach
            </div>
        </div>
    </section>

    @foreach($categorySections as $slug => $items)
        @if($items->isNotEmpty())
            @php $category = $items->first()->category; @endphp
            <section class="border-t border-hairline py-12 md:py-section">
                <div class="mx-auto max-w-content px-4 sm:px-6 lg:px-8">
                    <x-section-heading :title="$category->name" :link="route('category.show', $category)" />
                    <div class="grid gap-6 sm:grid-cols-2 lg:grid-cols-4">
                        @foreach($items as $item)
                            <x-news-card :news="$item" />
                        @endforeach
                    </div>
                </div>
            </section>
        @endif
    @endforeach

    <section class="py-12 md:py-section">
        <div class="mx-auto max-w-content px-4 sm:px-6 lg:px-8">
            <div class="rounded-card bg-primary p-10 text-center text-white md:p-16">
                <h2 class="font-display text-3xl tracking-tight md:text-4xl">Tetap update teknologi terkini</h2>
                <p class="mx-auto mt-3 max-w-lg text-white/90">Jelajahi berita AI, hardware, gaming, dan software setiap hari di TechNews Portal.</p>
                <a href="{{ route('search') }}" class="mt-8 inline-flex h-10 items-center rounded-md bg-canvas px-5 text-sm font-medium text-ink hover:bg-white">
                    Cari Berita
                </a>
            </div>
        </div>
    </section>
</x-layouts.public>
