### Cards
Boxes in boxes in boxes. Cards to put stuff in. Not everything needs to be in a card, but they're great when you need 'em.
#### Basic Card

<x-code-demo lang="blade">
    <x-ui::card>Hello, I'm a happy little card!</x-ui::card>
    <x-slot:raw>@verbatim<x-ui::card>Hello, I'm a happy little card!</x-ui::card>@endverbatim</x-slot:raw>
</x-code-demo>


#### Header & Footer
<x-code-demo lang="blade">
<x-ui::card>
    <x-slot:header>Card with Header &amp; Footer</x-slot:header>
    <div class="my-4 text-base text-black/60 dark:text-white/60">This is a card with a header. It lives in our happy little world.</div>
    <x-slot:footer>Example Footer</x-slot:footer>
</x-ui::card>
<x-slot:raw>
@verbatim
<x-ui::card>
    <x-slot:header>Card with Header &amp; Footer</x-slot:header>
    <div class="my-4 text-base text-black/60 dark:text-white/60">This is a card with a header. It lives in our happy little world.</div>
    <x-slot:footer>Example Footer</x-slot:footer>
</x-ui::card>
@endverbatim
</x-slot:raw>
</x-code-demo>
