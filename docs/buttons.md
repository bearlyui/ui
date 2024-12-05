# Buttons

## Using Buttons

Use `<ui:button>` to create a button of the default variant and color.

```html +demo title={Using Buttons} previewClasses={py-8 flex items-center justify-center}
<ui:button>Happy Little Button</ui:button>
```

## Properties

Buttons forward all attributes to the underlying `<button></button>` HTML tag. They recognize the following properties to customize behavior, theme, and size.

| Property | Type | Default | Description |
|:---|:---|:---|:---|
| `color` | `string \| Color` | `primary` | The color of the button. |
| `size` | `string \| Size` | `base` | The size of the button. |
| `variant` | `string \| Variant` | `solid` | The variant of the button. |
| `radius` | `string \| Size` | `base` | The border radius of the button. |
| `href` | `string` | `null` | The URL the button should link to. |
| `disabled` | `boolean` | `false` | Whether the button is disabled. |

---

### Colors
Buttons come in 5 colors: `primary`, `secondary` (default), `success`, `warning`, and `danger`.
The `color` prop accepts a string or a `Color` enum to define this value.

```html +demo title={Simple Buttons} previewClasses={grid gap-5 grid-cols-1 sm:grid-cols-2 md:grid-cols-5 items-end justify-center py-12}
<ui:button color="primary">Primary</ui:button>
<ui:button color="secondary">Secondary</ui:button>
<ui:button color="success">Success</ui:button>
<ui:button color="warning">Warning</ui:button>
<ui:button color="danger">Danger</ui:button>
```

### Sizing
Buttons support five sizes: `xs`, `sm`, `md` (default), `lg`, and `xl`. You can
disable default sizing and specify your own by using the size attribute with an unsupported value like `size="none"`.

```html +demo title={Button Sizing} previewClasses={flex space-x-5 items-end justify-center py-12}
<div class="text-center">
    <ui:button size="xs">Button</ui:button>
    <div class="text-sm uppercase tracking-wide opacity-60 mt-1.5">xs</div>
</div>
<div class="text-center">
    <ui:button size="sm">Button</ui:button>
    <div class="text-sm uppercase tracking-wide opacity-60 mt-1.5">sm</div>
</div>
<div class="text-center">
    <ui:button>Button</ui:button>
    <div class="text-sm uppercase tracking-wide opacity-60 mt-1.5">base</div>
</div>
<div class="text-center">
    <ui:button size="md">Button</ui:button>
    <div class="text-sm uppercase tracking-wide opacity-60 mt-1.5">md</div>
</div>
<div class="text-center">
    <ui:button size="lg">Button</ui:button>
    <div class="text-sm uppercase tracking-wide opacity-60 mt-1.5">lg</div>
</div>
<div class="text-center">
    <ui:button size="xl">Button</ui:button>
    <div class="text-sm uppercase tracking-wide opacity-60 mt-1.5">xl</div>
</div>
```

### Radius

Control the border radius with these options: `none`, `sm`, `md` (default), `lg`, `xl`, and `full`.

```html +demo title={Button Sizing} previewClasses={flex space-x-5 items-end justify-center py-12}
<div class="text-center">
    <ui:button radius="none">Button</ui:button>
    <div class="text-sm uppercase tracking-wide opacity-60 mt-1.5">xs</div>
</div>
<div class="text-center">
    <ui:button radius="sm">Button</ui:button>
    <div class="text-sm uppercase tracking-wide opacity-60 mt-1.5">sm</div>
</div>
<div class="text-center">
    <ui:button>Button</ui:button>
    <div class="text-sm uppercase tracking-wide opacity-60 mt-1.5">base</div>
</div>
<div class="text-center">
    <ui:button radius="md">Button</ui:button>
    <div class="text-sm uppercase tracking-wide opacity-60 mt-1.5">md</div>
</div>
<div class="text-center">
    <ui:button radius="lg">Button</ui:button>
    <div class="text-sm uppercase tracking-wide opacity-60 mt-1.5">lg</div>
</div>
<div class="text-center">
    <ui:button radius="xl">Button</ui:button>
    <div class="text-sm uppercase tracking-wide opacity-60 mt-1.5">xl</div>
</div>
<div class="text-center">
    <ui:button radius="full">Button</ui:button>
    <div class="text-sm uppercase tracking-wide opacity-60 mt-1.5">full</div>
</div>
```


### Variant
Buttons come in six variants (flavors if you like that better): `solid` (default), `outline`, `link`, `gradient`, `ghost`, and `glow`.

```html +demo title={Solid Variant} previewClasses={grid gap-5 grid-cols-1 sm:grid-cols-2 md:grid-cols-5 items-end justify-center py-12}
<ui:button>Primary</ui:button>
<ui:button color="secondary">Secondary</ui:button>
<ui:button color="success">Success</ui:button>
<ui:button color="warning">Warning</ui:button>
<ui:button color="danger">Danger</ui:button>
```

```html +demo title={Outline Variant} previewClasses={grid gap-5 grid-cols-1 sm:grid-cols-2 md:grid-cols-5 items-end justify-center py-12}
<ui:button variant="outline">Primary</ui:button>
<ui:button color="secondary" variant="outline">Secondary</ui:button>
<ui:button color="success" variant="outline">Success</ui:button>
<ui:button color="warning" variant="outline">Warning</ui:button>
<ui:button color="danger" variant="outline">Danger</ui:button>
```

```html +demo title={Link Variant} previewClasses={grid gap-5 grid-cols-1 sm:grid-cols-2 md:grid-cols-5 items-end justify-center py-12}
<ui:button variant="link">Primary</ui:button>
<ui:button color="secondary" variant="link">Secondary</ui:button>
<ui:button color="success" variant="link">Success</ui:button>
<ui:button color="warning" variant="link">Warning</ui:button>
<ui:button color="danger" variant="link">Danger</ui:button>
```

```html +demo title={Gradient Variant} previewClasses={grid gap-5 grid-cols-1 sm:grid-cols-2 md:grid-cols-5 items-end justify-center py-12}
<ui:button variant="gradient">Primary</ui:button>
<ui:button color="secondary" variant="gradient">Secondary</ui:button>
<ui:button color="success" variant="gradient">Success</ui:button>
<ui:button color="warning" variant="gradient">Warning</ui:button>
<ui:button color="danger" variant="gradient">Danger</ui:button>
```

```html +demo title={Ghost Variant} previewClasses={grid gap-5 grid-cols-1 sm:grid-cols-2 md:grid-cols-5 items-end justify-center py-12}
<ui:button variant="ghost">Primary</ui:button>
<ui:button color="secondary" variant="ghost">Secondary</ui:button>
<ui:button color="success" variant="ghost">Success</ui:button>
<ui:button color="warning" variant="ghost">Warning</ui:button>
<ui:button color="danger" variant="ghost">Danger</ui:button>
```

```html +demo title={Glow Variant} previewClasses={grid gap-5 grid-cols-1 sm:grid-cols-2 md:grid-cols-5 items-end justify-center py-12}
<ui:button variant="glow">Primary</ui:button>
<ui:button color="secondary" variant="glow">Secondary</ui:button>
<ui:button color="success" variant="glow">Success</ui:button>
<ui:button color="warning" variant="glow">Warning</ui:button>
<ui:button color="danger" variant="glow">Danger</ui:button>
```

### Links (href)
Use the `href` prop to turn a button into a link. It uses an `onclick` handler to redirect to the specified URL since buttons don't have the `href` attribute in HTML. If you really want it to be an anchor tag (`<a>`), use [the link component](/docs/links) instead.

```html +demo title={Buttons as Links} previewClasses={flex items-center justify-center py-6}
<ui:button href="https://laravel.com" variant="glow" color="danger">This Button Links to the Laravel Docs</ui:button>
```

### Disabled State
Each variant also has a disabled state. The `disabled` prop accepts a boolean value.

```html +demo title={Solid Variant (Disabled)} previewClasses={grid gap-5 grid-cols-1 sm:grid-cols-2 md:grid-cols-5 items-end justify-center py-12}
<ui:button :disabled="true">Primary</ui:button>
<ui:button :disabled="true" color="secondary">Secondary</ui:button>
<ui:button :disabled="true" color="success">Success</ui:button>
<ui:button :disabled="true" color="warning">Warning</ui:button>
<ui:button :disabled="true" color="danger">Danger</ui:button>
```

```html +demo title={Outline Variant (Disabled)} previewClasses={grid gap-5 grid-cols-1 sm:grid-cols-2 md:grid-cols-5 items-end justify-center py-12}
<ui:button :disabled="true" variant="outline">Primary</ui:button>
<ui:button :disabled="true" color="secondary" variant="outline">Secondary</ui:button>
<ui:button :disabled="true" color="success" variant="outline">Success</ui:button>
<ui:button :disabled="true" color="warning" variant="outline">Warning</ui:button>
<ui:button :disabled="true" color="danger" variant="outline">Danger</ui:button>
```

```html +demo title={Link Variant (Disabled)} previewClasses={grid gap-5 grid-cols-1 sm:grid-cols-2 md:grid-cols-5 items-end justify-center py-12}
<ui:button :disabled="true" variant="link">Primary</ui:button>
<ui:button :disabled="true" color="secondary" variant="link">Secondary</ui:button>
<ui:button :disabled="true" color="success" variant="link">Success</ui:button>
<ui:button :disabled="true" color="warning" variant="link">Warning</ui:button>
<ui:button :disabled="true" color="danger" variant="link">Danger</ui:button>
```

```html +demo title={Gradient Variant (Disabled)} previewClasses={grid gap-5 grid-cols-1 sm:grid-cols-2 md:grid-cols-5 items-end justify-center py-12}
<ui:button :disabled="true" variant="gradient">Primary</ui:button>
<ui:button :disabled="true" color="secondary" variant="gradient">Secondary</ui:button>
<ui:button :disabled="true" color="success" variant="gradient">Success</ui:button>
<ui:button :disabled="true" color="warning" variant="gradient">Warning</ui:button>
<ui:button :disabled="true" color="danger" variant="gradient">Danger</ui:button>
```

```html +demo title={Ghost Variant (Disabled)} previewClasses={grid gap-5 grid-cols-1 sm:grid-cols-2 md:grid-cols-5 items-end justify-center py-12}
<ui:button :disabled="true" variant="ghost">Primary</ui:button>
<ui:button :disabled="true" color="secondary" variant="ghost">Secondary</ui:button>
<ui:button :disabled="true" color="success" variant="ghost">Success</ui:button>
<ui:button :disabled="true" color="warning" variant="ghost">Warning</ui:button>
<ui:button :disabled="true" color="danger" variant="ghost">Danger</ui:button>
```

```html +demo title={Glow Variant (Disabled)} previewClasses={grid gap-5 grid-cols-1 sm:grid-cols-2 md:grid-cols-5 items-end justify-center py-12}
<ui:button :disabled="true" variant="glow">Primary</ui:button>
<ui:button :disabled="true" color="secondary" variant="glow">Secondary</ui:button>
<ui:button :disabled="true" color="success" variant="glow">Success</ui:button>
<ui:button :disabled="true" color="warning" variant="glow">Warning</ui:button>
<ui:button :disabled="true" color="danger" variant="glow">Danger</ui:button>
```
