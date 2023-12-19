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

<x-ui::alert theme="error" title="Hello, Chat!">
    <x-slot:icon>
        <svg class="w-10 h-10" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" d="m20.25 7.5-.625 10.632a2.25 2.25 0 0 1-2.247 2.118H6.622a2.25 2.25 0 0 1-2.247-2.118L3.75 7.5m8.25 3v6.75m0 0-3-3m3 3 3-3M3.375 7.5h17.25c.621 0 1.125-.504 1.125-1.125v-1.5c0-.621-.504-1.125-1.125-1.125H3.375c-.621 0-1.125.504-1.125 1.125v1.5c0 .621.504 1.125 1.125 1.125Z" />
        </svg>
    </x-slot:icon>
    You folks are the best!
</x-ui::alert>

<x-ui::alert theme="error" title="Hello, Chat!">
    <x-slot:icon class="mt-0 opacity-10">
        <svg class="w-20 h-20" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" d="m20.25 7.5-.625 10.632a2.25 2.25 0 0 1-2.247 2.118H6.622a2.25 2.25 0 0 1-2.247-2.118L3.75 7.5m8.25 3v6.75m0 0-3-3m3 3 3-3M3.375 7.5h17.25c.621 0 1.125-.504 1.125-1.125v-1.5c0-.621-.504-1.125-1.125-1.125H3.375c-.621 0-1.125.504-1.125 1.125v1.5c0 .621.504 1.125 1.125 1.125Z" />
        </svg>
    </x-slot:icon>
    You folks are the best!
</x-ui::alert>

<x-ui::alert theme="error" title="WTF">
    You folks are the best!
    <x-slot:button>
        <x-ui::button>Dismiss</x-ui::button>
    </x-slot:button>
</x-ui::alert>
```
