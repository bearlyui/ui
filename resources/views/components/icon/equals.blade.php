{{-- Icon from Heroicons (thank you!) - https://heroicons.com/ --}}

@props([
    'variant' => 'outline',
])

<svg xmlns="http://www.w3.org/2000/svg" aria-hidden="true" data-slot="icon" data-ui-icon-equals {{ $attributes
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
            <path fill-rule="evenodd" d="M3.748 8.248a.75.75 0 0 1 .75-.75h15a.75.75 0 0 1 0 1.5h-15a.75.75 0 0 1-.75-.75ZM3.748 15.75a.75.75 0 0 1 .75-.751h15a.75.75 0 0 1 0 1.5h-15a.75.75 0 0 1-.75-.75Z" clip-rule="evenodd"/>
        @break

        @case('outline')  
            <path stroke-linecap="round" stroke-linejoin="round" d="M4.499 8.248h15m-15 7.501h15"/>
        @break

        @case('mini')  
            <path d="M3.75 6a.75.75 0 0 0 0 1.5h12.5a.75.75 0 0 0 0-1.5H3.75ZM3.75 13.5a.75.75 0 0 0 0 1.5h12.5a.75.75 0 0 0 0-1.5H3.75Z"/>
        @break

        @case('micro')  
            <path fill-rule="evenodd" d="M2 4.75A.75.75 0 0 1 2.75 4h10.5a.75.75 0 0 1 0 1.5H2.75A.75.75 0 0 1 2 4.75ZM2 11.25a.75.75 0 0 1 .75-.75h10.5a.75.75 0 0 1 0 1.5H2.75a.75.75 0 0 1-.75-.75Z" clip-rule="evenodd"/>
        @break
    @endswitch
</svg>
