@props([
    'size' => '1',
    'as' => 'h1',
    'variants' => [
        'size' => [
            1 => 'text-4xl font-extrabold lg:text-5xl',
            2 => 'text-3xl font-semibold',
            3 => 'text-2xl font-semibold',
            4 => 'text-xl font-semibold',
            5 => 'text-lg font-semibold',
            6 => 'text-base font-semibold',
        ],
    ]
])

<{{ $as }} {{ $attributes->twMerge(["class" => $variants['size'][$size] . ' tracking-light' ]) }}>
    {{ $slot }}
</{{ $as }}>
