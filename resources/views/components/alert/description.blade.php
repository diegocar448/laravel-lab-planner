@props([])

<div {{ $attributes->merge(['class' => 'text-sm mt-1']) }}>
    {{ $slot }}
</div>
