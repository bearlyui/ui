<?php

namespace Bearly\Ui\Tests;

class LabelTest extends TestCase
{
    public function test_renders()
    {
        $this->blade('<x-label>Foo</x-ui::label>')
            ->assertSeeHtmlInOrder(['<label', 'Foo', '</label>']);
    }

    public function test_other_attributes()
    {
        $this->blade('<x-label thing="amajig" />')
            ->assertSeeHtmlInOrder(['<label', 'thing="amajig"', '</label>']);
    }
}
