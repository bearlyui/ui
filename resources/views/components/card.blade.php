@use('Bearly\Ui\Color')
@use('Bearly\Ui\Variant')
@props([
    'padding' => true,
    'color' => Color::None,
    'variant' => Variant::Outline,
])
<div {{ $attributes->class([
    'rounded border',
    'text-gray-700 dark:text-gray-200',

    'shadow dark:shadow-md' => !Variant::Glow->is($variant),
    'bg-white dark:bg-gray-400/5' => Variant::Outline->is($variant) || Variant::Glow->is($variant),

    {{-- Outline --}}
    'border-gray-300 dark:border-white/7.5' => Color::None->is($color) && Variant::Outline->is($variant),
    'border-primary-300 dark:border-primary-300/50' => Color::Primary->is($color) && Variant::Outline->is($variant),
    'border-secondary-300 dark:border-secondary-300/50' => Color::Secondary->is($color) && Variant::Outline->is($variant),
    'border-success-300 dark:border-success-300/50' => Color::Success->is($color) && Variant::Outline->is($variant),
    'border-warning-300 dark:border-warning-300/50' => Color::Warning->is($color) && Variant::Outline->is($variant),
    'border-error-300 dark:border-error-300/50' => Color::Error->is($color) && Variant::Outline->is($variant),

    {{-- Solid --}}
    'bg-white dark:bg-gray-400/5 border-gray-300/75 dark:border-white/7.5' => Color::None->is($color) && Variant::Solid->is($variant),
    'bg-primary-100 border-primary-400 text-primary-800 dark:bg-primary-400/40 dark:text-primary-200' => Color::Primary->is($color) && Variant::Solid->is($variant),
    'bg-secondary-100 border-secondary-300 text-secondary-800 dark:bg-secondary-400/40 dark:text-secondary-200' => Color::Secondary->is($color) && Variant::Solid->is($variant),
    'bg-success-100 border-success-400 text-success-800 dark:bg-success-400/40 dark:text-success-200' => Color::Success->is($color) && Variant::Solid->is($variant),
    'bg-warning-100 border-warning-400 text-warning-800 dark:bg-warning-400/40 dark:text-warning-100' => Color::Warning->is($color) && Variant::Solid->is($variant),
    'bg-error-100 border-error-400/75 text-error-800 dark:bg-error-400/40 dark:text-error-200' => Color::Error->is($color) && Variant::Solid->is($variant),

    {{-- Gradient --}}
    'bg-gradient-to-br from-white to-gray-50 dark:from-gray-400/5 dark:to-gray-400/10 border-gray-300/75 dark:border-white/7.5' => Color::None->is($color) && Variant::Gradient->is($variant),
    'bg-gradient-to-br from-primary-50 to-primary-200 dark:from-primary-300/10 dark:to-primary-900/80 dark:border-primary-400/40 dark:text-primary-200' => Color::Primary->is($color) && Variant::Gradient->is($variant),
    'bg-gradient-to-br from-secondary-50 to-secondary-200 dark:from-secondary-300/10 dark:to-secondary-900/80 dark:border-secondary-400/40 dark:text-secondary-200' => Color::Secondary->is($color) && Variant::Gradient->is($variant),
    'bg-gradient-to-br from-success-50 to-success-200 dark:from-success-300/10 dark:to-success-900/80 dark:border-success-400/40 dark:text-success-200' => Color::Success->is($color) && Variant::Gradient->is($variant),
    'bg-gradient-to-br from-warning-50 to-warning-200 dark:from-warning-300/10 dark:to-warning-900/80 dark:border-warning-400/40 dark:text-warning-200' => Color::Warning->is($color) && Variant::Gradient->is($variant),
    'bg-gradient-to-br from-error-50 to-error-200 dark:from-error-300/10 dark:to-error-900/80 dark:border-error-400/40 dark:text-error-200' => Color::Error->is($color) && Variant::Gradient->is($variant),

    {{-- Glow --}}
    'shadow-lg bg-white dark:bg-gray-400/5' => Variant::Glow->is($variant),
    'border-gray-300 dark:border-white/7.5' => Color::None->is($color) && Variant::Glow->is($variant),
    'border-primary-500/40 shadow-primary-400/30' => Color::Primary->is($color) && Variant::Glow->is($variant),
    'border-secondary-500/40 shadow-secondary-400/30' => Color::Secondary->is($color) && Variant::Glow->is($variant),
    'border-success-500/40 shadow-success-400/30' => Color::Success->is($color) && Variant::Glow->is($variant),
    'border-warning-500/40 shadow-warning-400/30' => Color::Warning->is($color) && Variant::Glow->is($variant),
    'border-error-500/40 shadow-error-400/30' => Color::Error->is($color) && Variant::Glow->is($variant),
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
