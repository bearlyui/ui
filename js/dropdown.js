export default function(Alpine) {
    Alpine.data('uiDropdown', () => ({
        open: false,
        focusableTrigger: null,
        activeItem: null,
        searchQuery: '',
        searchTimer: undefined,

        init() {
            this.$nextTick(() => {
                if (this.focusableTrigger.hasAttribute('id')) return
                this.focusableTrigger.setAttribute('id', this.$id('dropdown-trigger'))
            })
        },

        openDropdown() {
            this.open = true
            if (this.activeItem == null) {
                this.activeItem = this.$refs.content.firstElementChild
            }
            this.$nextTick(() => this.$focus.focus(this.activeItem))
        },

        closeDropdown() {
            this.open = false
            this.$nextTick(() => {
                if (this.focusableTrigger) {
                    this.focusableTrigger.focus({ preventScroll: true })
                }
            })
        },

        toggle() {
            this.open ? this.closeDropdown() : this.openDropdown()
        },

        search(e) {
            if (!e.key || e.key.length > 1) {
                return
            }

            this.searchQuery += e.key

            // Look for the first child with textContent that starts with the search query
            const found = Array.from(this.$refs.content.children).find((child) => {
                return child.textContent.trim().toLowerCase().startsWith(this.searchQuery.toLowerCase())
            })

            if (found) {
                this.activeItem = found
                this.$focus.focus(found)
            }

            this.resetSearch()
        },

        resetSearch() {
            clearTimeout(this.searchTimer)
            this.searchTimer = setTimeout(() => {
                this.searchQuery = ''
            }, 500)
        },

        uiDropdownTrigger: {
            'x-ref': 'trigger',
            'x-init'() { this.focusableTrigger = this.$focus.getFirst() },
            'x-on:click.prevent'() { this.toggle() },
            'aria-haspopup': true,
            ':aria-expanded'() { return this.open },
            ':aria-controls'() { return this.open && this.$id('dropdown-items') },
            ':id'() { return this.$id('dropdown-trigger') },
        },
        uiDropdownContent: {
            'x-transition': true,
            'x-ref': 'content',
            'x-show'() { return this.open },
            'x-trap'() { return this.open },
            'x-on:keydown': 'search',
            ':id'() { return this.$id('dropdown-items') },
            'role': 'menu',
            'aria-orientation': 'vertical',
            ':aria-labelledby'() { return this.$id('dropdown-trigger') },
            ':aria-activedescendant'() { return this.activeItem && this.activeItem.id },
        },
        uiDropdownItem: {
            'role': 'menuitem',
            ':id'() { return this.$id('dropdown-menu-item') },
            '@focus'() { this.activeItem = this.$el },
            '@keydown.escape.stop.prevent'() { this.closeDropdown() },
            '@keydown.home.stop.prevent'() { this.$focus.within(this.$el.parentNode.closest('[role=menu]')).wrap().first() },
            '@keydown.end.stop.prevent'() { this.$focus.within(this.$el.parentNode.closest('[role=menu]')).wrap().last() },
            '@keydown.page-up.stop.prevent'() { this.$focus.within(this.$el.parentNode.closest('[role=menu]')).wrap().first() },
            '@keydown.page-down.stop.prevent'() { this.$focus.within(this.$el.parentNode.closest('[role=menu]')).wrap().last() },
            '@keydown.arrow-left.stop.prevent'() { this.$focus.within(this.$el.parentNode.closest('[role=menu]')).wrap().previous() },
            '@keydown.arrow-up.stop.prevent'() { this.$focus.within(this.$el.parentNode.closest('[role=menu]')).wrap().previous() },
            '@keydown.arrow-right.stop.prevent'() { this.$focus.within(this.$el.parentNode.closest('[role=menu]')).wrap().next() },
            '@keydown.arrow-down.stop.prevent'() { this.$focus.within(this.$el.parentNode.closest('[role=menu]')).wrap().next() },
            '@keydown.space.stop.prevent'() { this.$el.click() },
            '@keydown.enter.stop.prevent'() { this.$el.click() },
        },
    }))
}
