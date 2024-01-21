# Toggle Switches

If you need something more fancy than the standard checkbox, you can use the toggle switch component. It's
a great way to get a yes or no answer from your users. Most of them probably won't even growl at you!

## Using Toggle Switches

Use `<x-ui::toggle>` to create a toggle switch. You can use the `checked` property to set the initial state of the toggle, or `wire:model`.

```html +demo
<x-ui::label class="flex items-center space-x-2">
    <x-ui::toggle />
    <span>Yes, or no?</span>
</x-ui::label>

<x-ui::label class="flex mt-4 items-center space-x-2">
    <x-ui::toggle :checked="true" />
    <span>Yes, or no?</span>
</x-ui::label>

<x-ui::label class="flex mt-4 items-center space-x-2">
    <x-ui::toggle :checked="true" color="secondary" />
    <span>Yes, or no?</span>
</x-ui::label>

<x-ui::label class="flex mt-4 items-center space-x-2">
    <x-ui::toggle :checked="true" color="success" />
    <span>Yes, or no?</span>
</x-ui::label>

<x-ui::label class="flex mt-4 items-center space-x-2">
    <x-ui::toggle :checked="true" color="warning" />
    <span>Yes, or no?</span>
</x-ui::label>

<x-ui::label class="flex mt-4 items-center space-x-2">
    <x-ui::toggle :checked="true" color="error" />
    <span>Yes, or no?</span>
</x-ui::label>
```

Since they're not real inputs, we bind their value to a hidden checkbox. This allows Livewire and Alpine to support arrays of toggle switches, just like they were normal checkboxes... because... well, _the hidden one is a normal checkbox_.

## Properties

| Property | Type | Default | Description |
|:---|:---|:---|:---|
| `checked` | `boolean` | `false` | Determines the on or off state of the toggle switch. |
| `color` | `string \| Color` | `primary` | The color during the "on" state of the toggle. |
| `withIcon` | `boolean` | `true` | Include icons within the toggle's circle / dot. |

---

### Checked
Use the `checked` property to set the initial state of the toggle.

```html
<x-ui::toggle :checked="$boolean" />
```

### Color

Use the `color` property to set the color of the toggle when it's on. It can be any of the following:
`primary`, `secondary`, `success`, `warning`, `error`.

```html +demo
<x-ui::label class="flex mt-4 items-center space-x-2">
    <x-ui::toggle :checked="true" color="primary" />
    <span>Primary</span>
</x-ui::label>

<x-ui::label class="flex mt-4 items-center space-x-2">
    <x-ui::toggle :checked="true" color="secondary" />
    <span>Secondary</span>
</x-ui::label>

<x-ui::label class="flex mt-4 items-center space-x-2">
    <x-ui::toggle :checked="true" color="success" />
    <span>Success</span>
</x-ui::label>

<x-ui::label class="flex mt-4 items-center space-x-2">
    <x-ui::toggle :checked="true" color="warning" />
    <span>Warning</span>
</x-ui::label>

<x-ui::label class="flex mt-4 items-center space-x-2">
    <x-ui::toggle :checked="true" color="error" />
    <span>Error</span>
</x-ui::label>
```


### With Icon

Use the `withIcon` property to enable or disable an icon within the toggle's circle / dot.
There's an "X" and a checkmark icon that will be used by default thanks to the wonderful [Heroicons set](https://heroicons.com).


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
