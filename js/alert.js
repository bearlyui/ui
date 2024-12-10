import { useHeadingsAsLabelAndDescription } from './utils'

export default function(Alpine) {
    Alpine.data('uiAlert', () => ({
        open: true,

        init() {
            this.$nextTick(() => useHeadingsAsLabelAndDescription(this.$el, 'ui-alert'))
        },

        uiAlertAttributes: {
            'x-id'() { return ['ui-alert-title', 'ui-alert-description'] },
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
