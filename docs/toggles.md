# Toggles

If you need something more fancy than the standard checkbox, you can use the toggle component. It's
a great way to get a yes or no answer from your users. Most of them probably won't even growl at you!

## Using Toggles

Create a toggle with the `<ui:toggle>` tag. Bind it to your data with `wire:model` or by using the `checked` property.

```html +demo
<ui:label class="flex items-center space-x-2">
    <ui:toggle />
    <span>Yes, or no?</span>
</ui:label>

<ui:label class="flex mt-4 items-center space-x-2">
    <ui:toggle :checked="true" />
    <span>Yes, or no?</span>
</ui:label>

<ui:label class="flex mt-4 items-center space-x-2">
    <ui:toggle :checked="true" color="secondary" />
    <span>Yes, or no?</span>
</ui:label>

<ui:label class="flex mt-4 items-center space-x-2">
    <ui:toggle :checked="true" color="success" />
    <span>Yes, or no?</span>
</ui:label>

<ui:label class="flex mt-4 items-center space-x-2">
    <ui:toggle :checked="true" color="warning" />
    <span>Yes, or no?</span>
</ui:label>

<ui:label class="flex mt-4 items-center space-x-2">
    <ui:toggle :checked="true" color="danger" />
    <span>Yes, or no?</span>
</ui:label>
```

Since they're not real inputs, we bind their value to a hidden checkbox. This allows Livewire and Alpine to support arrays of toggles as if they were normal checkboxes... because... well, _the hidden one **is** a normal checkbox_.

## Properties

| Property | Type | Default | Description |
|:---|:---|:---|:---|
| `checked` | `boolean` | `false` | Determines the on or off state of the toggle. |
| `color` | `string \| Color` | `primary` | The color during the "on" state of the toggle. |
| `withIcon` | `boolean` | `true` | Include icons within the toggle's circle / dot. |

---

### Checked
Use the `checked` property to set the initial state of the toggle.

```html
<ui:toggle :checked="true" />
```

### Color

Use the `color` property to set the color of the toggle when it's on. It can be any of the following:
`primary`, `secondary`, `success`, `warning`, `danger`.

```html +demo
<ui:label class="flex mt-4 items-center space-x-2">
    <ui:toggle :checked="true" color="primary" />
    <span>Primary</span>
</ui:label>

<ui:label class="flex mt-4 items-center space-x-2">
    <ui:toggle :checked="true" color="secondary" />
    <span>Secondary</span>
</ui:label>

<ui:label class="flex mt-4 items-center space-x-2">
    <ui:toggle :checked="true" color="success" />
    <span>Success</span>
</ui:label>

<ui:label class="flex mt-4 items-center space-x-2">
    <ui:toggle :checked="true" color="warning" />
    <span>Warning</span>
</ui:label>

<ui:label class="flex mt-4 items-center space-x-2">
    <ui:toggle :checked="true" color="danger" />
    <span>Danger</span>
</ui:label>
```


### With Icon

Use the `withIcon` property to enable or disable an icon within the toggle's circle / dot.
There's an "X" and a checkmark icon that will be used by default thanks to the wonderful [Heroicons set](https://heroicons.com).


## Slots
### Icon On
Use the `icon-on` slot to customize the icon to use when the toggle is on.

```html
<ui:toggle>
    <x-slot:icon-on>
        <svg>...</svg>
    </x-slot:icon-on>
</ui:toggle>
```

### Icon Off
Use the `icon-off` slot to customize the icon to use when the toggle is off.

```html
<ui:toggle>
    <x-slot:icon-off>
        <svg>...</svg>
    </x-slot:icon-off>
</ui:toggle>
```
