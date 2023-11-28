@props([
    'checked' => false,
])
@php
$idOrName = $attributes->get('id') ?? $attributes->get('name') ?? false;
$hasError = $idOrName ? $errors?->has($idOrName) ?? false : false;
$isChecked = old() && !empty($checked) && !array_key_exists($attributes->get('name'), old())
    ? false
    : old($attributes->get('name', '_'), $checked)
@endphp
<button
    type="button"
    role="switch"
    x-data="{
        checked: @js($isChecked),
    }"
    x-modelable="checked"
    x-on:click="checked = !checked"
    x-bind:aria-checked="checked"
    x-bind:class="{
        'bg-gray-200 dark:bg-black/25': !checked,
        'bg-primary-500 dark:bg-primary-400/70': checked,
    }"
    {{ $attributes
        ->except('name', 'value')
        ->class([
            'rounded-full border-2',
            'border-transparent' => !$hasError,
            'border-red-500 dark:border-red-400' => $hasError,
            'relative inline-flex h-6 w-11 flex-shrink-0',
            'cursor-pointer group transition-all duration-200 ease-in-out',
            ...config('ui.focusClasses')
        ])
    }}
>
    <span class="sr-only">Use setting</span>
    {{-- Dot --}}
    <span
        x-cloak
        x-bind:class="{
            'translate-x-5 dark:bg-gray-900/90': checked,
            'translate-x-0': !checked,
        }"
        @class([
            'rounded-full relative inline-block h-5 w-5 pointer-events-none',
            'bg-white dark:bg-gray-700 shadow dark:shadow-black/25 ring-0 transition duration-200 ease-in-out',
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
        >
            @if ($iconOn ?? false)
                {{ $iconOn }}
            @else
                <svg class="h-3 w-3 text-primary-600 dark:text-primary-300" fill="currentColor" viewBox="0 0 12 12">
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
        >
            @if ($iconOff ?? false)
                {{ $iconOff }}
            @else
                <svg class="h-3 w-3 text-gray-400" fill="none" viewBox="0 0 12 12">
                    <path d="M4 8l2-2m0 0l2-2M6 6L4 4m2 2l2 2" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                </svg>
            @endempty
        </span>

        {{-- Bind hidden input for normal forms if there's a name attribute --}}
        @if (!$attributes->whereStartsWith('wire:model')->first())
            <input
                type="checkbox"
                class="hidden"
                @checked($isChecked)
                {{ $attributes->merge(['value' => 'on']) }}
            >
        @endif
    </span>
</button>
