@props(['gap' => Size::BASE])

<dl {{ $attributes->class([
    'mx-auto flex flex-col gap-px bg-gray-900/5 sm:flex-row',
    'gap-2' => Size::SM->is($gap),
    'gap-px' => Size::BASE->is($gap),
    'gap-4' => Size::LG->is($gap),
]) }}>
    {{ $slot }}
</dl>
