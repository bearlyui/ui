@php
    $idOrName = $attributes->get('id') ?? $attributes->get('name') ?? false;
    $hasError = $idOrName ? $errors?->has($idOrName) : false;
@endphp

@props([
    'checked' => false,
])

<input type="radio"
    @if (!$attributes->whereStartsWith('wire:model')->first())
        @checked(
            old($attributes->get('name', '_'))
                ? old($attributes->get('name', '_')) === $attributes->get('value')
                : $checked
        )
    @endif
    {{ $attributes->class([
        'w-6 h-6 rounded-full border transition ease-in-out',
        'bg-black/5 border-black/10 hover:bg-black-7.5',
        'dark:bg-white/5 dark:border-white/10 dark:hover:bg-white/10',
        'text-primary-500 dark:text-primary-400',
        ...config('ui.focusClasses'),
        {{-- Error styles --}}
        'border-gray-300 focus:border-gray-300 dark:border-gray-600/60 dark:focus:border-gray-600/60' => !$hasError,
        'border-red-400 focus:border-red-400 dark:border-red-300 dark:focus:border-red-300' => $hasError,
    ]) }}
>
