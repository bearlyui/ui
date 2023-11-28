@props([
    'title' => null,
    'shortcut' => null,
    'position' => 'top',
    'offset' => 4,
])
<template x-data="{ trigger: $el.parentNode }" x-teleport="body">
    <span
        x-cloak
        class="absolute w-max pointer-events-none z-50"
        x-anchor.{{ $position }}.offset.{{ $offset }}="trigger"
        x-data="{
            show: false,
            title: @js($title),
            openHandler: null,
            closeHandler: null,
            init() {
                this.openHandler = () => { this.show = true }
                this.closeHandler = () => { this.show = false }
                trigger.addEventListener('mouseenter', this.openHandler)
                trigger.addEventListener('mouseleave', this.closeHandler)
            },
            destroy() {
                trigger.removeEventListener('mouseenter', this.openHandler)
                trigger.removeEventListener('mouseleave', this.closeHandler)
            }
        }"
    >
        <span
            x-show="show"
            x-transition
            role="tooltip"
            @class([
                'block px-1.5 py-1 w-max transition-all ease-in-out pointer-events-none',
                'border text-xs rounded backdrop-blur-lg',
                'bg-gradient-to-b from-white/90 to-white/60 border-black/15a text-gray-700 shadow',
                'dark:from-white/10 dark:to-white/5 dark:border-white/10 dark:text-white/80 dark:shadow-lg dark:shadow-black/30',
            ])
        >
            @if ($title)
                <span x-text="title"></span>
            @else
                {{ $slot }}
            @endif

            @if ($shortcut ?? false)
                <span class="ml-1.5">
                    {{ $shortcut }}
                </span>
            @endif
        </span>
    </span>
</template>
