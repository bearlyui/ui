### Cards
Boxes in boxes in boxes. Cards to put stuff in. Not everything needs to be in a card, but they're great when you need 'em.
#### Basic Card

<x-code-demo lang="blade">
    <x-ui::card>Hello, I'm a happy little card!</x-ui::card>
    <x-slot:raw>@verbatim<x-ui::card>Hello, I'm a happy little card!</x-ui::card>@endverbatim</x-slot:raw>
</x-code-demo>

```html +demo
<div @class(['block p-3 border border-green-500 rounded'])>Hello! I'm a raw HTML code demo</div>
<x-ui::card class="mt-10">I'm a blade card component demo</x-ui::card>
```

#### Header & Footer
```html +demo
<x-ui::card>
    <x-slot:header>Card with Header &amp; Footer</x-slot:header>
    <div class="my-4 text-base text-black/60 dark:text-white/60">This is a card with a header. It lives in our happy little world.</div>
    <x-slot:footer>Example Footer</x-slot:footer>
</x-ui::card>
```
