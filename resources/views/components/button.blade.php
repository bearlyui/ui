@use('Bearly\Ui\Color')
@use('Bearly\Ui\Size')
@use('Bearly\Ui\Variant')
@props([
    'color' => Color::Primary,
    'size' => Size::BASE,
    'variant' => Variant::Solid,
])

<button
    {{ $attributes->class([
        'rounded-md transition ease-in-out',

        {{-- Sizing --}}
        'px-1.5 py-1 text-xs' => Size::XS->is($size),
        'px-3 py-1.5 text-sm' => Size::SM->is($size),
        'px-4 py-2 text-base' => Size::BASE->is($size),
        'px-5 py-2.5 text-base font-medium' => Size::MD->is($size),
        'px-6 py-3 text-lg font-medium' => Size::LG->is($size),
        'px-8 py-4 text-xl font-medium' => Size::XL->is($size),

        {{-- Solid Variant --}}
        'text-white/90 bg-primary-500 hover:bg-primary-600' => Color::Primary->is($color) && Variant::Solid->is($variant),
        'text-gray-900 bg-gray-100 hover:bg-gray-200' => Color::Secondary->is($color) && Variant::Solid->is($variant),
        'text-white/90 bg-green-500 hover:bg-green-600' => Color::Success->is($color) && Variant::Solid->is($variant),
        'text-white/90 bg-red-500 hover:bg-red-600' => Color::Error->is($color) && Variant::Solid->is($variant),
        'text-white/90 bg-amber-500 hover:bg-amber-600' => Color::Warning->is($color) && Variant::Solid->is($variant),

        {{-- Outline Variant --}}
        'text-primary-500 border-primary-500 hover:bg-primary-50' => Color::Primary->is($color) && Variant::Outline->is($variant),
        'text-gray-900 border-gray-100 hover:bg-gray-50' => Color::Secondary->is($color) && Variant::Outline->is($variant),
        'text-green-500 border-green-500 hover:bg-green-50' => Color::Success->is($color) && Variant::Outline->is($variant),
        'text-red-500 border-red-500 hover:bg-red-50' => Color::Error->is($color) && Variant::Outline->is($variant),
        'text-amber-500 border-amber-500 hover:bg-amber-50' => Color::Warning->is($color) && Variant::Outline->is($variant),

        {{-- Ghost Variant --}}
        'text-primary-500 hover:bg-primary-50' => Color::Primary->is($color) && Variant::Ghost->is($variant),
        'text-gray-900 hover:bg-gray-50' => Color::Secondary->is($color) && Variant::Ghost->is($variant),
        'text-green-500 hover:bg-green-50' => Color::Success->is($color) && Variant::Ghost->is($variant),
        'text-red-500 hover:bg-red-50' => Color::Error->is($color) && Variant::Ghost->is($variant),
        'text-amber-500 hover:bg-amber-50' => Color::Warning->is($color) && Variant::Ghost->is($variant),

        {{-- Link Variant --}}
        'text-primary-500 hover:bg-primary-50' => Color::Primary->is($color) && Variant::Link->is($variant),
        'text-gray-900 hover:bg-gray-50' => Color::Secondary->is($color) && Variant::Link->is($variant),
        'text-green-500 hover:bg-green-50' => Color::Success->is($color) && Variant::Link->is($variant),
        'text-red-500 hover:bg-red-50' => Color::Error->is($color) && Variant::Link->is($variant),
        'text-amber-500 hover:bg-amber-50' => Color::Warning->is($color) && Variant::Link->is($variant),

        {{-- Glow Variant --}}
        'text-primary-500 shadow-primary-400/60 border-primary-500/40 hover:bg-primary-50' => Color::Primary->is($color) && Variant::Glow->is($variant),
        'text-gray-900 shadow-gray-400/60 border-gray-100/40 hover:bg-gray-50' => Color::Secondary->is($color) && Variant::Glow->is($variant),
        'text-green-500 shadow-green-400/60 border-green-500/40 hover:bg-green-50' => Color::Success->is($color) && Variant::Glow->is($variant),
        'text-red-500 shadow-red-400/60 border-red-500/40 hover:bg-red-50' => Color::Error->is($color) && Variant::Glow->is($variant),
        'text-amber-500 shadow-amber-400/60 border-amber-500/40 hover:bg-amber-50' => Color::Warning->is($color) && Variant::Glow->is($variant),

        {{-- Bordered Variant --}}
        'text-primary-500 border-primary-500 hover:bg-primary-50' => Color::Primary->is($color) && Variant::Bordered->is($variant),
        'text-gray-900 border-gray-100 hover:bg-gray-50' => Color::Secondary->is($color) && Variant::Bordered->is($variant),
        'text-green-500 border-green-500 hover:bg-green-50' => Color::Success->is($color) && Variant::Bordered->is($variant),
        'text-red-500 border-red-500 hover:bg-red-50' => Color::Error->is($color) && Variant::Bordered->is($variant),
        'text-amber-500 border-amber-500 hover:bg-amber-50' => Color::Warning->is($color) && Variant::Bordered->is($variant),


        {{-- Focus state --}}
        ...config('ui.focusClasses'),
    ])->merge(['type' => 'button']) }}
>{{ $slot }}</button>
