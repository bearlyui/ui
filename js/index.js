import dialog from './dialog'

export const UI = function UI(Alpine) {
    document.addEventListener('alpine:init', () => {
        dialog(Alpine)
    })
}

export default UI
