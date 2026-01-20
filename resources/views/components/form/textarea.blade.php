@props([
    'name' => null,
    'id' => null,
    'label' => null,
    'placeholder' => null,
    'hint' => null,
    'required' => false,
    'disabled' => false,
    'readonly' => false,
    'rows' => 4,
    'resize' => 'vertical',
    'bag' => 'default',
])

@php
    $id = $id ?? $name;
    $hasError = $name && $errors->{$bag}->has($name);

    $resizeClasses = [
        'none' => 'resize-none',
        'vertical' => 'resize-y',
        'horizontal' => 'resize-x',
        'both' => 'resize',
    ][$resize] ?? 'resize-y';

    $baseClasses = 'block w-full rounded-lg border bg-white dark:bg-neutral-900 text-neutral-900 dark:text-neutral-100 placeholder-neutral-400 dark:placeholder-neutral-500 transition-colors duration-200 focus:outline-none focus:ring-2 focus:ring-offset-0 px-4 py-2.5 text-sm';

    $stateClasses = match(true) {
        $disabled => 'border-neutral-200 dark:border-neutral-700 bg-neutral-50 dark:bg-neutral-800 cursor-not-allowed opacity-60',
        $hasError => 'border-red-500 dark:border-red-400 focus:border-red-500 focus:ring-red-500/20',
        default => 'border-neutral-300 dark:border-neutral-600 focus:border-primary focus:ring-primary/20 hover:border-neutral-400 dark:hover:border-neutral-500',
    };

    $textareaClasses = $baseClasses . ' ' . $stateClasses . ' ' . $resizeClasses;
@endphp

<div {{ $attributes->only('class')->merge(['class' => 'w-full']) }}>
    @if($label)
        <x-form.label :for="$id" :required="$required" class="mb-1.5">
            {{ $label }}
        </x-form.label>
    @endif

    <textarea
        @if($name) name="{{ $name }}" @endif
        @if($id) id="{{ $id }}" @endif
        @if($placeholder) placeholder="{{ $placeholder }}" @endif
        @if($disabled) disabled @endif
        @if($readonly) readonly @endif
        @if($required) required @endif
        rows="{{ $rows }}"
        {{ $attributes->except(['class'])->merge(['class' => $textareaClasses]) }}
    >{{ $slot }}</textarea>

    @if($hint && !$hasError)
        <x-form.hint>{{ $hint }}</x-form.hint>
    @endif

    @if($name)
        <x-form.error :name="$name" :bag="$bag" />
    @endif
</div>
