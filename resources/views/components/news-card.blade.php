@props(['news', 'featured' => false])

<article {{ $attributes->merge(['class' => 'group flex flex-col overflow-hidden rounded-card bg-surface-card transition hover:shadow-sm']) }}>
    <a href="{{ route('news.show', $news) }}" class="block overflow-hidden">
        @if($news->thumbnailUrl())
            <img src="{{ $news->thumbnailUrl() }}" alt="{{ $news->title }}"
                loading="lazy"
                class="aspect-[16/10] w-full object-cover transition duration-300 group-hover:scale-[1.02] {{ $featured ? 'aspect-[16/9]' : '' }}">
        @else
            <div class="flex aspect-[16/10] items-center justify-center bg-surface-soft text-muted">
                <span class="text-sm">No image</span>
            </div>
        @endif
    </a>
    <div class="flex flex-1 flex-col p-5 {{ $featured ? 'p-6' : '' }}">
        @if($news->category)
            <x-badge-category :category="$news->category" class="mb-3 self-start" />
        @endif
        <a href="{{ route('news.show', $news) }}">
            <h3 class="font-display text-xl leading-snug tracking-tight text-ink transition group-hover:text-primary {{ $featured ? 'text-2xl md:text-3xl' : '' }}">
                {{ $news->title }}
            </h3>
        </a>
        <p class="mt-2 line-clamp-2 text-sm text-muted">{{ $news->excerpt(120) }}</p>
        <div class="mt-auto flex items-center gap-2 pt-4 text-xs text-muted-soft">
            <span>{{ $news->user?->name }}</span>
            <span>&middot;</span>
            <time datetime="{{ $news->published_at?->toIso8601String() }}">{{ $news->published_at?->format('d M Y') }}</time>
        </div>
    </div>
</article>
