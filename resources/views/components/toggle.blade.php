@use('Bearly\Ui\Color')

@props([
    'withIcon' => true,
    'color' => Color::Secondary,
    'name' => $attributes->whereStartsWith('wire:model')->first(),
    'value' => 'on',
])

@php
$trackClasses = match($color) {
    Color::Primary, 'primary' => 'has-[input:checked]:bg-primary-500/80 dark:has-[input:checked]:bg-primary-400/60 has-[input:checked]:text-primary-600 dark:has-[input:checked]:text-primary-200',
    Color::Secondary, 'secondary'  => 'has-[input:checked]:bg-secondary-500/80 dark:has-[input:checked]:bg-secondary-400/60',
    Color::Success, 'success'  => 'has-[input:checked]:bg-success-500/80 dark:has-[input:checked]:bg-success-400/60 has-[input:checked]:text-success-600 dark:has-[input:checked]:text-success-200',
    Color::Warning, 'warning'  => 'has-[input:checked]:bg-warning-500/80 dark:has-[input:checked]:bg-warning-400/60 has-[input:checked]:text-warning-600 dark:has-[input:checked]:text-warning-200',
    Color::Danger, 'danger'  => 'has-[input:checked]:bg-danger-500/80 dark:has-[input:checked]:bg-danger-400/60 has-[input:checked]:text-danger-600 dark:has-[input:checked]:text-danger-200',
    default => ''
};

@endphp

<button
    type="button"
    role="switch"
    x-data="uiToggle"
    x-bind="uiToggleAttributes"
    {{ $attributes
        ->when(
            {{-- This when clause needs to be first! --}}
            $attributes->whereStartsWith('wire:model')->isNotEmpty(),
            fn($a) => $a->merge(['x-bind:aria-checked' =>
                'Array.isArray($wire.' . $a->wire('model')->value . ') ? ' .
                '$wire.' . $a->wire('model')->value . '.includes("' . $value . '") : ' .
                '$wire.' . $a->wire('model')->value
            ])
        )
        ->class([
            'group/toggle rounded-full border-2 border-transparent',
            'bg-gray-200 dark:bg-gray-950/70 dark:hover:bg-gray-900/70',
            {{-- <ui:error :for="$name" /> --}}
            {{-- 'border-transparent' => !$hasError,
            'border-red-500 dark:border-red-400' => $hasError, --}}
            'relative inline-flex h-6 w-11 flex-shrink-0',
            'outline focus:outline outline-1 focus:outline-1 outline-black/10  dark:outline-gray-500/10',
            'cursor-pointer transition-all duration-200 ease-in-out',
            'focus:ring-2 focus:ring-offset-2 focus:ring-primary-500 focus:ring-offset-white/80',
            'dark:focus:ring-primary-400 dark:focus:ring-offset-black/80',
            $trackClasses,
        ])
        ->whereDoesntStartWith('x-model')
        ->whereDoesntStartWith('wire:model')
        ->except(['checked'])
    }}
>
    <span class="sr-only">{{ $name }}</span>

    {{-- Dot --}}
    <span
        x-cloak
        @class([
            'rounded-full relative inline-block h-5 w-5 pointer-events-none transition duration-200 ease-in-out',
            'shadow dark:shadow-black/25 ring-0',
            'translate-x-0 bg-gray-50 group-hover/toggle:bg-white dark:bg-gray-700 dark:group-hover/toggle:bg-gray-600',

            {{-- Checked state --}}
            'has-[input:checked]:translate-x-5 has-[input:checked]:bg-white dark:has-[input:checked]:bg-gray-900 dark:has-[input:checked]:group-hover/toggle:bg-gray-900',
        ])
    >
        {{-- "On" icon --}}
        <span
            aria-hidden="true"
            data-ui-toggle-icon-on
            @class([
                'hidden' => !$withIcon,
                'has-[~input:checked]:opacity-100 dark:has-[~input:checked]:text-gray-50',
                'opacity-0 dark:text-gray-400',
                'absolute inset-0 flex h-full w-full items-center justify-center transition-opacity ease-out ',
            ])
        >
            @if ($iconOn ?? false)
                {{ $iconOn }}
            @else
                <svg class="size-3" fill="currentColor" viewBox="0 0 12 12">
                    <path d="M3.707 5.293a1 1 0 00-1.414 1.414l1.414-1.414zM5 8l-.707.707a1 1 0 001.414 0L5 8zm4.707-3.293a1 1 0 00-1.414-1.414l1.414 1.414zm-7.414 2l2 2 1.414-1.414-2-2-1.414 1.414zm3.414 2l4-4-1.414-1.414-4 4 1.414 1.414z" />
                </svg>
            @endif
        </span>

        {{-- Hidden checkbox --}}
        <input
            type="checkbox"
            x-ref="checkbox"
            aria-hidden="true"
            name="{{ $name }}"
            value="{{ $value }}"
            x-effect="console.log('effect', $el.checked)"
            @checked($attributes->get('checked') ?? false)
            class="invisible opacity-0 pointer-events-none"
            {{ $attributes->wire('model') }}
        >

        {{-- "Off" icon --}}
        <span
            aria-hidden="true"
            data-ui-toggle-icon-off
            @class([
                'hidden' => !$withIcon,
                '[input:checked~&]:opacity-0',
                'opacity-100 dark:text-gray-400',
                'absolute inset-0 flex h-full w-full items-center justify-center transition-opacity ease-in',
            ])
        >
            @if ($iconOff ?? false)
                {{ $iconOff }}
            @else
                <svg class="size-3" fill="none" viewBox="0 0 12 12">
                    <path d="M4 8l2-2m0 0l2-2M6 6L4 4m2 2l2 2" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                </svg>
            @endempty
        </span>
    </span> {{-- Dot --}}
</button>
