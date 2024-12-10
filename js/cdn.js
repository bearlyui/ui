import { ui } from './index'

document.addEventListener('alpine:init', () => {
    ui(window.Alpine)
})
