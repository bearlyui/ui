@use('Bearly\Ui\Size')

<tr {{ $attributes->class([
    'group/row',
    'last:border-b-0',
    'border-b border-gray-300/70 dark:border-gray-700/70',
]) }}>
    {{ $slot }}
</tr>
