@php
    $idOrName = $attributes->get('id') ?? $attributes->get('name') ?? false;
    $hasError = $idOrName ? $errors?->has($idOrName) : false;
    $value = $attributes->whereStartsWith('wire:model')->first()
        ? null
        : old($attributes->get('name', '_'), null);
@endphp
<textarea {{ $attributes->class([
    {{-- Base Styles --}}
    'rounded-md shadow-sm transition ease-out',
    {{-- Color styles --}}
    'bg-white text-gray-700',
    'dark:bg-gray-200/5 dark:hover:bg-white/5 dark:text-white/70',
    {{-- Focus styles --}}
    ...config('ui.focusClasses'),
    {{-- Error styles --}}
    'border-gray-300 focus:border-gray-300 dark:border-gray-600/60 dark:focus:border-gray-600/60' => !$hasError,
    'border-red-400 focus:border-red-400 dark:border-red-300 dark:focus:border-red-300' => $hasError,
]) }}>{{ $value }}</textarea>
