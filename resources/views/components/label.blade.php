@php
    $hasError = $attributes->get('for') ? $errors?->has($attributes->get('for')) : false;
@endphp
@props(['inline' => false])
<label {{ $attributes->class([
    $inline == true ? 'inline-flex items-center' : 'block',
    'items-center font-medium text-sm',
    'text-gray-700 dark:text-gray-300' => !$hasError,
    'text-red-600 dark:text-red-400' => $hasError,
]) }}>
    {{ $slot }}
</label>
