@props([
    'as' => 'label'
])

<{{ $as }} {{ $attributes->twMerge(["class" => 'text-sm font-medium leading-none peer-disabled:cursor-not-allowed peer-disabled:opacity-70']) }}>
    {{ $slot }}
</{{ $as }}>
