import alert from './alert'
import dialog from './dialog'
import dropdown from './dropdown'
import tooltip from './tooltip'

export const ui = function (alpine) {
    alert(alpine)
    dialog(alpine)
    dropdown(alpine)
    tooltip(alpine)
}

export default function (alpine) {
    document.addEventListener('alpine:init', () => {
        ui(alpine)
    })
}
