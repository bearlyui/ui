@props([
    'icon' => null,
    'iconAfter' => false,
    'iconVariant' => 'micro',
    'dismiss' => false,
    'focusOnHover' => true,
    'spacing' => 'space-x-2',
])
<{{ $attributes->get('href') ? 'a' : 'button' }}
    {{ $attributes->merge([
        'x-bind' => 'uiDropdownItem',
    ])->class([
        'group px-2.5 py-1.5',
        'w-full min-w-[200px] flex items-center justify-between',
        'text-sm font-normal rounded-sm text-left',
        'transition-all ease-in-out',
        'outline-hidden focus:outline-hidden focus:bg-black/5 dark:focus:bg-white/5',
        'text-gray-600/90 dark:text-gray-300',
    ])->when(!$attributes->get('href'), fn ($a) => $a->merge([
        'type' => $attributes->get('type', 'button'),
    ]))->when($focusOnHover,
        fn ($a) => $a->merge([
            'x-on:mouseenter.prevent' => 'activeItem = $el && $focus.focus($el)',
            'x-on:mousemove.prevent' => 'if (activeItem != $el) { activeItem = $el && $focus.focus($el) }',
            'x-bind:class' => '{ "hover:bg-black/5 hover:text-gray-800 hover:bg-black/5 dark:hover:text-gray-200 dark:hover:bg-white/5": activeItem == $el }',
        ]),
        fn ($a) => $a->merge([
            'x-bind:class' => '{ "hover:bg-black/5 hover:text-gray-800 hover:bg-black/5 dark:hover:text-gray-200 dark:hover:bg-white/5": true }',
        ])
    )->when($dismiss, fn ($a) => $a->merge([
        'x-on:click' => '$nextTick(() => { closeDropdown() })',
    ])) }}
>
    <span @class([
        'flex items-center antialiased w-full',
        $spacing => !empty($spacing),
    ])>
        {{-- Before --}}
        @if ($before ?? false)
            <span {{ $before->attributes }}>{{ $before }}</span>
        @endif
        @if ($icon)
            <x-dynamic-component :component="'ui::icon.' . $icon" :variant="$iconVariant" class="opacity-50" />
        @endif

        {{-- Content --}}
        <span class="grow">{{ $slot }}</span>

        {{-- After --}}
        @if ($iconAfter)
            <span class="justify-self-end">
                <x-dynamic-component :component="'ui::icon.' . $iconAfter" :variant="$iconVariant" class="opacity-50" />
            </span>
        @endif
        @if ($after ?? false)
            <span {{ $after->attributes }}>{{ $after }}</span>
        @endif
    </span>
</{{ $attributes->get('href') ? 'a' : 'button' }}>
