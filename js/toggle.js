export default function(Alpine) {
    Alpine.data('uiToggle', () => ({
        init() {
            this.$el.setAttribute('aria-checked', this.$refs.checkbox.checked);
        },

        uiToggleAttributes: {
            'role': 'switch',
            'type': 'button',
            'x-on:click'() {
                this.$refs.checkbox.click();
            },
        },

        uiToggleCheckboxAttributes: {
            'x-on:change'() {
                this.$root.setAttribute('aria-checked', this.$refs.checkbox.checked);
            }
        },
    }))
}
