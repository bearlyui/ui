@use('Bearly\Ui\Size')

@props([
    'tag' => 'h2',
    'size' => Size::BASE,
])

<{{ $tag }} data-ui-heading {{ $attributes->class([
    'text-gray-700 dark:text-gray-300',
    'text-base font-medium' => Size::BASE->is($size),
    'text-lg font-medium' => Size::MD->is($size),
    'text-xl tracking-tight font-semibold' => Size::LG->is($size),
    'text-2xl tracking-tight font-bold' => Size::XL->is($size),
]) }}>{{ $slot }}</{{ $tag }}>
