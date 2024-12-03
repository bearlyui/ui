@use('Bearly\Ui\Size')

@props([
    'tag' => 'h2',
    'size' => Size::BASE,
])

<{{ $tag }} data-ui-heading {{ $attributes->class([
    'text-gray-700 dark:text-gray-300 tracking-tight',
    'text-sm font-medium' => Size::BASE->is($size),
    'text-base font-medium' => Size::MD->is($size),
    'text-lg font-medium' => Size::LG->is($size),
    'text-xl font-medium' => Size::XL->is($size),
]) }}>{{ $slot }}</{{ $tag }}>
