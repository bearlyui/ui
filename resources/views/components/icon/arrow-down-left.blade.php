{{-- Icon from Heroicons (thank you!) - https://heroicons.com/ --}}

@props([
    'variant' => 'outline',
])

<svg xmlns="http://www.w3.org/2000/svg" aria-hidden="true" data-slot="icon" data-ui-icon-arrow-down-left {{ $attributes
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
            <path fill-rule="evenodd" d="M20.03 3.97a.75.75 0 0 1 0 1.06L6.31 18.75h9.44a.75.75 0 0 1 0 1.5H4.5a.75.75 0 0 1-.75-.75V8.25a.75.75 0 0 1 1.5 0v9.44L18.97 3.97a.75.75 0 0 1 1.06 0Z" clip-rule="evenodd"/>
        @break

        @case('outline')  
            <path stroke-linecap="round" stroke-linejoin="round" d="m19.5 4.5-15 15m0 0h11.25m-11.25 0V8.25"/>
        @break

        @case('mini')  
            <path fill-rule="evenodd" d="M14.78 5.22a.75.75 0 0 0-1.06 0L6.5 12.44V6.75a.75.75 0 0 0-1.5 0v7.5c0 .414.336.75.75.75h7.5a.75.75 0 0 0 0-1.5H7.56l7.22-7.22a.75.75 0 0 0 0-1.06Z" clip-rule="evenodd"/>
        @break

        @case('micro')  
            <path fill-rule="evenodd" d="M11.78 4.22a.75.75 0 0 1 0 1.06L6.56 10.5h3.69a.75.75 0 0 1 0 1.5h-5.5a.75.75 0 0 1-.75-.75v-5.5a.75.75 0 0 1 1.5 0v3.69l5.22-5.22a.75.75 0 0 1 1.06 0Z" clip-rule="evenodd"/>
        @break
    @endswitch
</svg>
