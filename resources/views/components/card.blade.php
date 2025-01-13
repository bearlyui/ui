@use('Bearly\Ui\Color')
@use('Bearly\Ui\Size')
@use('Bearly\Ui\Variant')
@props([
    'padding' => Size::BASE,
])

<div {{ $attributes->class([
    'text-sm bg-white shadow rounded ring-1 ring-gray-900/5 text-gray-600',
    'dark:bg-gray-800 dark:shadow-md dark:ring-gray-50/15 dark:text-gray-400',
    '[&>[data-ui-card]]:bg-gray-50/60 [&>[data-ui-card]]:dark:bg-gray-700/30',
    'p-3' => Size::SM->is($padding),
    'p-4' => Size::BASE->is($padding),
    'p-5' => Size::MD->is($padding),
    'p-6' => Size::LG->is($padding),

    {{-- Inset Tables --}}
    '[&_[data-ui-table-inset]]:-m-3 [&_[data-ui-table-inset]]:ring-transparent' => Size::SM->is($padding),
    '[&_[data-ui-table-inset]]:-m-4 [&_[data-ui-table-inset]]:ring-transparent' => Size::BASE->is($padding),
    '[&_[data-ui-table-inset]]:-m-5 [&_[data-ui-table-inset]]:ring-transparent' => Size::MD->is($padding),
    '[&_[data-ui-table-inset]]:-m-6 [&_[data-ui-table-inset]]:ring-transparent' => Size::LG->is($padding),

])->merge(['data-ui-card' => '']) }}>

    {{-- Header --}}
    @if ($header ?? false)
        <div {{ $header->attributes->class([
            'rounded-t border-b bg-gray-100/60 dark:bg-black/5 border-gray-900/5 dark:border-gray-50/10',
            'px-5 py-2' => Size::NONE->is($padding),
            '-mx-3 -mt-3 mb-3 px-3 py-2' => Size::SM->is($padding),
            '-mx-4 -mt-4 mb-4 px-4 py-2' => Size::BASE->is($padding),
            '-mx-5 -mt-5 mb-5 px-5 py-3' => Size::MD->is($padding),
            '-mx-6 -mt-6 mb-6 px-6 py-3.5' => Size::LG->is($padding),
        ]) }}>
            {{ $header }}
        </div>
    @endif

    {{-- Main Content --}}
    {{ $slot }}

    {{-- Footer --}}
    @if ($footer ?? false)
        <div {{ $footer->attributes->class([
            'border-t bg-gray-100/60 dark:bg-black/5 rounded-b border-gray-900/5 dark:border-gray-50/10',
            'px-5 py-2' => Size::NONE->is($padding),
            '-mx-3 -mb-3 mt-3 px-3 py-2' => Size::SM->is($padding),
            '-mx-4 -mb-4 mt-4 px-4 py-2' => Size::BASE->is($padding),
            '-mx-5 -mb-5 mt-5 px-5 py-3' => Size::MD->is($padding),
            '-mx-6 -mb-6 mt-6 px-6 py-3.5' => Size::LG->is($padding),
        ]) }}>
            {{ $footer }}
        </div>
    @endif
</div>
