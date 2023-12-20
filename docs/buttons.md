# Buttons

The button components still need some love. They're intentionally simple so far, but they need to be beefed up with more options and styles (and focus states!).
A simple button component, not much to see here. This component needs to be beefed up and is still a work in progress.


## Basic Buttons

**This is a demo block!**
```html +demo title={Simple Buttons} previewClasses={grid gap-5 grid-cols-2 md:grid-cols-5 items-end justify-center py-12}
<x-ui::button>Primary</x-ui::button>
<x-ui::button color="secondary">Secondary</x-ui::button>
<x-ui::button color="success">Success</x-ui::button>
<x-ui::button color="warning">Warning</x-ui::button>
<x-ui::button color="error">Error</x-ui::button>
```

### Sizing
Buttons come in 5 sizes: `xs`, `sm`, `md` (default), `lg`, and `xl`. You can
disable any default sizing and specify your own by including `size="none"`.

```html +demo title={Button Sizing} previewClasses={flex space-x-5 items-end justify-center py-12}
<x-ui::button size="xs">Extra Small (xs)</x-ui::button>
<x-ui::button size="sm">Small (sm)</x-ui::button>
<x-ui::button>Base (DEFAULT)</x-ui::button>
<x-ui::button size="md">Medium (md)</x-ui::button>
<x-ui::button size="lg">Large (lg)</x-ui::button>
<x-ui::button size="xl">Extra Large (xl)</x-ui::button>
```
