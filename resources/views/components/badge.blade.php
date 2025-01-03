@use('Bearly\Ui\Size')
@use('Bearly\Ui\Color')
@use('Bearly\Ui\Variant')

@props([
    'size' => Size::BASE,
    'radius' => Size::BASE,
    'color' => Color::Secondary,
    'variant' => Variant::Solid,
])

{{-- TODO:
- variants
- number support / numeric-only visibility?
- check / adjust color contrast for light mode
- check / adjust color contrast for dark mode
- icons?
 --}}

<div {{ $attributes->class([
    'inline-flex items-center tabular-nums',

    {{-- Solid Variant --}}
    'bg-primary-200/80 text-primary-900 dark:bg-primary-400/20 dark:text-primary-100' => Variant::Solid->is($variant) && Color::Primary->is($color),
    'bg-secondary-300/80 text-secondary-800 dark:bg-secondary-400/20 dark:text-secondary-100' => Variant::Solid->is($variant) && Color::Secondary->is($color),
    'bg-success-200/80 text-success-900 dark:bg-success-400/20 dark:text-success-100' => Variant::Solid->is($variant) && Color::Success->is($color),
    'bg-warning-200/80 text-warning-900 dark:bg-warning-400/20 dark:text-warning-100' => Variant::Solid->is($variant) && Color::Warning->is($color),
    'bg-danger-200/80 text-danger-900 dark:bg-danger-400/20 dark:text-danger-100' => Variant::Solid->is($variant) && Color::Danger->is($color),

    {{-- Outline Variant --}}
    'bg-transparent border border-primary-200/80 text-primary-900 dark:border-primary-400/20 dark:text-primary-100' => Variant::Outline->is($variant) && Color::Primary->is($color),
    'bg-transparent border border-secondary-300/80 text-secondary-800 dark:border-secondary-400/20 dark:text-secondary-100' => Variant::Outline->is($variant) && Color::Secondary->is($color),
    'bg-transparent border border-success-200/80 text-success-900 dark:border-success-400/20 dark:text-success-100' => Variant::Outline->is($variant) && Color::Success->is($color),
    'bg-transparent border border-warning-200/80 text-warning-900 dark:border-warning-400/20 dark:text-warning-100' => Variant::Outline->is($variant) && Color::Warning->is($color),
    'bg-transparent border border-danger-200/80 text-danger-900 dark:border-danger-400/20 dark:text-danger-100' => Variant::Outline->is($variant) && Color::Danger->is($color),

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
    {{ $slot }}
</div>
