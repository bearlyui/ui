{{-- There should be NO NEWLINES AT THE END OF THIS FILE. NO COMMENTS. NO SPACES. --}}
@props([
    'when' => true,
    'href' => null,
])
<a {{ $attributes
    ->when(
        $when === true && $href !== null,
        fn ($attributes) => $attributes->merge(['href' => $href])
            ->class([
                ...config('ui.linkClasses'),
                ...config('ui.focusClasses'),
            ])
    )
}}>{{ $slot }}</a>