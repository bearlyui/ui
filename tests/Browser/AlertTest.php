<?php

namespace Bearly\Ui\Tests\Browser;

use Bearly\Ui\Tests\BrowserTestCase;

class AlertTest extends BrowserTestCase
{
    public function test_can_be_rendered()
    {
        $this->blade('<ui:alert dusk="alert">Hello World</ui:alert>')
            ->assertVisible('@alert')
            ->assertSee('Hello World');
    }

    public function test_can_be_dismissed()
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

    public function test_close_works_on_enter_keypress()
    {
        $this->blade('<ui:alert dusk="alert" :dismiss="true">Hello World</ui:alert>')
            ->keys('@alert button', '{enter}')
            ->waitUntilMissing('@alert')
            ->assertMissing('@alert');
    }

    public function test_close_works_on_space_keypress()
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

    public function test_icon_property_adds_svg()
    {
        $this->blade('<ui:alert icon="exclamation-triangle" dusk="alert"><span dusk="content">Hello World</span></ui:alert>')
            ->assertPresent('@alert svg + div > @content')
            ->assertVisible('@alert svg + div > @content');
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

    public function test_has_correct_role()
    {
        $this->blade('<ui:alert dusk="alert">Hello World</ui:alert>')
            ->assertAttribute('@alert', 'role', 'status');
    }

    public function test_role_can_be_overridden()
    {
        $this->blade('<ui:alert role="alert" dusk="alert">Hello World</ui:alert>')
            ->assertAttribute('@alert', 'role', 'alert');
    }

    public function test_heading_and_subheading_inherit_text_color()
    {
        $this->blade('<ui:alert color="primary" dusk="alert"><ui:heading>Heading</ui:heading><ui:subheading>Subheading</ui:subheading></ui:alert>')
            ->assertHasClass('@alert', '[&_[data-ui-heading]]:text-primary-800')
            ->assertHasClass('@alert', '[&_[data-ui-subheading]]:text-inherit');
    }

    public function test_color_variants()
    {
        $this->blade('<ui:alert color="danger" dusk="alert">Hello World</ui:alert>')
            ->assertHasClass('@alert', 'text-danger-700');

        $this->blade('<ui:alert color="secondary" dusk="alert">Hello World</ui:alert>')
            ->assertHasClass('@alert', 'text-secondary-600/85');

        $this->blade('<ui:alert color="success" dusk="alert">Hello World</ui:alert>')
            ->assertHasClass('@alert', 'text-success-700');

        $this->blade('<ui:alert color="warning" dusk="alert">Hello World</ui:alert>')
            ->assertHasClass('@alert', 'text-warning-700');

        $this->blade('<ui:alert color="danger" dusk="alert">Hello World</ui:alert>')
            ->assertHasClass('@alert', 'text-danger-700');
    }

    public function test_display_variants()
    {
        $this->blade('<ui:alert variant="outline" dusk="alert">Hello World</ui:alert>')
            ->assertHasClass('@alert', 'border')
            ->assertClassMissing('@alert', 'border-l-[6px]')
            ->assertClassMissing('@alert', 'shadow-md');

        $this->blade('<ui:alert variant="solid" dusk="alert">Hello World</ui:alert>')
            ->assertHasClass('@alert', 'border')
            ->assertHasClass('@alert', 'border-l-[6px]')
            ->assertClassMissing('@alert', 'shadow-md');

        $this->blade('<ui:alert variant="glow" dusk="alert">Hello World</ui:alert>')
            ->assertHasClass('@alert', 'border')
            ->assertHasClass('@alert', 'shadow-md')
            ->assertClassMissing('@alert', 'border-l-[6px]');
    }
}
