@props([
    'title' => null,
    'description' => null,
])

<div {{ $attributes->merge(['class' => 'mb-8']) }}>
    @if ($title || isset($slot))
        <div>
            @if ($title)
                <h1 class="text-3xl font-bold text-neutral-900 dark:text-white mb-2">{{ $title }}</h1>
            @endif

            @if ($description)
                <p class="text-lg text-neutral-600 dark:text-neutral-400">{{ $description }}</p>
            @endif

            @if (isset($slot) && !$title && !$description)
                {{ $slot }}
            @endif
        </div>
    @endif
</div>
