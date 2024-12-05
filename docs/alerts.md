# Alerts

Alerts are nearly as effective as a bear's growl for getting your users' attention. Use `<ui:alert>` to create an alert.

```html +demo title={Alert Examples} previewClasses={space-y-4}
<ui:alert color="primary" :dismissable="true" x-init="$watch('open', value => { setTimeout(() => { open = true }, 750) })">I'm a primary alert, hear me roar!</ui:alert>
<ui:alert color="secondary" :dismissable="true" x-init="$watch('open', value => { setTimeout(() => { open = true }, 750) })">I'm a secondary alert, hear me roar!</ui:alert>
<ui:alert color="success" :dismissable="true" x-init="$watch('open', value => { setTimeout(() => { open = true }, 750) })">I'm a success alert, hear me roar!</ui:alert>
<ui:alert color="warning" :dismissable="true" x-init="$watch('open', value => { setTimeout(() => { open = true }, 750) })">I'm a warning alert, hear me roar!</ui:alert>
<ui:alert color="danger" :dismissable="true" x-init="$watch('open', value => { setTimeout(() => { open = true }, 750) })">I'm a danger alert, hear me roar!</ui:alert>
```

## Colors

Alerts support the following colors: `primary`, `secondary`, `success`, `warning`, and `danger`.


## Using Alerts

Use `<ui:alert>` to create an alert using the default variant (`outline`) and color (`primary`).

Available properties include `color`, `variant`, and `dismissable`.


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
but `success`, `warning`, and `danger` are also valid. These are interchangeable with
the following enumerations if you prefer to use those instead:
- `Bearly\Ui\Color::Primary`
- `Bearly\Ui\Color::Success`
- `Bearly\Ui\Color::Warning`
- `Bearly\Ui\Color::Danger`

```html +demo title={Available Color Themes} previewClasses={space-y-6}
<ui:alert>I'm a primary themed alert</ui:alert>
<ui:alert color="secondary">I'm a secondary themed alert</ui:alert>
<ui:alert color="success">Happy little success message</ui:alert>
<ui:alert color="warning">Warning, don't mess with this one</ui:alert>
<ui:alert color="danger">Error 406 - brain not found</ui:alert>
```

### Variant
There are three options for **variant** -- `outline`, `solid` and `glow`. The default is `outline`.
These are interchangeable with `Bearly\Ui\Variant::Glow` and `Bearly\Ui\Variant::Outline` enumerations.

```html +demo title={Available Variants} previewClasses={space-y-3}
<ui:alert color="primary" variant="outline">Primary outline variant</ui:alert>
<ui:alert color="secondary" variant="outline">Secondary outline variant</ui:alert>
<ui:alert color="success" variant="outline">Successful outline variant</ui:alert>
<ui:alert color="warning" variant="outline">Warning outline variant</ui:alert>
<ui:alert color="danger" variant="outline">Danger outline variant</ui:alert>
<hr class="border-black/10 dark:border-white/15 !my-5">
<ui:alert color="primary" variant="solid">Primary solid variant</ui:alert>
<ui:alert color="secondary" variant="solid">Secondary solid variant</ui:alert>
<ui:alert color="success" variant="solid">Successful solid variant</ui:alert>
<ui:alert color="warning" variant="solid">Warning solid variant</ui:alert>
<ui:alert color="danger" variant="solid">Danger solid variant</ui:alert>
<hr class="border-black/10 dark:border-white/15 !my-5">
<ui:alert color="primary" variant="glow">Primary glow variant</ui:alert>
<ui:alert color="secondary" variant="glow">Secondary glow variant</ui:alert>
<ui:alert color="success" variant="glow">Successful glow variant</ui:alert>
<ui:alert color="warning" variant="glow">Warning glow variant</ui:alert>
<ui:alert color="danger" variant="glow">Danger glow variant</ui:alert>
```

### Dismissable
You can include a close button on your alert by setting the `dismissable` property to `true`.

```html +demo title={Dismissable Alert}
<ui:alert :dismissable="true" x-init="$watch('open', value => { setTimeout(() => { open = true }, 750) })">You can dismiss me!</ui:alert>
```
