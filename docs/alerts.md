# Alerts

## Using Alerts
Alerts are nearly as effective as a bear's growl for getting your users' attention. Use `<ui:alert>` to create an alert. They use the `outline` variant and the `primary` color values by default.

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
<ui:alert
    :dismiss="true"
    x-init="$watch('open', value => { setTimeout(() => { open = true }, 750) })"
>Dismiss me, if you please</ui:alert>
```

```html +demo title={Manual Control with Alpine.js}
<ui:alert
    :dismiss="true"
    x-init="$watch('open', value => { setTimeout(() => { open = true }, 750) })"
>Dismiss me, if you please</ui:alert>
```
