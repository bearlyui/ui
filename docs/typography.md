# Typography
The typography components come in two componentized flavors: `headings` and `descriptions`.
They're better when they're together, kind of like Panda bears named Jack and Johnson.

## Basic Example

```html +demo title={Typography Example with Sizes}
<div class="p-5 space-y-16">
    <div class="before:content-['BASE'] before:opacity-50 before:text-xs before:uppercase before:block before:mb-6 before:pb-2.5 before:border-b before:border-white/10">
        <ui:heading tag="h4">Example Heading</ui:heading>
        <ui:description>Bear with me, this is important.</ui:description>
    </div>

    <div class="before:content-['MD'] before:opacity-50 before:text-xs before:uppercase before:block before:mb-6 before:pb-2.5 before:border-b before:border-white/10">
        <ui:heading tag="h4" size="md">Bear With Me, This Is Important</ui:heading>
        <ui:description size="md">Bear with me, this is important.</ui:description>
    </div>

    <div class="before:content-['LG'] before:opacity-50 before:text-xs before:uppercase before:block before:mb-6 before:pb-2.5 before:border-b before:border-white/10">
        <ui:heading tag="h4" size="lg">Big Bear Headlines</ui:heading>
        <ui:description size="lg">Bear with me, this is important.</ui:description>
    </div>

    <div class="before:content-['XL'] before:opacity-50 before:text-xs before:uppercase before:block before:mb-6 before:pb-2.5 before:border-b before:border-white/10">
        <ui:heading tag="h4" size="xl">Bear With Me, This Is Important</ui:heading>
        <ui:description size="xl">Bear with me, this is important.</ui:description>
    </div>
</div>
```

## Properties
Both typography components share the `size` property, but only the `heading` component has the `tag` property.

| Property | Type | Default | Description |
|:---|:---|:---|:---|
| `tag` _(heading only)_ | `string` | `h2` | The HTML tag to use for the heading. Typically `h1` through `h4`. |
| `size` | `string` | `base` | The size of the heading or description. |

### Tag

The HTML tag to use for the heading. Typically `h1` through `h4`.

```html +demo title={Bearly Bearable Headlines}
<ui:heading tag="h1">Bearly Bearable Headlines</ui:heading>
```

### Size
The font size and weight. Also affects the vertical spacing on description components.

```html +demo title={Bear With Me, This Is Important}
<ui:heading size="md">Bear With Me, This Is Important</ui:heading>
```


## Headings

```html +demo title={Example Heading}
<div class="p-5 space-y-8">
    <ui:heading tag="h4" size="xl">Bear With Me, It's important (md)</ui:heading>
    <ui:heading tag="h4" size="lg">Big Bear Headlines (xl)</ui:heading>
    <ui:heading tag="h4" size="md">Are Bearly Bearable (lg)</ui:heading>
    <ui:heading tag="h4">We Bearly Read This (base)</ui:heading>
</div>
```

## Descriptions

```html +demo title={Example Description}
<div class="p-5 space-y-8">
    <ui:description>Bear with me, this is important.</ui:description>
    <ui:description size="md">Bear with me, this is important.</ui:description>
    <ui:description size="lg">Bear with me, this is important.</ui:description>
    <ui:description size="xl">Bear with me, this is important.</ui:description>
</div>
```
