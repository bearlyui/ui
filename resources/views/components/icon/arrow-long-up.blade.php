{{-- Icon from Heroicons (thank you!) - https://heroicons.com/ --}}

@props([
    'variant' => 'outline',
])

<svg xmlns="http://www.w3.org/2000/svg" aria-hidden="true" data-slot="icon" data-ui-icon-arrow-long-up {{ $attributes
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
            <path fill-rule="evenodd" d="M11.47 2.47a.75.75 0 0 1 1.06 0l3.75 3.75a.75.75 0 0 1-1.06 1.06l-2.47-2.47V21a.75.75 0 0 1-1.5 0V4.81L8.78 7.28a.75.75 0 0 1-1.06-1.06l3.75-3.75Z" clip-rule="evenodd"/>
        @break

        @case('outline')  
            <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 6.75 12 3m0 0 3.75 3.75M12 3v18"/>
        @break

        @case('mini')  
            <path fill-rule="evenodd" d="M10 18a.75.75 0 0 1-.75-.75V4.66L7.3 6.76a.75.75 0 0 1-1.1-1.02l3.25-3.5a.75.75 0 0 1 1.1 0l3.25 3.5a.75.75 0 1 1-1.1 1.02l-1.95-2.1v12.59A.75.75 0 0 1 10 18Z" clip-rule="evenodd"/>
        @break

        @case('micro')  
            <path fill-rule="evenodd" d="M8 14a.75.75 0 0 0 .75-.75V4.56l1.22 1.22a.75.75 0 1 0 1.06-1.06l-2.5-2.5a.75.75 0 0 0-1.06 0l-2.5 2.5a.75.75 0 0 0 1.06 1.06l1.22-1.22v8.69c0 .414.336.75.75.75Z" clip-rule="evenodd"/>
        @break
    @endswitch
</svg>
