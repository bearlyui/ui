@props([
    'symbols' => true,
])
@php
    $key = str($slot)
        ->lower()
        ->trim()
        ->when(
            $symbols === true,
            fn ($key) => $key
                ->replace(' ', '')
                ->replace('ctrl', '⌃')
                ->replace('control', '⌃')
                ->replace('cmd', '⌘')
                ->replace('command', '⌘')
                ->replace('shift', '⇧')
                ->replace('alt', '⌥')
                ->replace('option', '⌥')
                ->replace('esc', '⎋')
                ->replace('escape', '⎋')
                ->replace('backspace', '⌫')
                ->replace('delete', '⌦')
                ->replace('enter', '⏎')
                ->replace('return', '⏎')
        );
@endphp
<kbd {{ $attributes-> class([
    'inline-block text-center py-0.5 px-1 min-w-[20px]',
    'font-sans text-[11px] align-baseline font-medium capitalize',
    'border-[0.5px] border-b-[2.5px] rounded-[3px] shadow-sm',
    'bg-white border-gray-300/90 text-gray-700/80',
    'dark:bg-white/7.5 dark:border-white/10 dark:border-b-gray-900/90 dark:text-gray-100',
]) }}>{{ $key }}</kbd>
