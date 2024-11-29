@use('Bearly\Ui\Color')
@use('Bearly\Ui\Size')
@use('Bearly\Ui\Variant')
@props([
    'color' => Color::Primary,
    'size' => Size::BASE,
    'variant' => Variant::Solid,
    'radius' => Size::BASE,
    'href' => null,
    'disabled' => false,
])

<button
    {{ $attributes
        ->when($disabled, fn ($attributes) => $attributes->merge(['disabled' => 'disabled']))
        ->when($href, fn ($attributes) => $attributes->merge(['onclick' => "window.location.href='$href'"]))
        ->merge(['type' => 'button'])
        ->class([
            'transition-all ease-in-out',

            {{-- Disabled States --}}
            'opacity-60 saturate-[0.3] cursor-not-allowed' => $disabled,

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
            'focus-visible:ring-primary-400/80 focus-visible:dark:ring-primary-300/80' => Color::Primary->is($color),
            'focus-visible:ring-secondary-400/80 focus-visible:dark:ring-secondary-300/80' => Color::Secondary->is($color),
            'focus-visible:ring-success-400/80 focus-visible:dark:ring-success-300/80' => Color::Success->is($color),
            'focus-visible:ring-warning-400/80 focus-visible:dark:ring-warning-300/80' => Color::Warning->is($color),
            'focus-visible:ring-error-400/80 focus-visible:dark:ring-error-300/80' => Color::Error->is($color),

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

            {{-- Outline Variant --}}
            'text-primary-500 border-primary-500 hover:bg-primary-50 dark:text-primary-400 dark:border-primary-400 dark:hover:bg-primary-600/40 dark:hover:text-primary-100' => Color::Primary->is($color) && Variant::Outline->is($variant),
            'text-secondary-500 border-secondary-500 hover:bg-secondary-300/50 hover:text-secondary-700 dark:text-secondary-300 dark:border-secondary-400 dark:hover:bg-secondary-600 dark:hover:text-secondary-100' => Color::Secondary->is($color) && Variant::Outline->is($variant),
            'text-success-500 border-success-500 hover:bg-success-50 dark:text-success-400 dark:border-success-400 dark:hover:bg-success-600/40 dark:hover:text-success-100' => Color::Success->is($color) && Variant::Outline->is($variant),
            'text-warning-500 border-warning-500 hover:bg-warning-50 dark:text-warning-400 dark:border-warning-400 dark:hover:bg-warning-600/40 dark:hover:text-warning-100' => Color::Warning->is($color) && Variant::Outline->is($variant),
            'text-error-500 border-error-500 hover:bg-error-50 dark:text-error-400 dark:border-error-400 dark:hover:bg-error-600/40 dark:hover:text-error-100' => Color::Error->is($color) && Variant::Outline->is($variant),

            {{-- Link Variant --}}
            'font-medium' => Variant::Link->is($variant),
            'text-primary-500 hover:text-primary-800 dark:text-primary-400 dark:hover:text-primary-100' => Color::Primary->is($color) && Variant::Link->is($variant),
            'text-secondary-500 hover:text-secondary-800 dark:text-secondary-300 dark:hover:text-secondary-50' => Color::Secondary->is($color) && Variant::Link->is($variant),
            'text-success-500 hover:text-success-800 dark:text-success-400 dark:hover:text-success-100' => Color::Success->is($color) && Variant::Link->is($variant),
            'text-warning-500 hover:text-warning-800 dark:text-warning-400 dark:hover:text-warning-100' => Color::Warning->is($color) && Variant::Link->is($variant),
            'text-error-500 hover:text-error-800 dark:text-error-400 dark:hover:text-error-100' => Color::Error->is($color) && Variant::Link->is($variant),

            {{-- Ghost Variant --}}
            'text-primary-500 hover:bg-primary-50 dark:text-primary-400 dark:hover:bg-primary-600/40 dark:hover:text-primary-100' => Color::Primary->is($color) && Variant::Ghost->is($variant),
            'text-secondary-500 hover:bg-secondary-300/20 hover:text-secondary-700 dark:text-secondary-300 dark:hover:bg-secondary-600/40 dark:hover:text-secondary-100' => Color::Secondary->is($color) && Variant::Ghost->is($variant),
            'text-success-500 hover:bg-success-50 dark:text-success-400 dark:hover:bg-success-600/40 dark:hover:text-success-100' => Color::Success->is($color) && Variant::Ghost->is($variant),
            'text-warning-500 hover:bg-warning-50 dark:text-warning-400 dark:hover:bg-warning-600/40 dark:hover:text-warning-100' => Color::Warning->is($color) && Variant::Ghost->is($variant),
            'text-error-500 hover:bg-error-50 dark:text-error-400 dark:hover:bg-error-600/40 dark:hover:text-error-100' => Color::Error->is($color) && Variant::Ghost->is($variant),

            {{-- Glow Variant --}}
            'shadow hover:shadow-lg border-t' => Variant::Glow->is($variant),
            'text-primary-500 border-primary-300 bg-primary-200/15 shadow-primary-400/60 hover:text-primary-600 hover:shadow-lg hover:shadow-primary-400/60 dark:text-primary-400 dark:bg-primary-700/10 dark:border-primary-600 dark:hover:text-primary-200' => Color::Primary->is($color) && Variant::Glow->is($variant),
            'text-secondary-500 border-secondary-300 bg-secondary-300/10 shadow-secondary-400/60 hover:text-secondary-600 hover:shadow-lg hover:shadow-secondary-400/60 dark:text-secondary-300 dark:bg-secondary-700/10 dark:border-secondary-600 dark:hover:text-secondary-100' => Color::Secondary->is($color) && Variant::Glow->is($variant),
            'text-success-500 border-success-300 bg-success-200/15 shadow-success-400/60 hover:text-success-600 hover:shadow-lg hover:shadow-success-400/60 dark:text-success-400 dark:bg-success-700/10 dark:border-success-600 dark:hover:text-success-200' => Color::Success->is($color) && Variant::Glow->is($variant),
            'text-warning-500 border-warning-300 bg-warning-200/15 shadow-warning-400/60 hover:text-warning-600 hover:shadow-lg hover:shadow-warning-400/60 dark:text-warning-400 dark:bg-warning-700/10 dark:border-warning-600 dark:hover:text-warning-200' => Color::Warning->is($color) && Variant::Glow->is($variant),
            'text-error-500 border-error-300 bg-error-200/15 shadow-error-400/60 hover:text-error-600 hover:shadow-lg hover:shadow-error-400/60 dark:text-error-400 dark:bg-error-700/10 dark:border-error-600 dark:hover:text-error-200' => Color::Error->is($color) && Variant::Glow->is($variant),

            {{-- Gradient Variant --}}
            'text-primary-50 bg-gradient-to-bl from-primary-200 to-primary-600 hover:hue-rotate-30 dark:from-primary-400 dark:to-primary-800 dark:hover:hue-rotate-30' => Color::Primary->is($color) && Variant::Gradient->is($variant),
            'text-secondary-50 bg-gradient-to-bl from-secondary-200 to-secondary-600 hover:hue-rotate-90 dark:from-secondary-400 dark:to-secondary-800 dark:hover:hue-rotate-90' => Color::Secondary->is($color) && Variant::Gradient->is($variant),
            'text-success-50 bg-gradient-to-bl from-success-200 to-success-600 hover:hue-rotate-30 dark:from-success-400 dark:to-success-800 dark:hover:hue-rotate-30' => Color::Success->is($color) && Variant::Gradient->is($variant),
            'text-warning-50 bg-gradient-to-bl from-warning-200 to-warning-600 hover:-hue-rotate-30 dark:from-warning-400 dark:to-warning-800 dark:hover:-hue-rotate-30' => Color::Warning->is($color) && Variant::Gradient->is($variant),
            'text-error-50 bg-gradient-to-bl from-error-200 to-error-600 hover:-hue-rotate-30 dark:from-error-400 dark:to-error-800 dark:hover:-hue-rotate-30' => Color::Error->is($color) && Variant::Gradient->is($variant),
        ])
}}>{{ $slot }}</button>
