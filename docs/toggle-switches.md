# Toggle Switches
## 🚧 TO DO
- [ ] Fill out documentation for existing properties/slot/etc...
- [ ] Make several other styles / variants
- [ ] Add `color` property and support for all colors?
- [ ] Allow icon toggling on or off via a property

If you need something more fancy than the standard checkbox, you can use the toggle switch component. It's a great way to get a yes/no answer from your users.

## Using Toggle Switches

Use `<x-ui::toggle>` to create a toggle switch. You can use the `checked` property to set the initial state of the toggle, or `wire:model`.

```html +demo
<x-ui::label class="inline-flex items-center space-x-2">
    <x-ui::toggle />
    <span>Yes, or no?</span>
</x-ui::label>
```

Since they're not real inputs, we use `x-modelable` to bind them to `wire:model` attributes. If `wire:model` isn't present, their values are automatically bound to a hidden input.

## Properties
### Checked
Use the `checked` property to set the initial state of the toggle.

```html
<x-ui::toggle :checked="$boolean" />
```

## Slots
### Icon On
Use the `icon-on` slot to customize the icon to use when the toggle is on.

```html
<x-ui::toggle>
    <x-slot:icon-on>
        <svg>...</svg>
    </x-slot:icon-on>
</x-ui::toggle>
```

### Icon Off
Use the `icon-off` slot to customize the icon to use when the toggle is off.

```html
<x-ui::toggle>
    <x-slot:icon-off>
        <svg>...</svg>
    </x-slot:icon-off>
</x-ui::toggle>
```
