# Cards
## 🚧 TO DO
- [x] Setup documentation like other pages, document existing cards
- [x] Add `header` and `footer` slots
- [ ] Add `color` property and support for all colors
- [ ] Add `variant` property and several variants
- [ ] Finish filling out documentation

Cards to put stuff in. They're great when you need 'em!

## Using Cards

Use `<x-ui::card>` to create a card with the default variant, padding, and radius.

```html +demo
<x-ui::card>I'm a Happy Little Card</x-ui::card>
```

## Properties

Customize your cards with the following properties.

| Property | Type | Default | Description |
|:---|:---|:---|:---|
| `padding` | `boolean` | `true` | Include default padding. |
| `radius` | `string \| Size` | `base` | The border radius of the button. |
| `variant` | `string \| Variant` | `solid` | The variant of the button. |
<!-- | `size` | `string \| Size` | `base` | The size of the button. |
| `href` | `string` | `null` | The URL the button should link to. |
| `disabled` | `boolean` | `false` | Whether the button is disabled. | -->

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

```html +demo
<x-ui::card>
    <x-slot:header>Card with Header &amp; Footer</x-slot:header>
    <div class="my-4 text-base text-black/60 dark:text-white/60">This is a card with a header. It lives in our world.</div>
    <x-slot:footer>Example Footer</x-slot:footer>
</x-ui::card>
```
