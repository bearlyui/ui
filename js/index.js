import alert from './alert'
import dialog from './dialog'
import dropdown from './dropdown'
import toggle from './toggle'
import tooltip from './tooltip'

export const ui = function (alpine) {
    alert(alpine)
    dialog(alpine)
    dropdown(alpine)
    toggle(alpine)
    tooltip(alpine)
}

export default function (alpine) {
    document.addEventListener('alpine:init', () => {
        ui(alpine)
    })
}
