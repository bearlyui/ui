# Dialogs

Pop! ...goes the dialog. Or is it a modal? In our case, it's technically a "modal dialog". They're overlay windows that appear on top of the main content, requiring user interaction before returning to the main page.

## Using Dialogs

Use the `<ui:dialog>` tag to create a dialog. In their simplest form, they require a `trigger` slot and content in the main slot. Here's a basic example:

```html +demo title={Basic Dialog}
<ui:dialog>
    <x-slot:trigger>
        <ui:button>Modal, or Dialog? Who knows.</ui:button>
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
    <ui:heading>Custom Header</ui:heading>
</x-slot:header>
```

### default

The main content of the dialog.

```html
<ui:dialog>
    <!-- ... -->
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


## Accessibility

Dialog components include many accessibility considerations. Here are some key features:

- Traps focus within the dialog when open, returns it when it closes
- Automatically sets ARIA label and description when `ui:heading` and `ui:subheading` components present
- Includes the `role` and other modal-related `aria` attributes by default
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
