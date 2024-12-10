import dialog from './dialog'

export const ui = function (alpine) {
    dialog(alpine)
}

export default function (alpine) {
    document.addEventListener('alpine:init', () => {
        ui(alpine)
    })
}
