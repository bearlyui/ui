@use('Bearly\Ui\Size')
@props([
    'size' => Size::BASE,
    'tag' => 'p',
])
<{{ $tag }} {{ $attributes->class([
    'opacity-60',
    'text-xs [[data-ui-heading]+&]:mt-1' => Size::BASE->is($size),
    'text-sm [[data-ui-heading]+&]:mt-1.5' => Size::MD->is($size),
    'text-base font-light [[data-ui-heading]+&]:mt-2' => Size::LG->is($size),
    'text-lg font-light [[data-ui-heading]+&]:mt-2' => Size::XL->is($size),
])->merge(['data-ui-subheading' => ''])
 }}>{{ $slot }}</{{ $tag }}>
