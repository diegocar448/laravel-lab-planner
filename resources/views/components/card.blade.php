@props([
    'variant' => 'default',
    'padding' => 'default',
    'shadow' => true,
    'border' => true,
    'hover' => false,
    'interactive' => false,
])

@php
    $baseClasses = 'rounded-lg transition-all duration-200';

    $variantClasses = match($variant) {
        'default' => 'bg-white dark:bg-neutral-900',
        'primary' => 'bg-primary-50 dark:bg-primary-950',
        'secondary' => 'bg-neutral-50 dark:bg-neutral-800',
        'transparent' => 'bg-transparent',
        default => 'bg-white dark:bg-neutral-900',
    };

    $paddingClasses = match($padding) {
        'none' => '',
        'sm' => 'p-3',
        'default' => 'p-4',
        'md' => 'p-5',
        'lg' => 'p-6',
        'xl' => 'p-8',
        default => 'p-4',
    };

    $shadowClasses = $shadow ? 'shadow-sm hover:shadow-md' : '';
    $borderClasses = $border ? 'border border-neutral-200 dark:border-neutral-700' : '';

    $hoverClasses = '';
    if ($hover) {
        $hoverClasses = 'hover:shadow-lg hover:-translate-y-0.5';
    }

    $interactiveClasses = '';
    if ($interactive) {
        $interactiveClasses = 'cursor-pointer hover:border-primary-500 dark:hover:border-primary-400';
    }

    $classes = trim("$baseClasses $variantClasses $paddingClasses $shadowClasses $borderClasses $hoverClasses $interactiveClasses");
@endphp

<div {{ $attributes->merge(['class' => $classes]) }}>
    @if (isset($header))
        <div class="mb-4">
            {{ $header }}
        </div>
    @endif

    <div>
        {{ $slot }}
    </div>

    @if (isset($footer))
        <div class="mt-4">
            {{ $footer }}
        </div>
    @endif
</div>
