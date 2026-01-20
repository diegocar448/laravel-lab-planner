@props([
    'variant' => 'info',
    'dismissible' => false,
    'icon' => true,
    'bordered' => false,
])

@php
    $baseClasses = 'rounded-lg p-4 transition-all duration-200';

    $variantConfig = [
        'success' => [
            'bg' => 'bg-green-50 dark:bg-green-950',
            'text' => 'text-green-900 dark:text-green-100',
            'border' => 'border-green-200 dark:border-green-800',
            'icon' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />',
            'iconColor' => 'text-green-500 dark:text-green-400',
        ],
        'error' => [
            'bg' => 'bg-red-50 dark:bg-red-950',
            'text' => 'text-red-900 dark:text-red-100',
            'border' => 'border-red-200 dark:border-red-800',
            'icon' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" />',
            'iconColor' => 'text-red-500 dark:text-red-400',
        ],
        'warning' => [
            'bg' => 'bg-yellow-50 dark:bg-yellow-950',
            'text' => 'text-yellow-900 dark:text-yellow-100',
            'border' => 'border-yellow-200 dark:border-yellow-800',
            'icon' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />',
            'iconColor' => 'text-yellow-500 dark:text-yellow-400',
        ],
        'info' => [
            'bg' => 'bg-blue-50 dark:bg-blue-950',
            'text' => 'text-blue-900 dark:text-blue-100',
            'border' => 'border-blue-200 dark:border-blue-800',
            'icon' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />',
            'iconColor' => 'text-blue-500 dark:text-blue-400',
        ],
        'default' => [
            'bg' => 'bg-neutral-50 dark:bg-neutral-900',
            'text' => 'text-neutral-900 dark:text-neutral-100',
            'border' => 'border-neutral-200 dark:border-neutral-700',
            'icon' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />',
            'iconColor' => 'text-neutral-500 dark:text-neutral-400',
        ],
    ];

    $config = $variantConfig[$variant] ?? $variantConfig['default'];

    $bgClasses = $config['bg'];
    $textClasses = $config['text'];
    $borderClasses = $bordered ? 'border ' . $config['border'] : '';

    $classes = trim("$baseClasses $bgClasses $textClasses $borderClasses");
@endphp

<div {{ $attributes->merge(['class' => $classes]) }} role="alert" x-data="{ show: true }" x-show="show" x-transition>
    <div class="flex items-center gap-3">
        @if ($icon)
            <div class="flex-shrink-0">
                <svg class="w-5 h-5 {{ $config['iconColor'] }}" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    {!! $config['icon'] !!}
                </svg>
            </div>
        @endif

        <div class="flex-1 min-w-0">
            @if (isset($title))
                <div class="font-semibold mb-1">
                    {{ $title }}
                </div>
            @endif

            <div class="{{ isset($title) ? 'text-sm' : '' }}">
                {{ $slot }}
            </div>

            @if (isset($actions))
                <div class="mt-3 flex gap-2">
                    {{ $actions }}
                </div>
            @endif
        </div>

        @if ($dismissible)
            <button
                type="button"
                @click="show = false"
                class="flex-shrink-0 inline-flex rounded-lg p-1.5 {{ $config['iconColor'] }} hover:bg-black/5 dark:hover:bg-white/5 transition-colors focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-{{ $variant === 'default' ? 'neutral' : ($variant === 'error' ? 'red' : $variant) }}-500"
                aria-label="Fechar"
            >
                <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
        @endif
    </div>
</div>
