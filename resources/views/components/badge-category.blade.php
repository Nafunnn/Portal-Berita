@props(['category'])

<a href="{{ route('category.show', $category) }}"
    {{ $attributes->merge(['class' => 'inline-flex rounded-full bg-surface-card px-3 py-1 text-xs font-medium text-ink transition hover:bg-primary hover:text-white']) }}>
    {{ $category->name }}
</a>
