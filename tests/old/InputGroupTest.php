<?php

namespace Bearly\Ui\Tests;

class InputGroupTest extends TestCase
{
    public function test_renders()
    {
        $this->blade('<ui:input-group>Foo</ui:input-group>')
            ->assertSeeHtmlInOrder(['<div', '>', 'Foo', '</div>']);
    }

    public function test_other_attributes()
    {
        $this->blade('<ui:input-group thing="amajig">Foo</ui:input-group>')
            ->assertSeeHtmlInOrder(['<div', 'thing="amajig"', '>', 'Foo', '</div>']);
    }

    public function test_label_prop()
    {
        $this->blade('<ui:input-group label="Foo">Bar</ui:input-group>')
            ->assertSeeHtmlInOrder(['<div', '>', '<label', 'Foo', '</label>', 'Bar', '</div>']);
    }

    public function test_label_slot()
    {
        $this->blade(<<<'HTML'
            <ui:input-group>
                <x-slot:label><label>Foo</label></x-slot:label>
                Bar
            </ui:input-group>
        HTML)->assertSeeHtmlInOrder(['<div', '>', '<label', 'Foo', '</label>', 'Bar', '</div>']);
    }

    public function test_for_prop_shows_errors()
    {
        $this->withViewErrors(['bar' => 'Baz'])
            ->blade('<ui:input-group for="bar">Foo</ui:input-group>')
            ->assertSeeHtmlInOrder(['<div', '>', 'Foo', '<div', 'text-red', 'Baz', '</div>', '</div>']);
    }

    public function test_for_prop_on_label()
    {
        $this->withViewErrors(['bar' => 'Baz'])
            ->blade('<ui:input-group for="bar" label="Foo">Bar</ui:input-group>')
            ->assertSeeHtmlInOrder(['<div', '>', '<label', 'Foo', '</label>', 'Bar', '<div', 'text-red', 'Baz', '</div>', '</div>']);
    }
}
