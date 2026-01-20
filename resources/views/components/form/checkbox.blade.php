@props([
    'name' => null,
    'id' => null,
    'label' => null,
    'description' => null,
    'checked' => false,
    'disabled' => false,
    'size' => 'md',
    'bag' => 'default',
])

@php
    $id = $id ?? $name;
    $hasError = $name && $errors->{$bag}->has($name);

    $sizeClasses = [
        'sm' => 'w-4 h-4',
        'md' => 'w-5 h-5',
        'lg' => 'w-6 h-6',
    ][$size] ?? 'w-5 h-5';

    $labelSizeClasses = [
        'sm' => 'text-sm',
        'md' => 'text-sm',
        'lg' => 'text-base',
    ][$size] ?? 'text-sm';

    $baseClasses = 'rounded border bg-white dark:bg-neutral-900 text-primary focus:ring-2 focus:ring-primary/20 focus:ring-offset-0 transition-colors duration-200 cursor-pointer';

    $stateClasses = match(true) {
        $disabled => 'border-neutral-200 dark:border-neutral-700 bg-neutral-50 dark:bg-neutral-800 cursor-not-allowed opacity-60',
        $hasError => 'border-red-500 dark:border-red-400',
        default => 'border-neutral-300 dark:border-neutral-600 hover:border-primary dark:hover:border-primary',
    };

    $checkboxClasses = $baseClasses . ' ' . $sizeClasses . ' ' . $stateClasses;
@endphp

<div {{ $attributes->only('class')->merge(['class' => 'relative flex items-start']) }}>
    <div class="flex items-center h-6">
        <input
            type="checkbox"
            @if($name) name="{{ $name }}" @endif
            @if($id) id="{{ $id }}" @endif
            @if($checked) checked @endif
            @if($disabled) disabled @endif
            {{ $attributes->except(['class'])->merge(['class' => $checkboxClasses]) }}
        />
    </div>

    @if($label || $description)
        <div class="ml-3">
            @if($label)
                <label
                    @if($id) for="{{ $id }}" @endif
                    @class([
                        'font-medium cursor-pointer',
                        $labelSizeClasses,
                        'text-neutral-900 dark:text-neutral-100' => !$disabled,
                        'text-neutral-500 dark:text-neutral-400 cursor-not-allowed' => $disabled,
                    ])
                >
                    {{ $label }}
                </label>
            @endif

            @if($description)
                <p @class([
                    'text-sm',
                    'text-neutral-500 dark:text-neutral-400' => !$disabled,
                    'text-neutral-400 dark:text-neutral-500' => $disabled,
                ])>
                    {{ $description }}
                </p>
            @endif
        </div>
    @endif

    @if($name && $hasError)
        <div class="absolute -bottom-5 left-8">
            <x-form.error :name="$name" :bag="$bag" />
        </div>
    @endif
</div>
