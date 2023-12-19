@props([
    'theme' => 'primary',
    'title' => null,
    'button' => null,
    'icon' => null,
    'dismissable' => false,
])

{{-- Considerations

- [x] Button slot?
- [x] Icon slot?
- [ ] Should they be dismissable?
- [ ] Several variants? Glow, bordered, etc...
- [ ] Accessibility
- [ ] Enums for theme or variants?
 --}}

<div
    x-data="{
        show: true,
    }"
    x-show="show"
    x-transition
    {{ $attributes->class([
        'relative overflow-hidden rounded transition ease-in-out',
        'shadow-t border bg-white dark:bg-gray-950/40',
        'px-4 py-2',
        'flex items-center justify-between' => $button,

        {{-- Primary Theme --}}
        'text-primary-600 shadow-primary-400/60 border-primary-500/40' => $theme === 'primary',
        'dark:text-primary-400 dark:shadow-primary-300/60 dark:border-primary-300/40' => $theme === 'primary',
        {{-- Success Theme --}}
        'text-green-600 shadow-green-400/60 border-green-500/40' => $theme === 'success',
        'dark:text-green-400 dark:shadow-green-300/60 dark:border-green-300/40' => $theme === 'success',
        {{-- Warning Theme --}}
        'text-amber-600 shadow-amber-400/60 border-amber-500/40' => $theme === 'warning',
        'dark:text-amber-400 dark:shadow-amber-300/60 dark:border-amber-300/40' => $theme === 'warning',
        {{-- Error Theme --}}
        'text-red-600 shadow-red-400/60 border-red-500/40' => $theme === 'error',
        'dark:text-red-400 dark:shadow-red-300/60 dark:border-red-300/40' => $theme === 'error',
    ]) }}
>
    <div>
        @if ($title)
            <h4 @class([
                'text-lg font-medium tracking-tight',
                'text-primary-700 dark:text-primary-200' => $theme === 'primary',
                'text-green-700 dark:text-green-200' => $theme === 'success',
                'text-amber-700 dark:text-amber-200' => $theme === 'warning',
                'text-red-700 dark:text-red-200' => $theme === 'error',
            ])>{{ $title }}</h4>
        @endif
        {{-- <div class="bg-gradient-to-b from-primary-800 shadow-r shadow-pink-400 to-amber-800 w-[4px] absolute left-0 inset-y-0">&nbsp;</div> --}}
        <div @class(['mt-1.5' => $title])>{{ $slot }}</div>
    </div>
    @if ($icon)
        <div {{ $icon->attributes->class([
            'absolute top-0 right-0 mt-2 opacity-30 saturate-[.7]',
            'mr-2' => !$dismissable,
            'mr-7' => $dismissable,
        ]) }}>
            {{ $icon }}
        </div>
    @endif
    @if ($dismissable && !$button)
        <button
            type="button"
            @class([
                'absolute top-0 right-0 mr-2 transition ease-in-out rounded',
                'mt-2' => $title,
                'inset-y-0' => !$title,
                'text-gray-400 hover:text-gray-800',
                'dark:text-white/30 dark:hover:text-white/70',
                ...config('ui.focusClasses')
            ])
            @keyup.enter="show = false"
            @keyup.space="show = false"
            @click.prevent="show = false"
        >
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" data-slot="icon" class="w-5 h-5">
                <path d="M6.28 5.22a.75.75 0 0 0-1.06 1.06L8.94 10l-3.72 3.72a.75.75 0 1 0 1.06 1.06L10 11.06l3.72 3.72a.75.75 0 1 0 1.06-1.06L11.06 10l3.72-3.72a.75.75 0 0 0-1.06-1.06L10 8.94 6.28 5.22Z" />
            </svg>
        </button>
    @endif
    {{ $button }}
</div>
