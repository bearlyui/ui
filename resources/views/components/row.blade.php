@use('Bearly\Ui\Size')

@props([
    'muted' => false,
])

<tr {{ $attributes->class([
    'group/row',
    'last:border-b-0',
    'border-b border-gray-300/70 dark:border-gray-700/70',
    '*:opacity-65' => $muted,
]) }}>
    {{ $slot }}
</tr>
