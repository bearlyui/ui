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
            <path fill-rule="evenodd" d="M21.53 9.53a.75.75 0 0 1-1.06 0l-4.72-4.72V15a6.75 6.75 0 0 1-13.5 0v-3a.75.75 0 0 1 1.5 0v3a5.25 5.25 0 1 0 10.5 0V4.81L9.53 9.53a.75.75 0 0 1-1.06-1.06l6-6a.75.75 0 0 1 1.06 0l6 6a.75.75 0 0 1 0 1.06Z" clip-rule="evenodd"/>
        @break

        @case('outline')  
            <path stroke-linecap="round" stroke-linejoin="round" d="m9 9 6-6m0 0 6 6m-6-6v12a6 6 0 0 1-12 0v-3"/>
        @break

        @case('mini')  
            <path fill-rule="evenodd" d="M17.768 7.793a.75.75 0 0 1-1.06-.025L12.75 3.622v10.003a5.375 5.375 0 0 1-10.75 0V10.75a.75.75 0 0 1 1.5 0v2.875a3.875 3.875 0 0 0 7.75 0V3.622L7.293 7.768a.75.75 0 0 1-1.086-1.036l5.25-5.5a.75.75 0 0 1 1.085 0l5.25 5.5a.75.75 0 0 1-.024 1.06Z" clip-rule="evenodd"/>
        @break

        @case('micro')  
            <path fill-rule="evenodd" d="M6.25 12.5A2.75 2.75 0 0 0 9 9.75V4.56L6.78 6.78a.75.75 0 0 1-1.06-1.06l3.5-3.5a.75.75 0 0 1 1.06 0l3.5 3.5a.75.75 0 0 1-1.06 1.06L10.5 4.56v5.19a4.25 4.25 0 0 1-8.5 0v-1a.75.75 0 0 1 1.5 0v1a2.75 2.75 0 0 0 2.75 2.75Z" clip-rule="evenodd"/>
        @break
    @endswitch
</svg>
