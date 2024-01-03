@use('Bearly\Ui\Color')
@use('Bearly\Ui\Variant')
@props([
    'padding' => true,
    'color' => Color::None,
    'variant' => Variant::Outline,
])
<div {{ $attributes->class([
    'rounded border shadow dark:shadow-md bg-white dark:bg-gray-400/5 ',
    'bg-white dark:bg-gray-400/5',
    'text-gray-700 dark:text-gray-200',

    {{-- Colors --}}
    'border-gray-300/75 dark:border-white/7.5' => Color::None->is($color) && Variant::Outline->is($variant),
    'border-primary-300/50' => Color::Primary->is($color) && Variant::Outline->is($variant),
    'border-secondary-300/50' => Color::Secondary->is($color) && Variant::Outline->is($variant),
    'border-success-300/50' => Color::Success->is($color) && Variant::Outline->is($variant),
    'border-warning-300/50' => Color::Warning->is($color) && Variant::Outline->is($variant),
    'border-error-300/50' => Color::Error->is($color) && Variant::Outline->is($variant),
]) }}>

    {{-- Header --}}
    @if ($header ?? false)
        <div {{ $header->attributes->class([
            'text-lg font-medium text-black/70 dark:text-white/70 rounded-t',
            'border-b bg-gray-50 dark:bg-black/10',

            {{-- Colors --}}
            'border-gray-200 dark:border-white/5' => Color::None->is($color) && Variant::Outline->is($variant),
            'border-primary-300/25' => Color::Primary->is($color) && Variant::Outline->is($variant),
            'border-secondary-300/25' => Color::Secondary->is($color) && Variant::Outline->is($variant),
            'border-success-300/25' => Color::Success->is($color) && Variant::Outline->is($variant),
            'border-warning-300/25' => Color::Warning->is($color) && Variant::Outline->is($variant),
            'border-error-300/25' => Color::Error->is($color) && Variant::Outline->is($variant),
            'px-4 py-2' => $padding === true,
        ]) }}>
            {{ $header }}
        </div>
    @endif

    <div @class([
        'px-4 py-2' => $padding === true,
    ])>{{ $slot }}</div>

    {{-- Footer --}}
    @if ($footer ?? false)
        <div {{ $footer->attributes->class([
            'rounded-b border-t',
            'bg-gray-50 text-black/70',
            'dark:bg-black/10 dark:text-white/70',
            'border-gray-200 dark:border-white/5' => Color::None->is($color) && Variant::Outline->is($variant),
            'border-primary-300/25' => Color::Primary->is($color) && Variant::Outline->is($variant),
            'border-secondary-300/25' => Color::Secondary->is($color) && Variant::Outline->is($variant),
            'border-success-300/25' => Color::Success->is($color) && Variant::Outline->is($variant),
            'border-warning-300/25' => Color::Warning->is($color) && Variant::Outline->is($variant),
            'border-error-300/25' => Color::Error->is($color) && Variant::Outline->is($variant),
            'px-4 py-2' => $padding === true,
        ]) }}>
            {{ $footer }}
        </div>
    @endif
</div>
