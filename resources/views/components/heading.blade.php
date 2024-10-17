@use('Bearly\Ui\Size')

@props([
    'tag' => 'h2',
    'size' => Size::BASE,
])

<{{ $tag }} {{ $attributes->class([
    'ui-heading', // Needed for the description component to add margin top
    'text-gray-700 dark:text-gray-300',
    'text-lg tracking-[-0.01em] font-medium' => Size::BASE->is($size),
    'text-xl tracking-tight font-medium' => Size::MD->is($size),
    'text-2xl tracking-tight font-semibold' => Size::LG->is($size),
    'text-2xl tracking-tighter font-extrabold' => Size::XL->is($size),
]) }}>{{ $slot }}</{{ $tag }}>