@props([
    'name' => ''
])

<button type="button" {{ $attributes->twMerge(['class' => 'inline-flex items-center justify-center whitespace-nowrap rounded-sm px-3 py-1.5 text-sm font-medium ring-offset-background transition-all focus-visible:outline-hidden focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50' ]) }}
 x-bind:class="{
    'bg-background text-foreground shadow-xs': $store.theme.mode === '{{ $name }}'
 }"
 @click="$store.theme.toggle('{{ $name }}')"
>
    {{ $slot }}
</button>
