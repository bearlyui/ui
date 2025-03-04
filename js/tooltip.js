export default function(Alpine) {
    Alpine.data('uiTooltip', (title) => ({
        show: false,
        title: title,
        openHandler: null,
        closeHandler: null,

        init() {
            if (this.trigger.hasAttribute('data-ui-button-content')) {
                this.trigger = this.trigger.parentNode
            }

            this.openHandler = () => { this.show = true }
            this.closeHandler = () => { this.show = false }
            this.trigger.addEventListener('mouseenter', this.openHandler)
            this.trigger.addEventListener('mouseleave', this.closeHandler)
        },

        destroy() {
            this.trigger.removeEventListener('mouseenter', this.openHandler)
            this.trigger.removeEventListener('mouseleave', this.closeHandler)
        }
    }))
}
