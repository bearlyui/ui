import dialog from './dialog'
import dropdown from './dropdown'

export const ui = function (alpine) {
    dialog(alpine)
    dropdown(alpine)
}

export default function (alpine) {
    document.addEventListener('alpine:init', () => {
        ui(alpine)
    })
}
