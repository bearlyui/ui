# Dropdowns

Dropdown menus that just work. They're built on top of [Floating UI](https://floating-ui.com) and [Alpine.js](https://alpinejs.dev).
While they often seem simple on the surface, you might be surprised how complex they are under the hood. Things like focus states,
keyboard navigation, accessibility, and positioning are all (usually) handled for you.

---

## Using Dropdowns

To use a dropdown, use the `<ui:dropdown>` tag with an `<x-slot:trigger>` to define the triggering element (usually a button).

Here's what an example dropdown might look like:

```html +demo title={Basic Dropdown Menu}
<ui:dropdown>
    <x-slot:trigger>
        <ui:button>Click Me, If You Dare...</ui:button>
    </x-slot:trigger>
    <ui:dropdown-item>Grizzly Bears</ui:dropdown-item>
    <ui:dropdown-item>Polar Bears</ui:dropdown-item>
    <ui:dropdown-item>Panda Bears</ui:dropdown-item>
    <ui:dropdown-item>Teddy Bears</ui:dropdown-item>
</ui:dropdown>
```

## Properties

| Property | Type | Default | Description |
|:---|:---|:---|:---|
| `offset` | `integer` | `4` | The pixel-value gap between the menu and the trigger element. <br> _See the [Alpine docs on offset](https://alpinejs.dev/plugins/anchor#offset) for more._ |
| `position` | `string` | `bottom` | The dropdown's location relative to the trigger element. <br> _See the [Alpine docs on positioning](https://alpinejs.dev/plugins/anchor#positioning) for possible values._ |

---

### Offset

The the gap between the dropdown and the triggering element as a pixel value. This value is passed directly to [Alpine's Anchor plugin](https://alpinejs.dev/plugins/anchor), which is built on top of [Floating UI](https://floating-ui.com). Most of the time you'll want the default value, but if you need more or less space you can use this property to achieve it.
```html
<ui:dropdown offset="10">
    ...
</ui:dropdown>
```

### Position

The dropdown's location relative to the trigger element. This value is passed directly to [Alpine's Anchor plugin](https://alpinejs.dev/plugins/anchor) too. The default value is `bottom`, but you can also use `top`, `top-start`, `top-end`, `left`, `left-start`, `left-end`, `bottom-start`, `bottom-end`, `right`, `right-start`, and `right-end`.
```html
<ui:dropdown position="top">
    I open above the trigger element.
</ui:dropdown>
```

## Slots

### Trigger
Use `<x-slot:trigger>` to define the trigger element.

```html title={The Trigger Slot}
<x-slot:trigger>
    <button>...</button>
</x-slot:trigger>
```

## Dropdown Items

Use the `<ui:dropdown-item>` component to define menu items. The default slot is the item's main label.
Note that content gets wrapped in a `<span>` tag to allow for automatic spacing within menu items.

```html title={Dropdown Item}
<ui:dropdown-item>
    Make it grrreat!
</ui:dropdown-item>
```

### Properties

Dropdown items have a few properties:

| Property | Type | Default | Description |
|:---|:---|:---|:---|
| `dismiss` | `boolean` | `true` | Close the outer dropdown menu when the item is clicked (or focused and enter is pressed)  |
| `focusOnHover` | `boolean` | `true` | Focus the item when hovered over. Use kebab-case like `:focus-on-hover="false"` |
| `spacing` | `string` | `space-x-2` | A [Tailwind CSS Spacing Utility](https://tailwindcss.com/docs/space) class, like `space-x-2`. |

---

### Slots

The `<ui:dropdown-item>` has two named slots: `before` and `after`. Use the `before` slot to add
content before the menu item's main content -- or the `after` slot to add content after it. These
slots are most commonly used for icons or to denote further actions (such as a hover menu).

```html
<ui:dropdown-item>
    <x-slot:before>...</x-slot:before>
    ...
    <x-slot:after>...</x-slot:after>
</ui:dropdown-item>
```

```html +demo title={Menu Items - Before / After Slots}
<ui:dropdown>
    <x-slot:trigger>
        <ui:button>Example Before / After Slots</ui:button>
    </x-slot:trigger>
    <ui:dropdown-item>
        <x-slot:before>
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 18.75a60.07 60.07 0 0115.797 2.101c.727.198 1.453-.342 1.453-1.096V18.75M3.75 4.5v.75A.75.75 0 013 6h-.75m0 0v-.375c0-.621.504-1.125 1.125-1.125H20.25M2.25 6v9m18-10.5v.75c0 .414.336.75.75.75h.75m-1.5-1.5h.375c.621 0 1.125.504 1.125 1.125v9.75c0 .621-.504 1.125-1.125 1.125h-.375m1.5-1.5H21a.75.75 0 00-.75.75v.75m0 0H3.75m0 0h-.375a1.125 1.125 0 01-1.125-1.125V15m1.5 1.5v-.75A.75.75 0 003 15h-.75M15 10.5a3 3 0 11-6 0 3 3 0 016 0zm3 0h.008v.008H18V10.5zm-12 0h.008v.008H6V10.5z" />
            </svg>
        </x-slot:before>
        Menu Item with Before / After icons
        <x-slot:after>
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-5 h-5">
                <path fill-rule="evenodd" d="M15.28 9.47a.75.75 0 0 1 0 1.06l-4.25 4.25a.75.75 0 1 1-1.06-1.06L13.69 10 9.97 6.28a.75.75 0 0 1 1.06-1.06l4.25 4.25ZM6.03 5.22l4.25 4.25a.75.75 0 0 1 0 1.06l-4.25 4.25a.75.75 0 0 1-1.06-1.06L8.69 10 4.97 6.28a.75.75 0 0 1 1.06-1.06Z" clip-rule="evenodd" />
            </svg>
        </x-slot:after>
    </ui:dropdown-item>
</ui:dropdown>
```

#### Slot Attribute Forwarding

The `before` and `after` slots are also wrapped in a `<span>` tag, and the slot attributes are forwarded to it
by default. This means you can use the `class` attribute to style the content within each slot.

```html
<ui:dropdown-item>
    <x-slot:before class="text-red-500">...</x-slot:before>
    ...
    <x-slot:after class="text-blue-500">...</x-slot:after>
</ui:dropdown-item>
```

```html +demo title={Menu Items - Before / After Slots with Classes}
<ui:dropdown>
    <x-slot:trigger>
        <ui:button>Example Before / After Slots with Classes</ui:button>
    </x-slot:trigger>
    <ui:dropdown-item>
        <x-slot:before class="text-red-500">
            RED
        </x-slot:before>
        Menu Item with Before / After icons
        <x-slot:after class="text-blue-500">
            BLUE
        </x-slot:after>
    </ui:dropdown-item>
</ui:dropdown>
```

<!-- ## Another Example

This dropdown uses the `before` slot to add an icon before the menu item's main content.

```html +demo title={Dropdown Menu Example}
<ui:dropdown>
    <x-slot:trigger>
        <ui:button>Example Dropdown</ui:button>
    </x-slot:trigger>
    <ui:dropdown-item x-on:click="closeDropdown">
        <x-slot:before>
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 18.75a60.07 60.07 0 0115.797 2.101c.727.198 1.453-.342 1.453-1.096V18.75M3.75 4.5v.75A.75.75 0 013 6h-.75m0 0v-.375c0-.621.504-1.125 1.125-1.125H20.25M2.25 6v9m18-10.5v.75c0 .414.336.75.75.75h.75m-1.5-1.5h.375c.621 0 1.125.504 1.125 1.125v9.75c0 .621-.504 1.125-1.125 1.125h-.375m1.5-1.5H21a.75.75 0 00-.75.75v.75m0 0H3.75m0 0h-.375a1.125 1.125 0 01-1.125-1.125V15m1.5 1.5v-.75A.75.75 0 003 15h-.75M15 10.5a3 3 0 11-6 0 3 3 0 016 0zm3 0h.008v.008H18V10.5zm-12 0h.008v.008H6V10.5z" />
            </svg>
        </x-slot:before>
        Menu Item 1
    </ui:dropdown-item>
    <ui:dropdown-item>
        <x-slot:before>
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                <path stroke-linecap="round" stroke-linejoin="round" d="M4.26 10.147a60.436 60.436 0 00-.491 6.347A48.627 48.627 0 0112 20.904a48.627 48.627 0 018.232-4.41 60.46 60.46 0 00-.491-6.347m-15.482 0a50.57 50.57 0 00-2.658-.813A59.905 59.905 0 0112 3.493a59.902 59.902 0 0110.399 5.84c-.896.248-1.783.52-2.658.814m-15.482 0A50.697 50.697 0 0112 13.489a50.702 50.702 0 017.74-3.342M6.75 15a.75.75 0 100-1.5.75.75 0 000 1.5zm0 0v-3.675A55.378 55.378 0 0112 8.443m-7.007 11.55A5.981 5.981 0 006.75 15.75v-1.5" />
            </svg>
        </x-slot:before>
        Menu Item 2
    </ui:dropdown-item>
    <ui:dropdown-item>
        <x-slot:before>
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                <path stroke-linecap="round" stroke-linejoin="round" d="M20.25 7.5l-.625 10.632a2.25 2.25 0 01-2.247 2.118H6.622a2.25 2.25 0 01-2.247-2.118L3.75 7.5m8.25 3v6.75m0 0l-3-3m3 3l3-3M3.375 7.5h17.25c.621 0 1.125-.504 1.125-1.125v-1.5c0-.621-.504-1.125-1.125-1.125H3.375c-.621 0-1.125.504-1.125 1.125v1.5c0 .621.504 1.125 1.125 1.125z" />
            </svg>
        </x-slot:before>
        Menu Item 3
    </ui:dropdown-item>
</ui:dropdown>
``` -->
