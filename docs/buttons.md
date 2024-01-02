# Buttons

## Using Buttons

Use `<x-ui::button>` to create a button of the default variant and color.

```html +demo title={Using Buttons} previewClasses={py-8 flex items-center justify-center}
<x-ui::button>Happy Little Button</x-ui::button>
```

## Properties

Buttons forward all attributes to the underlying `<button></button>` HTML tag by default. They also recognize the following properties in order to customize behavior, theme, and size.

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
Buttons come in 5 colors: `primary` (default), `secondary`, `success`, `warning`, and `error`.
The `color` prop accepts a string or a `Color` enum to define this value.

```html +demo title={Simple Buttons} previewClasses={grid gap-5 grid-cols-1 sm:grid-cols-2 md:grid-cols-5 items-end justify-center py-12}
<x-ui::button>Primary</x-ui::button>
<x-ui::button color="secondary">Secondary</x-ui::button>
<x-ui::button color="success">Success</x-ui::button>
<x-ui::button color="warning">Warning</x-ui::button>
<x-ui::button color="error">Error</x-ui::button>
```

### Sizing
Buttons come in 5 sizes: `xs`, `sm`, `md` (default), `lg`, and `xl`. You can
disable any default sizing and specify your own by including `size="none"`.

```html +demo title={Button Sizing} previewClasses={flex space-x-5 items-end justify-center py-12}
<div class="text-center">
    <x-ui::button size="xs">Button</x-ui::button>
    <div class="text-sm uppercase tracking-wide opacity-60 mt-1.5">xs</div>
</div>
<div class="text-center">
    <x-ui::button size="sm">Button</x-ui::button>
    <div class="text-sm uppercase tracking-wide opacity-60 mt-1.5">sm</div>
</div>
<div class="text-center">
    <x-ui::button>Button</x-ui::button>
    <div class="text-sm uppercase tracking-wide opacity-60 mt-1.5">base</div>
</div>
<div class="text-center">
    <x-ui::button size="md">Button</x-ui::button>
    <div class="text-sm uppercase tracking-wide opacity-60 mt-1.5">md</div>
</div>
<div class="text-center">
    <x-ui::button size="lg">Button</x-ui::button>
    <div class="text-sm uppercase tracking-wide opacity-60 mt-1.5">lg</div>
</div>
<div class="text-center">
    <x-ui::button size="xl">Button</x-ui::button>
    <div class="text-sm uppercase tracking-wide opacity-60 mt-1.5">xl</div>
</div>
```

### Radius

Control the amount of corner rounding with the radii: `none`, `sm`, `md` (default), `lg`, `xl`, and `full`.

```html +demo title={Button Sizing} previewClasses={flex space-x-5 items-end justify-center py-12}
<div class="text-center">
    <x-ui::button radius="none">Button</x-ui::button>
    <div class="text-sm uppercase tracking-wide opacity-60 mt-1.5">xs</div>
</div>
<div class="text-center">
    <x-ui::button radius="sm">Button</x-ui::button>
    <div class="text-sm uppercase tracking-wide opacity-60 mt-1.5">sm</div>
</div>
<div class="text-center">
    <x-ui::button>Button</x-ui::button>
    <div class="text-sm uppercase tracking-wide opacity-60 mt-1.5">base</div>
</div>
<div class="text-center">
    <x-ui::button radius="md">Button</x-ui::button>
    <div class="text-sm uppercase tracking-wide opacity-60 mt-1.5">md</div>
</div>
<div class="text-center">
    <x-ui::button radius="lg">Button</x-ui::button>
    <div class="text-sm uppercase tracking-wide opacity-60 mt-1.5">lg</div>
</div>
<div class="text-center">
    <x-ui::button radius="xl">Button</x-ui::button>
    <div class="text-sm uppercase tracking-wide opacity-60 mt-1.5">xl</div>
</div>
<div class="text-center">
    <x-ui::button radius="full">Button</x-ui::button>
    <div class="text-sm uppercase tracking-wide opacity-60 mt-1.5">full</div>
</div>
```


### Variant
Buttons come in 6 variants (themes if you like that better): `solid` (default), `outline`, `link`, `gradient`, `ghost`, and `glow`.

```html +demo title={Solid Variant} previewClasses={grid gap-5 grid-cols-1 sm:grid-cols-2 md:grid-cols-5 items-end justify-center py-12}
<x-ui::button>Primary</x-ui::button>
<x-ui::button color="secondary">Secondary</x-ui::button>
<x-ui::button color="success">Success</x-ui::button>
<x-ui::button color="warning">Warning</x-ui::button>
<x-ui::button color="error">Error</x-ui::button>
```

```html +demo title={Outline Variant} previewClasses={grid gap-5 grid-cols-1 sm:grid-cols-2 md:grid-cols-5 items-end justify-center py-12}
<x-ui::button variant="outline">Primary</x-ui::button>
<x-ui::button color="secondary" variant="outline">Secondary</x-ui::button>
<x-ui::button color="success" variant="outline">Success</x-ui::button>
<x-ui::button color="warning" variant="outline">Warning</x-ui::button>
<x-ui::button color="error" variant="outline">Error</x-ui::button>
```

```html +demo title={Link Variant} previewClasses={grid gap-5 grid-cols-1 sm:grid-cols-2 md:grid-cols-5 items-end justify-center py-12}
<x-ui::button variant="link">Primary</x-ui::button>
<x-ui::button color="secondary" variant="link">Secondary</x-ui::button>
<x-ui::button color="success" variant="link">Success</x-ui::button>
<x-ui::button color="warning" variant="link">Warning</x-ui::button>
<x-ui::button color="error" variant="link">Error</x-ui::button>
```

```html +demo title={Gradient Variant} previewClasses={grid gap-5 grid-cols-1 sm:grid-cols-2 md:grid-cols-5 items-end justify-center py-12}
<x-ui::button variant="gradient">Primary</x-ui::button>
<x-ui::button color="secondary" variant="gradient">Secondary</x-ui::button>
<x-ui::button color="success" variant="gradient">Success</x-ui::button>
<x-ui::button color="warning" variant="gradient">Warning</x-ui::button>
<x-ui::button color="error" variant="gradient">Error</x-ui::button>
```

```html +demo title={Ghost Variant} previewClasses={grid gap-5 grid-cols-1 sm:grid-cols-2 md:grid-cols-5 items-end justify-center py-12}
<x-ui::button variant="ghost">Primary</x-ui::button>
<x-ui::button color="secondary" variant="ghost">Secondary</x-ui::button>
<x-ui::button color="success" variant="ghost">Success</x-ui::button>
<x-ui::button color="warning" variant="ghost">Warning</x-ui::button>
<x-ui::button color="error" variant="ghost">Error</x-ui::button>
```

```html +demo title={Glow Variant} previewClasses={grid gap-5 grid-cols-1 sm:grid-cols-2 md:grid-cols-5 items-end justify-center py-12}
<x-ui::button variant="glow">Primary</x-ui::button>
<x-ui::button color="secondary" variant="glow">Secondary</x-ui::button>
<x-ui::button color="success" variant="glow">Success</x-ui::button>
<x-ui::button color="warning" variant="glow">Warning</x-ui::button>
<x-ui::button color="error" variant="glow">Error</x-ui::button>
```

### Links (href)
Use the `href` prop to turn a button into a link. It uses an `onclick` handler to redirect to the specified URL since buttons don't have the `href` attribute.

```html +demo title={Buttons as Links} previewClasses={flex items-center justify-center py-6}
<x-ui::button href="https://laravel.com" variant="glow" color="error">This Button Links to the Laravel Docs</x-ui::button>
```

### Disabled State
Each variant also has a disabled state. The `disabled` prop accepts a boolean value.

```html +demo title={Solid Variant (Disabled)} previewClasses={grid gap-5 grid-cols-1 sm:grid-cols-2 md:grid-cols-5 items-end justify-center py-12}
<x-ui::button :disabled="true">Primary</x-ui::button>
<x-ui::button :disabled="true" color="secondary">Secondary</x-ui::button>
<x-ui::button :disabled="true" color="success">Success</x-ui::button>
<x-ui::button :disabled="true" color="warning">Warning</x-ui::button>
<x-ui::button :disabled="true" color="error">Error</x-ui::button>
```

```html +demo title={Outline Variant (Disabled)} previewClasses={grid gap-5 grid-cols-1 sm:grid-cols-2 md:grid-cols-5 items-end justify-center py-12}
<x-ui::button :disabled="true" variant="outline">Primary</x-ui::button>
<x-ui::button :disabled="true" color="secondary" variant="outline">Secondary</x-ui::button>
<x-ui::button :disabled="true" color="success" variant="outline">Success</x-ui::button>
<x-ui::button :disabled="true" color="warning" variant="outline">Warning</x-ui::button>
<x-ui::button :disabled="true" color="error" variant="outline">Error</x-ui::button>
```

```html +demo title={Link Variant (Disabled)} previewClasses={grid gap-5 grid-cols-1 sm:grid-cols-2 md:grid-cols-5 items-end justify-center py-12}
<x-ui::button :disabled="true" variant="link">Primary</x-ui::button>
<x-ui::button :disabled="true" color="secondary" variant="link">Secondary</x-ui::button>
<x-ui::button :disabled="true" color="success" variant="link">Success</x-ui::button>
<x-ui::button :disabled="true" color="warning" variant="link">Warning</x-ui::button>
<x-ui::button :disabled="true" color="error" variant="link">Error</x-ui::button>
```

```html +demo title={Gradient Variant (Disabled)} previewClasses={grid gap-5 grid-cols-1 sm:grid-cols-2 md:grid-cols-5 items-end justify-center py-12}
<x-ui::button :disabled="true" variant="gradient">Primary</x-ui::button>
<x-ui::button :disabled="true" color="secondary" variant="gradient">Secondary</x-ui::button>
<x-ui::button :disabled="true" color="success" variant="gradient">Success</x-ui::button>
<x-ui::button :disabled="true" color="warning" variant="gradient">Warning</x-ui::button>
<x-ui::button :disabled="true" color="error" variant="gradient">Error</x-ui::button>
```

```html +demo title={Ghost Variant (Disabled)} previewClasses={grid gap-5 grid-cols-1 sm:grid-cols-2 md:grid-cols-5 items-end justify-center py-12}
<x-ui::button :disabled="true" variant="ghost">Primary</x-ui::button>
<x-ui::button :disabled="true" color="secondary" variant="ghost">Secondary</x-ui::button>
<x-ui::button :disabled="true" color="success" variant="ghost">Success</x-ui::button>
<x-ui::button :disabled="true" color="warning" variant="ghost">Warning</x-ui::button>
<x-ui::button :disabled="true" color="error" variant="ghost">Error</x-ui::button>
```

```html +demo title={Glow Variant (Disabled)} previewClasses={grid gap-5 grid-cols-1 sm:grid-cols-2 md:grid-cols-5 items-end justify-center py-12}
<x-ui::button :disabled="true" variant="glow">Primary</x-ui::button>
<x-ui::button :disabled="true" color="secondary" variant="glow">Secondary</x-ui::button>
<x-ui::button :disabled="true" color="success" variant="glow">Success</x-ui::button>
<x-ui::button :disabled="true" color="warning" variant="glow">Warning</x-ui::button>
<x-ui::button :disabled="true" color="error" variant="glow">Error</x-ui::button>
```
