@use('Bearly\Ui\Size')
@props([
    'size' => Size::BASE,
    'tag' => 'p',
])
<{{ $tag }} {{ $attributes->class([
    'opacity-60',
    'text-xs [[data-ui-heading]+&]:mt-1' => Size::SM->is($size),
    'text-sm [[data-ui-heading]+&]:mt-2' => Size::BASE->is($size),
    'text-base [[data-ui-heading]+&]:mt-3' => Size::MD->is($size),
    'text-base font-light [[data-ui-heading]+&]:mt-3' => Size::LG->is($size),
    'text-lg font-extralight [[data-ui-heading]+&]:mt-3' => Size::XL->is($size),
]) }}>{{ $slot }}</{{ $tag }}>
