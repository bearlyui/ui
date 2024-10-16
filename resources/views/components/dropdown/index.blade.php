@props([
    'open' => false,
    'offset' => 4,
    'position' => 'bottom',
])
<span
    x-id="['dropdown-trigger', 'dropdown-items']"
    x-data="{
        open: @js($open),
        anchorTo: $refs.trigger,
        focusableTrigger: null,
        activeItem: null,
        searchQuery: '',
        searchTimer: undefined,
        openDropdown() {
            this.open = true
            if (this.activeItem == null) {
                this.activeItem = $refs.content.firstElementChild
            }
            $nextTick(() => $focus.focus(this.activeItem))
        },
        closeDropdown() {
            this.open = false
            $nextTick(() => {
                if (this.focusableTrigger) {
                    this.focusableTrigger.focus({ preventScroll: true })
                }
            })
        },
        toggle() {
            this.open ? this.closeDropdown() : this.openDropdown()
        },
        init() {
            $nextTick(() => {
                if (this.focusableTrigger.hasAttribute('id')) return
                this.focusableTrigger.setAttribute('id', this.$id('dropdown-trigger'))
            })
        },
        search(e) {
            if (!e.key || e.key.length > 1) {
                return
            }

            this.searchQuery += e.key

            const found = Array.from($refs.content.children).find((child) => {
                return child.textContent.trim().toLowerCase().startsWith(this.searchQuery.toLowerCase())
            })

            if (found) {
                this.activeItem = found
                $focus.focus(found)
            }

            this.resetSearch()
        },
        resetSearch() {
            clearTimeout(this.searchTimer)
            this.searchTimer = setTimeout(() => {
                this.searchQuery = ''
            }, 500)
        }
    }"
>
    {{-- Trigger --}}
    <span
        x-ref="trigger"
        x-init="focusableTrigger = $focus.getFirst()"
        x-on:click.prevent="toggle()"
        class="inline-block"
        aria-haspopup="true"
        :aria-expanded="open"
        :aria-controls="open && $id('dropdown-items')"
        :id="$id('dropdown-trigger')"
    >{{ $trigger }}</span>

    {{-- Content --}}
    <template x-teleport="body">
        <span
            x-anchor.{{ $position }}.offset.{{ $offset }}="anchorTo"
            x-on:click.outside="closeDropdown"
            class="w-min"
        >
            <span
                x-transition
                x-ref="content"
                x-show="open"
                x-trap="open"
                role="menu"
                aria-orientation="vertical"
                :id="$id('dropdown-items')"
                :aria-labelledby="$id('dropdown-trigger')"
                :aria-activedescendant="activeItem && activeItem.id"
                x-on:keydown="search"
                {{ $attributes->class([
                    'block p-1.5 rounded transition-all ease-in-out',
                    'shadow-xl backdrop-blur-xl border',
                    'bg-white/80 border-black/15',
                    'dark:bg-gray-700/80 dark:border-white/10',
                ]) }}
            >{{ $slot }}</span>
        </span>
    </template>
</span>
