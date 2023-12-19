# Alerts

Give some extra attention to the *important* stuff.

## Basic usage

Use the `<x-ui::alert>` component for simple alerts. Specify a theme with the `theme` attribute to change the alert's color.

```html +demo title={Basic Alerts} previewClasses={space-y-10}
<x-ui::alert>Hello, I'm an alert!</x-ui::alert>
<x-ui::alert theme="success">Happy little success message</x-ui::alert>
<x-ui::alert theme="warning">Warning, don't mess with this one.</x-ui::alert>
<x-ui::alert theme="error">Error 406 - Brain not found.</x-ui::alert>
```

## Including Titles
```html +demo title={Alert with Title} previewClasses={space-y-10}
<x-ui::alert title="Hello, Chat!">
    You folks are the best!
</x-ui::alert>

<x-ui::alert theme="success" title="Hello, Chat!">
    You folks are the best!
</x-ui::alert>

<x-ui::alert theme="warning" title="Hello, Chat!">
    You folks are the best!
</x-ui::alert>

<x-ui::alert theme="error" title="Hello, Chat!">
    You folks are the best!
</x-ui::alert>
```
