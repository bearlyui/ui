# Cards

Cards to put stuff in. They're great when you need 'em.
Sometimes putting forms in cards is a good idea. Sometimes it's not. You do you.

## Basics

```html +demo
<x-ui::card class="mt-10">I'm a Happy Little Card</x-ui::card>
```

## Header & Footer
The ol' top-n-bottom.

```html +demo
<x-ui::card>
    <x-slot:header>Card with Header &amp; Footer</x-slot:header>
    <div class="my-4 text-base text-black/60 dark:text-white/60">This is a card with a header. It lives in our world.</div>
    <x-slot:footer>Example Footer</x-slot:footer>
</x-ui::card>
```
