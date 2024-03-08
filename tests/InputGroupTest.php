<?php

namespace Bearly\Ui\Tests;

class InputGroupTest extends TestCase
{
    public function test_renders()
    {
        $this->blade('<x-input-group>Foo</x-ui::input-group>')
            ->assertSeeHtmlInOrder(['<div', '>', 'Foo', '</div>']);
    }

    public function test_other_attributes()
    {
        $this->blade('<x-input-group thing="amajig">Foo</x-ui::input-group>')
            ->assertSeeHtmlInOrder(['<div', 'thing="amajig"', '>', 'Foo', '</div>']);
    }

    public function test_label_prop()
    {
        $this->blade('<x-input-group label="Foo">Bar</x-ui::input-group>')
            ->assertSeeHtmlInOrder(['<div', '>', '<label', 'Foo', '</label>', 'Bar', '</div>']);
    }

    public function test_label_slot()
    {
        $this->blade(<<<'HTML'
            <x-input-group>
                <x-slot:label><label>Foo</label></x-slot:label>
                Bar
            </x-ui::input-group>
        HTML)->assertSeeHtmlInOrder(['<div', '>', '<label', 'Foo', '</label>', 'Bar', '</div>']);
    }

    public function test_for_prop_shows_errors()
    {
        $this->withViewErrors(['bar' => 'Baz'])
            ->blade('<x-input-group for="bar">Foo</x-ui::input-group>')
            ->assertSeeHtmlInOrder(['<div', '>', 'Foo', '<div', 'text-red', 'Baz', '</div>', '</div>']);
    }

    public function test_for_prop_on_label()
    {
        $this->withViewErrors(['bar' => 'Baz'])
            ->blade('<x-input-group for="bar" label="Foo">Bar</x-ui::input-group>')
            ->assertSeeHtmlInOrder(['<div', '>', '<label', 'Foo', '</label>', 'Bar', '<div', 'text-red', 'Baz', '</div>', '</div>']);
    }
}
