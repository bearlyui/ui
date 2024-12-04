@props([
    'size' => 'md',
    'hideCloseButton' => false,
    'cardClass' => null,
    'containerClass' => null,
])

<span
    x-data="{
        open: false,
        removedAriaHidden: false,
        openDialog() {
            this.open = true

            if ($refs.dialog.hasAttribute('aria-hidden')) {
                $refs.dialog.removeAttribute('aria-hidden')
                this.removedAriaHidden = true
            }
        },
        closeDialog() {
            this.open = false
            this.removedAriaHidden && $refs.dialog.setAttribute('aria-hidden', 'true')
            this.$refs.close?.setAttribute('inert', 'true')
        },
        closeOnEscape() {
            $refs.dialog.getAttribute('aria-hidden') === null && this.closeDialog()
        }
    }"
    x-modelable="open"
    {{ $attributes }}
>
    {{-- Trigger --}}
    <span {{ $trigger->attributes->merge(['x-on:click.stop' => 'openDialog']) }}>{{ $trigger }}</span>

    {{-- Dialog --}}
    <template x-teleport="body">
        <div
            x-show="open"
            x-trap.inert.noscroll="open"
            x-on:keyup.escape.window="closeOnEscape"
            x-ref="dialog"
            @class([
                'sm:px-5' => $size === 'full',
                'fixed flex items-end sm:items-center justify-center top-0 right-0 bottom-0 left-0',
                $containerClass,
            ])
        >
            {{-- Overlay --}}
            <div
                class="fixed sm:p-4 md:px-0 top-0 bottom-0 left-0 right-0 w-full h-full bg-white/30 dark:bg-black/30 backdrop-blur"
                x-show="open"
                x-transition:enter.opacity.delay.0ms
                x-transition:leave.delay.0ms.duration.0ms
                @click.stop="closeDialog"
            ></div>

            {{-- Content --}}
            <div
                x-ref="content"
                x-show="open"
                x-transition:enter.delay.75ms
                x-transition:leave.duration.0ms
                x-on:transition:enter.end="$refs.close === document.activeElement && $refs.close.blur()"
                role="dialog"
                aria-modal="true"
                x-id="['dialog-title', 'dialog-description']"
                :aria-labelledby="$id('dialog-title')"
                :aria-describedby="$id('dialog-description')"
                @class([
                    'rounded flex-1 shadow-lg relative not-prose mx-auto max-w-full w-full max-h-[96vh] overflow-y-auto ring-1 ring-black/5 dark:ring-gray-700/60',
                    'sm:max-w-xl' => $size === 'sm',
                    'sm:max-w-2xl' => $size === 'md',
                    'sm:max-w-4xl' => $size === 'lg',
                    'sm:max-w-6xl' => $size === 'xl',
                    'sm:max-w-full' => $size === 'full',
                ])
            >
                {{-- Card --}}
                <ui:card
                    class="relative w-full border border-black/10 !mb-0 rounded-b-none sm:rounded-b {{ $cardClass }}"
                >
                    {{-- Mobile drag-to-close --}}
                    <button
                        x-data="{
                            start: null,
                            current: null,
                            dragging: false,
                            get distance() {
                                return this.dragging ? Math.max(0, this.current - this.start) : 0
                            },
                        }"
                        type="button"
                        class="sm:hidden bg-black/10 w-10 h-1 rounded-full absolute mx-auto left-0 right-0 top-1.5"
                        x-on:touchstart="dragging = true; start = current = $event.touches[0].clientY"
                        x-on:touchmove="current = $event.touches[0].clientY"
                        x-on:touchend="if (distance > 100) closeDialog(); dragging = false"
                        x-effect="$el.parentElement.style.transform = 'translateY('+distance+'px)'"
                    >&nbsp;</button>

                    {{-- Header --}}
                    @empty($header)
                        {{-- No header, add an absolutely positioned close button so it doesn't mess with layout of other stuff --}}
                        <div @class([
                            'absolute top-0 right-0 mr-1 mt-1 flex items-start justify-end w-full',
                            'hidden' => $hideCloseButton,
                        ])>
                            <ui:button
                                color="secondary"
                                size="sm"
                                variant="ghost"
                                inert
                                x-ref="close"
                                x-on:click="closeDialog"
                                x-effect="open && setTimeout(() => $el.removeAttribute('inert'), 100)"
                            >
                                <div class="text-2xl">&times;</div>
                            </ui:button>
                        </div>
                    @else
                        <x-slot:header>
                            <div {{ $header->attributes->class(['flex justify-between items-center gap-4 text-gray-800 dark:text-gray-200']) }} >
                                {{ $header }}

                                {{-- Close button --}}
                                <ui:button
                                    color="none"
                                    size="sm"
                                    inert
                                    x-ref="close"
                                    x-on:click="closeDialog"
                                    x-effect="open && setTimeout(() => $el.removeAttribute('inert'), 100)"
                                    @class([
                                        'hidden sm:block text-gray-700 dark:text-gray-300 opacity-50 hover:opacity-100 focus:opacity-100',
                                        'hidden sm:hidden' => $hideCloseButton,
                                    ])
                                >
                                    <span class="text-2xl">&times;</span>
                                </ui:button>
                            </div>
                        </x-slot:header>
                    @endempty

                    {{-- Main Slot --}}
                    <div>{{ $slot }}</div>

                    {{-- Footer --}}
                    @if ($footer ?? false)
                        <x-slot:footer>{{ $footer }}</x-slot:footer>
                    @endif
                </x-card>
            </div>
        </div>
    </template>
</span>
