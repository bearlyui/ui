@props([
    'when' => true,
    'href' => null,
])

<a {{ $attributes
    ->when(
        $when === true && $href !== null,
        fn ($attributes) => $attributes->merge(['href' => $href])
    )
}}>{{ $slot }}</a>
