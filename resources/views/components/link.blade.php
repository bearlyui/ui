{{-- There should be NO NEWLINES AT THE END OF THIS FILE. NO COMMENTS. NO SPACES. --}}
@props([
    'when' => true,
    'href' => null,
])
<a {{ $attributes
    ->when(
        $when === true && $href !== null,
        fn ($attributes) => $attributes->merge(['href' => $href])->class('text-primary-600 hover:text-primary-800 dark:text-primary-400 dark:hover:text-primary-200')
    )
}}>{{ $slot }}</a>