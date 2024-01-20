# Dropdowns
## 🚧 TO DO
- [x] Fill out documentation for properties and slots
- [ ] Improve hover/selected/focus states -- handle when hovering but also using mouse to select a different item via keyboard focus?

Dropdowns give you the power to pawsitively enhance your user interface. They can be used for navigation, settings, or any other list of options.

## Using Dropdowns
Define the element that opens the dropdown with the `trigger` slot. It can be anything you want, but it's usually a button.

```html +demo title={Basic Dropdown Menu}
<x-ui::dropdown>
    <x-slot:trigger>
        <x-ui::button>Click Me, If You Dare...</x-ui::button>
    </x-slot:trigger>
    <x-ui::dropdown.item>Grizzly Bears</x-ui::dropdown.item>
    <x-ui::dropdown.item>Polar Bears</x-ui::dropdown.item>
    <x-ui::dropdown.item>Panda Bears</x-ui::dropdown.item>
</x-ui::dropdown>
```

### Menu Item Components
Use the `<x-ui::dropdown.item>` component to define menu items.

```html title={Dropdown Item}
<x-ui::dropdown.item>...</x-ui::dropdown.item>
```

### Full Example

An example dropdown might look like this:

```html +demo title={Dropdown Menu Example}
<x-ui::dropdown>
    <x-slot:trigger>
        <x-ui::button>Example Dropdown</x-ui::button>
    </x-slot:trigger>
    <x-ui::dropdown.item x-on:click="closeDropdown">
        <x-slot:icon>
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 18.75a60.07 60.07 0 0115.797 2.101c.727.198 1.453-.342 1.453-1.096V18.75M3.75 4.5v.75A.75.75 0 013 6h-.75m0 0v-.375c0-.621.504-1.125 1.125-1.125H20.25M2.25 6v9m18-10.5v.75c0 .414.336.75.75.75h.75m-1.5-1.5h.375c.621 0 1.125.504 1.125 1.125v9.75c0 .621-.504 1.125-1.125 1.125h-.375m1.5-1.5H21a.75.75 0 00-.75.75v.75m0 0H3.75m0 0h-.375a1.125 1.125 0 01-1.125-1.125V15m1.5 1.5v-.75A.75.75 0 003 15h-.75M15 10.5a3 3 0 11-6 0 3 3 0 016 0zm3 0h.008v.008H18V10.5zm-12 0h.008v.008H6V10.5z" />
            </svg>
        </x-slot:icon>
        Menu Item 1
    </x-ui::dropdown.item>
    <x-ui::dropdown.item>
        <x-slot:icon>
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                <path stroke-linecap="round" stroke-linejoin="round" d="M4.26 10.147a60.436 60.436 0 00-.491 6.347A48.627 48.627 0 0112 20.904a48.627 48.627 0 018.232-4.41 60.46 60.46 0 00-.491-6.347m-15.482 0a50.57 50.57 0 00-2.658-.813A59.905 59.905 0 0112 3.493a59.902 59.902 0 0110.399 5.84c-.896.248-1.783.52-2.658.814m-15.482 0A50.697 50.697 0 0112 13.489a50.702 50.702 0 017.74-3.342M6.75 15a.75.75 0 100-1.5.75.75 0 000 1.5zm0 0v-3.675A55.378 55.378 0 0112 8.443m-7.007 11.55A5.981 5.981 0 006.75 15.75v-1.5" />
            </svg>
        </x-slot:icon>
        Menu Item 2
    </x-ui::dropdown.item>
    <x-ui::dropdown.item>
        <x-slot:icon>
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                <path stroke-linecap="round" stroke-linejoin="round" d="M20.25 7.5l-.625 10.632a2.25 2.25 0 01-2.247 2.118H6.622a2.25 2.25 0 01-2.247-2.118L3.75 7.5m8.25 3v6.75m0 0l-3-3m3 3l3-3M3.375 7.5h17.25c.621 0 1.125-.504 1.125-1.125v-1.5c0-.621-.504-1.125-1.125-1.125H3.375c-.621 0-1.125.504-1.125 1.125v1.5c0 .621.504 1.125 1.125 1.125z" />
            </svg>
        </x-slot:icon>
        Menu Item 3
    </x-ui::dropdown.item>
</x-ui::dropdown>
```

## Properties

| Property | Type | Default | Description |
|:---|:---|:---|:---|
| `offset` | `integer` | `true` | The pixel-value gap between the menu and the trigger element. <br> _See the [Alpine docs on offset](https://alpinejs.dev/plugins/anchor#offset) for more._ |
| `position` | `string` | `bottom` | The dropdown's location relative to the trigger element. <br> _See the [Alpine docs on positioning](https://alpinejs.dev/plugins/anchor#positioning) for possible values._ |
---

### Offset

The the gap between the dropdown and the triggering element as a pixel value. This value is passed directly to [Alpine's Anchor plugin](https://alpinejs.dev/plugins/anchor), which is built on top of [Floating UI](https://floating-ui.com). Most of the time you'll want the default value, but if you need more or less space you can use this property to achieve it.
```html
<x-ui::dropdown offset="10">
    ...
</x-ui::dropdown>
```

### Position

The dropdown's location relative to the trigger element. This value is passed directly to [Alpine's Anchor plugin](https://alpinejs.dev/plugins/anchor) too. The default value is `bottom`, but you can also use `top`, `top-start`, `top-end`, `left`, `left-start`, `left-end`, `bottom-start`, `bottom-end`, `right`, `right-start`, and `right-end`.
```html
<x-ui::dropdown position="top">
    I open above the trigger element.
</x-ui::dropdown>
```

## Slots

### Trigger
Use `<x-slot:trigger>` to define the trigger element.

```html title={The Trigger Slot}
<x-slot:trigger>
    <button>...</button>
</x-slot:trigger>
```
