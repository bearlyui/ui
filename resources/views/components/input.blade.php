@php
    $idOrName = $attributes->get('id') ?? $attributes->get('name') ?? false;
    $hasError = $idOrName ? $errors?->has($idOrName) ?? false : false;
    $value = old($attributes->get('name', '_'), null);
@endphp
<input
    {{ $attributes->class([
        {{-- Base Styles --}}
        'rounded-md shadow-sm transition ease-out',
        {{-- Color styles --}}
        'bg-white text-gray-700',
        'dark:bg-gray-200/5 dark:hover:bg-white/5 dark:text-white/70',
        {{-- Focus styles --}}
        ...config('ui.focusClasses'),
        {{-- Error styles --}}
        'border-gray-300 focus:border-gray-300 dark:border-gray-600/60 dark:focus:border-gray-600/60' => !$hasError,
        'border-red-400 focus:border-red-400 dark:border-red-300 dark:focus:border-red-300' => $hasError,
    ])->merge([
        'type' => 'text',
    ])
    ->when(
        $attributes->whereStartsWith('wire:model')->first(),
        fn ($a) => $a->except('value'),
        fn ($a) => $a->merge(['value' => $value])
    ) }}
>
