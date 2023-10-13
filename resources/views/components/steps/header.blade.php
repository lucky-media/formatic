@props([
    'value' => null,
    'title' => '',
    'description' => '',
])

<div class="inline-flex sm:items-center sm:justify-center">
    <span class="w-8 h-8 bg-primary rounded-full shrink-0 flex items-center justify-center text-xs border-2"
        :class="{
            'bg-primary border-primary text-white': currentStep > {{ $value }},
            'bg-background': currentStep < {{ $value }},
            'border-primary text-primary': currentStep === {{ $value }},
        }"
    >
        {{ $value }}
    </span>

    <div class="flex flex-col ml-4">
        <h5 :class="{
            'text-primary': currentStep === {{ $value }},
            'text-muted-foreground': currentStep < {{ $value }},
        }"
        class="text-lg font-semibold"
        >
            <template  x-if="currentStep > {{ $value }}">
                <span class="sr-only">Completed: </span>
            </template>
            {{ $title }}
        </h5>
        @if($description)
            <p class="text-sm text-muted-foreground">{{ $description }}</p>
        @endif
    </div>
</div>
