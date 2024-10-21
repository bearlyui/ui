<div @class([
    'flex-1 flex flex-wrap items-baseline justify-between gap-x-4 gap-y-2 bg-white px-4 py-10 sm:px-6 xl:px-8'
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
