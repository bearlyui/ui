<button
    {{ $attributes->class([
        'rounded-md px-4 py-2 bg-primary-500 text-white/90 hover:bg-primary-600 transition ease-in-out',
    ])->merge(['type' => 'button']) }}
>{{ $slot }}</button>
