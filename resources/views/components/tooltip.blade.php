@use('Bearly\Ui\Size')

@props([
    'title' => null,
    'shortcut' => null,
    'offset' => 4,
    'position' => 'top',
    'size' => Size::SM
])
<span x-data="{ trigger: {{ ($trigger ?? false) ? '$refs.trigger.firstElementChild' : '$el.parentNode' }} }">
    @if ($trigger ?? false)
        <span x-ref="trigger">
            {{ $trigger }}
        </span>
    @endif

    <template x-teleport="body">
        <span
            x-cloak
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
            class="absolute w-max pointer-events-none z-50"
        >

            <span
                x-show="show"
                x-transition
                role="tooltip"
                {{ $attributes->class([
                    'block w-max transition-all ease-in-out pointer-events-none',
                    'border rounded backdrop-blur-lg',
                    'bg-gradient-to-b from-white/80 to-white/50 border-black/15a text-gray-700 shadow',
                    'dark:from-white/10 dark:to-white/5 dark:border-white/10 dark:text-white/80 dark:shadow-lg dark:shadow-black/30',
                    'px-1.5 py-1 text-xs' => Size::SM->is($size),
                    'px-3 py-1.5 text-sm' => Size::BASE->is($size),
                    'px-4 py-2 text-base' => Size::MD->is($size),
                    'px-5 py-2.5 text-lg' => Size::LG->is($size),
                ]) }}
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
</span>
