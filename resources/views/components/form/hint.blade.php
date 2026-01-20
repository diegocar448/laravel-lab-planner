@props([])

<p {{ $attributes->merge(['class' => 'text-sm text-neutral-500 dark:text-neutral-400 mt-1']) }}>
    {{ $slot }}
</p>
