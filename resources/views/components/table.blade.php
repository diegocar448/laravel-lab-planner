@props([
    'striped' => false,
    'hoverable' => true,
    'bordered' => false,
    'compact' => false,
])

@php
    $baseClasses = 'min-w-full divide-y divide-neutral-200 dark:divide-neutral-700';

    $classes = trim($baseClasses);
@endphp

<div class="overflow-x-auto">
    <table {{ $attributes->merge(['class' => $classes]) }}>
        {{ $slot }}
    </table>
</div>
