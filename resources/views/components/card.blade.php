@props([
    'padding' => true,
])
<div {{ $attributes->class([
    'rounded border shadow-md bg-white dark:bg-gray-400/5 ',
    'bg-white dark:bg-gray-400/5 border-gray-300 dark:border-white/7.5',
    'text-gray-700 dark:text-gray-200',
    {{-- 'shadow-primary-500/40 border-primary-300' => $color === 'primary',
    'shadow-green-500/40 border-green-300' => $color === 'green', --}}
]) }}>
    @if ($header ?? false)
        <div {{ $header->attributes->class([
            'text-lg font-medium text-black/70 dark:text-white/70 rounded-t',
            'border-b border-gray-200 dark:border-white/5 bg-gray-50 dark:bg-black/10',
            'px-4 py-2' => $padding === true,
        ]) }}>
            {{ $header }}
        </div>
    @endif

    <div @class([
        'px-4 py-2' => $padding === true,
    ])>{{ $slot }}</div>

    @if ($footer ?? false)
        <div {{ $footer->attributes->class([
            'rounded-b border-t',
            'border-gray-200 bg-gray-50 text-black/70',
            'dark:border-white/5 dark:bg-black/10 dark:text-white/70',
            'px-4 py-2' => $padding === true,
        ]) }}>
            {{ $footer }}
        </div>
    @endif
</div>
