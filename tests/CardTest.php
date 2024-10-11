<?php

namespace Bearly\Ui\Tests;

class CardTest extends TestCase
{
    public function test_renders()
    {
        $this->blade('<ui:card>Foo</ui:card>')
            ->assertSeeHtmlInOrder(['<div', '>', 'Foo', '</div>']);
    }

    public function test_other_attributes()
    {
        $this->blade('<ui:card thing="amajig">Foo</ui:card>')
            ->assertSeeHtmlInOrder(['<div', 'thing="amajig"', '>', 'Foo', '</div>']);
    }

    // Test header slot works
    public function test_header_and_footer()
    {
        $this->blade(<<<'HTML'
            <ui:card>
                <x-slot:header>Foo</x-slot:header>
                Bar
                <x-slot:footer>Baz</x-slot:footer>
            </ui:card>
        HTML)->assertSeeHtmlInOrder(['<div', '>', '<div', 'Foo', '</div>', 'Bar', '</div>', 'Baz', '</div>']);
    }
}
