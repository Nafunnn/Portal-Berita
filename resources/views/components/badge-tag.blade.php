@props(['tag'])

<a href="{{ route('tag.show', $tag) }}"
    {{ $attributes->merge(['class' => 'inline-flex rounded-full border border-hairline bg-canvas px-3 py-1 text-xs font-medium text-body transition hover:border-primary hover:text-primary']) }}>
    #{{ $tag->name }}
</a>
