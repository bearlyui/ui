<?php

namespace Bearly\Ui\Tests;

class LabelTest extends TestCase
{
    public function test_renders()
    {
        $this->blade('<ui:label>Foo</ui:label>')
            ->assertSeeHtmlInOrder(['<label', 'Foo', '</label>']);
    }

    public function test_other_attributes()
    {
        $this->blade('<ui:label thing="amajig" />')
            ->assertSeeHtmlInOrder(['<label', 'thing="amajig"', '</label>']);
    }
}
