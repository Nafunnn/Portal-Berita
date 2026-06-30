<footer class="bg-surface-dark text-on-dark-soft">
    <div class="mx-auto max-w-content px-4 py-16 sm:px-6 lg:px-8">
        <div class="mb-10">
            <a href="{{ route('home') }}" class="font-display text-2xl text-on-dark">
                Tech<span class="text-primary">News</span>
            </a>
            <p class="mt-3 max-w-md text-sm">Portal berita teknologi terpercaya — AI, hardware, gaming, software, dan perkembangan digital terkini.</p>
        </div>
        <div class="grid gap-8 sm:grid-cols-2 lg:grid-cols-4">
            <div>
                <h4 class="mb-3 text-sm font-medium uppercase tracking-widest text-on-dark">Kategori</h4>
                <ul class="space-y-2 text-sm">
                    @foreach(($footerCategories ?? collect())->take(6) as $category)
                        <li><a href="{{ route('category.show', $category) }}" class="hover:text-on-dark">{{ $category->name }}</a></li>
                    @endforeach
                </ul>
            </div>
            <div>
                <h4 class="mb-3 text-sm font-medium uppercase tracking-widest text-on-dark">Navigasi</h4>
                <ul class="space-y-2 text-sm">
                    <li><a href="{{ route('home') }}" class="hover:text-on-dark">Home</a></li>
                    <li><a href="{{ route('search') }}" class="hover:text-on-dark">Search</a></li>
                    <li><a href="{{ route('about') }}" class="hover:text-on-dark">About</a></li>
                </ul>
            </div>
            <div>
                <h4 class="mb-3 text-sm font-medium uppercase tracking-widest text-on-dark">Kontak</h4>
                <p class="text-sm">hello@technews.test</p>
            </div>
            <div>
                <h4 class="mb-3 text-sm font-medium uppercase tracking-widest text-on-dark">TechNews Portal</h4>
                <p class="text-sm">&copy; {{ date('Y') }} TechNews. All rights reserved.</p>
            </div>
        </div>
    </div>
</footer>
