<div @class([
    'flex-1 flex flex-wrap items-baseline justify-between gap-x-4 gap-y-2 bg-white px-4 py-10 sm:px-6 xl:px-8'
])>
    @if (!empty($label))
        <dt {{ $label->attributes->class(['text-sm font-medium leading-6 text-gray-500']) }}>
            {{ $label }}
        </dt>
    @endif

    @if (!empty($description))
        <dd {{ $description->attributes->class(['text-xs font-medium text-gray-700']) }}>
            {{ $description }}
        </dd>
    @endif

    <dd class="w-full flex-none text-3xl font-medium leading-10 tracking-tight text-gray-900">
        {{ $slot }}
    </dd>
</div>
