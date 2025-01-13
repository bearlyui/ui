@use('Bearly\Ui\Size')

<th {{ $attributes->class([
    'font-semibold px-4 py-2 text-left',
    'text-gray-500 dark:text-gray-400 bg-gray-50/50 dark:bg-gray-700/40',
    'border-b border-gray-200 dark:border-gray-700',

    {{-- This is needed to fake borders when the table headers are sticky --}}
    'after:content-[""]',
]) }}>
    {{ $slot }}
</th>
