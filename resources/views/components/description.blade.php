@use('Bearly\Ui\Size')

@props([
    'size' => Size::BASE,
])

<p {{ $attributes->class([
    'opacity-60',
    'text-sm [.ui-heading+&]:mt-2' => Size::BASE->is($size),
    'text-base [.ui-heading+&]:mt-3' => Size::MD->is($size),
    'text-base font-light [.ui-heading+&]:mt-3' => Size::LG->is($size),
    'text-lg font-extralight [.ui-heading+&]:mt-3' => Size::XL->is($size),
]) }}>{{ $slot }}</p>
