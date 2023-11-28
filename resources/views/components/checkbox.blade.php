@php
    $idOrName = $attributes->get('id') ?? $attributes->get('name') ?? false;
    $hasError = $idOrName ? $errors?->has($idOrName) : false;
@endphp

@props([
    'checked' => false,
])
<input type="checkbox"
    @if (!$attributes->whereStartsWith('wire:model')->first())
        @checked(
            // If you have old input for stuff, but it's "checked" via the database
            // then we have to make sure it gets unchecked with old input properly
            old() && $checked && !array_key_exists($attributes->get('name'), old())
                ? false
                : old($attributes->get('name', '_'), $checked)
        )
    @endif
    {{ $attributes->class([
        'w-6 h-6 rounded-md border transition ease-in-out',
        'bg-black/5 border-black/10 hover:bg-black-7.5',
        'dark:bg-white/5 dark:border-white/10 dark:hover:bg-white/10',
        'text-primary-500 dark:text-primary-400',
        ...config('ui.focusClasses'),
        {{-- Error styles --}}
        'border-gray-300 focus:border-gray-300 dark:border-gray-600/60 dark:focus:border-gray-600/60' => !$hasError,
        'border-red-400 focus:border-red-400 dark:border-red-300 dark:focus:border-red-300' => $hasError,
    ])->merge(['value' => 'on']) }}
>
