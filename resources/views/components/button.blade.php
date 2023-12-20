@use('Bearly\Ui\Color')
@use('Bearly\Ui\Size')
@props([
    'color' => Color::Primary,
    'size' => Size::BASE,
])

<button
    {{ $attributes->class([
        'rounded-md transition ease-in-out',

        {{-- Sizing --}}
        'px-2 py-1 text-xs' => Size::XS->is($size),
        'px-3 py-1 text-sm' => Size::SM->is($size),
        'px-4 py-2 text-base' => Size::BASE->is($size),
        'px-5 py-3 text-base' => Size::MD->is($size),
        'px-6 py-3 text-lg' => Size::LG->is($size),
        'px-8 py-4 text-xl' => Size::XL->is($size),

        {{-- Theme / Color --}}
        'text-white/90 bg-primary-500 hover:bg-primary-600' => Color::Primary->is($color),
        'text-gray-900 bg-gray-100 hover:bg-gray-200' => Color::Secondary->is($color),
        'text-white/90 bg-green-500 hover:bg-green-600' => Color::Success->is($color),
        'text-white/90 bg-red-500 hover:bg-red-600' => Color::Error->is($color),
        'text-white/90 bg-amber-500 hover:bg-amber-600' => Color::Warning->is($color),

        {{-- Focus state --}}
        ...config('ui.focusClasses'),
    ])->merge(['type' => 'button']) }}
>{{ $slot }}</button>
