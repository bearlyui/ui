@php
    $idOrName = $attributes->get('id') ?? $attributes->get('name') ?? false;
    $hasError = $idOrName ? $errors?->has($idOrName) : false;
@endphp
@props([
    'options' => null,
    'selected' => old($attributes->get('name', '_'), null),
    'placeholder' => null,
])
<select
    {{ $attributes->class([
        {{-- Base Styles --}}
        'block rounded-md shadow-xs transition ease-out',
        {{-- Color styles --}}
        'bg-white text-gray-700',
        'dark:bg-gray-200/5 dark:hover:bg-white/5 dark:text-white/70',
        {{-- Focus styles --}}
        ...config('ui.focusClasses'),
        {{-- Error styles --}}
        'border-gray-300 focus:border-gray-300 dark:border-gray-600/60 dark:focus:border-gray-600/60' => !$hasError,
        'border-red-400 focus:border-red-400 dark:border-red-300 dark:focus:border-red-300' => $hasError,
    ]) }}
>
    @if ($placeholder)
        <option
            @disabled(true)
            @selected(empty($selected))
        >{{ $placeholder }}</option>
    @endif
    @if ($options)
        @foreach ($options as $key => $value)
            <option value="{{ $key }}" @selected($selected && $key == $selected)>{{ $value }}</option>
        @endforeach
    @else
        {{ $slot }}
    @endif
</select>
