@use('Bearly\Ui\Color')
@use('Bearly\Ui\Variant')
@props([
    'title' => null,
    'button' => null,
    'icon' => null,
    'dismissable' => false,
    'color' => Color::Primary,
    'variant' => Variant::Outline,
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

            {{-- Primary --}}
            'text-primary-700 shadow-primary-400/20 border-primary-500/25 bg-primary-50/30' => Color::Primary->is($color),
            'dark:text-primary-400 dark:shadow-primary-300/20 dark:bg-primary-900/20' => Color::Primary->is($color),

            {{-- Secondary --}}
            'text-secondary-700 shadow-secondary-400/20 border-secondary-500/25 bg-secondary-50/30' => Color::Secondary->is($color),
            'dark:text-secondary-400 dark:shadow-secondary-400/15 dark:bg-secondary-700/40' => Color::Secondary->is($color),

            {{-- Success --}}
            'text-success-700 shadow-success-400/20 border-success-500/25 bg-success-50/10' => Color::Success->is($color),
            'dark:text-success-400 dark:shadow-success-400/15 dark:bg-success-900/20' => Color::Success->is($color),

            {{-- Warning --}}
            'text-warning-700 shadow-warning-400/20 border-warning-500/30 bg-warning-50/15' => Color::Warning->is($color),
            'dark:text-warning-400 dark:shadow-warning-400/15 dark:bg-warning-900/20' => Color::Warning->is($color),

            {{-- Error --}}
            'text-error-700 shadow-error-400/20 border-error-500/25 bg-error-50/30' => Color::Error->is($color),
            'dark:text-error-400 dark:shadow-error-400/15 dark:bg-error-900/20' => Color::Error->is($color),

            {{-- Outline Variant --}}
            'border' => Variant::Outline->is($variant),
            'dark:border-l-primary-300 dark:border-primary-300/60' => Color::Primary->is($color) && Variant::Outline->is($variant),
            'dark:border-l-secondary-300 dark:border-secondary-300/60' => Color::Secondary->is($color) && Variant::Outline->is($variant),
            'dark:border-l-success-300 dark:border-success-300/60' => Color::Success->is($color) && Variant::Outline->is($variant),
            'dark:border-l-warning-300 dark:border-warning-300/60' => Color::Warning->is($color) && Variant::Outline->is($variant),
            'dark:border-l-error-400 dark:border-error-400/60' => Color::Error->is($color) && Variant::Outline->is($variant),

            {{-- Solid Variant --}}
            'border border-l-[6px]' => Variant::Solid->is($variant),
            'dark:border-l-primary-300 dark:border-primary-300/60' => Color::Primary->is($color) && Variant::Solid->is($variant),
            'dark:border-l-secondary-300 dark:border-secondary-300/60' => Color::Secondary->is($color) && Variant::Solid->is($variant),
            'dark:border-l-success-300 dark:border-success-300/60' => Color::Success->is($color) && Variant::Solid->is($variant),
            'dark:border-l-warning-300 dark:border-warning-300/60' => Color::Warning->is($color) && Variant::Solid->is($variant),
            'dark:border-l-error-400 dark:border-error-400/60' => Color::Error->is($color) && Variant::Solid->is($variant),

            {{-- Glow Variant --}}
            'shadow-md border' => Variant::Glow->is($variant),
            'dark:border-primary-300/20' => Color::Primary->is($color) && Variant::Glow->is($variant),
            'dark:border-secondary-300/20' => Color::Secondary->is($color) && Variant::Glow->is($variant),
            'dark:border-success-300/20' => Color::Success->is($color) && Variant::Glow->is($variant),
            'dark:border-warning-300/20' => Color::Warning->is($color) && Variant::Glow->is($variant),
            'dark:border-error-300/20' => Color::Error->is($color) && Variant::Glow->is($variant),
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
</div>
