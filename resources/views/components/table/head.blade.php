@props([])

<thead {{ $attributes->merge(['class' => 'bg-neutral-50 dark:bg-neutral-800']) }}>
    {{ $slot }}
</thead>
