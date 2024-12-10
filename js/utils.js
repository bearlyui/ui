export const useHeadingsAsLabelAndDescription = (el,prefix) => {
    const heading = el.querySelector('[data-ui-heading]')
    if (heading) {
        heading.setAttribute('x-bind:id', `$id('${prefix}-title')`)
        el.setAttribute('x-bind:aria-labelledby', `$id('${prefix}-title')`)
    }

    const subheading = el.querySelector('[data-ui-subheading]')
    if (subheading) {
        subheading.setAttribute('x-bind:id', `$id('${prefix}-description')`)
        el.setAttribute('x-bind:aria-describedby', `$id('${prefix}-description')`)
    }
}
