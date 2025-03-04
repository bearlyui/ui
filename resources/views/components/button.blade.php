@use('Bearly\Ui\Color')
@use('Bearly\Ui\Size')
@use('Bearly\Ui\Variant')
@props([
    'color' => Color::Secondary,
    'size' => Size::MD,
    'variant' => Variant::Solid,
    'radius' => Size::SM,
    'href' => null,
    'icon' => null,
    'iconAfter' => null,
    'iconVariant' => 'micro',
])



<button
    {{ $attributes
        ->when($href, fn ($attributes) => $attributes->merge(['onclick' => "window.location.href='$href'"]))
        ->merge([
            'type' => 'button',
        ])
        ->when(
            $attributes->has('type') == 'submit',
            fn ($a) => $a->merge(['wire:loading.attr' => 'data-ui-loading']),
        )
        ->class([
            'transition-all ease-in-out inline-flex items-center relative',

            {{-- Border Radius --}}
            'rounded-none' => Size::NONE->is($radius),
            'rounded-sm' => Size::SM->is($radius),
            'rounded-md' => Size::MD->is($radius),
            'rounded-lg' => Size::LG->is($radius),
            'rounded-xl' => Size::XL->is($radius),
            'rounded-full' => Size::FULL->is($radius),

            {{-- Focus states --}}
            ...config('ui.focusClasses'),
            'focus-visible:ring-primary-400/80 dark:focus-visible:ring-primary-300/80',

            {{-- Sizing --}}
            'px-1.5 py-1 text-xs' => Size::XS->is($size),
            'px-2 py-1.5 text-sm font-medium' => Size::SM->is($size),
            'px-4 py-2 text-sm font-medium' => Size::MD->is($size),
            'px-5 py-2 text-base font-medium' => Size::LG->is($size),
            'px-6 py-3 text-base font-medium' => Size::XL->is($size),

            {{-- Icons add slightly more padding to the opposite side if used on a single side --}}
            'pr-2.5' => $icon && empty($iconAfter) && Size::XS->is($size),
            'pr-3.5' => $icon && empty($iconAfter) && Size::SM->is($size),
            'pr-4 pl-3' => $icon && empty($iconAfter) && Size::MD->is($size),
            'pr-5 pl-4' => $icon && empty($iconAfter) && Size::LG->is($size),
            'pr-7 pl-5' => $icon && empty($iconAfter) && Size::XL->is($size),
            'pl-2.5' => $iconAfter && empty($icon) && Size::XS->is($size),
            'pl-3.5' => $iconAfter && empty($icon) && Size::SM->is($size),
            'pl-4 pr-3' => $iconAfter && empty($icon) && Size::MD->is($size),
            'pl-5 pr-4' => $iconAfter && empty($icon) && Size::LG->is($size),
            'pl-7 pr-5' => $iconAfter && empty($icon) && Size::XL->is($size),

            {{-- Base Variant Styles --}}
            'border shadow-xs hover:shadow-sm' => Variant::Outline->is($variant) || Variant::Solid->is($variant),
            '[text-shadow:0.5px_0.5px_0px_rgba(255,255,255,0.24)] dark:[text-shadow:0.5px_0.5px_0px_rgba(0,0,0,0.24)]' => Variant::Solid->is($variant) || Variant::Gradient->is($variant),

            {{-- Solid Variant --}}
            'bg-primary-700 text-white border-primary-600/60 hover:bg-primary-900 dark:text-primary-300 dark:hover:text-primary-200 dark:border-primary-500/30 dark:bg-primary-400/30 dark:hover:bg-primary-400/50' => Color::Primary->is($color) && Variant::Solid->is($variant),
            '[text-shadow:none] bg-secondary-50 border-secondary-300/60 text-secondary-600/90 hover:bg-white hover:border-secondary-300/80 hover:text-secondary-700 dark:bg-secondary-300/10 dark:border-secondary-600 dark:text-secondary-300 dark:hover:bg-primary-300/15 dark:hover:text-secondary-100 dark:hover:border-primary-300/30' => Color::Secondary->is($color) && Variant::Solid->is($variant),
            'bg-success-500/85 text-success-950/90 border-success-600/60 hover:bg-success-600 hover:text-white dark:text-success-500 dark:hover:text-success-200 dark:border-success-500/30 dark:bg-success-400/15 dark:hover:bg-success-400/40' => Color::Success->is($color) && Variant::Solid->is($variant),
            'bg-warning-400 text-warning-900 border-warning-600/60 hover:bg-warning-600 hover:text-white dark:text-warning-500 dark:hover:text-warning-200 dark:border-warning-500/30 dark:bg-warning-400/15 dark:hover:bg-warning-400/40' => Color::Warning->is($color) && Variant::Solid->is($variant),
            'bg-danger-500/80 text-danger-950/90 border-danger-600/60 hover:bg-danger-700 hover:text-white dark:text-danger-400 dark:hover:text-danger-200 dark:border-danger-500/30 dark:bg-danger-500/15 dark:hover:bg-danger-400/40' => Color::Danger->is($color) && Variant::Solid->is($variant),

            {{-- Ghost Variant --}}
            'hover:bg-gray-500/5 dark:hover:bg-gray-400/10' => Variant::Ghost->is($variant),
            'text-primary-700 dark:text-primary-400 dark:hover:text-primary-100' => Color::Primary->is($color) && Variant::Ghost->is($variant),
            'text-secondary-600/80 hover:text-secondary-700 dark:text-secondary-300 dark:hover:text-secondary-100' => Color::Secondary->is($color) && Variant::Ghost->is($variant),
            'text-success-700 dark:text-success-400 dark:hover:text-success-100' => Color::Success->is($color) && Variant::Ghost->is($variant),
            'text-warning-700 dark:text-warning-400 dark:hover:text-warning-100' => Color::Warning->is($color) && Variant::Ghost->is($variant),
            'text-danger-600 dark:text-danger-400 dark:hover:text-danger-100' => Color::Danger->is($color) && Variant::Ghost->is($variant),

            {{-- Disabled States --}}
            '[&[disabled]]:opacity-60 [&[disabled]]:saturate-[0.6] [&[disabled]]:cursor-not-allowed',

            {{-- Disabled Solid --}}
            '[&[disabled]]:hover:shadow-xs' => Variant::Solid->is($variant),
            '[&[disabled]]:hover:bg-primary-700 [&[disabled]]:hover:text-white dark:[&[disabled]]:hover:bg-primary-400/30 dark:[&[disabled]]:hover:text-primary-300' => Color::Primary->is($color) && Variant::Solid->is($variant),
            '[&[disabled]]:hover:bg-secondary-50 [&[disabled]]:hover:text-secondary-600/90 dark:[&[disabled]]:hover:bg-secondary-300/10 dark:[&[disabled]]:hover:text-secondary-300 [&[disabled]]:hover:border-secondary-300/60 dark:[&[disabled]]:hover:border-secondary-600' => Color::Secondary->is($color) && Variant::Solid->is($variant),
            '[&[disabled]]:hover:bg-success-500 [&[disabled]]:hover:text-success-950/90 dark:[&[disabled]]:hover:bg-success-400/15 dark:[&[disabled]]:hover:text-success-500' => Color::Success->is($color) && Variant::Solid->is($variant),
            '[&[disabled]]:hover:bg-warning-400 [&[disabled]]:hover:text-warning-900 dark:[&[disabled]]:hover:bg-warning-400/15 dark:[&[disabled]]:hover:text-warning-500' => Color::Warning->is($color) && Variant::Solid->is($variant),
            '[&[disabled]]:hover:bg-danger-500/80 [&[disabled]]:hover:text-danger-950/90 dark:[&[disabled]]:hover:bg-danger-500/15 dark:[&[disabled]]:hover:text-danger-400' => Color::Danger->is($color) && Variant::Solid->is($variant),

            {{-- Disabled Ghost --}}
            '[&[disabled]]:hover:bg-transparent' => Variant::Ghost->is($variant),
            '[&[disabled]]:hover:text-primary-700 dark:[&[disabled]]:hover:text-primary-400' => Color::Primary->is($color) && Variant::Ghost->is($variant),
            '[&[disabled]]:hover:text-secondary-600/80 dark:[&[disabled]]:hover:text-secondary-300' => Color::Secondary->is($color) && Variant::Ghost->is($variant),
            '[&[disabled]]:hover:text-success-700 dark:[&[disabled]]:hover:text-success-400' => Color::Success->is($color) && Variant::Ghost->is($variant),
            '[&[disabled]]:hover:text-warning-700 dark:[&[disabled]]:hover:text-warning-400' => Color::Warning->is($color) && Variant::Ghost->is($variant),
            '[&[disabled]]:hover:text-danger-600 dark:[&[disabled]]:hover:text-danger-400' => Color::Danger->is($color) && Variant::Ghost->is($variant),

            {{-- Loading state --}}
            '[&[data-ui-loading]>*:not([data-ui-loader])]:opacity-0',
        ])
}}>
    <span class="inline-flex items-center justify-center transition ease-in-out">
    @if ($icon)
        <x-dynamic-component
            :component="'ui::icon.' . $icon"
            :variant="$iconVariant"
            class="opacity-70 mr-1.5"
        />
    @endif
    {{-- Main Slot --}}
    {{ $slot }}
    @if ($iconAfter)
        <x-dynamic-component
            :component="'ui::icon.' . $iconAfter"
            :variant="$iconVariant"
            class="opacity-70 ml-1.5"
        />
    @endif
    </span>


    <span data-ui-loader @class([
        'opacity-0 transition ease-in-out absolute inset-0 flex items-center justify-center',
        '[[data-ui-loading]>&]:opacity-100 [[data-ui-loading]>&]:pointer-events-none',
    ])>
        <span @class([
            'block',
            'size-3' => Size::XS->is($size),
            'size-4' => Size::SM->is($size),
            'size-5' => Size::MD->is($size),
            'size-6' => Size::LG->is($size),
            'size-7' => Size::XL->is($size),
        ])>
            <ui:icon-spinner class="w-full h-full" />
        </span>
    </span>
</button>
