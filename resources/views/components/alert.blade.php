<div {{ $attributes->twMerge(['class' => 'relative bg-background text-foreground w-full rounded-lg border p-4 [&>svg~*]:pl-7 [&>svg+div]:translate-y-[-3px] [&>svg]:absolute [&>svg]:left-4 [&>svg]:top-4 [&>svg]:text-foreground']) }}>
    {{ $slot }}
</div>
