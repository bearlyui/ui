# Cards
## 🚧 TO DO
- [x] Setup documentation like other pages, document existing cards
- [x] Add `header` and `footer` slots
- [x] Add `color` property and support for all colors
- [ ] Add `variant` property and several variants
- [ ] Test all variant/color combos with `header` and `footer` slots
- [ ] Figure out a better abstraction for padding/sizing
- [ ] Finish filling out documentation

Cards to put stuff in. They're great when you need 'em!

## Using Cards

Use `<x-ui::card>` to create a card with the default variant, padding, and radius.

```html +demo previewClasses={space-y-5}
<x-ui::card>I'm a Happy Little Card</x-ui::card>
<x-ui::card color="primary">I'm a Happy Little Card</x-ui::card>
<x-ui::card color="secondary">I'm a Happy Little Card</x-ui::card>
<x-ui::card color="success">I'm a Happy Little Card</x-ui::card>
<x-ui::card color="warning">I'm a Happy Little Card</x-ui::card>
<x-ui::card color="error">I'm a Happy Little Card</x-ui::card>
```

## Properties

Customize your cards with the following properties.

| Property | Type | Default | Description |
|:---|:---|:---|:---|
| `padding` | `boolean` | `true` | Include default padding. |
| `radius` | `string \| Size` | `base` | The border radius of the button. |
| `variant` | `string \| Variant` | `solid` | The variant of the button. |

---

### ☑️ Padding

TODO

### ️️☑ ️Radius

TODO

### Variant

Cards come in several variants: `solid`, `outline`, `glow`, and `gradient`. The default is `outline`.

```html +demo title={Outline Variant} previewClasses={space-y-3}
<x-ui::card>I'm a happy little card.</x-ui::card>
<x-ui::card color="primary">I'm a happy little primary card.</x-ui::card>
<x-ui::card color="secondary">I'm a happy little secondary card.</x-ui::card>
<x-ui::card color="success">I'm a happy little success card.</x-ui::card>
<x-ui::card color="warning">I'm a happy little warning card.</x-ui::card>
<x-ui::card color="error">I'm a happy little error card.</x-ui::card>
```

```html +demo title={Solid Variant} previewClasses={space-y-3}
<x-ui::card variant="solid">I'm a happy little card.</x-ui::card>
<x-ui::card variant="solid" color="primary">I'm a happy little primary card.</x-ui::card>
<x-ui::card variant="solid" color="secondary">I'm a happy little secondary card.</x-ui::card>
<x-ui::card variant="solid" color="success">I'm a happy little success card.</x-ui::card>
<x-ui::card variant="solid" color="warning">I'm a happy little warning card.</x-ui::card>
<x-ui::card variant="solid" color="error">I'm a happy little error card.</x-ui::card>
```

```html +demo title={Gradient Variant} previewClasses={space-y-3}
<x-ui::card variant="gradient">I'm a happy little card.</x-ui::card>
<x-ui::card variant="gradient" color="primary">I'm a happy little primary card.</x-ui::card>
<x-ui::card variant="gradient" color="secondary">I'm a happy little secondary card.</x-ui::card>
<x-ui::card variant="gradient" color="success">I'm a happy little success card.</x-ui::card>
<x-ui::card variant="gradient" color="warning">I'm a happy little warning card.</x-ui::card>
<x-ui::card variant="gradient" color="error">I'm a happy little error card.</x-ui::card>
```

```html +demo title={Glow Variant} previewClasses={space-y-3}
<x-ui::card variant="glow">I'm a happy little card.</x-ui::card>
<x-ui::card variant="glow" color="primary">I'm a happy little primary card.</x-ui::card>
<x-ui::card variant="glow" color="secondary">I'm a happy little secondary card.</x-ui::card>
<x-ui::card variant="glow" color="success">I'm a happy little success card.</x-ui::card>
<x-ui::card variant="glow" color="warning">I'm a happy little warning card.</x-ui::card>
<x-ui::card variant="glow" color="error">I'm a happy little error card.</x-ui::card>
```


## Slots

### Header & Footer
The ol' top-n-bottom.

```html +demo previewClasses={space-y-5}
<x-ui::card>
    <x-slot:header>Card with Header &amp; Footer</x-slot:header>
    <div class="my-4 text-base text-black/60 dark:text-white/60">This is a card with a header. It lives in our world.</div>
    <x-slot:footer>Example Footer</x-slot:footer>
</x-ui::card>

<x-ui::card color="primary">
    <x-slot:header>Card with Header &amp; Footer</x-slot:header>
    <div class="my-4 text-base text-black/60 dark:text-white/60">This is a card with a header. It lives in our world.</div>
    <x-slot:footer>Example Footer</x-slot:footer>
</x-ui::card>

<x-ui::card color="secondary">
    <x-slot:header>Card with Header &amp; Footer</x-slot:header>
    <div class="my-4 text-base text-black/60 dark:text-white/60">This is a card with a header. It lives in our world.</div>
    <x-slot:footer>Example Footer</x-slot:footer>
</x-ui::card>

<x-ui::card color="success">
    <x-slot:header>Card with Header &amp; Footer</x-slot:header>
    <div class="my-4 text-base text-black/60 dark:text-white/60">This is a card with a header. It lives in our world.</div>
    <x-slot:footer>Example Footer</x-slot:footer>
</x-ui::card>

<x-ui::card color="warning">
    <x-slot:header>Card with Header &amp; Footer</x-slot:header>
    <div class="my-4 text-base text-black/60 dark:text-white/60">This is a card with a header. It lives in our world.</div>
    <x-slot:footer>Example Footer</x-slot:footer>
</x-ui::card>

<x-ui::card color="error">
    <x-slot:header>Card with Header &amp; Footer</x-slot:header>
    <div class="my-4 text-base text-black/60 dark:text-white/60">This is a card with a header. It lives in our world.</div>
    <x-slot:footer>Example Footer</x-slot:footer>
</x-ui::card>
```
