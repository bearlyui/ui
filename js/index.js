import dialog from './dialog'

export default function(Alpine) {
    document.addEventListener('alpine:init', () => {
        dialog(Alpine)
    })
}
