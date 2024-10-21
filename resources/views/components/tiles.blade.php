@use('Bearly\Ui\Size')
@use('Bearly\Ui\Variant')

@props([
    'gap' => Size::BASE,
    'variant' => Variant::Outline,
])

<dl {{ $attributes->class([
    'mx-auto flex flex-col bg-gray-900/5 sm:flex-row',
    'bg-gray-900/5' => Variant::Solid->is($variant),
    'bg-transparent' => Variant::Outline->is($variant) || Variant::Ghost->is($variant),
    'gap-px' => Size::BASE->is($gap),
    'gap-0.5' => Size::MD->is($gap),
    'gap-1' => Size::LG->is($gap),
]) }}>
    {{ $slot }}
</dl>
