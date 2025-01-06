@use('Bearly\Ui\Size')

@aware([
    'radius' => Size::BASE,
    'hover' => false
])

<tr {{ $attributes->class([
    'group/row',
    'last:border-b-0',
    'border-b border-gray-300/70 dark:border-gray-700/70',
    'hover:bg-gray-50 dark:hover:bg-gray-700' => $hover,
]) }}>
    {{ $slot }}
</tr>
