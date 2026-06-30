@props(['label', 'value', 'icon' => null])

<div {{ $attributes->merge(['class' => 'rounded-card border border-hairline bg-white p-5']) }}>
  <p class="text-sm text-muted">{{ $label }}</p>
  <p class="mt-1 font-display text-3xl text-ink">{{ $value }}</p>
</div>
