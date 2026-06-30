<x-layouts.admin>
    <div class="mb-8">
        <h1 class="font-display text-3xl text-ink">Dashboard</h1>
        <p class="text-muted">Ringkasan statistik portal berita</p>
    </div>

    <div class="grid gap-4 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-6">
        <x-stat-card label="Total Berita" :value="$stats['total_news']" />
        <x-stat-card label="Published" :value="$stats['published']" />
        <x-stat-card label="Draft" :value="$stats['draft']" />
        <x-stat-card label="Categories" :value="$stats['categories']" />
        <x-stat-card label="Tags" :value="$stats['tags']" />
        <x-stat-card label="Total Views" :value="number_format($stats['views'])" />
    </div>

    <div class="mt-10 grid gap-8 lg:grid-cols-2">
        <div class="rounded-card border border-hairline bg-white p-6">
            <h2 class="mb-4 font-display text-xl text-ink">Berita per Kategori</h2>
            <canvas id="categoryChart" height="200"></canvas>
        </div>

        <div class="rounded-card border border-hairline bg-white p-6">
            <h2 class="mb-4 font-display text-xl text-ink">Recent News</h2>
            <div class="overflow-x-auto">
                <table class="w-full text-left text-sm">
                    <thead class="border-b border-hairline text-muted">
                        <tr>
                            <th class="pb-2 pr-4">Judul</th>
                            <th class="pb-2 pr-4">Status</th>
                            <th class="pb-2">Tanggal</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($recentNews as $item)
                            <tr class="border-b border-hairline/60">
                                <td class="py-3 pr-4">
                                    <a href="{{ route('admin.news.edit', $item) }}" class="font-medium text-ink hover:text-primary">{{ Str::limit($item->title, 40) }}</a>
                                </td>
                                <td class="py-3 pr-4">
                                    <span class="rounded-full px-2 py-0.5 text-xs {{ $item->status === 'published' ? 'bg-success/15 text-success' : 'bg-warning/15 text-warning' }}">
                                        {{ ucfirst($item->status) }}
                                    </span>
                                </td>
                                <td class="py-3 text-muted">{{ $item->created_at->format('d M Y') }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    @push('scripts')
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        <script>
            new Chart(document.getElementById('categoryChart'), {
                type: 'bar',
                data: {
                    labels: @json($chartLabels),
                    datasets: [{
                        label: 'Published',
                        data: @json($chartData),
                        backgroundColor: '#cc785c',
                        borderRadius: 6,
                    }]
                },
                options: {
                    responsive: true,
                    plugins: { legend: { display: false } },
                    scales: {
                        y: { beginAtZero: true, ticks: { stepSize: 1 } }
                    }
                }
            });
        </script>
    @endpush
</x-layouts.admin>
