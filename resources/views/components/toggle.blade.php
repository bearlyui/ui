@use('Bearly\Ui\Color')

@props([
    'withIcon' => true,
    'color' => Color::Primary,
    'name' => $attributes->whereStartsWith('wire:model')->first(),
    'value' => 'on',
    'checked' => false,
])

@php
$trackClasses = match($color) {
    Color::Primary, 'primary' => 'bg-primary-500 dark:bg-primary-400/70 text-primary-600 dark:text-primary-200',
    Color::Secondary, 'secondary'  => 'bg-secondary-500 dark:bg-secondary-400/70 text-secondary-600 dark:text-secondary-200',
    Color::Success, 'success'  => 'bg-success-500 dark:bg-success-400/70 text-success-600 dark:text-success-200',
    Color::Warning, 'warning'  => 'bg-warning-500 dark:bg-warning-400/70 text-warning-600 dark:text-warning-200',
    Color::Danger, 'danger'  => 'bg-danger-500 dark:bg-danger-400/70 text-danger-600 dark:text-danger-200',
    default => ''
};

@endphp

<button
    type="button"
    role="switch"
    x-data="uiToggle(@js($checked))"
    x-bind="uiToggleAttributes"
    x-bind:class="{
        'bg-gray-200 dark:bg-gray-950/25': !checked,
        @js($trackClasses): checked,
    }"
    {{ $attributes
        ->whereDoesntStartWith('x-model')
        ->whereDoesntStartWith('wire:model')
        ->class([
            'group rounded-full border-2',
            {{-- 'border-transparent' => !$hasError,
            'border-red-500 dark:border-red-400' => $hasError, --}}
            'relative inline-flex h-6 w-11 flex-shrink-0',
            'outline focus:outline outline-1 focus:outline-1 outline-black/10 outline-offset-[-1px] dark:outline-white/10',
            'cursor-pointer group transition-all duration-200 ease-in-out',
            'focus:ring-2 focus:ring-offset-2 focus:ring-primary-500 focus:ring-offset-white/80',
            'dark:focus:ring-primary-400 dark:focus:ring-offset-black/80',

        ])
    }}
>
    <span class="sr-only">{{ $name }}</span>

    {{-- Dot --}}
    <span
        x-cloak
        x-bind:class="{
            'translate-x-5 bg-white dark:bg-gray-800': checked,
            'translate-x-0 bg-gray-50 group-hover:bg-white dark:bg-gray-700 dark:group-hover:bg-gray-600': !checked,
        }"
        @class([
            'rounded-full relative inline-block h-5 w-5 pointer-events-none transition duration-200 ease-in-out',
            'shadow dark:shadow-black/25 ring-0',
        ])
    >
        {{-- "On" icon --}}
        <span
            aria-hidden="true"
            x-bind:class="{
                'opacity-100 duration-200 ease-in': checked,
                'opacity-0 duration-100 ease-out': !checked,
                'absolute inset-0 flex h-full w-full': true,
                'items-center justify-center transition-opacity': true,
            }"
            @class(['hidden' => !$withIcon])
        >
            @if ($iconOn ?? false)
                {{ $iconOn }}
            @else
                <svg class="h-3 w-3" fill="currentColor" viewBox="0 0 12 12">
                    <path d="M3.707 5.293a1 1 0 00-1.414 1.414l1.414-1.414zM5 8l-.707.707a1 1 0 001.414 0L5 8zm4.707-3.293a1 1 0 00-1.414-1.414l1.414 1.414zm-7.414 2l2 2 1.414-1.414-2-2-1.414 1.414zm3.414 2l4-4-1.414-1.414-4 4 1.414 1.414z" />
                </svg>
            @endif
        </span>

        {{-- "Off" icon --}}
        <span
            aria-hidden="true"
            x-bind:class="{
                'opacity-0 duration-100 ease-out': checked,
                'opacity-100 duration-200 ease-in': !checked,
                'absolute inset-0 flex h-full w-full items-center justify-center transition-opacity': true,
            }"
            @class(['hidden' => !$withIcon])
        >
            @if ($iconOff ?? false)
                {{ $iconOff }}
            @else
                <svg class="h-3 w-3 transition duration-200 ease-in-out text-gray-400 group-hover:text-gray-500 dark:group-hover:text-gray-200" fill="none" viewBox="0 0 12 12">
                    <path d="M4 8l2-2m0 0l2-2M6 6L4 4m2 2l2 2" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                </svg>
            @endempty
        </span>


        {{-- Bind a hidden checkbox so everything works well with x-model, wire:model, and normal form submits --}}
        <input
            type="checkbox"
            x-ref="checkbox"
            aria-hidden="true"
            name="{{ $name }}"
            value="{{ $value }}"
            x-model="checked"
            x-on:change="console.log('change', $el.checked)"
            x-effect="console.log('effect', $el.checked)"
            {{ $attributes
                ->wire('model')
                {{-- ->class('invisible opacity-0') --}}
            }}
        >
    </span>
{{-- CHK: <span x-text="checked"></span> --}}
</button>

{{-- <ui:error :for="$name" /> --}}
