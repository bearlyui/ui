# Tooltips

Helpful little popups that appear when you hover over an element. They're great for
providing extra context or showing keyboard shortcuts. They'll automatically use
their parent element as a trigger.

Tooltips are overflow-aware too, and will adjust their positioning if they overflow
outside of the viewport. Huge thanks to [Alpine's Anchor plugin](https://alpinejs.dev/plugins/anchor#positioning) and [Floating UI](https://floating-ui.com) for that.

## Config Options
**The tooltip component exposes the following props**
```php
[
    'title' => null,
    'shortcut' => null,
    'position' => 'top',
    'offset' => 4,
]
```

The `title` prop is interchangeable with the default slot. Use whichever you prefer.

The `shortcut` prop is also interchangeable with a `shortcut` slot. Use it for specifying keyboard shortcuts.

The offset and position props correspond to options in Floating UI -- [via Alpine's Anchor plugin](https://alpinejs.dev/plugins/anchor#positioning).


## Examples

Here's a basic example.
```html +demo
<x-ui::button>
    <x-ui::tooltip title="Have a nice day!" />
    Hover me if you please
</x-ui::button>
```

You can also use them like this.
```html +demo
<x-ui::button>
    <x-ui::tooltip position="right" offset="20">Enjoy yourself, and be happy.</x-ui::tooltip>
    Another Tooltip Button
</x-ui::button>
