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
    x-transition
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
            'border border-l-[6px]' => Variant::Bordered->is($variant),

            {{-- Primary Theme --}}
            'text-primary-600 shadow-primary-400/60 border-primary-500/40' => Color::Primary->is($color),
            'dark:text-primary-400 dark:shadow-primary-300/60' => Color::Primary->is($color),
            'dark:border-primary-300' => Color::Primary->is($color) && Variant::Glow->is($variant),
            'dark:border-l-primary-300 dark:border-primary-300/60' => Color::Primary->is($color) && Variant::Bordered->is($variant),

            {{-- Success Theme --}}
            'text-green-600 shadow-green-400/60 border-green-500/40' => Color::Success->is($color),
            'dark:text-green-400 dark:shadow-green-300/60 dark:border-green-300/40' => Color::Success->is($color),
            'dark:border-l-green-300 dark:border-green-300/60' => Color::Success->is($color) && Variant::Bordered->is($variant),

            {{-- Warning Theme --}}
            'text-amber-600 shadow-amber-400/60 border-amber-500/40' => Color::Warning->is($color),
            'dark:text-amber-400 dark:shadow-amber-300/60 dark:border-amber-300/40' => Color::Warning->is($color),
            'dark:border-l-amber-300 dark:border-amber-300/60' => Color::Warning->is($color) && Variant::Bordered->is($variant),

            {{-- Error Theme --}}
            'text-red-600 shadow-red-400/60 border-red-500/40' => Color::Error->is($color),
            'dark:text-red-400 dark:shadow-red-300/60 dark:border-red-300/40' => Color::Error->is($color),
            'dark:border-l-red-400 dark:border-red-300/60' => Color::Error->is($color) && Variant::Bordered->is($variant),
        ])
    }}
>
    {{-- Title --}}
    <div>
        @if ($title)
            <h4 x-bind:id="$id('alert-title')" @class([
                'text-lg font-medium tracking-tight',
                'text-primary-700 dark:text-primary-200' => Color::Primary->is($color),
                'text-green-700 dark:text-green-200' => Color::Success->is($color),
                'text-amber-700 dark:text-amber-200' => Color::Warning->is($color),
                'text-red-700 dark:text-red-200' => Color::Error->is($color),
            ]) >{{ $title }}</h4>
        @endif
        <div @class(['mt-1.5' => $title])>{{ $slot }}</div>
    </div>

    {{-- Icon --}}
    @if ($icon)
        <div {{ $icon->attributes->class([
            'absolute top-0 right-0 mt-2 opacity-30 saturate-[.7]',
            'dark:opacity-50',
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
                    'text-gray-400 hover:text-gray-800',
                    'dark:text-white/30 dark:hover:text-white/70',
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
