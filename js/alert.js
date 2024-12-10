export default function(Alpine) {
    Alpine.data('uiAlert', () => ({
        open: true,

        init() {
            this.$nextTick(() => {
                const heading = this.$el.querySelector('[data-ui-heading]')
                if (heading) {
                    heading.setAttribute('x-bind:id', '$id(\'alert-title\')')
                    this.$el.setAttribute('x-bind:aria-labelledby', '$id(\'alert-title\')')
                }

                const subheading = this.$el.querySelector('[data-ui-subheading]')
                if (subheading) {
                    subheading.setAttribute('x-bind:id', '$id(\'alert-description\')')
                    this.$el.setAttribute('x-bind:aria-describedby', '$id(\'alert-description\')')
                }
            })
        },

        uiAlertAttributes: {
            'x-id'() { return ['alert-title', 'alert-description'] },
            'x-show'() { return this.open },
            'x-transition:enter': 'transition ease-out duration-300',
            'x-transition:enter-start': 'opacity-0 scale-75 translate-y-full',
            'x-transition:enter-end': 'opacity-100 scale-[1.02] -translate-y-1',
            'x-transition:leave': 'transition ease-in-out duration-300',
            'x-transition:leave-start': 'opacity-100 scale-100 -translate-y-full',
            'x-transition:leave-end': 'opacity-0 scale-75 translate-y-full',
        },

        uiAlertClose: {
            'x-ref': 'closeButton',
            '@keyup.enter'() { return this.open = false },
            '@keyup.space'() { return this.open = false },
            '@click.prevent'() { return this.open = false },
        },

    }))
}
