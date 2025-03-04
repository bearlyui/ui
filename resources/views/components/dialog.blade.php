@props([
    'size' => 'md',
    'cardClass' => null,
    'containerClass' => null,
    'hideCloseButton' => false,
])

<span
    {{ $attributes->merge([
        'x-data' => 'uiDialog',
        'x-modelable' => 'open',
        'x-id' => "['ui-dialog-content']",
    ]) }}
>
    {{-- Trigger --}}
    <span x-bind="uiDialogTrigger" {{ $trigger->attributes }}>{{ $trigger }}</span>

    {{-- Dialog --}}
    <template x-teleport="body">
        <div
            x-bind="uiDialogAttributes"
            @class([
                'sm:px-5' => $size == 'full',
                'fixed flex items-end sm:items-center justify-center top-0 right-0 bottom-0 left-0',
                $containerClass,
            ])
        >
            {{-- Overlay --}}
            <div
                x-bind="uiDialogOverlay"
                class="fixed sm:p-4 md:px-0 top-0 bottom-0 left-0 right-0 w-full h-full bg-white/30 dark:bg-black/30 backdrop-blur-sm"
            ></div>

            {{-- Content --}}
            <div
                x-bind="uiDialogContent"
                @class([
                    'flex-1 relative not-prose mx-auto max-w-full w-full max-h-[96vh] sm:rounded-sm',
                    'sm:max-w-xl' => $size == 'sm',
                    'sm:max-w-2xl' => $size == 'md',
                    'sm:max-w-4xl' => $size == 'lg',
                    'sm:max-w-6xl' => $size == 'xl',
                    'sm:max-w-full' => $size == 'full',
                ])
            >

                {{-- Card --}}
                <ui:card
                    class="relative w-full max-w-full max-h-[96vh] overflow-y-auto ring-1 ring-black/5 dark:ring-white/5 rounded-none sm:rounded-sm shadow-lg dark:shadow-2xl {{ $cardClass }}"
                >

                    {{-- Header --}}
                    @if (!empty($header))
                        <x-slot:header :attributes="$header->attributes->class(['text-gray-800 dark:text-gray-200'])">
                            {{ $header }}
                        </x-slot:header>
                    @endif

                    {{-- Main Slot --}}
                    <div>{{ $slot }}</div>

                    {{-- Footer --}}
                    @if ($footer ?? false)
                        <x-slot:footer :attributes="$footer->attributes">{{ $footer }}</x-slot:footer>
                    @endif

                    {{-- Mobile drag-to-close --}}
                    {{-- Expects to be IN card --}}
                    <button
                        type="button"
                        tabindex="-1"
                        aria-hidden="true"
                        x-bind="uiDialogMobileDragToClose"
                        @class([
                            'sm:hidden bg-black/10 dark:bg-white/15 w-10 h-1 rounded-full absolute mx-auto left-0 right-0',
                            'top-4' => empty($header),
                            'top-1' => !empty($header),
                        ])
                    >
                        <span class="block relative h-10 -mt-5 w-full"></span>
                    </button>

                </x-card>

                {{-- Close button, needs to be last element so that it isn't focused before other focusable elements --}}
                <div @class([
                    'absolute top-0 right-0 mr-1 mt-1',
                    'hidden' => $hideCloseButton,
                ])>
                    <ui:button
                        size="sm"
                        class="group"
                        variant="ghost"
                        color="secondary"
                        x-bind="uiDialogClose"
                    >
                        <span class="sr-only">Close</span>
                        <ui:icon.x-mark class="opacity-75 group-hover:opacity-100" variant="mini" />
                    </ui:button>
                </div>
            </div> {{-- uiDialogContent --}}
        </div> {{-- uiDialogAttributes --}}
    </template>
</span>
