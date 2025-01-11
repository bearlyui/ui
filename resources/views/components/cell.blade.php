@props([
    'hover' => false,
])

<td {{ $attributes->class([
    'px-4 py-3 text-gray-600 dark:text-gray-300',
    'md:[&>*]:opacity-0 md:group-hover/row:[&>*]:opacity-100 md:[&>*]:transition md:[&>*]:ease-in-out' => $hover,
    'md:[&>*]:delay-200 md:group-hover/row:[&>*]:delay-75' => $hover,
]) }}>
    {{ $slot }}
</td>
