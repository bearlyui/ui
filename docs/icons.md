# Icons

We've included a convenient wrapper for [Heroicons](https://heroicons.com/) to make it easier to use icons in your project.
Massive thanks to the folks from [Tailwind Labs](https://github.com/tailwindlabs) for creating such a great MIT-licensed icon set.

## Using Icons

To use an icon, simply prefix the icon name with `<ui:icon-`. For example:

```html
<ui:icon-swatch />
```

```html +demo title={Icon Example} previewClasses={space-y-4}
<div class="text-center p-20">
    <ui:icon-swatch />
</div>
```

## Variants

The `<ui:icon>` component also supports the `micro`, `mini`, `solid`, and `outline` (default) variants provided by Heroicons. Simply pass the variant name as a property.

```html
<ui:icon-swatch variant="micro" />
```

```html +demo title={Icon Variants} previewClasses={space-y-4}
<div class="flex gap-2 items-center">
    <ui:icon-swatch variant="outline" />
    <span>Outline</span>
</div>
<div class="flex gap-2 items-center">
    <ui:icon-swatch variant="solid" />
    <span>Solid</span>
</div>
<div class="flex gap-2 items-center">
    <ui:icon-swatch variant="mini" />
    <span>Mini</span>
</div>
<div class="flex gap-2 items-center">
    <ui:icon-swatch variant="micro" />
    <span>Micro</span>
</div>
```

#### A note on sizing

The icons are sized by variant to match the size each variant was designed for.
Usually best to stick with that size, but if you need to deviate use the [Tailwind CSS Sizing utilities](https://tailwindcss.com/docs/size).
Be warned that for some sizes you might need to use the [important modifier from Tailwind CSS](https://tailwindcss.com/docs/configuration#important-modifier).
