@props([
    'focusOnHover' => true,
    'spacing' => 'space-x-2',
])
<{{ $attributes->get('href') ? 'a' : 'button' }}
    {{ $attributes->merge([
        'role' => 'menuitem',
        ':id' => '$id("dropdown-menu-item")',
        '@focus' => 'activeItem = $el',
        '@keydown.escape.stop.prevent' => 'closeDropdown',
        '@keydown.home.stop.prevent' => '$focus.within($el.parentNode.closest("[role=menu]")).wrap().first()',
        '@keydown.end.stop.prevent' => '$focus.within($el.parentNode.closest("[role=menu]")).wrap().last()',
        '@keydown.page-up.stop.prevent' => '$focus.within($el.parentNode.closest("[role=menu]")).wrap().first()',
        '@keydown.page-down.stop.prevent' => '$focus.within($el.parentNode.closest("[role=menu]")).wrap().last()',
        '@keydown.arrow-left.stop.prevent' => '$focus.within($el.parentNode.closest("[role=menu]")).wrap().previous()',
        '@keydown.arrow-up.stop.prevent' => '$focus.within($el.parentNode.closest("[role=menu]")).wrap().previous()',
        '@keydown.arrow-right.stop.prevent' => '$focus.within($el.parentNode.closest("[role=menu]")).wrap().next()',
        '@keydown.arrow-down.stop.prevent' => '$focus.within($el.parentNode.closest("[role=menu]")).wrap().next()',
        '@keydown.space.stop.prevent' => '$el.click()',
        '@keydown.enter.stop.prevent' => '$el.click()',
    ])->class([
        'group px-2.5 py-1.5',
        'w-full min-w-[200px] flex items-center justify-between',
        'text-sm font-normal rounded text-left',
        'transition-all ease-in-out',
        'outline-none focus:outline-none focus:bg-black/5 focus:dark:bg-white/5',
        'text-gray-600/90 dark:text-gray-300',
    ])->when(!$attributes->get('href'), fn ($a) => $a->merge([
        'type' => $attributes->get('type', 'button'),
    ]))->when($focusOnHover,
        fn ($a) => $a->merge([
            'x-on:mouseenter.prevent' => 'activeItem = $el && $focus.focus($el)',
            'x-on:mousemove.prevent' => 'if (activeItem != $el) { activeItem = $el && $focus.focus($el) }',
            'x-bind:class' => '{ "hover:bg-black/5 hover:text-gray-800 hover:bg-black/5 dark:hover:text-gray-200 dark:hover:bg-white/5": activeItem == $el }',
        ]),
        fn ($a) => $a-merge([
            'x-bind:class' => '{ "hover:bg-black/5 hover:text-gray-800 hover:bg-black/5 dark:hover:text-gray-200 dark:hover:bg-white/5": true }',
        ])
    ) }}
>
    <span @class([
        'flex items-center antialiased',
        $spacing => !empty($spacing),
    ])>
        {{-- Before --}}
        @if ($before ?? false)
            <span {{ $before->attributes }}>{{ $before }}</span>
        @endif

        {{-- Content --}}
        <span>{{ $slot }}</span>

        {{-- After --}}
        @if ($after ?? false)
            <span {{ $after->attributes }}>{{ $after }}</span>
        @endif
    </span>
</{{ $attributes->get('href') ? 'a' : 'button' }}>
