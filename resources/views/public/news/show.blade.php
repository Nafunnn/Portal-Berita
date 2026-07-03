<x-layouts.public :title="$title" :metaDescription="$metaDescription">
    <article class="py-8 md:py-12">
        <div class="mx-auto max-w-content px-4 sm:px-6 lg:px-8">
            <x-breadcrumb :items="[
                ['label' => 'Home', 'url' => route('home')],
                ['label' => $news->category?->name ?? 'Berita', 'url' => $news->category ? route('category.show', $news->category) : null],
                ['label' => $news->title],
            ]" />

            <header class="mx-auto max-w-3xl">
                @if($news->category)
                    <x-badge-category :category="$news->category" class="mb-4" />
                @endif
                <h1 class="font-display text-4xl leading-tight tracking-tight text-ink md:text-5xl">{{ $news->title }}</h1>
                <div class="mt-4 flex flex-wrap items-center gap-3 text-sm text-muted">
                    <span>Oleh {{ $news->user?->name }}</span>
                    <span>&middot;</span>
                    <time datetime="{{ $news->published_at?->toIso8601String() }}">{{ $news->published_at?->format('d F Y') }}</time>
                    <span>&middot;</span>
                    <span>{{ number_format($news->views) }} views</span>
                </div>
            </header>

            @if($news->thumbnailUrl())
                <div class="mx-auto mt-8 max-w-4xl overflow-hidden rounded-xl">
                    <img src="{{ $news->thumbnailUrl() }}" alt="{{ $news->title }}" class="w-full object-cover" loading="lazy">
                </div>
            @endif

            <div class="prose-news mx-auto mt-10 max-w-3xl">
                {!! $news->content !!}
            </div>

            @if($news->tags->isNotEmpty())
                <div class="mx-auto mt-8 flex max-w-3xl flex-wrap gap-2">
                    @foreach($news->tags as $tag)
                        <x-badge-tag :tag="$tag" />
                    @endforeach
                </div>
            @endif

            <div class="mx-auto mt-8 max-w-3xl border-t border-hairline pt-6">
                <p class="mb-3 text-sm font-medium text-ink">Bagikan artikel</p>
                <div class="flex flex-wrap gap-3">
                    <button type="button" onclick="copyArticleLink(this)" class="rounded-md border border-hairline px-4 py-2 text-sm hover:bg-surface-card">Copy Link</button>
                    <a href="https://wa.me/?text={{ urlencode($news->title.' '.url()->current()) }}" target="_blank" rel="noopener" class="rounded-md border border-hairline px-4 py-2 text-sm hover:bg-surface-card">WhatsApp</a>
                    <a href="https://twitter.com/intent/tweet?url={{ urlencode(url()->current()) }}&text={{ urlencode($news->title) }}" target="_blank" rel="noopener" class="rounded-md border border-hairline px-4 py-2 text-sm hover:bg-surface-card">X / Twitter</a>
                </div>
            </div>
        </div>
    </article>

    @if($relatedNews->isNotEmpty())
        <section class="border-t border-hairline bg-surface-soft py-12">
            <div class="mx-auto max-w-content px-4 sm:px-6 lg:px-8">
                <x-section-heading title="Related News" subtitle="Berita Terkait" />
                <div class="grid gap-6 sm:grid-cols-2 lg:grid-cols-4">
                    @foreach($relatedNews as $item)
                        <x-news-card :news="$item" />
                    @endforeach
                </div>
            </div>
        </section>
    @endif

    <script>
        function copyArticleLink(button) {
            const url = window.location.href;
            const label = button.textContent;

            if (navigator.clipboard?.writeText) {
                navigator.clipboard.writeText(url).then(() => showCopied(button, label));
                return;
            }

            const textarea = document.createElement('textarea');
            textarea.value = url;
            textarea.setAttribute('readonly', '');
            textarea.style.position = 'fixed';
            textarea.style.opacity = '0';
            document.body.appendChild(textarea);
            textarea.select();
            document.execCommand('copy');
            document.body.removeChild(textarea);
            showCopied(button, label);
        }

        function showCopied(button, label) {
            button.textContent = 'Tersalin!';
            setTimeout(() => { button.textContent = label; }, 2000);
        }
    </script>
</x-layouts.public>
