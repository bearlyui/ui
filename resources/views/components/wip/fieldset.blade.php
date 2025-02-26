@props(['legend' => null])
<fieldset
    {{ $attributes->class([
        'px-6 py-4 border border-black/5 bg-gray-50/30 dark:bg-black/10 dark:border-white/10 rounded-sm',
    ]) }}
>
    <legend
        @if ($legend instanceof \Illuminate\View\ComponentSlot)
            {{ $legend->attributes->class([
                'text-sm px-2 opacity-70',
            ]) }}
        @else
            class="text-sm px-2 opacity-70"
        @endif
    >{{ $legend }}</legend>
    {{ $slot }}
</fieldset>
