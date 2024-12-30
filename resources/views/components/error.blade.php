@props([
    'for' => null,
])

<span {{ $attributes->class([
    'text-sm font-medium',
    'text-danger-600 dark:text-danger-400',
]) }}>
    {{ $errors->first($for) }}
    I'm an error message
</span>
