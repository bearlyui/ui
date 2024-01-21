@php
    $hasError = $attributes->get('for') ? $errors?->has($attributes->get('for')) : false;
@endphp

<label {{ $attributes->class([
    'flex w-fit items-center font-medium text-sm',
    'text-gray-700 dark:text-gray-300' => !$hasError,
    'text-red-600 dark:text-red-400' => $hasError,

    {{-- Bake in margin for nested radio or checkbox inputs (prob a bad idea) --}}
    "[&_input]:mr-1.5",
]) }}>
    {{ $slot }}
</label>
