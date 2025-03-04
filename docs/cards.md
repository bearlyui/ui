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
| `padding` | `string \| Size` | `true` | The padding of the card. |

---

### Padding

Cards of all padding sizes -- `sm`, `md` (default), `lg`, and `xl`.

```html +demo title={Card Sizing} previewClasses={space-y-5}
<div>
    <h5 class="text-center opacity-75 text-xs uppercase tracking-wide">SM Sizing</h5>
    <ui:card padding="sm">
        <x-slot:header>Header</x-slot:header>
        I'm a small card
        <x-slot:footer>Footer</x-slot:footer>
    </ui:card>
</div>

<div>
    <h5 class="text-center opacity-75 text-xs uppercase tracking-wide">MD Sizing</h5>
    <ui:card padding="md">
        <x-slot:header>Header</x-slot:header>
        I'm a medium card
        <x-slot:footer>Footer</x-slot:footer>
    </ui:card>
</div>

<div>
    <h5 class="text-center opacity-75 text-xs uppercase tracking-wide">LG Sizing</h5>
    <ui:card padding="lg">
        <x-slot:header>Header</x-slot:header>
        I'm a large card
        <x-slot:footer>Footer</x-slot:footer>
    </ui:card>
</div>

<div>
    <h5 class="text-center opacity-75 text-xs uppercase tracking-wide">XL Sizing</h5>
    <ui:card padding="xl">
        <x-slot:header>Header</x-slot:header>
        I'm an extralarge card
        <x-slot:footer>Footer</x-slot:footer>
    </ui:card>
</div>
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
