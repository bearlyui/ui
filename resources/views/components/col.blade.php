@use('Bearly\Ui\Size')

<th {{ $attributes->class([
    'font-semibold px-4 py-2 text-left text-gray-700 dark:text-gray-300',
    'bg-gray-100/75 dark:bg-gray-700/40',
    'border-b border-gray-200 dark:border-gray-700',
]) }}>
    {{ $slot }}
</th>
