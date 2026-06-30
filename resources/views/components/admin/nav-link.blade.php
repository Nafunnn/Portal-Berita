@props(['active' => false])

@php
$classes = $active
    ? 'flex items-center rounded-md bg-surface-card px-3 py-2 text-sm font-medium text-ink'
    : 'flex items-center rounded-md px-3 py-2 text-sm font-medium text-muted transition hover:bg-surface-soft hover:text-ink';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
