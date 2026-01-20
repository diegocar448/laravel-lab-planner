@props([
    'align' => 'left',
])

@php
    $alignClasses = match($align) {
        'left' => 'text-left',
        'center' => 'text-center',
        'right' => 'text-right',
        default => 'text-left',
    };

    $classes = "px-6 py-4 whitespace-nowrap text-sm text-neutral-900 dark:text-white $alignClasses";
@endphp

<td {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</td>
