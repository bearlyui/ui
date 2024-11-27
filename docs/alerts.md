# Alerts

Alerts are almost as a bear's growl for getting your users' attention. You can customize their color, variant, and even add dismissable functionality.

```html +demo title={Alert Examples} previewClasses={space-y-4}
<ui:alert color="primary" :dismissable="true" x-init="$watch('open', value => { setTimeout(() => { open = true }, 750) })">I'm a primary alert, hear me roar!</ui:alert>
<ui:alert color="secondary" :dismissable="true" x-init="$watch('open', value => { setTimeout(() => { open = true }, 750) })">I'm a secondary alert, hear me roar!</ui:alert>
<ui:alert color="success" :dismissable="true" x-init="$watch('open', value => { setTimeout(() => { open = true }, 750) })">I'm a success alert, hear me roar!</ui:alert>
<ui:alert color="warning" :dismissable="true" x-init="$watch('open', value => { setTimeout(() => { open = true }, 750) })">I'm a warning alert, hear me roar!</ui:alert>
<ui:alert color="error" :dismissable="true" x-init="$watch('open', value => { setTimeout(() => { open = true }, 750) })">I'm a error alert, hear me roar!</ui:alert>
```

## Using Alerts

Use the `<ui:alert>` component for simple alerts. Specify a color theme with the
`color` attribute to change the alert's color. The default color is `primary`, but
you can use `secondary`, `success`, `warning`, and `error` if you need to.

```html +demo title={Basic Alert}
<ui:alert>I'm a default alert.</ui:alert>
```

## Properties

### Title
Use the `title` property (or slot) to include a title in your alert.

```html +demo title={Alert with Title} previewClasses={space-y-10}
<ui:alert title="Alert With a Title">Use titles when it makes sense.</ui:alert>
```

### Color
The `color` property change the look of your alert. It defaults to `primary`,
but `success`, `warning`, and `error` are also valid. These are interchangeable with
the following enumerations if you prefer to use those instead:
- `Bearly\Ui\Color::Primary`
- `Bearly\Ui\Color::Success`
- `Bearly\Ui\Color::Warning`
- `Bearly\Ui\Color::Error`

```html +demo title={Available Color Themes} previewClasses={space-y-6}
<ui:alert>I'm a primary themed alert</ui:alert>
<ui:alert color="secondary">I'm a secondary themed alert</ui:alert>
<ui:alert color="success">Happy little success message</ui:alert>
<ui:alert color="warning">Warning, don't mess with this one</ui:alert>
<ui:alert color="error">Error 406 - brain not found</ui:alert>
```

### Variant
There are two options for **variant** -- `glow` and `outline`. The default is `glow`.
These are interchangeable with `Bearly\Ui\Variant::Glow` and `Bearly\Ui\Variant::Outline` enumerations.

```html +demo title={Available Variants} previewClasses={space-y-3}
<ui:alert>This alert is the glow variant</ui:alert>
<ui:alert color="secondary">This alert is the glow variant</ui:alert>
<ui:alert color="success">This alert is the glow variant</ui:alert>
<ui:alert color="warning">This alert is the glow variant</ui:alert>
<ui:alert color="error">This alert is the glow variant</ui:alert>
<hr class="border-black/10 dark:border-white/15 !my-5">
<ui:alert variant="outline">This alert is the outline variant</ui:alert>
<ui:alert color="secondary" variant="outline">This alert is the outline variant</ui:alert>
<ui:alert color="success" variant="outline">This alert is the outline variant</ui:alert>
<ui:alert color="warning" variant="outline">This alert is the outline variant</ui:alert>
<ui:alert color="error" variant="outline">This alert is the outline variant</ui:alert>
```

### Dismissable
You can include a close button on your alert by setting the `dismissable` property to `true`.

```html +demo title={Dismissable Alert}
<ui:alert :dismissable="true" x-init="$watch('open', value => { setTimeout(() => { open = true }, 750) })">You can dismiss me!</ui:alert>
```


## Slots
The main content of your alert goes in the default slot. You can also use the following slots.

### Icon
The icon slot puts content absolutely positioned at the top right of the alert.
It also desaturates and reduces the opacity a little bit. Usually this is used for an SVG such as an icon [from the Heriocons set](https://heroicons.com).

```html +demo title={Alert with Icon}
<ui:alert color="error">
    <x-slot:icon class="mt-0 opacity-10">
        <svg class="w-10 h-10" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" d="m20.25 7.5-.625 10.632a2.25 2.25 0 0 1-2.247 2.118H6.622a2.25 2.25 0 0 1-2.247-2.118L3.75 7.5m8.25 3v6.75m0 0-3-3m3 3 3-3M3.375 7.5h17.25c.621 0 1.125-.504 1.125-1.125v-1.5c0-.621-.504-1.125-1.125-1.125H3.375c-.621 0-1.125.504-1.125 1.125v1.5c0 .621.504 1.125 1.125 1.125Z" />
        </svg>
    </x-slot:icon>
    Background icons can give helpful context.
</ui:alert>
```


### Button
The button slot puts content at the right of the alert and centers it vertically.
```html +demo
    <ui:alert>
        <x-slot:button>
            <ui:button>Go Wild!</ui:button>
        </x-slot:button>
        I'm just a bear.
    </ui:alert>
```
### Title
As an alternative to the `title` property, you can use the `title` slot to include a title.

```html +demo title={Title Slot}
<ui:alert>
    <x-slot:title>Alert With a Title</x-slot:title>
    Use titles when it makes sense.
</ui:alert>
```
