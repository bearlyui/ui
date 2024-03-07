# Tooltips

Helpful little buggers that appear at the darndest times (when you hover an element). Kind of like bear cubs.
Maybe you can use them for showing extra context, keyboard shortcuts, or other low-priority information.

**Tooltips use their parent element as the trigger.**

## Using Tooltips

Use `<x-tooltip>` **_inside an element_** to trigger the tooltip by hovering its parent element.

```html +demo title={A Basic Tooltip}
<x-button color="success">
    <x-tooltip title="Have a nice day!" />
    Hover for top secret info
</x-ui::button>
```

Tooltips will adjust their positioning if they overflow outside the viewport.
The anchoring behavior and the overflow handling are made possible thanks to
[Alpine's Anchor plugin](https://alpinejs.dev/plugins/anchor#positioning) and [Floating UI](https://floating-ui.com).

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
{{-- `title` prop or default slot (same thing) --}}
<x-tooltip title="Hello" />
<x-tooltip>Hello</x-ui::tooltip>
```

### Shortcut
Use the `shortcut` prop (or slot) to add styled `<kbd>` tags to your tooltip.

```blade
{{-- `shortcut` prop or shortcut slot (same thing) --}}
<x-tooltip shortcut="⌘+S" />
<x-tooltip>
    <x-slot:shortcut>⌘+S</x-slot:shortcut>
</x-ui::tooltip>
```

### Offset
The offset defines how far (in pixels) the tooltip appears from the triggering element.
In other words, the gap between the tooltip and what it's attached to. The default is `4` -- although any integer value will work.

```html
<x-tooltip title="I'm a tooltip" offset="10" />
```

### Position
The position prop defines where the tooltip appears relative to its triggering element.
This property defaults to `top`, but you can also use `top-start`, `top-end`, `bottom`, `bottom-start`, `bottom-end`, `left`, `left-start`, `left-end`, `right`, `right-start`, and `right-end`.

Both the `offset` and `position` props are sent to [Floating UI](https://floating-ui.com) Alpine's [Anchor plugin](https://alpinejs.dev/plugins/anchor#positioning).

### Size
The size prop defines the size of the tooltip. The default is `sm`, but you can also use `base`, `md`, and `lg`.
Why would you want a tooltip to be large? I don't know, but you can if you want to.

```html +demo title={Tooltip Sizes} previewClasses={flex justify-between}
<x-button>
    Small (sm - the default)
    <x-tooltip title="I'm a small tooltip" />
</x-ui::button>

<x-button>
    Base (base)
    <x-tooltip size="base" title="I'm a base-sized tooltip" />
</x-ui::button>

<x-button>
    Medium (md)
    <x-tooltip size="md" title="I'm a medium-sized tooltip" />
</x-ui::button>

<x-button>
    Large (lg)
    <x-tooltip size="lg" title="I'm a large tooltip" />
</x-ui::button>
```

## Examples

Here's an example of the tooltip defaults
```html +demo title={Default Tooltip}
<x-button>
    <x-tooltip title="Have a nice day!" />
    Hover me if you please
</x-ui::button>
```

You can also customize the position and offset, like this.
```html +demo title={Custom Offset and Position}
<x-button>
    <x-tooltip position="right" offset="20">Enjoy yourself, and be happy.</x-ui::tooltip>
    Mouse over, and be happy
</x-ui::button>
