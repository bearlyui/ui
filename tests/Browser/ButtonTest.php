<?php

namespace Bearly\Ui\Tests\Browser;

use Bearly\Ui\Tests\BrowserTestCase;

class ButtonTest extends BrowserTestCase
{
    public function test_can_be_rendered()
    {
        $this->blade('<ui:button dusk="btn">Click Me</ui:button>')
            ->assertVisible('@btn')
            ->assertSee('Click Me');
    }

    public function test_colors()
    {
        $this->blade('<ui:button color="primary" dusk="btn">Button</ui:button>')
            ->assertHasClass('@btn', 'bg-primary-700');

        $this->blade('<ui:button color="secondary" dusk="btn">Button</ui:button>')
            ->assertHasClass('@btn', 'bg-secondary-50');

        $this->blade('<ui:button color="success" dusk="btn">Button</ui:button>')
            ->assertHasClass('@btn', 'bg-success-500/85');

        $this->blade('<ui:button color="warning" dusk="btn">Button</ui:button>')
            ->assertHasClass('@btn', 'bg-warning-400');

        $this->blade('<ui:button color="danger" dusk="btn">Button</ui:button>')
            ->assertHasClass('@btn', 'bg-danger-500/80');
    }

    public function test_sizes()
    {
        $this->blade('<ui:button size="xs" dusk="btn">Button</ui:button>')
            ->assertHasClass('@btn', 'px-1.5')
            ->assertHasClass('@btn', 'py-1')
            ->assertHasClass('@btn', 'text-xs');

        $this->blade('<ui:button size="sm" dusk="btn">Button</ui:button>')
            ->assertHasClass('@btn', 'px-2')
            ->assertHasClass('@btn', 'py-1.5')
            ->assertHasClass('@btn', 'text-sm');

        $this->blade('<ui:button size="base" dusk="btn">Button</ui:button>')
            ->assertHasClass('@btn', 'px-4')
            ->assertHasClass('@btn', 'py-2')
            ->assertHasClass('@btn', 'text-sm');

        $this->blade('<ui:button size="md" dusk="btn">Button</ui:button>')
            ->assertHasClass('@btn', 'px-5')
            ->assertHasClass('@btn', 'py-2.5')
            ->assertHasClass('@btn', 'text-base');

        $this->blade('<ui:button size="lg" dusk="btn">Button</ui:button>')
            ->assertHasClass('@btn', 'px-6')
            ->assertHasClass('@btn', 'py-3')
            ->assertHasClass('@btn', 'text-lg');

        $this->blade('<ui:button size="xl" dusk="btn">Button</ui:button>')
            ->assertHasClass('@btn', 'px-8')
            ->assertHasClass('@btn', 'py-4')
            ->assertHasClass('@btn', 'text-xl');
    }

    public function test_variants()
    {
        $this->blade('<ui:button variant="solid" color="primary" dusk="btn">Button</ui:button>')
            ->assertHasClass('@btn', 'border')
            ->assertHasClass('@btn', 'shadow-sm')
            ->assertHasClass('@btn', 'hover:shadow')
            ->assertHasClass('@btn', '[text-shadow:0.5px_0.5px_0px_rgba(255,255,255,0.24)]');

        $this->blade('<ui:button variant="ghost" color="primary" dusk="btn">Button</ui:button>')
            ->assertHasClass('@btn', 'hover:bg-gray-500/5')
            ->assertClassMissing('@btn', 'border')
            ->assertClassMissing('@btn', 'shadow-sm');

        $this->blade('<ui:button variant="outline" color="primary" dusk="btn">Button</ui:button>')
            ->assertHasClass('@btn', 'border')
            ->assertHasClass('@btn', 'shadow-sm')
            ->assertHasClass('@btn', 'hover:shadow');
    }

    public function test_corner_radius()
    {
        $this->blade('<ui:button radius="none" dusk="btn">Button</ui:button>')
            ->assertHasClass('@btn', 'rounded-none');
        $this->blade('<ui:button radius="sm" dusk="btn">Button</ui:button>')
            ->assertHasClass('@btn', 'rounded-sm');
        $this->blade('<ui:button radius="base" dusk="btn">Button</ui:button>')
            ->assertHasClass('@btn', 'rounded');
        $this->blade('<ui:button radius="md" dusk="btn">Button</ui:button>')
            ->assertHasClass('@btn', 'rounded-md');
        $this->blade('<ui:button radius="lg" dusk="btn">Button</ui:button>')
            ->assertHasClass('@btn', 'rounded-lg');
        $this->blade('<ui:button radius="xl" dusk="btn">Button</ui:button>')
            ->assertHasClass('@btn', 'rounded-xl');
        $this->blade('<ui:button radius="full" dusk="btn">Button</ui:button>')
            ->assertHasClass('@btn', 'rounded-full');
    }

    public function test_with_href()
    {
        $this->blade('<ui:button href="https://example.com" dusk="btn">Link</ui:button>')
            ->assertAttribute('@btn', 'onclick', "window.location.href='https://example.com'");
    }

    public function test_with_icon()
    {
        $this->blade('<ui:button icon="arrow-left" dusk="btn"><span>Button</span></ui:button>')
            ->assertMissing('@btn svg:last-child')
            ->assertPresent('@btn svg:first-child')
            ->assertHasClass('@btn svg:first-child', 'mr-2');
    }

    public function test_with_icon_after()
    {
        $this->blade('<ui:button icon-after="arrow-right" dusk="btn"><span>Button</span></ui:button>')
            ->assertMissing('@btn svg:first-child')
            ->assertPresent('@btn svg:last-child')
            ->assertHasClass('@btn svg:last-child', 'ml-2');
    }

    public function test_custom_icon_variant()
    {
        $this->blade('<ui:button icon="arrow-left" icon-variant="micro" dusk="btn"><span>Button</span></ui:button>')
            ->assertHasClass('@btn svg', 'size-4');
    }

    public function test_disabled_state()
    {
        $this->blade('<ui:button :disabled="true" dusk="btn">Button</ui:button>')
            ->assertAttribute('@btn', 'disabled', true)
            ->assertHasClass('@btn', '[&[disabled]]:opacity-60');
    }
}
