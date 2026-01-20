@props([
    'name' => null,
    'id' => null,
    'label' => null,
    'placeholder' => null,
    'hint' => null,
    'required' => false,
    'disabled' => false,
    'size' => 'md',
    'options' => [],
    'bag' => 'default',
])

@php
    $id = $id ?? $name;
    $hasError = $name && $errors->{$bag}->has($name);

    $sizeClasses = [
        'sm' => 'px-3 py-1.5 text-sm',
        'md' => 'px-4 py-2.5 text-sm',
        'lg' => 'px-4 py-3 text-base',
    ][$size] ?? 'px-4 py-2.5 text-sm';

    $baseClasses = 'block w-full rounded-lg border bg-white dark:bg-neutral-900 text-neutral-900 dark:text-neutral-100 transition-colors duration-200 focus:outline-none focus:ring-2 focus:ring-offset-0 appearance-none cursor-pointer pr-10';

    $stateClasses = match(true) {
        $disabled => 'border-neutral-200 dark:border-neutral-700 bg-neutral-50 dark:bg-neutral-800 cursor-not-allowed opacity-60',
        $hasError => 'border-red-500 dark:border-red-400 focus:border-red-500 focus:ring-red-500/20',
        default => 'border-neutral-300 dark:border-neutral-600 focus:border-primary focus:ring-primary/20 hover:border-neutral-400 dark:hover:border-neutral-500',
    };

    $selectClasses = $baseClasses . ' ' . $sizeClasses . ' ' . $stateClasses;
@endphp

<div {{ $attributes->only('class')->merge(['class' => 'w-full']) }}>
    @if($label)
        <x-form.label :for="$id" :required="$required" class="mb-1.5">
            {{ $label }}
        </x-form.label>
    @endif

    <div class="relative">
        <select
            @if($name) name="{{ $name }}" @endif
            @if($id) id="{{ $id }}" @endif
            @if($disabled) disabled @endif
            @if($required) required @endif
            {{ $attributes->except(['class'])->merge(['class' => $selectClasses]) }}
        >
            @if($placeholder)
                <option value="" disabled selected>{{ $placeholder }}</option>
            @endif

            @if(is_array($options) && count($options) > 0)
                @foreach($options as $value => $optionLabel)
                    <option value="{{ $value }}">{{ $optionLabel }}</option>
                @endforeach
            @else
                {{ $slot }}
            @endif
        </select>

        {{-- Chevron Icon --}}
        <div class="absolute inset-y-0 right-0 flex items-center pr-3 pointer-events-none text-neutral-400 dark:text-neutral-500">
            <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" />
            </svg>
        </div>
    </div>

    @if($hint && !$hasError)
        <x-form.hint>{{ $hint }}</x-form.hint>
    @endif

    @if($name)
        <x-form.error :name="$name" :bag="$bag" />
    @endif
</div>
