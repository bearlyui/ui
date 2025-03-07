export default function(Alpine) {
    Alpine.data('uiMenu', () => ({
        init() {
            // Build select tag options based on menu item children
            const menuItems = this.$el.querySelectorAll('[data-ui-menu-item]')
            const select = this.$refs.mobileSelect

            if (select && menuItems.length) {
                menuItems.forEach(item => {
                    const option = document.createElement('option')
                    option.textContent = item.querySelector('.truncate').textContent.trim()
                    option.value = item.getAttribute('href')

                    // Set selected if the menu item is active (has aria-current attribute)
                    if (item.hasAttribute('aria-current')) {
                        option.selected = true
                    }

                    select.appendChild(option)
                })
            }
        },

        navigateToSelection() {
            const select = this.$refs.mobileSelect
            if (select && select.value) {
                window.location.href = select.value
            }
        }
    }))
}
