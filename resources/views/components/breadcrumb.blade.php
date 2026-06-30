@props(['items' => []])

@if(count($items))
    <nav aria-label="Breadcrumb" class="mb-6 text-sm text-muted">
        <ol class="flex flex-wrap items-center gap-2">
            @foreach($items as $index => $item)
                <li class="flex items-center gap-2">
                    @if($index > 0)
                        <span>/</span>
                    @endif
                    @if(isset($item['url']) && $index < count($items) - 1)
                        <a href="{{ $item['url'] }}" class="hover:text-ink">{{ $item['label'] }}</a>
                    @else
                        <span class="text-ink">{{ $item['label'] }}</span>
                    @endif
                </li>
            @endforeach
        </ol>
    </nav>
@endif
