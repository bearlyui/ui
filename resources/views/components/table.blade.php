@use('Bearly\Ui\Size')

@props([
    'hover' => false,
    'radius' => Size::BASE,
    'shadow' => Size::BASE,
])

<table {{ $attributes->class([
    'w-full ring-1 ring-gray-300/60 dark:ring-gray-700 bg-white dark:bg-gray-800',
    'text-sm',
    'rounded-none' => Size::NONE->is($radius),
    'rounded' => Size::BASE->is($radius),
    'rounded-lg' => Size::LG->is($radius),
    'rounded-xl' => Size::XL->is($radius),
    'shadow-sm' => Size::BASE->is($shadow),
    'shadow' => Size::LG->is($shadow),
    'shadow-md' => Size::XL->is($shadow),
]) }}>
    @if ($header)
        <thead {{ $header->attributes->class([
        ]) }}>
            <tr @class([
            ]) >{{ $header }}</tr>
        </thead>
    @endif

    <tbody>{{ $slot }}</tbody>
</table>
