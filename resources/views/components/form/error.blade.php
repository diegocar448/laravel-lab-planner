@props([
    'name' => null,
    'bag' => 'default',
])

@if($name)
    @error($name, $bag)
        <p {{ $attributes->merge(['class' => 'text-sm text-red-600 dark:text-red-400 mt-1']) }}>
            {{ $message }}
        </p>
    @enderror
@else
    <p {{ $attributes->merge(['class' => 'text-sm text-red-600 dark:text-red-400 mt-1']) }}>
        {{ $slot }}
    </p>
@endif
