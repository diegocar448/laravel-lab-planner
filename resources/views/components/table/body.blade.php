@props([
    'striped' => false,
    'hoverable' => true,
])

@php
    $classes = 'bg-white dark:bg-neutral-900 divide-y divide-neutral-200 dark:divide-neutral-700';
@endphp

<tbody {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</tbody>
