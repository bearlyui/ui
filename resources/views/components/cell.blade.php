@props([
    'hover' => false,
])

<td {{ $attributes->class([
    'px-4 py-3 text-gray-600 dark:text-gray-300',
    '[&>*]:opacity-0 group-hover/row:[&>*]:opacity-100 [&>*]:transition [&>*]:ease-in-out' => $hover,
]) }}>
    {{ $slot }}
</td>
