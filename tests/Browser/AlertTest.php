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

    public function test_no_icon_by_default()
    {
        $this->blade('<ui:alert dusk="alert">Hello World</ui:alert>')
            ->assertMissing('@alert svg');
    }

    public function test_icon_property_adds_icon_svg()
    {
        $this->blade('<ui:alert icon="exclamation-triangle" dusk="alert">Hello World</ui:alert>')
            ->assertPresent('@alert svg')
            ->assertVisible('@alert svg');
    }

    public function test_including_heading_automatically_binds_aria_label()
    {
        $this->blade(<<<'HTML'
            <ui:alert dusk="alert">
                <ui:heading dusk="heading">Hello World</ui:heading>
            </ui:alert>
        HTML)
            ->assertAttribute('@heading', 'id', 'ui-alert-title-1')
            ->assertAttribute('@alert', 'aria-labelledby', 'ui-alert-title-1');
    }

    public function test_including_subheading_automatically_binds_aria_description()
    {
        $this->blade(<<<'HTML'
            <ui:alert dusk="alert">
                <ui:subheading dusk="subheading">Subheading</ui:subheading>
            </ui:alert>
        HTML)
            ->assertAttribute('@subheading', 'id', 'ui-alert-description-1')
            ->assertAttribute('@alert', 'aria-describedby', 'ui-alert-description-1');
    }
}
