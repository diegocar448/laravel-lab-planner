@props([
    'for' => null,
    'required' => false,
])

<label
    @if($for) for="{{ $for }}" @endif
    {{ $attributes->merge(['class' => 'block text-sm font-medium text-neutral-700 dark:text-neutral-300']) }}
>
    {{ $slot }}
    @if($required)
        <span class="text-primary ml-0.5">*</span>
    @endif
</label>
