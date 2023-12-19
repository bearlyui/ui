@props([
    'theme' => 'primary',
    'title' => null,
])

{{-- Considerations

- Other slots? Icons, Title, etc...
- Several variants? Glow, bordered, etc...
- Should they be dismissable?
 --}}

<div {{ $attributes->class([
    'relative overflow-hidden rounded px-4 py-2 transition ease-in-out',
    'shadow-t border bg-white dark:bg-gray-950/40',
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
]) }}>
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
