{{-- Icon from Heroicons (thank you!) - https://heroicons.com/ --}}

@props([
    'variant' => 'outline',
])

<svg xmlns="http://www.w3.org/2000/svg" aria-hidden="true" data-slot="icon" data-ui-icon-arrow-small-down {{ $attributes
    ->when(
        $variant === 'outline',
        fn ($a) => $a->merge([
            'fill' => 'none',
            'viewBox' => '0 0 24 24',
            'stroke-width' => '1.5',
            'stroke' => 'currentColor',
            'data-ui-icon-variant' => 'outline',
        ])->class('size-6')
    )->when(
        $variant === 'solid', fn ($a) => $a->merge([
            'viewBox' => '0 0 24 24',
            'fill' => 'currentColor',
            'data-ui-icon-variant' => 'solid',
        ])->class('size-6')
    )->when(
        $variant === 'mini', fn ($a) => $a->merge([
            'viewBox' => '0 0 20 20',
            'fill' => 'currentColor',
            'data-ui-icon-variant' => 'mini',
        ])->class('size-5')
    )->when(
        $variant === 'micro', fn ($a) => $a->merge([
            'viewBox' => '0 0 16 16',
            'fill' => 'currentColor',
            'data-ui-icon-variant' => 'micro',
        ])->class('size-4')
    ) }}
>
    @switch($variant)
        @case('solid')  
            <path fill-rule="evenodd" d="M12 3.75a.75.75 0 0 1 .75.75v13.19l5.47-5.47a.75.75 0 1 1 1.06 1.06l-6.75 6.75a.75.75 0 0 1-1.06 0l-6.75-6.75a.75.75 0 1 1 1.06-1.06l5.47 5.47V4.5a.75.75 0 0 1 .75-.75Z" clip-rule="evenodd"/>
        @break

        @case('outline')  
            <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m0 0 6.75-6.75M12 19.5l-6.75-6.75"/>
        @break

        @case('mini')  
            <path fill-rule="evenodd" d="M10 5a.75.75 0 0 1 .75.75v6.638l1.96-2.158a.75.75 0 1 1 1.08 1.04l-3.25 3.5a.75.75 0 0 1-1.08 0l-3.25-3.5a.75.75 0 1 1 1.08-1.04l1.96 2.158V5.75A.75.75 0 0 1 10 5Z" clip-rule="evenodd"/>
        @break

        @case('micro')404: Not Found
        @break
    @endswitch
</svg>
