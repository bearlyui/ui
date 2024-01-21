# Tooltips

Helpful little buggers that appear when you hover over an element. Great for giving extra context or showing keyboard shortcuts. They'll automatically use
their parent element as a trigger.

## Using Tooltips

Use `<x-ui::tooltip>` **inside an element** to add a tooltip to the parent element.

```html +demo
<x-ui::button color="success">
    <x-ui::tooltip title="Have a nice day!" />
    Hover for top secret info
</x-ui::button>
```

Tooltips are overflow-aware too, and will adjust their positioning if they overflow
outside of the viewport. Huge thanks to [Alpine's Anchor plugin](https://alpinejs.dev/plugins/anchor#positioning) and [Floating UI](https://floating-ui.com) for that.

## Properties

Use the following properties to customize your tooltips.

| Property | Type | Default | Description |
|:---|:---|:---|:---|
| `title` | `string` | `null` | The main title of the tooltip. |
| `shortcut` | `string` | `null` | Additional styled keyboard shortcut text. |
| `offset` | `integer` | `4` | The offset of the tooltip from the trigger element. |
| `position` | `string` | `top` | The position relative to the trigger element. |

---

### Title
The `title` prop is interchangeable with the default slot. Use whichever style you prefer.

```blade
{{-- title prop or default slot (same thing) --}}
<x-ui::tooltip title="Hello" />
<x-ui::tooltip>Hello</x-ui::tooltip>
```

### Shortcut
Use the `shortcut` prop (or slot) to add styled `<kbd>` tags to your tooltip.

```blade
{{-- shortcut prop or shortcut slot (same thing) --}}
<x-ui::tooltip shortcut="⌘+S" />
<x-ui::tooltip>
    <x-slot:shortcut>⌘+S</x-slot:shortcut>
</x-ui::tooltip>
```

### Offset & Position
The offset and position props correspond to options in Floating UI -- [via Alpine's Anchor plugin](https://alpinejs.dev/plugins/anchor#positioning).


## Examples

Here's a basic example.
```html +demo
<x-ui::button>
    <x-ui::tooltip title="Have a nice day!" />
    Hover me if you please
</x-ui::button>
```

You can also customize the position and offset, like this.
```html +demo
<x-ui::button>
    <x-ui::tooltip position="right" offset="20">Enjoy yourself, and be happy.</x-ui::tooltip>
    Another Tooltip Button
</x-ui::button>
