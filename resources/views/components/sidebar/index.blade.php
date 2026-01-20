@props([
    'width' => 'w-64',
])

<aside {{ $attributes->merge(['class' => "$width h-screen bg-white dark:bg-neutral-1000 border-r border-neutral-200 dark:border-neutral-900 flex flex-col shrink-0 transition-colors"]) }}>
    {{-- Logo / Header --}}
    @if(isset($header))
        <div class="px-4 py-5 border-b border-neutral-100 dark:border-neutral-900">
            {{ $header }}
        </div>
    @endif

    {{-- Navigation --}}
    <nav class="flex-1 overflow-y-auto px-3 py-4">
        <div class="space-y-1">
            {{ $slot }}
        </div>
    </nav>

    {{-- User Menu --}}
    @if(isset($footer))
        <div class="border-t border-neutral-100 dark:border-neutral-900 px-3 py-3">
            {{ $footer }}
        </div>
    @else
        <div class="border-t border-neutral-100 dark:border-neutral-900 px-3 py-3">
            <x-sidebar.user-menu />
        </div>
    @endif
</aside>
