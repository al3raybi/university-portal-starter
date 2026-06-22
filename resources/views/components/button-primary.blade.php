@props([
    'href' => null,
    'type' => 'button',
])

@if ($href)
    <a href="{{ $href }}" {{ $attributes->class(['btn-primary']) }}>
        {{ $slot }}
    </a>
@else
    <button type="{{ $type }}" {{ $attributes->class(['btn-primary']) }}>
        {{ $slot }}
    </button>
@endif
