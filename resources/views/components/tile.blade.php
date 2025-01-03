@use('Bearly\Ui\Size')
@use('Bearly\Ui\Variant')

@aware([
    'variant' => Variant::Solid
])

<div {{ $attributes->class([
    'flex-1 flex flex-wrap items-baseline justify-between',
    'gap-y-2 px-2 py-6 sm:px-6 xl:px-8',
    'bg-white dark:bg-gray-900/50' => Variant::Solid->is($variant),
    'bg-transparent rounded ring-1 ring-inset ring-gray-900/10 dark:ring-white/5' => Variant::Outline->is($variant),
    'bg-transparent' => Variant::Ghost->is($variant),
]) }}>
    @if (!empty($label))
        <ui:subheading tag="dt" :attributes="$label->attributes->class([
            'text-sm font-medium leading-6 text-gray-500 dark:text-gray-400',
        ])">
            {{ $label }}
        </ui:subheading>
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
