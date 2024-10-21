@use('Bearly\Ui\Size')
@use('Bearly\Ui\Variant')

@aware([
    'variant' => Variant::Solid
])

<div @class([
    'flex-1 flex flex-wrap items-baseline justify-between',
    'gap-y-2 px-2 py-6 sm:px-6 xl:px-8',
    'bg-white dark:bg-gray-900/50' => Variant::Solid->is($variant),
    'bg-white border border-gray-900/10 dark:border-white/5' => Variant::Outline->is($variant),
    'bg-transparent' => Variant::Ghost->is($variant),
])>
    @if (!empty($label))
        <ui:description tag="dt" :attributes="$label->attributes->class([
            'text-sm font-medium leading-6 opacity-40',
        ])">
            {{ $label }}
        </ui:description>
    @endif

    @if (!empty($description))
        <dd {{ $description->attributes->class(['text-xs font-medium text-gray-700']) }}>
            {{ $description }}
        </dd>
    @endif

    <ui:heading tag="dd" size="lg" :attributes="$slot->attributes->class([
        'w-full flex-none leading-10',
    ])">
        {{ $slot }}
    </ui:heading>
</div>
