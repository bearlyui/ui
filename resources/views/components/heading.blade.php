@use('Bearly\Ui\Size')

@props([
    'tag' => 'h2',
    'size' => Size::BASE,
])

<{{ $tag }} data-ui-heading {{ $attributes->class([
    'ui-heading', // Needed for the description component to add margin top
    'text-gray-700 dark:text-gray-300',
    'text-lg tracking-[-0.015em] font-medium' => Size::BASE->is($size),
    'text-xl tracking-tight font-medium' => Size::MD->is($size),
    'text-xl tracking-tight font-bold' => Size::LG->is($size),
    'text-2xl tracking-tighter font-extrabold' => Size::XL->is($size),
]) }}>{{ $slot }}</{{ $tag }}>
