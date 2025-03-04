# Badges

## Using Badges

Use `<ui:badge>` to create a badge of the default variant _(solid)_ and color _(secondary)_.

```html +demo title={Using Badges} previewClasses={py-8 flex items-center justify-center}
<ui:badge>Hello Badge</ui:badge>
```

## Properties

Badges support several properties that can be used to customize their appearance. Here's an overview of all the available properties:

| Property | Type | Default | Description |
|:---|:---|:---|:---|
| `color` | `string \| Color` | `secondary` | The color of the badge. |
| `size` | `string \| Size` | `sm` | The size of the badge. |
| `variant` | `string \| Variant` | `solid` | The variant of the badge. |
| `radius` | `string \| Size` | `sm` | The border radius of the badge. |
| `icon` | `string` | `null` | The icon to display before the badge text. |
| `iconAfter` | `string` | `null` | The icon to display after the badge text. |
| `iconVariant` | `string` | `micro` | The variant of the icon. |
| `href` | `string` | `null` | The URL the badge should link to, making it an anchor element. |

### Linkable Badges

You can make a badge act as a link by using the `href` prop. This will render the badge as an `<a>` element.

```html +demo title={Linkable Badges} previewClasses={flex flex-col sm:flex-row gap-3 items-center justify-center}
<ui:badge href="#happy-little-link">Visit Example</ui:badge>
<ui:badge href="#happy-little-link" color="primary">Primary Link</ui:badge>
```

---

### Colors
Badges support colors `primary`, `secondary` _(default)_, `success`, `warning`, and `danger`.
The `color` prop accepts a string or a `Color` enum to define this value.

```html +demo title={Badge Colors} previewClasses={flex flex-col sm:flex-row gap-3 items-center justify-center}
<ui:badge color="primary">Primary</ui:badge>
<ui:badge color="secondary">Secondary</ui:badge>
<ui:badge color="success">Success</ui:badge>
<ui:badge color="warning">Warning</ui:badge>
<ui:badge color="danger">Danger</ui:badge>
```

### Icons
Easily add an [Icon](/docs/icons) before the badge's text with the `icon` prop.
```html
<ui:badge icon="arrow-left">Icon Example</ui:badge>
```

You can also add an icon after the badge's text with the `icon-after` prop.
```html
<ui:badge icon-after="arrow-right">Icon Example</ui:badge>
```

```html +demo title={Badges with Icons} previewClasses={flex flex-col sm:flex-row gap-3 items-center justify-center}
<ui:badge icon="arrow-left">Icon Before</ui:badge>
<ui:badge icon="arrow-left" icon-after="arrow-right">Why Not Both?</ui:badge>
<ui:badge icon-after="arrow-right">Icon After</ui:badge>
```

### Sizing
Badges support sizes `xs`, `sm` (default), `md`, and `lg`.

```html +demo title={Badge Sizing} previewClasses={flex flex-col sm:flex-row gap-3 sm:items-end justify-center py-4}
<div class="text-center">
    <ui:badge size="xs">Badge</ui:badge>
    <div class="text-sm uppercase tracking-wide opacity-60 mt-1.5">xs</div>
</div>
<div class="text-center">
    <ui:badge size="sm">Badge</ui:badge>
    <div class="text-sm uppercase tracking-wide opacity-60 mt-1.5">sm</div>
</div>
<div class="text-center">
    <ui:badge size="md">Badge</ui:badge>
    <div class="text-sm uppercase tracking-wide opacity-60 mt-1.5">md</div>
</div>
<div class="text-center">
    <ui:badge size="lg">Badge</ui:badge>
    <div class="text-sm uppercase tracking-wide opacity-60 mt-1.5">lg</div>
</div>
```

### Radius

Control the border radius with these options: `none`, `xs`, `sm` (default), `md`, `lg`, `xl`, and `full`.

```html +demo title={Badge Corner Radius} previewClasses={flex flex-col sm:flex-row gap-3 sm:items-end justify-center py-4}
<div class="text-center">
    <ui:badge radius="none">Badge</ui:badge>
    <div class="text-sm uppercase tracking-wide opacity-60 mt-1.5">none</div>
</div>
<div class="text-center">
    <ui:badge radius="xs">Badge</ui:badge>
    <div class="text-sm uppercase tracking-wide opacity-60 mt-1.5">xs</div>
</div>
<div class="text-center">
    <ui:badge radius="sm">Badge</ui:badge>
    <div class="text-sm uppercase tracking-wide opacity-60 mt-1.5">sm</div>
</div>
<div class="text-center">
    <ui:badge radius="md">Badge</ui:badge>
    <div class="text-sm uppercase tracking-wide opacity-60 mt-1.5">md</div>
</div>
<div class="text-center">
    <ui:badge radius="lg">Badge</ui:badge>
    <div class="text-sm uppercase tracking-wide opacity-60 mt-1.5">lg</div>
</div>
<div class="text-center">
    <ui:badge radius="xl">Badge</ui:badge>
    <div class="text-sm uppercase tracking-wide opacity-60 mt-1.5">xl</div>
</div>
<div class="text-center">
    <ui:badge radius="full">Badge</ui:badge>
    <div class="text-sm uppercase tracking-wide opacity-60 mt-1.5">full</div>
</div>
```

### Variant
Badges come in two variants: `solid` _(default)_ and `outline`.

```html +demo title={Solid Variant} previewClasses={flex flex-col sm:flex-row gap-3 sm:items-end justify-center py-4}
<ui:badge color="primary">Primary</ui:badge>
<ui:badge color="secondary">Secondary</ui:badge>
<ui:badge color="success">Success</ui:badge>
<ui:badge color="warning">Warning</ui:badge>
<ui:badge color="danger">Danger</ui:badge>
```

```html +demo title={Outline Variant} previewClasses={flex flex-col sm:flex-row gap-3 sm:items-end justify-center py-4}
<ui:badge color="primary" variant="outline">Primary</ui:badge>
<ui:badge color="secondary" variant="outline">Secondary</ui:badge>
<ui:badge color="success" variant="outline">Success</ui:badge>
<ui:badge color="warning" variant="outline">Warning</ui:badge>
<ui:badge color="danger" variant="outline">Danger</ui:badge>
```
