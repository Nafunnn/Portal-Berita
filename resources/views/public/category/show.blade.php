<x-layouts.public :title="$category->name.' — '.config('app.name')">
    <section class="py-8 md:py-12">
        <div class="mx-auto max-w-content px-4 sm:px-6 lg:px-8">
            <x-breadcrumb :items="[
                ['label' => 'Home', 'url' => route('home')],
                ['label' => $category->name],
            ]" />
            <h1 class="font-display text-4xl tracking-tight text-ink md:text-5xl">{{ $category->name }}</h1>
            <p class="mt-2 text-muted">{{ $news->total() }} berita ditemukan</p>

            <div class="mt-10 grid gap-6 sm:grid-cols-2 lg:grid-cols-3">
                @forelse($news as $item)
                    <x-news-card :news="$item" />
                @empty
                    <p class="col-span-full text-muted">Belum ada berita di kategori ini.</p>
                @endforelse
            </div>

            <div class="mt-10">
                {{ $news->links() }}
            </div>
        </div>
    </section>
</x-layouts.public>
