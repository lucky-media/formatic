@props([
    'form_size' => 'medium',
    'sizes' => [
      'compact' => 'w-full max-w-lg mx-auto px-5 sm:px-0',
      'medium' => 'w-full max-w-3xl mx-auto px-5 sm:px-0',
      'container' => 'container',
    ],
])

<div {{ $attributes->twMerge(['class' => $sizes[$form_size] . ' py-5']) }}>
    {{ $slot }}
</div>
