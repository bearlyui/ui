@use('Bearly\Ui\Size')
@props([
    'mobileLabel' => 'Navigation',
    'size' => Size::SM,
])

<div {{ $attributes
    ->merge(['x-data' => 'uiMenu'])
    ->class([
        'transition-all ease-in-out',
        'md:max-w-40' => Size::XS->is($size),
        'md:max-w-54' => Size::SM->is($size),
        'md:max-w-64' => Size::MD->is($size),
        'md:max-w-72' => Size::LG->is($size),
    ])
}}>
    {{-- On mobile we show a select tag menu instead --}}
    <div class="block md:hidden">
        <label for="mobile-menu-select" class="sr-only">{{ $mobileLabel }}</label>
        <select
            data-ui-mobile-menu
            x-ref="mobileSelect"
            x-on:change="navigateToSelection"
            @class([
                'w-full rounded-md py-2 pl-3 pr-10 text-base',
                'bg-white border border-gray-300 dark:bg-gray-700 dark:border-gray-600',
                'focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 dark:text-gray-200'
            ])
        >
            @if ($mobileLabel)
                <option disabled>{{ $mobileLabel }}</option>
            @endif
        </select>
    </div>

    {{-- Desktop Sidebar Menu --}}
    <div class="hidden md:block">
        <nav class="space-y-1" aria-label="{{ $mobileLabel }}">
            {{ $slot }}
        </nav>
    </div>
</div>
