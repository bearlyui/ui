@use('Bearly\Ui\Size')
@props(['gap' => Size::BASE])

<dl {{ $attributes->class([
    'mx-auto flex flex-col bg-gray-900/5 sm:flex-row',
    'gap-px' => Size::BASE->is($gap),
    'gap-0.5' => Size::MD->is($gap),
    'gap-1' => Size::LG->is($gap),
]) }}>
    {{ $slot }}
</dl>
