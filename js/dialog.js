export default function(Alpine) {
    Alpine.data('uiDialog', () => ({
        open: false,
        removedAriaHidden: false,
        init() {
            this.$el.setAttribute('x-modelable', 'open')
            this.$nextTick(() => {
                const heading = this.$refs.content.querySelector('[data-ui-heading]')
                if (heading) {
                    heading.setAttribute('x-bind:id', '$id(\'ui-dialog-title\')')
                    this.$refs.content.setAttribute('x-bind:aria-labelledby', '$id(\'ui-dialog-title\')')
                }

                const subheading = this.$refs.content.querySelector('[data-ui-subheading]')
                if (subheading) {
                    subheading.setAttribute('x-bind:id', '$id(\'ui-dialog-description\')')
                    this.$refs.content.setAttribute('x-bind:aria-describedby', '$id(\'ui-dialog-description\')')
                }
            })
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
            this.$refs.close?.setAttribute('inert', 'true')
        },

        uiDialogContainer: {
            'x-show'() { return this.open },
            ['x-trap.inert.noscroll']() { return this.open },
            ['x-on:keyup.escape.window']() { this.$refs.dialog.getAttribute('aria-hidden') === null && this.closeDialog() },
            ['x-ref']: 'dialog' ,
            ['x-id']() { return ['ui-dialog-title', 'ui-dialog-description'] },
        },

        uiDialogOverlay: {
            'x-show'() { return this.open },
            ['x-transition:enter.opacity.delay.0ms']: '',
            ['x-transition:leave.delay.0ms.duration.0ms']: '',
            ['x-on:click.stop']() { return this.closeDialog() },
        },

        uiDialogContent: {
            ['role']: 'dialog',
            ['aria-modal']: true,
            ['x-ref']: 'content',
            'x-show'() { return this.open },
            ['x-transition:enter']: 'transition ease-out duration-150 delay-75 origin-bottom',
            ['x-transition:enter-start']: 'opacity-0 transform scale-90 translate-y-4',
            ['x-transition:enter-end']: 'opacity-100 transform scale-100 translate-y-0',
            ['x-transition:leave.duration.0ms.delay.0ms']: '',
        },

        uiDialogClose: {
            ['inert']: true,
            ['x-ref']: 'close',
            ['x-on:click']: 'closeDialog',
            ['x-effect']() { return this.open && setTimeout(() => this.$el.removeAttribute('inert'), 100) },
        }
    }))
}
