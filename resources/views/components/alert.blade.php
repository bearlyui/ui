<div {{ $attributes->class([
    'rounded px-4 py-2 transition ease-in-out',
    'bg-primary-500 text-white/90 hover:bg-primary-600',
]) }}>
    {{ $slot }}
</div>
