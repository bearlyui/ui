import { useHeadingsAsLabelAndDescription } from './utils'

export default function(Alpine) {
    Alpine.data('uiDialog', () => ({
        open: false,
        removedAriaHidden: false,
        init() {
            this.$nextTick(() => useHeadingsAsLabelAndDescription(this.$refs.content, 'ui-dialog'))
        },
        openDialog() {
            this.open = true

            if (this.$refs.dialog.hasAttribute('aria-hidden')) {
                this.$refs.dialog.removeAttribute('aria-hidden')
                this.removedAriaHidden = true
            }
        },
        closeDialog() {
            this.open = false
            this.removedAriaHidden && $refs.dialog.setAttribute('aria-hidden', 'true')
        },

        uiDialogAttributes: {
            'x-show'() { return this.open },
            'x-trap.inert.noscroll'() { return this.open },
            'x-on:keyup.escape.window'() { this.$refs.dialog.getAttribute('aria-hidden') === null && this.closeDialog() },
            'x-ref': 'dialog' ,
            'x-id'() { return ['ui-dialog-title', 'ui-dialog-description'] },
        },

        uiDialogTrigger: {
            ':aria-expanded'() { return this.open },
            ':aria-controls'() { return this.open && this.$id('ui-dialog-content') },
            'x-on:click.stop'() { return this.openDialog() }
        },

        uiDialogOverlay: {
            'x-show'() { return this.open },
            'x-transition:enter.opacity.delay.0ms': '',
            'x-transition:leave.delay.0ms.duration.0ms': '',
            'x-on:click.stop'() { return this.closeDialog() },
        },

        uiDialogContent: {
            'role': 'dialog',
            'aria-modal': true,
            'x-ref': 'content',
            'x-show'() { return this.open },
            'x-transition:enter': 'transition-all ease-out origin-bottom',
            'x-transition:enter-start': 'translate-y-full sm:opacity-0 sm:scale-90 sm:translate-y-4',
            'x-transition:enter-end': 'translate-y-0 sm:opacity-100 sm:scale-100 sm:translate-y-0',
            'x-transition:leave': 'duration-0 delay-0',
            ':id'() { return this.$id('ui-dialog-content') },
        },

        uiDialogClose: {
            'x-ref': 'close',
            'x-on:click': 'closeDialog',
        },

        uiDialogMobileDragToClose: {
            'x-data'() {
                return {
                    start: null,
                    current: null,
                    dragging: false,
                    get distance() {
                        return this.dragging ? Math.max(0, this.current - this.start) : 0
                    },
                }
            },
            'x-on:touchstart'(event) {
                this.dragging = true
                this.start = this.current = event.touches[0].clientY
            },
            'x-on:touchmove'(event) { this.current = event.touches[0].clientY },
            'x-on:touchend'() {
                if (this.distance > 100) {
                    this.closeDialog()
                    this.dragging = false
                }
            },
            'x-effect'() { this.$el.parentElement.style.transform = `translateY(${this.distance}px)` },
        }
    }))
}
