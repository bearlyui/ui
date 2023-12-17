# Toggle Switches

If you need something more fancy than the standard checkbox, you can use the toggle switch component. It's a great way to get a yes/no answer from your users.

Since they're not real inputs, we use `x-modelable` to bind them to `wire:model` attributes. If `wire:model` isn't present, their values are automatically bound to a hidden input.

```html +demo
<x-ui::label class="inline-flex items-center space-x-2">
    <x-ui::toggle />
    <span>Yes, or no?</span>
</x-ui::label>
```
