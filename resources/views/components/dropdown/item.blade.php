@props([
    'dismiss' => true,
    'spacing' => 'space-x-2',
])
<button
    type="button"
    role="menuitem"
    :id="$id('dropdown-menu-item')"
    x-on:focus="activeItem = $el"
    x-on:keyup.escape="closeDropdown"
    x-on:keyup.home="$focus.within($el.parentNode).wrap().first()"
    x-on:keyup.end="$focus.within($el.parentNode).wrap().last()"
    x-on:keyup.arrow-left="$focus.within($el.parentNode).wrap().previous()"
    x-on:keyup.arrow-up="$focus.within($el.parentNode).wrap().previous()"
    x-on:keyup.arrow-right="$focus.within($el.parentNode).wrap().next()"
    x-on:keyup.arrow-down="$focus.within($el.parentNode).wrap().next()"
    {{ $attributes->class([
        'group px-2.5 py-1.5',
        'w-full min-w-[200px] flex items-center justify-between',
        'text-sm font-normal rounded text-left',
        'transition-all ease-in-out',
        'outline-none focus:outline-none focus-visible:bg-black/2.5 focus-visible:dark:bg-white/2.5',
        'text-gray-600/90 hover:bg-black/5 hover:text-gray-800',
        'dark:text-gray-400 dark:hover:text-gray-200 dark:hover:bg-white/5',
    ])->when(
        $dismiss,
        fn ($a) => $a->merge([
            'x-on:click="closeDropdown"',
            'x-on:keyup.enter="closeDropdown"'
        ])
    )
    }}
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
</button>
