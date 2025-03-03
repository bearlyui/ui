<?php

namespace Bearly\Ui\Tests\Browser;

use Bearly\Ui\Tests\BrowserTestCase;

class BadgeTest extends BrowserTestCase
{
    public function test_can_be_rendered()
    {
        $this->blade('<ui:badge dusk="badge">Hello!</ui:badge>')
            ->assertVisible('@badge')
            ->assertSee('Hello!');
    }

    public function test_colors()
    {
        $this->blade(<<<'HTML'
            <ui:badge color="primary" dusk="primary-badge">Primary</ui:badge>
            <ui:badge color="secondary" dusk="secondary-badge">Secondary</ui:badge>
            <ui:badge color="success" dusk="success-badge">Success</ui:badge>
            <ui:badge color="warning" dusk="warning-badge">Warning</ui:badge>
            <ui:badge color="danger" dusk="danger-badge">Danger</ui:badge>
        HTML)
            ->assertHasClasses('@primary-badge', ['bg-primary-200/60', 'text-primary-900'])
            ->assertHasClasses('@secondary-badge', ['bg-secondary-300/40', 'text-secondary-800'])
            ->assertHasClasses('@success-badge', ['bg-success-200/60', 'text-success-900'])
            ->assertHasClasses('@warning-badge', ['bg-warning-200/60', 'text-warning-900'])
            ->assertHasClasses('@danger-badge', ['bg-danger-200/60', 'text-danger-900']);
    }

    public function test_sizes()
    {
        $this->blade(<<<'HTML'
            <ui:badge size="sm" dusk="sm-badge">sm</ui:badge>
            <ui:badge size="md" dusk="md-badge">md</ui:badge>
            <ui:badge size="lg" dusk="lg-badge">lg</ui:badge>
        HTML)
            ->assertHasClasses('@sm-badge', ['p-0.5', 'text-[0.675rem]'])
            ->assertHasClasses('@base-badge', ['px-1.5', 'py-1', 'text-xs'])
            ->assertHasClasses('@md-badge', ['px-2', 'py-1', 'text-sm'])
            ->assertHasClasses('@lg-badge', ['px-2', 'py-1', 'text-base']);
    }

    public function test_variants()
    {
        $this->blade(<<<'HTML'
            <ui:badge variant="solid" color="primary" dusk="solid-badge">Solid</ui:badge>
            <ui:badge variant="outline" color="primary" dusk="outline-badge">Outline</ui:badge>
        HTML)
            ->assertHasClass('@solid-badge', 'bg-primary-200/60')
            ->assertHasClass('@solid-badge', 'text-primary-900')
            ->assertHasClass('@outline-badge', 'bg-transparent')
            ->assertHasClass('@outline-badge', 'border-primary-600/70')
            ->assertHasClass('@outline-badge', 'text-primary-800');
    }

    public function test_border_radius()
    {
        $this->blade(<<<'HTML'
            <ui:badge icon-after="arrow-right" radius="none" dusk="none-radius-badge">None</ui:badge>
            <ui:badge radius="sm" dusk="sm-radius-badge">Small</ui:badge>
            <ui:badge radius="md" dusk="md-radius-badge">Medium</ui:badge>
            <ui:badge radius="lg" dusk="lg-radius-badge">Large</ui:badge>
            <ui:badge radius="xl" dusk="xl-radius-badge">Extra Large</ui:badge>
            <ui:badge radius="full" dusk="full-radius-badge">Full</ui:badge>
        HTML)
            ->assertHasClass('@none-radius-badge', 'rounded-none')
            ->assertHasClass('@sm-radius-badge', 'rounded-xs')
            ->assertHasClass('@md-radius-badge', 'rounded-md')
            ->assertHasClass('@lg-radius-badge', 'rounded-lg')
            ->assertHasClass('@xl-radius-badge', 'rounded-xl')
            ->assertHasClass('@full-radius-badge', 'rounded-full');
    }

    public function test_with_icon()
    {
        $this->blade('<ui:badge icon="arrow-left" dusk="badge"><span>Badge</span></ui:badge>')
            ->assertMissing('@badge svg:last-child')
            ->assertPresent('@badge svg:first-child')
            ->assertHasClass('@badge svg:first-child', 'mr-2');
    }

    public function test_with_icon_after()
    {
        $this->blade('<ui:badge icon-after="arrow-right" dusk="badge"><span>Badge</span></ui:badge>')
            ->assertMissing('@badge svg:first-child')
            ->assertPresent('@badge svg:last-child')
            ->assertHasClass('@badge svg:last-child', 'ml-2');
    }

    public function test_custom_icon_variant()
    {
        $this->blade('<ui:badge icon="arrow-left" icon-variant="micro" dusk="badge"><span>Badge</span></ui:badge>')
            ->assertHasClass('@badge svg', 'size-4');
    }

    public function test_href_prop()
    {
        $this->blade('<ui:badge href="https://example.com/" dusk="link-badge">Link Badge</ui:badge>')
            ->assertVisible('@link-badge')
            ->assertAttribute('@link-badge', 'href', 'https://example.com/')
            ->assertSee('Link Badge');
    }
}
