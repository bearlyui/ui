# Typography
The typography components are really just convenient helpers for text styling. When used within [Alert](/docs/alerts) or [Dialog](/docs/dialogs) components, they automatically get used as aria labels and descriptions too. Hooray for accessibility!

- [Links](/docs/typography#links)
- [Headings](/docs/typography#headings)
- [Subheadings](/docs/typography#subheadings)

## Links

Use `<ui:link>` to create an `<a>` tag with some default styling. You may use the `when` property to control whether the `href` attribute is included or not. This can be very useful for labels and other conditionally-linked parts of your application. There are two main benefits to using this component over the native `<a>` tag:

1. It allows you to have consistent styling for links _without using global anchor tag styles_.
2. It provides the convenient `when` property that only applies the `href` attribute when true.

```html +demo title={Links}
This is a <ui:link href="#this-page-lol">an unbearable link</ui:link> to something.
```

#### The `when` Property

The `when` property is a boolean that controls whether the `href` attribute is included or not. This is sometimes useful for labels and other conditionally-linked parts of your application.

```html +demo title={Links}
This is a <ui:link :when="false" href="#this-page-lol">an unbearable link</ui:link>... but it doesn't link since "when" is <span class="font-mono text-sm font-medium text-primary-600 dark:text-primary-400">false</span>.
```

## Basic Example

```html +demo title={Typography Example with Sizes}
<div class="p-5 space-y-16">
    <div class="before:content-['SM'] before:opacity-50 before:text-xs before:uppercase before:block before:mb-6 before:pb-2.5 before:border-b before:border-white/10">
        <ui:heading tag="h4">Grizzly Business: Headings</ui:heading>
        <ui:subheading size="sm">Bear with me, this is important.</ui:subheading>
    </div>

    <div class="before:content-['BASE'] before:opacity-50 before:text-xs before:uppercase before:block before:mb-6 before:pb-2.5 before:border-b before:border-white/10">
        <ui:heading tag="h4">Grizzly Business: Headings</ui:heading>
        <ui:subheading>Bear with me, this is important.</ui:subheading>
    </div>

    <div class="before:content-['MD'] before:opacity-50 before:text-xs before:uppercase before:block before:mb-6 before:pb-2.5 before:border-b before:border-white/10">
        <ui:heading tag="h4" size="md">Grizzly Business: Headings</ui:heading>
        <ui:subheading size="md">Bear with me, this is important.</ui:subheading>
    </div>

    <div class="before:content-['LG'] before:opacity-50 before:text-xs before:uppercase before:block before:mb-6 before:pb-2.5 before:border-b before:border-white/10">
        <ui:heading tag="h4" size="lg">Grizzly Business: Headings</ui:heading>
        <ui:subheading size="lg">Bear with me, this is important.</ui:subheading>
    </div>

    <div class="before:content-['XL'] before:opacity-50 before:text-xs before:uppercase before:block before:mb-6 before:pb-2.5 before:border-b before:border-white/10">
        <ui:heading tag="h4" size="xl">Grizzly Business: Headings</ui:heading>
        <ui:subheading size="xl">Bear with me, this is important.</ui:subheading>
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
    <ui:subheading>Bear with me, this is important.</ui:subheading>
    <ui:subheading size="md">Bear with me, this is important.</ui:subheading>
    <ui:subheading size="lg">Bear with me, this is important.</ui:subheading>
    <ui:subheading size="xl">Bear with me, this is important.</ui:subheading>
</div>
```
