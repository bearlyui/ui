# Buttons

## Using Buttons

Use `<ui:button>` to create a button of the default variant _(solid)_ and color _(secondary)_.

```html +demo title={Using Buttons} previewClasses={py-8 flex items-center justify-center}
<ui:button>Happy Little Button</ui:button>
```

## Properties

Buttons support several other properties that can be used to customize their appearance and/or functionality. Here's an overview of all the available properties:

| Property | Type | Default | Description |
|:---|:---|:---|:---|
| `color` | `string \| Color` | `secondary` | The color of the button. |
| `size` | `string \| Size` | `md` | The size of the button. |
| `variant` | `string \| Variant` | `solid` | The variant of the button. |
| `radius` | `string \| Size` | `sm` | The border radius of the button. |
| `href` | `string` | `null` | The URL the button should link to. |
| `disabled` | `boolean` | `false` | Whether the button is disabled. |

---

### Colors
Buttons support colors `primary`, `secondary` _(default)_, `success`, `warning`, and `danger`.
The `color` prop accepts a string or a `Color` enum to define this value.

```html +demo title={Button Colors} previewClasses={flex flex-col sm:flex-row gap-3 items-center justify-center}
<ui:button color="primary">Primary</ui:button>
<ui:button color="secondary">Secondary</ui:button>
<ui:button color="success">Success</ui:button>
<ui:button color="warning">Warning</ui:button>
<ui:button color="danger">Danger</ui:button>
```

### Icons
Easily add an [Icon](/docs/icons) before the button's text with the `icon` prop.
```html
<ui:button icon="arrow-left">Icon Example</ui:button>
```

You can also add an icon after the button's text with the `icon-after` prop.
```html
<ui:button icon-after="arrow-right">Icon Example</ui:button>
```

```html +demo title={Buttons with Icons} previewClasses={flex flex-col sm:flex-row gap-3 items-center justify-center}
<ui:button icon="arrow-left">Icon Before</ui:button>
<ui:button icon="arrow-left" icon-after="arrow-right">Why Not Both?</ui:button>
<ui:button icon-after="arrow-right">Icon After</ui:button>
```

### Sizing
Buttons support sizes `xs`, `sm`, `md` (default), `lg`, and `xl`. You can
disable default sizing and specify your own by using the size attribute with an unsupported value like `size="none"`... or even `size="bogus"` if that's your jam.

```html +demo title={Button Sizing} previewClasses={flex flex-col sm:flex-row gap-3 sm:items-end justify-center py-4}
<div class="text-center">
    <ui:button size="xs">Button</ui:button>
    <div class="text-sm uppercase tracking-wide opacity-60 mt-1.5">xs</div>
</div>
<div class="text-center">
    <ui:button size="sm">Button</ui:button>
    <div class="text-sm uppercase tracking-wide opacity-60 mt-1.5">sm</div>
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

Control the border radius with these options: `none`, `sm` (default), `md`, `lg`, `xl`, and `full`.

```html +demo title={Button Corner Radius} previewClasses={flex flex-col sm:flex-row gap-3 sm:items-end justify-center py-4}
<div class="text-center">
    <ui:button radius="none">Button</ui:button>
    <div class="text-sm uppercase tracking-wide opacity-60 mt-1.5">none</div>
</div>
<div class="text-center">
    <ui:button radius="sm">Button</ui:button>
    <div class="text-sm uppercase tracking-wide opacity-60 mt-1.5">sm</div>
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
Buttons come in two variants: `solid` _(default)_ and  `ghost`.

```html +demo title={Solid Variant} previewClasses={flex flex-col sm:flex-row gap-3 sm:items-end justify-center py-4}
<ui:button color="primary">Primary</ui:button>
<ui:button color="secondary">Secondary</ui:button>
<ui:button color="success">Success</ui:button>
<ui:button color="warning">Warning</ui:button>
<ui:button color="danger">Danger</ui:button>
```

```html +demo title={Ghost Variant} previewClasses={flex flex-col sm:flex-row gap-3 sm:items-end justify-center py-4}
<ui:button color="primary" variant="ghost">Primary</ui:button>
<ui:button color="secondary" variant="ghost">Secondary</ui:button>
<ui:button color="success" variant="ghost">Success</ui:button>
<ui:button color="warning" variant="ghost">Warning</ui:button>
<ui:button color="danger" variant="ghost">Danger</ui:button>
```

### Links (href)
Use the `href` prop to turn a button into a pseudo-link. It uses an `onclick` handler to redirect to the specified URL since buttons don't have an `href` attribute in HTML.
If you really want it to be an anchor tag (`<a>`), use [the link component](/docs/typography#links) (`<ui:link>`) instead.

```html +demo title={Buttons as Links} previewClasses={flex items-center justify-center py-6}
<ui:button href="https://laravel.com" variant="ghost" color="danger">This Button Links to the Laravel Docs</ui:button>
```

### Disabled State
Each variant also has a disabled state. The `disabled` prop accepts a boolean value.

```html +demo title={Solid Variant (Disabled)} previewClasses={flex flex-col sm:flex-row gap-3 sm:items-end justify-center py-4}
<ui:button :disabled="true">Primary</ui:button>
<ui:button :disabled="true" color="secondary">Secondary</ui:button>
<ui:button :disabled="true" color="success">Success</ui:button>
<ui:button :disabled="true" color="warning">Warning</ui:button>
<ui:button :disabled="true" color="danger">Danger</ui:button>
```

```html +demo title={Ghost Variant (Disabled)} previewClasses={flex flex-col sm:flex-row gap-3 sm:items-end justify-center py-4}
<ui:button :disabled="true" color="primary" variant="ghost">Primary</ui:button>
<ui:button :disabled="true" color="secondary" variant="ghost">Secondary</ui:button>
<ui:button :disabled="true" color="success" variant="ghost">Success</ui:button>
<ui:button :disabled="true" color="warning" variant="ghost">Warning</ui:button>
<ui:button :disabled="true" color="danger" variant="ghost">Danger</ui:button>
```

### Loading States

Buttons automatically try to show a loading state based on Livewire requests. All submit buttons show loading states. Buttons with `wire:click` attributes are targeted automatically for loading states too!

```html +demo title={Loading States}
<div class="text-center">
    <?php
    use function Livewire\Volt\state;

    state('loading', false);
    $simulateLoading = function () {
        $this->loading = true;
        sleep(2);
        $this->loading = false;
    };
    ?>
    @volt
    <ui:button wire:click="simulateLoading">Simulate Loading State</ui:button>
    @endvolt
</div>

<div class="mt-8 flex flex-col sm:flex-row gap-3 sm:items-end justify-center py-4">
    <ui:button color="primary" data-ui-loading>Primary</ui:button>
    <ui:button color="secondary" data-ui-loading>Secondary</ui:button>
    <ui:button color="success" data-ui-loading>Success</ui:button>
    <ui:button color="warning" data-ui-loading>Warning</ui:button>
    <ui:button color="danger" data-ui-loading>Danger</ui:button>
</div>
```

### Tooltips

Buttons have a tooltip property for convenience. It's a shortcut for adding a tooltip to the button.

```html +demo title={Button Tooltips}
<ui:button tooltip="Thank you for hovering!">Hover Me, Please!</ui:button>
```
