<x-layouts.public :title="'Search — '.config('app.name')">
    <section class="py-8 md:py-12">
        <div class="mx-auto max-w-content px-4 sm:px-6 lg:px-8">
            <h1 class="font-display text-4xl tracking-tight text-ink">Pencarian</h1>
            <form action="{{ route('search') }}" method="GET" class="mt-6 max-w-xl">
                <input type="search" name="q" value="{{ $query }}" placeholder="Cari judul, kategori, tag..."
                    class="h-12 w-full rounded-md border border-hairline bg-canvas px-4 text-ink focus:border-primary focus:outline-none focus:ring-2 focus:ring-primary/15">
            </form>

            @if($query !== '')
                <p class="mt-6 text-muted">
                    @if($news && $news->total() > 0)
                        {{ $news->total() }} hasil untuk "{{ $query }}"
                    @else
                        Tidak ada hasil untuk "{{ $query }}"
                    @endif
                </p>

                @if($news && $news->count())
                    <div class="mt-8 grid gap-6 sm:grid-cols-2 lg:grid-cols-3">
                        @foreach($news as $item)
                            <x-news-card :news="$item" />
                        @endforeach
                    </div>
                    <div class="mt-10">{{ $news->links() }}</div>
                @endif
            @endif
        </div>
    </section>
</x-layouts.public>
