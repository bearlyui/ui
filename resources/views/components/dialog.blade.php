@props([
    'size' => 'md',
    'hideCloseButton' => false,
    'cardClass' => null,
    'containerClass' => null,
])

<span
    x-data="uiDialog"
    x-modelable="open"
    {{ $attributes }}
>
    {{-- Trigger --}}
    <span {{ $trigger->attributes->merge(['x-on:click.stop' => 'openDialog']) }}>{{ $trigger }}</span>

    {{-- Dialog --}}
    <template x-teleport="body">
        <div
            x-bind="uiDialogAttributes"
            @class([
                'sm:px-5' => $size === 'full',
                'fixed flex items-end sm:items-center justify-center top-0 right-0 bottom-0 left-0',
                $containerClass,
            ])
        >
            {{-- Overlay --}}
            <div
                x-bind="uiDialogOverlay"
                class="fixed sm:p-4 md:px-0 top-0 bottom-0 left-0 right-0 w-full h-full bg-white/30 dark:bg-black/30 backdrop-blur"
            ></div>

            {{-- Content --}}
            <div
                x-bind="uiDialogContent"
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
                        class="sm:hidden bg-black/10 dark:bg-white/15 w-10 h-1 rounded-full absolute mx-auto left-0 right-0 top-1.5"
                        x-on:touchstart="dragging = true; start = current = $event.touches[0].clientY"
                        x-on:touchmove="current = $event.touches[0].clientY"
                        x-on:touchend="if (distance > 100) closeDialog(); dragging = false"
                        x-effect="$el.parentElement.style.transform = 'translateY('+distance+'px)'"
                    >&nbsp;</button>

                    {{-- Header --}}
                    @empty($header)
                        {{-- No header, add an absolutely positioned close button so it doesn't mess with layout of other stuff --}}
                        <div @class([
                            'absolute top-0 right-0 mr-1 mt-1',
                            'hidden' => $hideCloseButton,
                        ])>
                            <ui:button
                                color="secondary"
                                size="sm"
                                variant="ghost"
                                class="group"
                                x-bind="uiDialogClose"
                            >
                                <span class="sr-only">Close</span>
                                <ui:icon.x-mark class="opacity-75 group-hover:opacity-100" variant="mini" />
                            </ui:button>
                        </div>
                    @else
                        <x-slot:header>
                            <div {{ $header->attributes->class(['text-gray-800 dark:text-gray-200']) }} >
                                {{ $header }}

                                {{-- Close button --}}
                                <ui:button
                                    color="secondary"
                                    size="sm"
                                    variant="ghost"
                                    class="group"
                                    x-bind="uiDialogClose"
                                    @class([
                                        'absolute top-0 right-0 mr-1 mt-1',
                                        'hidden' => $hideCloseButton,
                                    ])
                                >
                                    <span class="sr-only">Close</span>
                                    <ui:icon.x-mark class="opacity-75 group-hover:opacity-100" variant="mini" />
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
