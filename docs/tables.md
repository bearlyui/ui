# Tables

---

## Using Tables

To use a table, use the `<ui:table>` tag. Define columns within the `header` slot and define the rows within the default slot.

Here's what an example table might look like:

```html +demo title={Basic Table}
<ui:table>
    <x-slot:header>
        <ui:col>Col 1</ui:col>
        <ui:col>Col 2</ui:col>
    </x-slot:header>
    <ui:row>
        <ui:cell>Cell 1</ui:cell>
        <ui:cell>Cell 2</ui:cell>
    </ui:row>
    <ui:row>
        <ui:cell>Cell 3</ui:cell>
        <ui:cell>Cell 4</ui:cell>
    </ui:row>
</ui:table>
```

## Properties

The following properties can be used to customize the table:

| Property | Type | Default | Description |
|:---|:---|:---|:---|
| `empty` | `boolean` | `false` | Displays an empty state message when true. |
| `emptyMessage` | `string` | `No data found` | Custom message for the empty state. |
| `hover` | `boolean` | `false` | Enables hover effects on table rows. |
| `hoverColor` | `string` | `secondary` | Sets the hover color. Options: `primary`, `secondary`, `success`, `warning`, `danger`. |
| `inset` | `boolean` | `false` | Adjusts table styling when used within a card. |
| `radius` | `string` | `sm` | Sets the border radius. Options: `none`, `sm`, `md`, `lg`. |
| `shadow` | `string` | `sm` | Sets the shadow size. Options: `sm`, `md`, `lg`. |
| `striped` | `boolean` | `false` | Enables striped rows for better readability. |

---

### Hover

The `hover` property adds a background color to table rows when they are hovered. Customize the color using the `hoverColor` property - options are `primary`, `secondary`, `success`, `warning`, `danger`.

```html +demo title={Row Hover}
<ui:table :hover="true" hover-color="primary">
    <x-slot:header>
        <ui:col>Col 1</ui:col>
        <ui:col>Col 2</ui:col>
    </x-slot:header>
    <ui:row>
        <ui:cell>Cell 1</ui:cell>
        <ui:cell>Cell 2</ui:cell>
    </ui:row>
    <ui:row>
        <ui:cell>Cell 3</ui:cell>
        <ui:cell>Cell 4</ui:cell>
    </ui:row>
</ui:table>
```

### Striping

The `striped` property alternates row colors for improved readability.

```html +demo title={Striped Rows}
<ui:table :striped="true">
    <x-slot:header>
        <ui:col>Col 1</ui:col>
        <ui:col>Col 2</ui:col>
    </x-slot:header>
    <ui:row>
        <ui:cell>Cell 1</ui:cell>
        <ui:cell>Cell 2</ui:cell>
    </ui:row>
    <ui:row>
        <ui:cell>Cell 3</ui:cell>
        <ui:cell>Cell 4</ui:cell>
    </ui:row>
    <ui:row>
        <ui:cell>Cell 5</ui:cell>
        <ui:cell>Cell 6</ui:cell>
    </ui:row>
</ui:table>
```

### Empty State

The `empty` property displays a message when the table has no data. Customize the message with `emptyMessage`.

```html +demo title={Empty State}
<ui:table :empty="true" empty-message="No records available, sadly.">
    <x-slot:header>
        <ui:col>Col 1</ui:col>
        <ui:col>Col 2</ui:col>
    </x-slot:header>
    <ui:row>
        <ui:cell>Cell 1</ui:cell>
        <ui:cell>Cell 2</ui:cell>
    </ui:row>
</ui:table>
```

### Inset

The `inset` property is used for nesting Tables within [Cards](/docs/cards). It uses negative margin to negate the padding of the card.

```html +demo title={Inset Table}
<ui:card>
    <x-slot:header>
        <ui:heading tag="h4">Card with Inset Table</ui:heading>
    </x-slot:header>
    <ui:table :inset="true">
        <x-slot:header>
            <ui:col>Col 1</ui:col>
            <ui:col>Col 2</ui:col>
        </x-slot:header>
        <ui:row>
            <ui:cell>Cell 1</ui:cell>
            <ui:cell>Cell 2</ui:cell>
        </ui:row>
        <ui:row>
            <ui:cell>Cell 3</ui:cell>
            <ui:cell>Cell 4</ui:cell>
        </ui:row>
    </ui:table>
</ui:card>

<ui:card class="mt-6">
    <x-slot:header>
        <ui:heading tag="h4">Card with Normal Table</ui:heading>
    </x-slot:header>
    <ui:table>
        <x-slot:header>
            <ui:col>Col 1</ui:col>
            <ui:col>Col 2</ui:col>
        </x-slot:header>
        <ui:row>
            <ui:cell>Cell 1</ui:cell>
            <ui:cell>Cell 2</ui:cell>
        </ui:row>
        <ui:row>
            <ui:cell>Cell 3</ui:cell>
            <ui:cell>Cell 4</ui:cell>
        </ui:row>
    </ui:table>
</ui:card>
```

## Hover Cells

The `<ui:cell>` component has its own special `hover` property. When enabled, it makes the cell's contents invisible until the **parent row** is hovered.
This is useful for hiding interactive elements like buttons until they're needed -- increasing readability in congested tables.

```html +demo title={Hover Cells}
<ui:table :hover="true">
    <x-slot:header>
        <ui:col>Col 1</ui:col>
        <ui:col>Col 2</ui:col>
        <ui:col>Col 3</ui:col>
    </x-slot:header>
    <ui:row>
        <ui:cell>Cell 1</ui:cell>
        <ui:cell>Cell 2</ui:cell>
        <ui:cell :hover="true">
            <ui:button size="sm">Button for Row Actions</ui:button>
        </ui:cell>
    </ui:row>
    <ui:row>
        <ui:cell>Cell 4</ui:cell>
        <ui:cell>Cell 5</ui:cell>
        <ui:cell :hover="true">Cell 6</ui:cell>
    </ui:row>
</ui:table>
```

## Related Components

### Col

Use `<ui:col>` to define a column within the table -- it's a wrapper for the `<th>` tag.

```html title={The Column Component}
<ui:col>Column 1</ui:col>
```

### Row
Use `<ui:row>` to define a row within the table -- it's a wrapper for the `<tr>` tag.

```html title={The Row Component}
<ui:row>
    <ui:cell>Cell 1</ui:cell>
    <ui:cell>Cell 2</ui:cell>
</ui:row>
```

### Cell
Use `<ui:cell>` to define a cell within a row.

```html title={The Cell Component}
<ui:cell>Content</ui:cell>
```
