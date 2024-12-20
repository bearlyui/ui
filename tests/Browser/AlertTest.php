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

    public function test_dismissing_one_doesnt_dismiss_others()
    {
        $this->blade(<<<'HTML'
            <ui:alert dusk="alert" :dismiss="true">Hello World</ui:alert>
            <ui:alert dusk="other" :dismiss="true">Other World</ui:alert>
        HTML)
            ->click('@alert button')
            ->waitUntilMissing('@alert')
            ->assertMissing('@alert')
            ->assertVisible('@other');
    }

    public function test_alert_close_works_on_enter_keypress()
    {
        $this->blade('<ui:alert dusk="alert" :dismiss="true">Hello World</ui:alert>')
            ->keys('@alert button', '{enter}')
            ->waitUntilMissing('@alert')
            ->assertMissing('@alert');
    }

    public function test_alert_close_works_on_space_keypress()
    {
        $this->blade('<ui:alert dusk="alert" :dismiss="true">Hello World</ui:alert>')
            ->keys('@alert button', '{space}')
            ->waitUntilMissing('@alert')
            ->assertMissing('@alert');
    }

    // TODO: Test the following:
    // - Icons
    // - Headings and Subheadings as automatically generated aria labels and descriptions
    // - General styling?
}
