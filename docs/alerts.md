# Alerts

## Using Alerts
Alerts! Very important stuff! Why are we yelling? Use `<ui:alert>` to create an alert. They use the `outline` variant and the `primary` color values by default. They can be dismissed, and support all the colors and variants listed in the [Colors](#colors) and [Variants](#variants) sections.

```html +demo title={Default Alert} previewClasses={space-y-4}
<ui:alert>I'm a default alert.</ui:alert>
```


## Colors

Alerts support the following values for the `color` property: `primary` _(default)_, `secondary`, `success`, `warning`, and `danger`.

```html +demo title={Alert Colors} previewClasses={space-y-4}
<ui:alert color="primary">I'm a primary alert.</ui:alert>
<ui:alert color="secondary">I'm a secondary alert.</ui:alert>
<ui:alert color="success">I'm an alert of success.</ui:alert>
<ui:alert color="warning">I'm a warning alert, you've been warned!</ui:alert>
<ui:alert color="danger">I'm a scary alert, danger is my middle name!</ui:alert>
```

## Variants

Alerts support the following values for the `variant` property: `outline` _(default)_, `solid`, and `glow`.

```html +demo title={Alert Colors} previewClasses={space-y-4}
<ui:alert variant="outline">I'm an outline variant. The default.</ui:alert>
<ui:alert variant="solid">I'm a solid variant.</ui:alert>
<ui:alert variant="glow">I'm a glow variant.</ui:alert>
```

## Icons

You can easily include an [Icon](/docs/icons) in your alert by using the `icon` property.

```html
<ui:alert icon="exclamation-triangle">I'm an alert with an icon.</ui:alert>
```

```html +demo title={Alert Icons} previewClasses={space-y-4}
<ui:alert color="primary" icon="question-mark-circle">I'm a primary alert.</ui:alert>
<ui:alert color="secondary" icon="information-circle">I'm a secondary alert.</ui:alert>
<ui:alert color="success" icon="check-circle">I'm an alert of success.</ui:alert>
<ui:alert color="warning" icon="exclamation-circle">I'm a warning alert, you've been warned!</ui:alert>
<ui:alert color="danger" icon="exclamation-triangle">I'm a scary alert, danger is my middle name!</ui:alert>
```

### Icon Variants

The icon variant can be set using the `iconVariant` property.

```html
<ui:alert color="primary" icon="exclamation-triangle" icon-variant="solid">
    I'm a primary alert with a solid icon.
</ui:alert>
```

## Dismissable
You may optionally include a close button on your alert by setting the `dismiss` property to `true`:
```html
<ui:alert :dismiss="true">Dismiss me, if you please</ui:alert>
```

```html +demo title={Alert Colors} previewClasses={space-y-4}
<ui:alert color="primary" :dismiss="true" x-init="$watch('open', value => { setTimeout(() => { open = true }, 750) })">Dismiss me, if you please</ui:alert>
```

### Using Alpine

If you need manual control over the alert dismissal, set the `open` property with Alpine.js. For example:
```html
<ui:alert :dismiss="true">Dismiss me, if you please</ui:alert>
```

```html +demo title={Manual Control with Alpine.js}
<ui:alert
    :dismiss="true"
    x-init="$watch('open', value => { setTimeout(() => { open = true }, 750) })"
>Dismiss me, if you please</ui:alert>
```
