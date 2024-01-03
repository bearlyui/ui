# Cards
## 🚧 TO DO
- [x] Setup documentation like other pages, document existing cards
- [x] Add `header` and `footer` slots
- [x] Add `color` property and support for all colors
- [ ] Add `variant` property and several variants
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

### ☑️ Variant

TODO

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
