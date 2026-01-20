@props([
    'size' => 'default',
    'padding' => 'default',
    'background' => 'transparent',
    'spacingY' => 'default',
    'bordered' => false,
    'centered' => true,
])

@php
    $baseClasses = 'rounded-lg';

    $sizeClasses = match($size) {
        'sm' => 'max-w-2xl',
        'default' => 'max-w-5xl',
        'md' => 'max-w-4xl',
        'lg' => 'max-w-6xl',
        'xl' => 'max-w-7xl',
        '2xl' => 'max-w-screen-2xl',
        'full' => 'max-w-full',
        default => 'max-w-5xl',
    };

    $paddingClasses = match($padding) {
        'none' => '',
        'sm' => 'px-4 sm:px-6',
        'default' => 'px-6 sm:px-8',
        'lg' => 'px-8 sm:px-12',
        'xl' => 'px-12 sm:px-16',
        default => 'px-6 sm:px-8',
    };

    $spacingYClasses = match($spacingY) {
        'none' => '',
        'sm' => 'py-4',
        'default' => 'py-8',
        'md' => 'py-10',
        'lg' => 'py-12',
        'xl' => 'py-16',
        '2xl' => 'py-20',
        default => 'py-8',
    };

    $backgroundClasses = match($background) {
        'transparent' => '',
        'white' => 'bg-white dark:bg-neutral-900',
        'gray' => 'bg-neutral-50 dark:bg-neutral-1000',
        'primary' => 'bg-primary-50 dark:bg-primary-950',
        default => '',
    };

    $centeredClasses = $centered ? 'mx-auto' : '';
    $borderClasses = $bordered ? 'border-t border-b border-neutral-200 dark:border-neutral-800' : '';

    $classes = trim("$baseClasses $sizeClasses $paddingClasses $spacingYClasses $backgroundClasses $centeredClasses $borderClasses");
@endphp

<section {{ $attributes->merge(['class' => $classes]) }}>
    @if (isset($header))
        <div class="mb-6">
            {{ $header }}
        </div>
    @endif

    <div>
        {{ $slot }}
    </div>

    @if (isset($footer))
        <div class="mt-6">
            {{ $footer }}
        </div>
    @endif
</section>
