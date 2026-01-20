@props([
    'divided' => false,
    'padding' => 'default',
])

@php
    $baseClasses = '';

    $paddingClasses = match($padding) {
        'none' => '',
        'sm' => 'p-3',
        'default' => 'p-4',
        'md' => 'p-5',
        'lg' => 'p-6',
        'xl' => 'p-8',
        default => 'p-4',
    };

    $dividedClasses = $divided
        ? 'border-b border-neutral-200 dark:border-neutral-700'
        : '';

    $classes = trim("$baseClasses $paddingClasses $dividedClasses");
@endphp

<div {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</div>
