<script>
    const htmlElementClasses = document.documentElement.classList
    const toggleDarkmode = () => {
        // Assure the change happens instantly, otherwise elements with
        // differing transition durations might transition at different rates
        htmlElementClasses.add('[&_*]:!transition-none')
        window.setTimeout(() => { htmlElementClasses.remove('[&_*]:!transition-none') }, 0)

        htmlElementClasses.toggle('dark', this.on)
    }

    const darkModeSetting = window.matchMedia('(prefers-color-scheme: dark)');
    darkModeSetting.addEventListener('change', (event) => { toggleDarkmode(event.matches) })
    darkModeSetting.matches && toggleDarkmode()
</script>
