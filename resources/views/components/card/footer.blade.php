@props([
    'divided' => false,
    'padding' => 'default',
    'align' => 'left',
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
        ? 'border-t border-neutral-200 dark:border-neutral-700'
        : '';

    $alignClasses = match($align) {
        'left' => 'flex justify-start',
        'center' => 'flex justify-center',
        'right' => 'flex justify-end',
        'between' => 'flex justify-between',
        default => 'flex justify-start',
    };

    $classes = trim("$baseClasses $paddingClasses $dividedClasses $alignClasses gap-2");
@endphp

<div {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</div>
