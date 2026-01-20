@props([
    'padding' => 'default',
])

@php
    $paddingClasses = match($padding) {
        'none' => '',
        'sm' => 'p-3',
        'default' => 'p-4',
        'md' => 'p-5',
        'lg' => 'p-6',
        'xl' => 'p-8',
        default => 'p-4',
    };

    $classes = trim($paddingClasses);
@endphp

<div {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</div>
