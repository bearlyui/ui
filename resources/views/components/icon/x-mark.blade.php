@props([
    'variant' => 'outline',
])

<svg xmlns="http://www.w3.org/2000/svg" aria-hidden="true" data-slot="icon" {{ $attributes
    ->when(
        $variant === 'outline',
        fn ($a) => $a->merge([
            'fill' => 'none',
            'viewBox' => '0 0 24 24',
            'stroke-width' => '1.5',
            'stroke' => 'currentColor'
        ])->class('size-6')
    )->when(
        $variant === 'solid', fn ($a) => $a->merge([
            'viewBox' => '0 0 24 24',
            'fill' => 'currentColor',
        ])->class('size-6')
    )->when(
        $variant === 'mini', fn ($a) => $a->merge([
            'viewBox' => '0 0 20 20',
            'fill' => 'currentColor',
        ])->class('size-5')
    )->when(
        $variant === 'micro', fn ($a) => $a->merge([
            'viewBox' => '0 0 16 16',
            'fill' => 'currentColor',
        ])->class('size-4')
    ) }}
>
    @switch($variant)
        @case('solid')  
            <path fill-rule="evenodd" d="M5.47 5.47a.75.75 0 0 1 1.06 0L12 10.94l5.47-5.47a.75.75 0 1 1 1.06 1.06L13.06 12l5.47 5.47a.75.75 0 1 1-1.06 1.06L12 13.06l-5.47 5.47a.75.75 0 0 1-1.06-1.06L10.94 12 5.47 6.53a.75.75 0 0 1 0-1.06Z" clip-rule="evenodd"/>
        @break

        @case('outline')  
            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12"/>
        @break

        @case('mini')  
            <path d="M6.28 5.22a.75.75 0 0 0-1.06 1.06L8.94 10l-3.72 3.72a.75.75 0 1 0 1.06 1.06L10 11.06l3.72 3.72a.75.75 0 1 0 1.06-1.06L11.06 10l3.72-3.72a.75.75 0 0 0-1.06-1.06L10 8.94 6.28 5.22Z"/>
        @break

        @case('micro')  
            <path d="M5.28 4.22a.75.75 0 0 0-1.06 1.06L6.94 8l-2.72 2.72a.75.75 0 1 0 1.06 1.06L8 9.06l2.72 2.72a.75.75 0 1 0 1.06-1.06L9.06 8l2.72-2.72a.75.75 0 0 0-1.06-1.06L8 6.94 5.28 4.22Z"/>
        @break
    @endswitch
</svg>
