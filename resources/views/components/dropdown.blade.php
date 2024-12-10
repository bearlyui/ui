@props([
    'offset' => 4,
    'position' => 'bottom',
])
<span
    x-id="['dropdown-trigger', 'dropdown-items']"
    x-data="uiDropdown"
>
    {{-- Trigger --}}
    <span class="inline-block" x-bind="uiTrigger">{{ $trigger }}</span>

    {{-- Content --}}
    <template x-teleport="body">
        <span
            x-anchor.{{ $position }}.offset.{{ $offset }}="$refs.trigger"
            x-on:click.outside="closeDropdown"
            class="w-min"
        >
            <span
                x-bind="uiDropdownContent"
                {{ $attributes->class([
                    'block p-1.5 rounded transition-all ease-in-out',
                    'shadow-xl backdrop-blur-xl ring-1',
                    'bg-white/60 ring-black/5',
                    'dark:bg-gray-700/60 dark:ring-white/20',
                ]) }}
            >{{ $slot }}</span>
        </span>
    </template>
</span>
