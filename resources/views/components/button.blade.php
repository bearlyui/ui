@use('Bearly\Ui\Color')
@use('Bearly\Ui\Size')
@use('Bearly\Ui\Variant')
@props([
    'color' => Color::Secondary,
    'size' => Size::BASE,
    'variant' => Variant::Solid,
    'radius' => Size::BASE,
    'href' => null,
])

<button
    {{ $attributes
        ->when($href, fn ($attributes) => $attributes->merge(['onclick' => "window.location.href='$href'"]))
        ->merge(['type' => 'button'])
        ->class([
            'transition-all ease-in-out',

            {{-- Border Radius --}}
            'rounded-none' => Size::NONE->is($radius),
            'rounded-sm' => Size::SM->is($radius),
            'rounded' => Size::BASE->is($radius),
            'rounded-md' => Size::MD->is($radius),
            'rounded-lg' => Size::LG->is($radius),
            'rounded-xl' => Size::XL->is($radius),
            'rounded-full' => Size::FULL->is($radius),

            {{-- Focus states --}}
            ...config('ui.focusClasses'),
            'focus-visible:ring-primary-400/80 focus-visible:dark:ring-primary-300/80',

            {{-- Sizing --}}
            'px-1.5 py-1 text-xs' => Size::XS->is($size),
            'px-3 py-1.5 text-sm font-medium' => Size::SM->is($size),
            'px-4 py-2 text-sm font-medium' => Size::BASE->is($size),
            'px-5 py-2.5 text-base font-medium' => Size::MD->is($size),
            'px-6 py-3 text-lg font-medium' => Size::LG->is($size),
            'px-8 py-4 text-xl font-medium' => Size::XL->is($size),

            {{-- Base Variant Styles --}}
            'border shadow-sm hover:shadow' => Variant::Outline->is($variant) || Variant::Solid->is($variant),
            '[text-shadow:0.5px_0.5px_0px_rgba(255,255,255,0.24)] dark:[text-shadow:0.5px_0.5px_0px_rgba(0,0,0,0.24)]' => Variant::Solid->is($variant) || Variant::Gradient->is($variant),

            {{-- Solid Variant --}}
            'bg-primary-700 text-white border-primary-600/60 hover:bg-primary-900 dark:text-primary-300 dark:hover:text-primary-200 dark:border-primary-500/30 dark:bg-primary-400/30 dark:hover:bg-primary-400/50' => Color::Primary->is($color) && Variant::Solid->is($variant),
            '[text-shadow:none] bg-secondary-50 border-secondary-300/60 text-secondary-600/90 hover:bg-white hover:border-secondary-300/80 hover:text-secondary-700 dark:bg-secondary-300/10 dark:border-secondary-600 dark:text-secondary-300 dark:hover:bg-primary-300/15 dark:hover:text-secondary-100 dark:hover:border-primary-300/30' => Color::Secondary->is($color) && Variant::Solid->is($variant),
            'bg-success-500 text-success-950/90 border-success-600/60 hover:bg-success-600 hover:text-white dark:text-success-500 dark:hover:text-success-200 dark:border-success-500/30 dark:bg-success-400/15 dark:hover:bg-success-400/40' => Color::Success->is($color) && Variant::Solid->is($variant),
            'bg-warning-400 text-warning-900 border-warning-600/60 hover:bg-warning-600 hover:text-white dark:text-warning-500 dark:hover:text-warning-200 dark:border-warning-500/30 dark:bg-warning-400/15 dark:hover:bg-warning-400/40' => Color::Warning->is($color) && Variant::Solid->is($variant),
            'bg-error-500/80 text-error-950/90 border-error-600/60 hover:bg-error-700 hover:text-white dark:text-error-400 dark:hover:text-error-200 dark:border-error-500/30 dark:bg-error-500/15 dark:hover:bg-error-400/40' => Color::Error->is($color) && Variant::Solid->is($variant),

            {{-- Ghost Variant --}}
            'hover:bg-gray-500/5 dark:hover:bg-gray-400/10' => Variant::Ghost->is($variant),
            'text-primary-700 dark:text-primary-400 dark:hover:text-primary-100' => Color::Primary->is($color) && Variant::Ghost->is($variant),
            'text-secondary-600/80 hover:text-secondary-700 dark:text-secondary-300 dark:hover:text-secondary-100' => Color::Secondary->is($color) && Variant::Ghost->is($variant),
            'text-success-700 dark:text-success-400 dark:hover:text-success-100' => Color::Success->is($color) && Variant::Ghost->is($variant),
            'text-warning-700 dark:text-warning-400 dark:hover:text-warning-100' => Color::Warning->is($color) && Variant::Ghost->is($variant),
            'text-error-600 dark:text-error-400 dark:hover:text-error-100' => Color::Error->is($color) && Variant::Ghost->is($variant),

            {{-- Disabled States --}}
            '[&[disabled]]:opacity-60 [&[disabled]]:saturate-[0.6] [&[disabled]]:cursor-not-allowed',

            {{-- Disabled Solid --}}
            '[&[disabled]]:hover:shadow-sm' => Variant::Solid->is($variant),
            '[&[disabled]]:hover:bg-primary-700 [&[disabled]]:hover:text-white [&[disabled]]:dark:hover:bg-primary-400/30 [&[disabled]]:dark:hover:text-primary-300' => Color::Primary->is($color) && Variant::Solid->is($variant),
            '[&[disabled]]:hover:bg-secondary-50 [&[disabled]]:hover:text-secondary-600/90 [&[disabled]]:dark:hover:bg-secondary-300/10 [&[disabled]]:dark:hover:text-secondary-300 [&[disabled]]:hover:border-secondary-300/60 [&[disabled]]:dark:hover:border-secondary-600' => Color::Secondary->is($color) && Variant::Solid->is($variant),
            '[&[disabled]]:hover:bg-success-500 [&[disabled]]:hover:text-success-950/90 [&[disabled]]:dark:hover:bg-success-400/15 [&[disabled]]:dark:hover:text-success-500' => Color::Success->is($color) && Variant::Solid->is($variant),
            '[&[disabled]]:hover:bg-warning-400 [&[disabled]]:hover:text-warning-900 [&[disabled]]:dark:hover:bg-warning-400/15 [&[disabled]]:dark:hover:text-warning-500' => Color::Warning->is($color) && Variant::Solid->is($variant),
            '[&[disabled]]:hover:bg-error-500/80 [&[disabled]]:hover:text-error-950/90 [&[disabled]]:dark:hover:bg-error-500/15 [&[disabled]]:dark:hover:text-error-400' => Color::Error->is($color) && Variant::Solid->is($variant),

            {{-- Disabled Ghost --}}
            '[&[disabled]]:hover:bg-transparent' => Variant::Ghost->is($variant),
            '[&[disabled]]:hover:text-primary-700 [&[disabled]]:dark:hover:text-primary-400' => Color::Primary->is($color) && Variant::Ghost->is($variant),
            '[&[disabled]]:hover:text-secondary-600/80 [&[disabled]]:dark:hover:text-secondary-300' => Color::Secondary->is($color) && Variant::Ghost->is($variant),
            '[&[disabled]]:hover:text-success-700 [&[disabled]]:dark:hover:text-success-400' => Color::Success->is($color) && Variant::Ghost->is($variant),
            '[&[disabled]]:hover:text-warning-700 [&[disabled]]:dark:hover:text-warning-400' => Color::Warning->is($color) && Variant::Ghost->is($variant),
            '[&[disabled]]:hover:text-error-600 [&[disabled]]:dark:hover:text-error-400' => Color::Error->is($color) && Variant::Ghost->is($variant),

        ])
}}>{{ $slot }}</button>
