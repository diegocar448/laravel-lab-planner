@props([
    'hoverable' => true,
    'striped' => false,
])

@php
    $baseClasses = '';

    $hoverClasses = $hoverable
        ? 'hover:bg-neutral-50 dark:hover:bg-neutral-800 transition-colors'
        : '';

    $classes = trim("$baseClasses $hoverClasses");
@endphp

<tr {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</tr>
