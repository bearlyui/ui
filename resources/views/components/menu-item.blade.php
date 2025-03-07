@props([
    'href' => null,
    'icon' => null,
    'iconVariant' => 'micro',
    'active' => request()->url() === $href,
])

<a
    data-ui-menu-item
    {{ $attributes
        ->class([
            ...config('ui.focusClasses'),
            'group flex items-center px-3 py-2 text-sm font-medium rounded-md transition-all ease-in-out',
            'focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary-500',
            'bg-primary-100/70 text-primary-700 dark:bg-primary-400/20 dark:text-primary-50' => $active,
            'text-gray-600/80 hover:bg-gray-50 hover:text-gray-900 dark:text-gray-300/80 dark:hover:bg-gray-700/50 dark:hover:text-gray-100' => !$active,
        ])
        ->merge(['href' => $href])
        ->when($active, fn ($a) => $a->merge(['aria-current' => 'page']))
    }}
>
    @if ($icon)
        <x-dynamic-component
            :component="'icon.' . $icon"
            :variant="$iconVariant"
            class="{{ $active ? 'text-primary-500 dark:text-primary-400' : 'text-gray-400 group-hover:text-gray-500 dark:text-gray-500 dark:group-hover:text-gray-400' }} mr-3 flex-shrink-0 h-5 w-5 opacity-70"
        />
    @endif
    <span class="truncate">{{ $slot }}</span>
</a>
