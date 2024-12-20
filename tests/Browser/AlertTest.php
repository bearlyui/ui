<?php

namespace Bearly\Ui\Tests\Browser;

use Bearly\Ui\Tests\BrowserTestCase;

class AlertTest extends BrowserTestCase
{
    public function test_alert_can_be_rendered()
    {
        $this->blade('<ui:alert>Hello World</ui:alert>')->assertSee('Hello World');
    }

    public function test_alert_can_be_dismissed()
    {
        $this->blade('<ui:alert :dismiss="true" dusk="alert">Hello World</ui:alert>')
            ->click('@alert button')
            ->waitUntilMissing('@alert')
            ->assertMissing('@alert');
    }
}
