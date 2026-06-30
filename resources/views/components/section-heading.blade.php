@props(['title', 'subtitle' => null, 'link' => null, 'linkText' => 'Lihat semua'])

<div {{ $attributes->merge(['class' => 'mb-8 flex flex-col gap-3 sm:flex-row sm:items-end sm:justify-between']) }}>
    <div>
        @if($subtitle)
            <p class="text-xs font-medium uppercase tracking-widest text-muted">{{ $subtitle }}</p>
        @endif
        <h2 class="font-display text-3xl tracking-tight text-ink md:text-4xl">{{ $title }}</h2>
    </div>
    @if($link)
        <a href="{{ $link }}" class="text-sm font-medium text-primary hover:text-primary-active">{{ $linkText }} &rarr;</a>
    @endif
</div>
