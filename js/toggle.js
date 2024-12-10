export default function(Alpine) {
    Alpine.data('uiToggle', (checked) => ({
        checked: checked,

        uiToggleAttributes: {
            'x-modelable': 'checked',
            'x-on:click'() { this.$refs.checkbox.click() },
            ':aria-checked'() { return this.checked },
        },
    }))
}
