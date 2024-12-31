export default function(Alpine) {
    Alpine.data('uiToggle', () => ({
        uiToggleAttributes: {
            'role': 'switch',
            'type': 'button',
            'x-modelable': 'checked',
            'x-on:click'() { this.$refs.checkbox.click() },
            // TODO: fix this to work with the real checkbox's state
            ':aria-checked'() { return this.$refs.checkbox?.checked },
        },
    }))
}
