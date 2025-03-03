# Cards

Cards... or are they boxes? Rectangles on a screen! Put stuff in them, love them like one of your own. Nest them in other cards, or put them in a grid, the choice is yours!

## Using Cards

Use `<ui:card>` to create a card with the default `variant`, `padding`, and `radius`.

```html +demo title={Basic Cards} previewClasses={space-y-5}
<ui:card>I'm a Happy Little Card</ui:card>
<ui:card color="primary">I'm a Happy Little Card</ui:card>
<ui:card color="secondary">I'm a Happy Little Card</ui:card>
<ui:card color="success">I'm a Happy Little Card</ui:card>
<ui:card color="warning">I'm a Happy Little Card</ui:card>
<ui:card color="danger">I'm a Happy Little Card</ui:card>
```

## Properties

Cards suppport the following properties:

| Property | Type | Default | Description |
|:---|:---|:---|:---|
| `size` | `string \| Size` | `true` | The padding and text size of the card. |
| `radius` | `string \| Size` | `base` | The border radius of the card. |
| `variant` | `string \| Variant` | `solid` | The variant of the card. |

---

### Size

Cards of all sizes. The default is `base`, but `sm`, `md`, and `lg` are all available too.

```html +demo title={Card Sizing} previewClasses={space-y-5}
<div>
    <h5 class="text-center opacity-75 text-xs uppercase tracking-wide">SM Sizing</h5>
    <ui:card size="sm">
        <x-slot:header>Header</x-slot:header>
        I'm a small card
        <x-slot:footer>Footer</x-slot:footer>
    </ui:card>
</div>

<div>
    <h5 class="text-center opacity-75 text-xs uppercase tracking-wide">Base Sizing</h5>
    <ui:card>
        <x-slot:header>Header</x-slot:header>
        I'm a base card
        <x-slot:footer>Footer</x-slot:footer>
    </ui:card>
</div>

<div>
    <h5 class="text-center opacity-75 text-xs uppercase tracking-wide">MD Sizing</h5>
    <ui:card size="md">
        <x-slot:header>Header</x-slot:header>
        I'm a medium card
        <x-slot:footer>Footer</x-slot:footer>
    </ui:card>
</div>

<div>
    <h5 class="text-center opacity-75 text-xs uppercase tracking-wide">LG Sizing</h5>
    <ui:card size="lg">
        <x-slot:header>Header</x-slot:header>
        I'm a large card
        <x-slot:footer>Footer</x-slot:footer>
    </ui:card>
</div>
```


### ️️Radius

Cards come with rounded corners by default, but support `none`, `sm`, `base`, `md`, and `lg`, `xl` corner radii.

```html +demo title={Card Radius} previewClasses={space-y-5}
<ui:card radius="none">I'm a card with no radius</ui:card>
<ui:card radius="sm">I'm a card with a small radius</ui:card>
<ui:card radius="md">I'm a card with a medium radius</ui:card>
<ui:card radius="lg">I'm a card with a large radius</ui:card>
<ui:card radius="xl">I'm a card with a extra large radius</ui:card>
```

### Variant

Cards come in several variants: `solid`, `outline`, `glow`, and `gradient`. The default is `outline`.

```html +demo title={Outline Variant} previewClasses={space-y-3}
<ui:card>I'm a happy little card.</ui:card>
<ui:card color="primary">I'm a happy little primary card.</ui:card>
<ui:card color="secondary">I'm a happy little secondary card.</ui:card>
<ui:card color="success">I'm a happy little success card.</ui:card>
<ui:card color="warning">I'm a happy little warning card.</ui:card>
<ui:card color="danger">I'm a happy little danger card.</ui:card>
```

```html +demo title={Solid Variant} previewClasses={space-y-3}
<ui:card variant="solid">I'm a happy little card.</ui:card>
<ui:card variant="solid" color="primary">I'm a happy little primary card.</ui:card>
<ui:card variant="solid" color="secondary">I'm a happy little secondary card.</ui:card>
<ui:card variant="solid" color="success">I'm a happy little success card.</ui:card>
<ui:card variant="solid" color="warning">I'm a happy little warning card.</ui:card>
<ui:card variant="solid" color="danger">I'm a happy little danger card.</ui:card>
```

```html +demo title={Gradient Variant} previewClasses={space-y-3}
<ui:card variant="gradient">I'm a happy little card.</ui:card>
<ui:card variant="gradient" color="primary">I'm a happy little primary card.</ui:card>
<ui:card variant="gradient" color="secondary">I'm a happy little secondary card.</ui:card>
<ui:card variant="gradient" color="success">I'm a happy little success card.</ui:card>
<ui:card variant="gradient" color="warning">I'm a happy little warning card.</ui:card>
<ui:card variant="gradient" color="danger">I'm a happy little danger card.</ui:card>
```

```html +demo title={Glow Variant} previewClasses={space-y-3}
<ui:card variant="glow">I'm a happy little card.</ui:card>
<ui:card variant="glow" color="primary">I'm a happy little primary card.</ui:card>
<ui:card variant="glow" color="secondary">I'm a happy little secondary card.</ui:card>
<ui:card variant="glow" color="success">I'm a happy little success card.</ui:card>
<ui:card variant="glow" color="warning">I'm a happy little warning card.</ui:card>
<ui:card variant="glow" color="danger">I'm a happy little danger card.</ui:card>
```


## Slots

### Header & Footer
The ol' top-n-bottom.

```html +demo previewClasses={space-y-5}
<ui:card>
    <x-slot:header>Card with Header &amp; Footer</x-slot:header>
    <div class="my-4 text-base text-black/60 dark:text-white/60">This is a card with a header. It lives in our world.</div>
    <x-slot:footer>Example Footer</x-slot:footer>
</ui:card>

<ui:card color="primary">
    <x-slot:header>Card with Header &amp; Footer</x-slot:header>
    <div class="my-4 text-base text-black/60 dark:text-white/60">This is a card with a header. It lives in our world.</div>
    <x-slot:footer>Example Footer</x-slot:footer>
</ui:card>

<ui:card color="secondary">
    <x-slot:header>Card with Header &amp; Footer</x-slot:header>
    <div class="my-4 text-base text-black/60 dark:text-white/60">This is a card with a header. It lives in our world.</div>
    <x-slot:footer>Example Footer</x-slot:footer>
</ui:card>

<ui:card color="success">
    <x-slot:header>Card with Header &amp; Footer</x-slot:header>
    <div class="my-4 text-base text-black/60 dark:text-white/60">This is a card with a header. It lives in our world.</div>
    <x-slot:footer>Example Footer</x-slot:footer>
</ui:card>

<ui:card color="warning">
    <x-slot:header>Card with Header &amp; Footer</x-slot:header>
    <div class="my-4 text-base text-black/60 dark:text-white/60">This is a card with a header. It lives in our world.</div>
    <x-slot:footer>Example Footer</x-slot:footer>
</ui:card>

<ui:card color="danger">
    <x-slot:header>Card with Header &amp; Footer</x-slot:header>
    <div class="my-4 text-base text-black/60 dark:text-white/60">This is a card with a header. It lives in our world.</div>
    <x-slot:footer>Example Footer</x-slot:footer>
</ui:card>
```

## Examples

### Kitchen Sink
```html +demo
<ui:card radius="xl" size="lg" color="success" variant="solid">
    <x-slot:header>Kitchen Sink</x-slot:header>
    <div class="my-4 text-base text-black/60 dark:text-white/60">This is a card with a header. It lives in our world.</div>
    <x-slot:footer>Example Footer</x-slot:footer>
</ui:card>
```
