@use('Bearly\Ui\Size')
@use('Bearly\Ui\Color')
@use('Bearly\Ui\Variant')

@props([
    'size' => Size::BASE,
    'radius' => Size::BASE,
    'color' => Color::Secondary,
    'variant' => Variant::Solid,
    'icon' => null,
    'iconAfter' => null,
    'iconVariant' => 'micro',
])
<div {{ $attributes->class([
    'inline-flex items-center tabular-nums',

    {{-- Solid Variant --}}
    'bg-primary-200/60 text-primary-900 dark:bg-primary-400/20 dark:text-primary-100' => Variant::Solid->is($variant) && Color::Primary->is($color),
    'bg-secondary-300/60 text-secondary-800 dark:bg-secondary-400/20 dark:text-secondary-100' => Variant::Solid->is($variant) && Color::Secondary->is($color),
    'bg-success-200/60 text-success-900 dark:bg-success-400/20 dark:text-success-100' => Variant::Solid->is($variant) && Color::Success->is($color),
    'bg-warning-200/60 text-warning-900 dark:bg-warning-400/20 dark:text-warning-100' => Variant::Solid->is($variant) && Color::Warning->is($color),
    'bg-danger-200/60 text-danger-900 dark:bg-danger-400/20 dark:text-danger-100' => Variant::Solid->is($variant) && Color::Danger->is($color),

    {{-- Outline Variant --}}
    'bg-transparent border border-primary-600/70 text-primary-800 dark:border-primary-400/60 dark:text-primary-300/85' => Variant::Outline->is($variant) && Color::Primary->is($color),
    'bg-transparent border border-secondary-600/40 text-secondary-700 dark:border-secondary-400/60 dark:text-secondary-300' => Variant::Outline->is($variant) && Color::Secondary->is($color),
    'bg-transparent border border-success-600/60 text-success-800 dark:border-success-400/60 dark:text-success-300/85' => Variant::Outline->is($variant) && Color::Success->is($color),
    'bg-transparent border border-warning-700/60 text-warning-800 dark:border-warning-400/60 dark:text-warning-300/85' => Variant::Outline->is($variant) && Color::Warning->is($color),
    'bg-transparent border border-danger-700/60 text-danger-700 dark:border-danger-400/60 dark:text-danger-300/85' => Variant::Outline->is($variant) && Color::Danger->is($color),

    {{-- Sizes --}}
    'p-0.5 text-[0.675rem]' => Size::SM->is($size),
    'px-1.5 py-1 text-xs' => Size::BASE->is($size),
    'px-2 py-1 text-sm' => Size::MD->is($size),
    'px-2 py-1 text-base' => Size::LG->is($size),

    {{-- Border Radius --}}
    'rounded-none' => Size::NONE->is($radius),
    'rounded-sm' => Size::SM->is($radius),
    'rounded' => Size::BASE->is($radius),
    'rounded-md' => Size::MD->is($radius),
    'rounded-lg' => Size::LG->is($radius),
    'rounded-xl' => Size::XL->is($radius),
    'rounded-full' => Size::FULL->is($radius),
]) }}>
    @if ($icon)
        <x-dynamic-component
            :component="'ui::icon.' . $icon"
            :variant="$iconVariant"
            class="opacity-80 mr-2"
        />
    @endif

    {{ $slot }}

    @if ($iconAfter)
        <x-dynamic-component
            :component="'ui::icon.' . $iconAfter"
            :variant="$iconVariant"
            class="opacity-80 ml-2"
        />
    @endif
</div>
