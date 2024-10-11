<?php

namespace Bearly\Ui\Tests;

class ButtonTest extends TestCase
{
    public function test_renders()
    {
        $this->blade('<ui:button />')
            ->assertSeeHtmlInOrder(['<button', '</button>']);
    }

    public function test_other_attributes()
    {
        $this->blade('<ui:button thing="amajig" />')
            ->assertSeeHtmlInOrder(['<button', 'thing="amajig"', '</button>']);
    }

    public function test_type_defaults_to_button()
    {
        $this->blade('<ui:button />')
            ->assertSeeHtmlInOrder(['<button', 'type="button"', '</button>']);
    }
}
