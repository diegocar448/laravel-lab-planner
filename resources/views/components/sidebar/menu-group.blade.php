@props([
    'label',
    'icon' => null,
    'active' => false,
])

@php
    $hasActiveChild = $active;
@endphp

<div
    x-data="{ open: {{ $hasActiveChild ? 'true' : 'false' }} }"
    class="space-y-1"
>
    <button
        @click="open = !open"
        type="button"
        class="w-full flex items-center justify-between px-3 py-2.5 rounded-lg text-neutral-600 dark:text-neutral-400 hover:bg-neutral-100 dark:hover:bg-neutral-900 hover:text-neutral-900 dark:hover:text-white transition-colors"
        :class="{ 'bg-neutral-100 dark:bg-neutral-900 text-neutral-900 dark:text-white': open }"
    >
        <span class="flex items-center gap-3">
            @if($icon)
                <span class="w-5 h-5 flex items-center justify-center shrink-0">
                    {{ $icon }}
                </span>
            @endif
            <span class="truncate">{{ $label }}</span>
        </span>
        <svg
            class="w-4 h-4 shrink-0 transition-transform duration-200"
            :class="{ 'rotate-180': open }"
            fill="none"
            viewBox="0 0 24 24"
            stroke="currentColor"
            stroke-width="2"
        >
            <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" />
        </svg>
    </button>

    <div
        x-show="open"
        x-collapse
        class="pl-8 space-y-1"
    >
        {{ $slot }}
    </div>
</div>
