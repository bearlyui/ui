<?php

namespace Bearly\Ui\Tests\Browser;

use Bearly\Ui\Tests\BrowserTestCase;

class DialogTest extends BrowserTestCase
{
    public function test_can_be_rendered()
    {
        $this->blade(<<<'HTML'
            <ui:dialog dusk="dialog">
                <x-slot:trigger>
                    <ui:button dusk="trigger">Open Dialog</ui:button>
                </x-slot:trigger>
                Hello Dialog
            </ui:dialog>
        HTML)
            ->tinker()
            ->assertVisible('@trigger')
            ->assertVisible('@dialog')
            ->assertSee('Hello');
    }
}
