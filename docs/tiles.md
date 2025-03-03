# Tiles

Tiles are an opinionated version of cards that can be used to display statistics and other prominent information in your application.
They consist of two tags: `<ui:tiles>` (the container which controls the layout) and `<ui:tile>` (each individual tile).

---

## Using Tiles

To use tiles, use the `<ui:tiles>` tag with the `<ui:tile>` tag inside of it.

Here's an example:

```html +demo title={Example Tiles}
<ui:tiles>
    <ui:tile>
        <x-slot:label>Test Status</x-slot:label>
        <span class="text-success-600 dark:text-success-400">Passed</span>
    </ui:tile>

    <ui:tile>
        <x-slot:label>Score</x-slot:label>
        88%
    </ui:tile>

    <ui:tile>
        <x-slot:label>Tasks Completed</x-slot:label>
        <span>
            37
            <span class="opacity-60 text-lg font-medium">/ 42</span>
        </span>
    </ui:tile>
</ui:tiles>
```
## Properties

The `<ui:tiles>` tag accepts the following properties:

| Property | Type | Default | Description |
|:---|:---|:---|:---|
| `gap` | `string` | `base` | The gap between tiles. Either `base` (default), `md`, or `lg`. |
| `variant` | `string` | `outline` | The variant of the tiles, either `outline` (default), `solid`, or `ghost`. |

## Variants

Tiles come in three variants: `outline` (default), `solid`, and `ghost`.

#### Outline

```html +demo title={Tile Outline Variant}
<ui:tiles variant="outline">
    <ui:tile>
        <x-slot:label>Test Status</x-slot:label>
        <span class="text-success-600 dark:text-success-400">Passed</span>
    </ui:tile>

    <ui:tile>
        <x-slot:label>Score</x-slot:label>
        88%
    </ui:tile>

    <ui:tile>
        <x-slot:label>Tasks Completed</x-slot:label>
        <span>
            37
            <span class="opacity-60 text-lg font-medium">/ 42</span>
        </span>
    </ui:tile>
</ui:tiles>
```

#### Solid

```html +demo title={Tile Solid Variant}
<ui:tiles variant="solid">
    <ui:tile>
        <x-slot:label>Test Status</x-slot:label>
        <span class="text-success-600 dark:text-success-400">Passed</span>
    </ui:tile>

    <ui:tile>
        <x-slot:label>Score</x-slot:label>
        88%
    </ui:tile>

    <ui:tile>
        <x-slot:label>Tasks Completed</x-slot:label>
        <span>
            37
            <span class="opacity-60 text-lg font-medium">/ 42</span>
        </span>
    </ui:tile>
</ui:tiles>
```

#### Ghost

```html +demo title={Tile Ghost Variant}
<ui:tiles variant="ghost">
    <ui:tile>
        <x-slot:label>Test Status</x-slot:label>
        <span class="text-success-600 dark:text-success-400">Passed</span>
    </ui:tile>

    <ui:tile>
        <x-slot:label>Score</x-slot:label>
        88%
    </ui:tile>

    <ui:tile>
        <x-slot:label>Tasks Completed</x-slot:label>
        <span>
            37
            <span class="opacity-60 text-lg font-medium">/ 42</span>
        </span>
    </ui:tile>
</ui:tiles>
```

## Gap

The gap property controls the gap between tiles. It can be either `base` (default), `md`, or `lg`.

#### Small

```html +demo title={Tile Gap Property}
<ui:tiles gap="small">
    <ui:tile>
        <x-slot:label>Test Status</x-slot:label>
        <span class="text-success-600 dark:text-success-400">Passed</span>
    </ui:tile>

    <ui:tile>
        <x-slot:label>Score</x-slot:label>
        88%
    </ui:tile>

    <ui:tile>
        <x-slot:label>Tasks Completed</x-slot:label>
        <span>
            37
            <span class="opacity-60 text-lg font-medium">/ 42</span>
        </span>
    </ui:tile>
</ui:tiles>
```

#### Medium

```html +demo title={Tile Gap Property}
<ui:tiles gap="md">
    <ui:tile>
        <x-slot:label>Test Status</x-slot:label>
        <span class="text-success-600 dark:text-success-400">Passed</span>
    </ui:tile>

    <ui:tile>
        <x-slot:label>Score</x-slot:label>
        88%
    </ui:tile>

    <ui:tile>
        <x-slot:label>Tasks Completed</x-slot:label>
        <span>
            37
            <span class="opacity-60 text-lg font-medium">/ 42</span>
        </span>
    </ui:tile>
</ui:tiles>
```

#### Large

```html +demo title={Tile Gap Property}
<ui:tiles gap="lg">
    <ui:tile>
        <x-slot:label>Test Status</x-slot:label>
        <span class="text-success-600 dark:text-success-400">Passed</span>
    </ui:tile>

    <ui:tile>
        <x-slot:label>Score</x-slot:label>
        88%
    </ui:tile>

    <ui:tile>
        <x-slot:label>Tasks Completed</x-slot:label>
        <span>
            37
            <span class="opacity-60 text-lg font-medium">/ 42</span>
        </span>
    </ui:tile>
</ui:tiles>
```

## Slots

The individual `<ui:tile>` components support the following slots:

### Label

The label slot is used to display the label for the tile. It's the small text that appears above the main content of the tile.

```html +demo title={Label Slot}
<ui:tile>
    <x-slot:label>I'm a label, check me out!</x-slot:label>
    Tiles are great!
</ui:tile>
```

### Description

The description slot is used to display an optional the description for the tile. Descriptions appear
at the top right of the tile. This is often a good spot for badges or other small bits of information.

```html +demo title={Description Slot}
<ui:tile>
    <x-slot:label>I'm a label, check me out!</x-slot:label>
    <x-slot:description>Description 🤫</x-slot:description>
    Tiles are great!
</ui:tile>
```
