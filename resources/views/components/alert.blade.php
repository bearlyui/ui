@use('Bearly\Ui\Color')
@use('Bearly\Ui\Variant')
@props([
    'title' => null,
    'button' => null,
    'icon' => null,
    'dismissable' => false,
    'color' => Color::Primary,
    'variant' => Variant::Glow
])

<div
    x-data="{
        open: true,
    }"
    x-show="open"
    x-transition:enter="transition ease-out duration-300"
    x-transition:enter-start="opacity-0 scale-75 translate-y-full"
    x-transition:enter-end="opacity-100 scale-[1.02] -translate-y-1"
    x-transition:leave="transition ease-in-out duration-300"
    x-transition:leave-start="opacity-100 scale-100 -translate-y-full"
    x-transition:leave-end="opacity-0 scale-75 translate-y-full"

    {{-- x-transition:enter="transition duration-250 ease-in translate-y-0"
    x-transition:enter-start="opacity-0 scale-0 translate-y-8"
    x-transition:enter-end="opacity-100 scale-105"
    x-transition:leave="transition duration-500 ease-out translate-y-0"
    x-transition:leave-start="opacity-100 scale-105 -translate-y-10"
    x-transition:leave-end="opacity-0 scale-0 translate-y-10" --}}
    {{ $attributes
        ->merge(['role' => 'status'])
        ->when(
            $title,
            fn ($a) => $a->merge(['x-id' => "['alert-title']"])
                ->merge([':aria-labelledby' => "\$id('alert-title')"])
        )
        ->class([
            'relative rounded transition ease-in-out',
            'bg-white dark:bg-gray-950/40',
            'px-4 py-2',
            'flex items-center justify-between' => $button,

            'shadow-t border' => Variant::Glow->is($variant),
            'border border-l-[6px]' => Variant::Outline->is($variant),


            {{-- Primary --}}
            'text-primary-600 shadow-primary-400/60 border-primary-500/40' => Color::Primary->is($color),
            'dark:text-primary-400 dark:shadow-primary-300/60' => Color::Primary->is($color),
            'dark:border-primary-300' => Color::Primary->is($color) && Variant::Glow->is($variant),
            'dark:border-l-primary-300 dark:border-primary-300/60' => Color::Primary->is($color) && Variant::Outline->is($variant),

            {{-- Secondary --}}
            'text-secondary-600 shadow-secondary-400/60 border-secondary-500/40' => Color::Secondary->is($color),
            'dark:text-secondary-400 dark:shadow-secondary-300/60 dark:border-secondary-300/40' => Color::Secondary->is($color),
            'dark:border-l-secondary-300 dark:border-secondary-300/60' => Color::Secondary->is($color) && Variant::Outline->is($variant),

            {{-- Success --}}
            'text-success-600 shadow-success-400/60 border-success-500/40' => Color::Success->is($color),
            'dark:text-success-400 dark:shadow-success-300/60 dark:border-success-300/40' => Color::Success->is($color),
            'dark:border-l-success-300 dark:border-success-300/60' => Color::Success->is($color) && Variant::Outline->is($variant),

            {{-- Warning --}}
            'text-warning-600 shadow-warning-400/60 border-warning-500/40' => Color::Warning->is($color),
            'dark:text-warning-400 dark:shadow-warning-300/60 dark:border-warning-300/40' => Color::Warning->is($color),
            'dark:border-l-warning-300 dark:border-warning-300/60' => Color::Warning->is($color) && Variant::Outline->is($variant),

            {{-- Error --}}
            'text-error-600 shadow-error-400/60 border-error-500/40' => Color::Error->is($color),
            'dark:text-error-400 dark:shadow-error-300/60 dark:border-error-300/40' => Color::Error->is($color),
            'dark:border-l-error-400 dark:border-error-300/60' => Color::Error->is($color) && Variant::Outline->is($variant),
        ])
    }}
>
    {{-- Title --}}
    <div>
        @if ($title)
            <h4 x-bind:id="$id('alert-title')" @class([
                'text-lg font-medium tracking-tight',
                'text-primary-700 dark:text-primary-200' => Color::Primary->is($color),
                'text-success-700 dark:text-success-200' => Color::Success->is($color),
                'text-warning-700 dark:text-warning-200' => Color::Warning->is($color),
                'text-error-700 dark:text-error-200' => Color::Error->is($color),
            ]) >{{ $title }}</h4>
        @endif
        <div @class(['mt-1.5' => $title])>{{ $slot }}</div>
    </div>

    {{-- Icon --}}
    @if ($icon)
        <div {{ $icon->attributes->class([
            'absolute top-0 right-0 mt-1 opacity-30 saturate-[.7]',
            'mr-2' => !$dismissable,
            'mr-7' => $dismissable,
        ]) }}>
            {{ $icon }}
        </div>
    @endif

    {{-- Close Button --}}
    @if ($dismissable && !$button)
        <div @class([
            'absolute top-0 right-0',
            'mt-2' => $title,
            'inset-y-0 flex items-center' => !$title,
        ])>
            <button
                type="button"
                x-ref="closeButton"
                aria-label="Close"
                @class([
                    'p-2.5 transition ease-in-out rounded',
                    'text-primary-500 hover:text-primary-800 dark:hover:text-primary-100' => Color::Primary->is($color),
                    'text-secondary-500 hover:text-secondary-800 dark:hover:text-secondary-100' => Color::Secondary->is($color),
                    'text-success-500 hover:text-success-800 dark:hover:text-success-100' => Color::Success->is($color),
                    'text-warning-500 hover:text-warning-800 dark:hover:text-warning-100' => Color::Warning->is($color),
                    'text-error-500 hover:text-error-800 dark:hover:text-error-100' => Color::Error->is($color),
                    ...config('ui.focusClasses')
                ])
                @keyup.enter="open = false"
                @keyup.space="open = false"
                @click.prevent="open = false"
            >
                <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" data-slot="icon">
                    <path d="M6.28 5.22a.75.75 0 0 0-1.06 1.06L8.94 10l-3.72 3.72a.75.75 0 1 0 1.06 1.06L10 11.06l3.72 3.72a.75.75 0 1 0 1.06-1.06L11.06 10l3.72-3.72a.75.75 0 0 0-1.06-1.06L10 8.94 6.28 5.22Z" />
                </svg>
            </button>
        </div>
    @endif

    {{-- Button Slot --}}
    {{ $button }}
</div>
