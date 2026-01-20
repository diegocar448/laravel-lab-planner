@props([
    'href' => '#',
    'icon' => null,
    'active' => false,
])

@php
    $isActive = $active || request()->url() === $href;
    $baseClasses = 'flex items-center gap-3 px-3 py-2.5 rounded-lg transition-colors';
    $activeClasses = 'bg-primary/10 text-primary dark:bg-primary/20 dark:text-primary-light font-medium';
    $inactiveClasses = 'text-neutral-600 dark:text-neutral-400 hover:bg-neutral-100 dark:hover:bg-neutral-900 hover:text-neutral-900 dark:hover:text-white';
    $classes = $baseClasses . ' ' . ($isActive ? $activeClasses : $inactiveClasses);
@endphp

<a href="{{ $href }}" {{ $attributes->merge(['class' => $classes]) }}>
    @if($icon)
        <span class="w-5 h-5 flex items-center justify-center shrink-0">
            {{ $icon }}
        </span>
    @endif
    <span class="truncate">{{ $slot }}</span>
</a>
