@props([
    'user' => null,
])

@php
    $user = $user ?? auth()->user();
    $initials = $user ? collect(explode(' ', $user->name))->map(fn($word) => strtoupper(substr($word, 0, 1)))->take(2)->join('') : '?';
@endphp

<div
    x-data="{ open: false }"
    @click.outside="open = false"
    class="relative"
>
    <button
        @click="open = !open"
        type="button"
        class="w-full flex items-center gap-3 px-3 py-3 rounded-lg hover:bg-neutral-100 dark:hover:bg-neutral-900 transition-colors"
    >
        <div class="w-9 h-9 rounded-full bg-primary flex items-center justify-center text-white text-sm font-medium shrink-0">
            {{ $initials }}
        </div>
        <div class="flex-1 text-left min-w-0">
            <p class="text-sm font-medium text-neutral-900 dark:text-white truncate">{{ $user?->name ?? 'Guest' }}</p>
            <p class="text-xs text-neutral-500 dark:text-neutral-400 truncate">{{ $user?->email ?? '' }}</p>
        </div>
        <svg
            class="w-4 h-4 text-neutral-400 shrink-0 transition-transform duration-200"
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
        x-transition:enter="transition ease-out duration-100"
        x-transition:enter-start="opacity-0 scale-95"
        x-transition:enter-end="opacity-100 scale-100"
        x-transition:leave="transition ease-in duration-75"
        x-transition:leave-start="opacity-100 scale-100"
        x-transition:leave-end="opacity-0 scale-95"
        class="absolute bottom-full left-0 right-0 mb-2 bg-white dark:bg-neutral-900 rounded-lg shadow-lg border border-neutral-200 dark:border-neutral-800 py-1 z-50"
    >
        {{ $slot }}

        @if($slot->isEmpty())
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button
                    type="submit"
                    class="w-full flex items-center gap-3 px-4 py-2.5 text-sm text-neutral-700 dark:text-neutral-300 hover:bg-neutral-100 dark:hover:bg-neutral-800 transition-colors"
                >
                    <svg class="w-5 h-5 text-neutral-500 dark:text-neutral-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                    </svg>
                    Sair
                </button>
            </form>
        @endif
    </div>
</div>
