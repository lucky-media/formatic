@props([
    'variant' => 'default',
    'size' => 'default',
    'as' => 'button',
    'url' => null,
    'base' => [
        'text-sm font-medium',
        'inline-flex items-center justify-center rounded-md',
        'ring-offset-background transition-colors',
        'focus-visible:outline-none focus-visible:ring-2',
        'focus-visible:ring-ring focus-visible:ring-offset-2',
        'disabled:pointer-events-none disabled:opacity-50'
    ],
    'variants' => [
        'default' => 'bg-primary text-primary-foreground hover:bg-primary/90',
        'destructive' => 'bg-destructive text-destructive-foreground hover:bg-destructive/90',
        'outline' => 'border border-input bg-background hover:bg-accent hover:text-accent-foreground',
        'secondary' => 'bg-secondary text-secondary-foreground hover:bg-secondary/80',
        'ghost' => 'hover:bg-accent hover:text-accent-foreground'
    ],
    'sizes' => [
        'none' => '',
        'default' => 'h-10 px-4 py-2',
        'sm' => 'h-9 rounded-md px-3',
        'lg' => 'h-11 rounded-md px-8',
        'icon' => 'w-10 h-10',
    ]
])

@php
    $classes = implode(' ', $base) . ' ' . $variants[$variant] . ' ' . $sizes[$size];
@endphp

@if($url)
    <a href="{{ $url }}" {{ $attributes->twMerge(["class" => $classes]) }}>
        {{ $slot }}
    </a>
    @else
    <{{ $as }} {{ $attributes->twMerge(["class" => $classes]) }}>
        {{ $slot }}
    </{{ $as }}>
@endif
