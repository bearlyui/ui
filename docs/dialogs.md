# Dialogs

Pop! ...goes the dialog. Or is it a modal? Once you pop, you can't stop. Dialogs are overlay windows that appear on top of the main content, requiring user interaction before returning to the main view.

## Using Dialogs

To use a dialog in your Blade templates, you can use the `<ui:dialog>` component. Here's a basic example:

```html +demo title={Basic Dialog}
<ui:dialog>
    <x-slot:trigger>
        <ui:button>Modal, or Dialog? You choose.</ui:button>
    </x-slot:trigger>

    <p class="min-h-[200px] text-center mt-20">All my happy little content mistakes end up here.</p>
</ui:dialog>
```

## Properties

| Property | Type | Default | Description |
|:---|:---|:---|:---|
| `size` | `string` | `'md'` | Controls the maximum width of the dialog. |
| `hideCloseButton` | `boolean` | `false` | Hides the default close button in the top-right corner. |
| `cardClass` | `string\|null` | `null` | Additional CSS classes to apply to the dialog card. |
| `containerClass` | `string\|null` | `null` | Additional CSS classes to apply to the dialog container. |

---

### size

Controls the maximum width of the dialog. Available options are `'xs'`, `'sm'`, `'md'`, `'lg'`, `'xl'`, and `'full'`.

```html
<ui:dialog size="lg">
    <!-- Dialog content -->
</ui:dialog>
```

### hideCloseButton

Hides the default close button in the top-right corner of the dialog.

```html
<ui:dialog :hideCloseButton="true">
    <!-- Dialog content -->
</ui:dialog>
```

### cardClass

Additional CSS classes to apply to the dialog card.

```html
<ui:dialog cardClass="bg-gray-100">
    <!-- Dialog content -->
</ui:dialog>
```

### containerClass

Additional CSS classes to apply to the dialog container.

```html
<ui:dialog containerClass="bg-opacity-75">
    <!-- Dialog content -->
</ui:dialog>
```

## Slots

### trigger

Use `<x-slot:trigger>` to define the element that opens the dialog when clicked.

```html
<x-slot:trigger>
    <ui:button>Open Dialog</ui:button>
</x-slot:trigger>
```

### header

Custom header content for the dialog. If not provided, a default close button will be shown (unless `hideCloseButton` is set to `true`).

```html
<x-slot:header>
    <h2 class="text-xl font-bold">Custom Header</h2>
</x-slot:header>
```

### default

The main content of the dialog.

```html
<ui:dialog>
    <p>This is the main content of the dialog.</p>
</ui:dialog>
```

### footer

Optional footer content for the dialog.

```html
<x-slot:footer>
    <ui:button x-on:click="closeDialog">Close</ui:button>
    <ui:button color="primary">Save</ui:button>
</x-slot:footer>
```

## Dialog Accessibility

TODO: explain how using the ui:heading and ui:subheading components make the dialog automatically associate the `aria-labelledby` and `aria-describedby` attributes for accessibility.

## Accessibility

The dialog component includes several accessibility features:
- Uses `role="dialog"` and `aria-modal="true"`
- Automatically sets `aria-labelledby` and `aria-describedby` attributes
- Traps focus within the dialog when open
- Closes the dialog when the Escape key is pressed
- Implements a mobile-friendly drag-to-close feature

## JavaScript Interaction

The dialog uses Alpine.js for its functionality. You can interact with the dialog programmatically using the following methods:

- `openDialog()`: Opens the dialog
- `closeDialog()`: Closes the dialog

Example:

```html
<ui:dialog x-ref="myDialog">
    <!-- Dialog content -->
</ui:dialog>

<ui:button x-on:click="$refs.myDialog.openDialog()">Open Dialog</ui:button>
```
