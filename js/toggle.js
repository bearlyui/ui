export default function(Alpine) {
    Alpine.data('uiToggle', () => ({
        checked: false,

        uiToggleAttributes: {
            'role': 'switch',
            'type': 'button',
            'x-modelable': 'checked',
            'x-on:click'() { this.$refs.checkbox.click() },
            ':aria-checked'() { return this.checked },
        },
    }))
}
