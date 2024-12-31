export default function(Alpine) {
    Alpine.data('uiToggle', () => ({
        init() {
            const checkbox = this.$refs.checkbox;
            const switchEl = this.$el;

            // Set initial state
            switchEl.setAttribute('aria-checked', checkbox.checked);

            // Watch for both programmatic and user-initiated changes
            checkbox.addEventListener('change', () => {
                switchEl.setAttribute('aria-checked', checkbox.checked);
            });

            // Try to intercept programmatic changes
            const descriptor = Object.getOwnPropertyDescriptor(HTMLInputElement.prototype, 'checked');
            Object.defineProperty(checkbox, 'checked', {
                get: function() {
                    return descriptor.get.call(this);
                },
                set: function(value) {
                    descriptor.set.call(this, value);
                    switchEl.setAttribute('aria-checked', value);
                },
                configurable: true
            });
        },

        uiToggleAttributes: {
            'role': 'switch',
            'type': 'button',
            'x-on:click'() {
                this.$refs.checkbox.click();
            },
        },
    }))
}
