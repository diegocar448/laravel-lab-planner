@props([
    'sortable' => false,
    'sorted' => null,
    'align' => 'left',
])

@php
    $alignClasses = match($align) {
        'left' => 'text-left',
        'center' => 'text-center',
        'right' => 'text-right',
        default => 'text-left',
    };

    $baseClasses = "px-6 py-3 text-xs font-medium text-neutral-500 dark:text-neutral-400 uppercase tracking-wider $alignClasses";

    $sortableClasses = $sortable
        ? 'cursor-pointer select-none hover:text-neutral-700 dark:hover:text-neutral-200 transition-colors'
        : '';

    $classes = trim("$baseClasses $sortableClasses");
@endphp

<th scope="col" {{ $attributes->merge(['class' => $classes]) }}>
    <div class="flex items-center gap-2 {{ $align === 'center' ? 'justify-center' : ($align === 'right' ? 'justify-end' : 'justify-start') }}">
        <span>{{ $slot }}</span>

        @if ($sortable)
            <span class="flex flex-col">
                @if ($sorted === 'asc')
                    <svg class="w-3 h-3 text-primary" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M5.293 9.707a1 1 0 010-1.414l4-4a1 1 0 011.414 0l4 4a1 1 0 01-1.414 1.414L11 7.414V15a1 1 0 11-2 0V7.414L6.707 9.707a1 1 0 01-1.414 0z"/>
                    </svg>
                @elseif ($sorted === 'desc')
                    <svg class="w-3 h-3 text-primary" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M14.707 10.293a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 111.414-1.414L9 12.586V5a1 1 0 012 0v7.586l2.293-2.293a1 1 0 011.414 0z"/>
                    </svg>
                @else
                    <svg class="w-3 h-3 text-neutral-400" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M5 12a1 1 0 102 0V6.414l1.293 1.293a1 1 0 001.414-1.414l-3-3a1 1 0 00-1.414 0l-3 3a1 1 0 001.414 1.414L5 6.414V12zM15 8a1 1 0 10-2 0v5.586l-1.293-1.293a1 1 0 00-1.414 1.414l3 3a1 1 0 001.414 0l3-3a1 1 0 00-1.414-1.414L15 13.586V8z"/>
                    </svg>
                @endif
            </span>
        @endif
    </div>
</th>
