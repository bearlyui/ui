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
    'px-3 py-1.5' => Size::SM->is($padding),
    'px-4 py-2' => Size::BASE->is($padding),
    'px-5 py-2.5' => Size::MD->is($padding),
    'px-6 py-3' => Size::LG->is($padding),
])->merge(['data-ui-card' => '']) }}>

    {{-- Header --}}
    @if ($header ?? false)
        <div {{ $header->attributes->class([
            'rounded-t border-b bg-gray-50 dark:bg-black/10 border-gray-900/5 dark:border-gray-50/10',
            'p-0' => Size::NONE->is($padding),
            '-mx-3 -mt-1.5 mb-1.5 px-3 py-1.5' => Size::SM->is($padding),
            '-mx-4 -mt-2 mb-2 px-4 py-2' => Size::BASE->is($padding),
            '-mx-5 -mt-2.5 mb-2.5 px-5 py-2.5' => Size::MD->is($padding),
            '-mx-6 -mt-3 mb-3 px-6 py-3' => Size::LG->is($padding),
        ]) }}>
            {{ $header }}
        </div>
    @endif

    {{-- Main Content --}}
    {{ $slot }}

    {{-- Footer --}}
    @if ($footer ?? false)
        <div {{ $footer->attributes->class([
            'border-t bg-gray-50/50 dark:bg-black/10 rounded-b border-gray-900/5 dark:border-gray-50/10',
            '-mx-3 -mb-1.5 mt-1.5 px-3 py-1.5' => Size::SM->is($padding),
            '-mx-4 -mb-2 mt-2 px-4 py-2' => Size::BASE->is($padding),
            '-mx-5 -mb-2.5 mt-2.5 px-5 py-2.5' => Size::MD->is($padding),
            '-mx-6 -mb-3 mt-3 px-6 py-3' => Size::LG->is($padding),
        ]) }}>
            {{ $footer }}
        </div>
    @endif
</div>
